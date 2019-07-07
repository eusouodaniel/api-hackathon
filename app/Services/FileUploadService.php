<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Log;

class FileUploadService {

    public function generateFileName($file) {
        try {
            if (!$file) {
                return false;
            }

            $uuidFile = uniqid(date('HisYmd'));
            $fileName = "{$uuidFile}.{$file->extension()}";

            return $fileName;
        } catch (\Exception $e) {
            Log::error($e);
            return false;
        }
    }

    public function saveFileToPath($path, $file, $fileName = null, $disk = 'local') {
        try {
            if (!$path || !$file) {
                return false;
            }

            if (!$fileName) {
                $fileName = $file->hashName();
            }

            $file->storeAs($path, $fileName, $disk);
            return $fileName;
        } catch (\Exception $e) {
            Log::error($e);
            $this->deleteFileFromPath($path . $fileName, $disk);
            return false;
        }
    }

    public function deleteFileFromPath($pathToFile, $disk = 'local') {
        try {
            Storage::disk($disk)->delete($pathToFile);
            return true;
        } catch (\Exception $e) {
            Log::error($e);
            return false;
        }
    }
}