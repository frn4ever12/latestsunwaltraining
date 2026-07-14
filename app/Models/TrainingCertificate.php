<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingCertificate extends Model
{
    protected $fillable = [
        'training_id',
        'training_application_id',
        'training_batch_id',
        'certificate_number',
        'issue_date',
        'qr_code',
        'status',
        'remarks',
    ];

    protected $casts = [
        'issue_date' => 'date',
    ];

    // Status Constants
    const STATUS_ISSUED = 'issued';
    const STATUS_REVOKED = 'revoked';

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    public function trainingApplication()
    {
        return $this->belongsTo(TrainingApplication::class);
    }

    public function trainingBatch()
    {
        return $this->belongsTo(TrainingBatch::class);
    }

    public function getStatusLabel()
    {
        return match($this->status) {
            self::STATUS_ISSUED => 'जारी गरियो',
            self::STATUS_REVOKED => 'रद्द गरियो',
            default => 'अज्ञात',
        };
    }

    public function getStatusBadgeClass()
    {
        return match($this->status) {
            self::STATUS_ISSUED => 'bg-success',
            self::STATUS_REVOKED => 'bg-danger',
            default => 'bg-secondary',
        };
    }

    public function generateCertificateNumber()
    {
        if (!$this->certificate_number) {
            $year = date('Y');
            $trainingCode = $this->training->id ?? '000';
            $sequence = str_pad($this->id, 4, '0', STR_PAD_LEFT);
            $this->certificate_number = "CERT-{$year}-{$trainingCode}-{$sequence}";
            $this->save();
        }
        return $this->certificate_number;
    }

    public function generateQRCode()
    {
        if (!$this->qr_code) {
            // Generate QR code URL for verification
            $baseUrl = config('app.url');
            $verificationUrl = "{$baseUrl}/verify-certificate/{$this->certificate_number}";
            $this->qr_code = $verificationUrl;
            $this->save();
        }
        return $this->qr_code;
    }
}
