<?php

namespace App\Http\Controllers;

use App\Traits\MimeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    use MimeType;

    public function showImage($dir, $fileName)
    {
        $filePath = $dir . '/' . $fileName;

        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        $rawData = Storage::disk('google')->get($filePath);

        // If you want to display the image in browser instead of download
        return response()->stream(function() use ($rawData, $fileExtension) {
            $img = imagecreatefromstring($rawData);
            try {
                switch ($fileExtension) {
                    case 'png':
                        imagepng($img);
                        break;
                    case 'bmp':
                        imagebmp($img);
                        break;
                    case 'webp':
                        imagewebp($img);
                        break;
                    default:
                        imagejpeg($img);
                        break;
                }
            } finally {
                $img && imagedestroy($img);
                $img = null;
            }
        }, 200, ['Content-type' => $this->getMimeType($fileExtension)]);

        // // If you want to download the file instead of displaying
        // return response($rawData, 200)
        //     ->header('ContentType', $file['mimeType'])
        //     ->header('Content-Disposition', "attachment; filename='$filename'");
    }

    // Just an alternative to the above function
    public function showAlt($dir, $filename) 
    {
        $dir = $dir . '/';
        $recursive = false; // Get subdirectories also?
        $contents = collect(Storage::disk('google')->listContents($dir, $recursive));

        $file = $contents
            ->where('type', '=', 'file')
            ->where('extraMetadata.filename', '=', pathinfo($filename, PATHINFO_FILENAME))
            ->where('extraMetadata.extension', '=', pathinfo($filename, PATHINFO_EXTENSION  ))
            ->first(); // there can be duplicate file names!

        $rawData = Storage::disk('google')->get($$file['path']);

        // If you want to display the image in browser instead of download
        return response()->stream(function() use ($rawData) {
            $img = imagecreatefromstring($rawData);
            try {
                imagejpeg($img);
            } finally {
                $img && imagedestroy($img);
                $img = null;
            }
        }, 200, ['Content-type' => $file['mimeType']]);

        // // If you want to download the file instead of displaying
        // return response($rawData, 200)
        //     ->header('ContentType', $file['mimeType'])
        //     ->header('Content-Disposition', "attachment; filename='$filename'");
    }
}
