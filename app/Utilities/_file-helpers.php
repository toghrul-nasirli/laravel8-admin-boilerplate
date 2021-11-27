<?php

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

if (!function_exists('_asset')) {
    function _asset($url, $data = null): string
    {
        return asset($data ?  'uploads/' . $url . '/' . $data : $url);
    }
}

if (!function_exists('_storeFile')) {
    function _storeFile($path, $request): string
    {
        $file = $request->getClientOriginalName();

        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $fileNameToStore = $filename . '-' . uniqid() . '.' . $extension;
        $request->storeAs('public/files/' . $path, $fileNameToStore);

        return $fileNameToStore;
    }
}

if (!function_exists('_storeImage')) {
    function _storeImage($path, $request, $width = null, $height = null, $thumbWidth = null, $thumbHeight = null): string
    {
        $file = $request->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);

        $fileNameToStore = $filename . '-' . uniqid() . '.webp';
        $filePathToStore = storage_path('app/public/images/') . $path . '/' . $fileNameToStore;
        $thumbnailFilePathToStore = storage_path('app/public/images/thumbs/') . $path . '/' . $fileNameToStore;

        if (!is_dir(storage_path('app/public/images/') . $path)) {
            mkdir(storage_path('app/public/images/') . $path, 755, true);
        }
        if (!is_dir(storage_path('app/public/images/thumbs/') . $path)) {
            mkdir(storage_path('app/public/images/thumbs/') . $path, 755, true);
        }

        if ($width) {
            Image::make($request)->encode('webp', 80)->fit($width, $height)->save($filePathToStore);
        } else {
            Image::make($request)->encode('webp', 80)->save($filePathToStore);
        }

        if ($thumbWidth) {
            Image::make($request)->encode('webp', 80)->fit($thumbWidth, $thumbHeight)->save($thumbnailFilePathToStore);
        }

        return $fileNameToStore;
    }
}

if (!function_exists('_deleteFile')) {
    function _deleteFile($path, $data): void
    {
        Storage::delete('public/' . $path . '/' . $data);
    }
}
