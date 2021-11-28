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
    function _storeImage($path, $data, $width = null, $height = null): string
    {
        $file = $data->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);

        $fileNameToStore = $filename . '-' . uniqid() . '.webp';
        $filePathToStore = storage_path('app/public/images/') . $path . '/' . $fileNameToStore;

        if (!is_dir(storage_path('app/public/images/') . $path)) {
            mkdir(storage_path('app/public/images/') . $path, 755, true);
        }

        if ($width) {
            Image::make($data)->encode('webp', 80)->fit($width, $height)->save($filePathToStore);
        } else {
            Image::make($data)->encode('webp', 80)->save($filePathToStore);
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
