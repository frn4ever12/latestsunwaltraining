<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class FileController extends Controller
{
    public function generateFileUrl($filePath, $expirationMinutes = 60)
    {
        return URL::temporarySignedRoute(
            'application-file.show',
            now()->addMinutes($expirationMinutes),
            ['filePath' => $filePath]
        );
    }
    
    public function servePrivateFile($filePath)
    {   $fileLocation = storage_path('app/private/' . $filePath);
        
        if (!file_exists($fileLocation)) {
            abort(404, 'File not found');
        }   
        return response()->file($fileLocation, [
            'Content-Type' => mime_content_type($fileLocation),
            'Cache-Control' => 'private',
            'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"',
        ]);
    }
}
