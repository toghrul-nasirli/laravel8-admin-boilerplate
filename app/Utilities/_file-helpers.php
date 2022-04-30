<?php

use App\Models\Settings;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

if (!function_exists('_asset')) {
    function _asset($path = null, $data = null): string
    {
        $darkmode = Settings::select('darkmode')->firstOrFail()->darkmode;
        $placeholderImg = $darkmode ? 'backend/img/no-img-dark.png' : 'backend/img/no-img.png' ;

        return asset(
            $path === null
                ? $placeholderImg
                : ($data === null || $data == ''
                    ? (file_exists($path)
                        ? $path
                        : $placeholderImg)
                    : (file_exists('uploads/' . $path . '/' . $data)
                        ? 'uploads/' . $path . '/' . $data
                        : $placeholderImg))
        );
    }
}

if (!function_exists('_storeFile')) {
    function _storeFile($path, $request): string
    {
        $file = $request->getClientOriginalName();

        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $fileNameToStore = substr(_slugify($filename), 0, 6) . '-' . time() . '.' . $extension;
        $request->storeAs('files/' . $path, $fileNameToStore);

        return $fileNameToStore;
    }
}

if (!function_exists('_storeImage')) {
    function _storeImage($path, $request, $width = null, $height = null): string
    {
        $file = $request->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);

        $fileNameToStore = substr(_slugify($filename), 0, 6) . '-' . time() . '.webp';
        $filePathToStore = 'images/' . $path . '/' . $fileNameToStore;

        if ($width) {
            $image = Image::make($request)->fit($width, $height)->encode('webp', 75);

            Storage::put($filePathToStore, $image);
        } else {
            $image = Image::make($request)->encode('webp', 75);

            Storage::put($filePathToStore, $image);
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
