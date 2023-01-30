<?php

namespace App\Helpers;

use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Functions
{
    public static function UploadImage($image, $folderName)
    {
        $imageName = time() . '.' . $image->extension();
        if (!File::exists(storage_path($folderName))) {
            File::makeDirectory(storage_path($folderName), recursive: true);
        }
        $image->move(storage_path($folderName), $imageName);
        return $imageName;
    }

    public static function SaveSvg($svg, $path)
    {

        $svgName = time() . '.svg';
        Storage::put($path . "/$svgName", $svg);
        return $svgName;
    }
}
