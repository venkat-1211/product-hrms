<?php

namespace Modules\Common\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileHelper
{
    public static function UploadFile(UploadedFile $file = null, string  $path)
    {
        if (!$file) {
            return null; // no file uploaded
        }
        
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($path, $filename, 'public');

        return $path;
    }
}