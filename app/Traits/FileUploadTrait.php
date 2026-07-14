<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;

trait FileUploadTrait
{
    protected function uploadImage(UploadedFile $file, string $prefix = '', string $disk = 'public'): string
    {
        try {
            $filename = $this->generateUniqueFileName($file, $prefix);
            
            $path = $file->storeAs('', $filename, $disk);
            
            $fullPath = Storage::disk($disk)->path($path);
            
            $this->optimizeImage($fullPath);
            
            return $path;
        } catch (\Exception $e) {
            Log::error('File upload failed: ' . $e->getMessage());
            throw new \RuntimeException('File upload failed: ' . $e->getMessage());
        }
    }

    protected function generateUniqueFileName(UploadedFile $file, string $prefix = ''): string
    {
        $timestamp = now()->timestamp;
        $randomString = bin2hex(random_bytes(8));
        $extension = $file->getClientOriginalExtension();
        
        return ($prefix ? $prefix : '') . $timestamp . '_' . $randomString . '.' . $extension;
    }

    protected function optimizeImage(string $fullPath): void
    {
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize($fullPath);
    }

    protected function deleteOldImage(?string $oldPath, string $disk = 'public'): void
    {
        if ($oldPath && Storage::disk($disk)->exists($oldPath)) {
            Storage::disk($disk)->delete($oldPath);
        }
    }
}
