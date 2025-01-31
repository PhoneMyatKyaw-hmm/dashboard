<?php

namespace App\Services;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class TempMediaService
{
    /**
     * Stores a temporary file in the storage
     */
    public function storeTempFile(Request $request): JsonResponse
    {
        $path = storage_path('tmp/uploads');

        if (! file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $file = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
        }

        if ($file) {
            $name = uniqid().'_'.trim($file->getClientOriginalName());

            $file->move($path, $name);

            return response()->json([
                'filename' => $name,
                'original_name' => $file->getClientOriginalName(),
            ]);
        } else {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
    }

    public function deleteTempFile(Request $request): JsonResponse
    {
        $filename = $request->input('filename');
        if (empty($filename)) {
            return response()->json(['error' => 'Filename is required'], 400);
        }

        $path = storage_path('tmp/uploads/'.$filename);

        Log::info('Attempting to delete file at path: '.$path);

        if (File::exists($path)) {
            try {
                File::delete($path);

                return response()->json(['status' => 'File deleted successfully']);
            } catch (Exception $e) {
                Log::error('Error deleting file: '.$e->getMessage());

                return response()->json(['error' => 'Failed to delete file'], 500);
            }
        }

        return response()->json(['error' => 'File not found'], 404);
    }
}
