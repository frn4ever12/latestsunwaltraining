<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Exception;

class SmsService
{
    private $baseUrl;
    private $token;
    private $defaultSender;
    private $timeout;
    private $maxRetries;

    public function __construct()
    {
        $this->baseUrl = config('sms.base_url', 'https://beta.thesmscentral.com/api/v3/sms');
        $this->token = config('sms.token');
        $this->defaultSender = config('sms.default_sender');
        $this->timeout = config('sms.timeout', 30);
        $this->maxRetries = config('sms.max_retries', 3);

        if (empty($this->token)) {
            throw new Exception('SMS token not configured');
        }
    }

    /**
     * Send SMS with comprehensive security measures
     */
    public function sendSMS(string $to, string $message, string $sender = null): array
    {
        try {
            $validatedData = $this->validateAndSanitizeInput($to, $message, $sender);
            $this->checkRateLimit($to);
            $response = $this->makeSecureRequest($validatedData);            
            return $response;
            
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Validate and sanitize input parameters
     */
    private function validateAndSanitizeInput(string $to, string $message, ?string $sender): array
    {
        $phoneNumbers = array_map('trim', explode(',', $to));
        $validNumbers = [];
        
        foreach ($phoneNumbers as $number) {
            $cleanNumber = preg_replace('/\D/', '', $number);
            if (preg_match('/^\d{10}$/', $cleanNumber)) {
                $validNumbers[] = $cleanNumber;
            } else {
                throw new Exception("Invalid phone number format: {$number}");
            }
        }
        
        if (empty($validNumbers)) {
            throw new Exception('No valid phone numbers provided');
        }
        
      
        if (empty(trim($message))) {
            throw new Exception('Message cannot be empty');
        }
        
        $sanitizedMessage = htmlspecialchars(trim($message), ENT_QUOTES, 'UTF-8');
        
        if (strlen($sanitizedMessage) > 1600) {
            throw new Exception('Message too long');
        }
        
        $senderID = $sender ?? $this->defaultSender;
        if (empty($senderID)) {
            throw new Exception('Sender ID not provided');
        }
        
        $sanitizedSender = preg_replace('/[^a-zA-Z0-9]/', '', $senderID);
        if (strlen($sanitizedSender) > 11) {
            $sanitizedSender = substr($sanitizedSender, 0, 11);
        }
        
        return [
            'to' => implode(',', $validNumbers),
            'message' => $sanitizedMessage,
            'sender' => $sanitizedSender
        ];
    }

    /**
     * Implement rate limiting to prevent abuse
     */
    private function checkRateLimit(string $to): void
    {
        $numbers = explode(',', $to);
        $rateLimitKey = 'sms_rate_limit_' . auth()->id() ?? 'anonymous';
        
        $dailyCount = Cache::get($rateLimitKey . '_daily', 0);
        $dailyLimit = config('sms.daily_limit', 100);
        
        if ($dailyCount + count($numbers) > $dailyLimit) {
            throw new Exception('Daily SMS limit exceeded');
        }
        
        $hourlyCount = Cache::get($rateLimitKey . '_hourly', 0);
        $hourlyLimit = config('sms.hourly_limit', 20);
        
        if ($hourlyCount + count($numbers) > $hourlyLimit) {
            throw new Exception('Hourly SMS limit exceeded');
        }
        
        Cache::put($rateLimitKey . '_daily', $dailyCount + count($numbers), now()->endOfDay());
        Cache::put($rateLimitKey . '_hourly', $hourlyCount + count($numbers), now()->addHour());
    }

    /**
     * Make secure HTTP request with retry logic
     */
    private function makeSecureRequest(array $data): array
    {
        $attempt = 0;
        
        while ($attempt < $this->maxRetries) {
            try {
                $response = Http::timeout($this->timeout)
                    ->withHeaders([
                        'User-Agent' => 'Laravel-SMS-Client/1.0',
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json'
                    ])
                    ->post($this->baseUrl, [
                        'token' => $this->token,
                        'to' => $data['to'],
                        'sender' => $data['sender'],
                        'message' => $data['message']
                    ]);
                
                if ($response->successful()) {
                    return $this->parseResponse($response->json());
                }
                
                if ($response->status() >= 400 && $response->status() < 500) {
                    throw new Exception("Client error: " . $response->status());
                }
                
                $attempt++;
                if ($attempt < $this->maxRetries) {
                    sleep(pow(2, $attempt)); 
                }
                
            } catch (Exception $e) {
                $attempt++;
                if ($attempt >= $this->maxRetries) {
                    throw new Exception("SMS request failed after {$this->maxRetries} attempts: " . $e->getMessage());
                }
                sleep(pow(2, $attempt));
            }
        }
        
        throw new Exception("SMS request failed after {$this->maxRetries} attempts");
    }

    /**
     * Parse and validate API response
     */
    private function parseResponse(array $response): array
    {
        if (!isset($response['response_code'])) {
            throw new Exception('Invalid API response format');
        }
        
        if ($response['response_code'] !== 200) {
            throw new Exception('API returned error: ' . ($response['message'] ?? 'Unknown error'));
        }
        
        return [
            'success' => true,
            'message_id' => $response['message_id'] ?? null,
            'message_count' => $response['message_count'] ?? null,
            'total_numbers' => $response['total_numbers'] ?? null,
            'balance_deducted' => $response['balance_deducted'] ?? null,
            'current_balance' => $response['current_balance'] ?? null,
            'message_type' => $response['message_type'] ?? null
        ];
    }

    /**
     * Send bulk SMS with batch processing
     */
    public function sendBulkSMS(array $recipients, string $message, string $sender = null): array
    {
        $batchSize = config('sms.batch_size', 100);
        $results = [];
        
        foreach (array_chunk($recipients, $batchSize) as $batch) {
            $to = implode(',', $batch);
            $results[] = $this->sendSMS($to, $message, $sender);
            
            usleep(500000); 
        }
        
        return $results;
    }
}