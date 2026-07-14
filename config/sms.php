<?php

return [
    'base_url' => env('SMS_BASE_URL', 'https://beta.thesmscentral.com/api/v3/sms'),
    'token' => env('SMS_TOKEN'),
    'default_sender' => env('SMS_DEFAULT_SENDER'),
    'timeout' => env('SMS_TIMEOUT', 30),
    'max_retries' => env('SMS_MAX_RETRIES', 3),
    'daily_limit' => env('SMS_DAILY_LIMIT', 100),
    'hourly_limit' => env('SMS_HOURLY_LIMIT', 20),
    'batch_size' => env('SMS_BATCH_SIZE', 100),
];