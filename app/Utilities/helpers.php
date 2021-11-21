<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

if (!function_exists('isRoute')) {
    function isRoute($route)
    {
        return $route === request()->route()->getName();
    }
}

if (!function_exists('isRequest')) {
    function isRequest($request)
    {
        return request()->is(lang() . '/' .  $request);
    }
}

if (!function_exists('currentRoute')) {
    function currentRoute()
    {
        return request()->route()->getName();
    }
}

if (!function_exists('currentRouteParameters')) {
    function currentRouteParameters()
    {
        return Route::current()->parameters();
    }
}

if (!function_exists('lang')) {
    function lang()
    {
        return app()->getLocale();
    }
}

if (!function_exists('slugify')) {
    function slugify($text, $delimiter = '-')
    {
        $options = [];
        $text = mb_convert_encoding((string)$text, 'UTF-8', mb_list_encodings());
        $defaults = [
            'delimiter' => $delimiter,
            'limit' => null,
            'lowercase' => true,
            'replacements' => [],
            'transliterate' => true
        ];
        $options = array_merge($defaults, $options);

        $char_map = [
            // Latin
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
            'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
            'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
            'ß' => 'ss',
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
            'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
            'ÿ' => 'y',
            // Latin symbols
            '©' => '(c)',
            // Greek
            'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
            'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
            'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
            'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
            'Ϋ' => 'Y',
            'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
            'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
            'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
            'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
            'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
            // Turkish
            'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G', 'Ə' => 'e',
            'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g', 'ə' => 'e',
            // Russian
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
            'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
            'Я' => 'Ya',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
            'я' => 'ya',
            // Ukrainian
            'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
            'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
            // Czech
            'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
            'Ž' => 'Z',
            'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
            'ž' => 'z',
            // Polish
            'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
            'Ż' => 'Z',
            'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
            'ż' => 'z',
            // Latvian
            'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
            'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
            'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
            'š' => 's', 'ū' => 'u', 'ž' => 'z'
        ];

        $text = preg_replace(array_keys($options['replacements']), $options['replacements'], $text);

        if ($options['transliterate']) {
            $text = str_replace(array_keys($char_map), $char_map, $text);
        }

        $text = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $text);
        $text = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $text);
        $text = mb_substr($text, 0, ($options['limit'] ? $options['limit'] : mb_strlen($text, 'UTF-8')), 'UTF-8');
        $text = trim($text, $options['delimiter']);

        return $options['lowercase'] ? mb_strtolower($text, 'UTF-8') : $text;
    }
}

if (!function_exists('storeFile')) {
    function storeFile($path, $request)
    {
        $file = $request->getClientOriginalName();

        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $fileNameToStore = $filename . '-' . uniqid() . '.' . $extension;
        $request->storeAs('public/files/' . $path, $fileNameToStore);

        return $fileNameToStore;
    }
}

if (!function_exists('storeImage')) {
    function storeImage($path, $request, $width = null, $height = null, $thumbWidth = null, $thumbHeight = null)
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

if (!function_exists('deleteFile')) {
    function deleteFile($path, $data)
    {
        Storage::delete('public/files/' . $path . '/' . $data);
    }
}

if (!function_exists('deleteImage')) {
    function deleteImage($path, $data)
    {
        Storage::delete('public/images/thumbnails/' . $path . '/' . $data);
        Storage::delete('public/images/' . $path . '/' . $data);
    }
}

if (!function_exists('file_url')) {
    function file_url($url, $data)
    {
        return asset('uploads/files/' . $url . '/' . $data);
    }
}

if (!function_exists('img')) {
    function img($url, $data)
    {
        return asset('uploads/images/' . $url . '/' . $data);
    }
}

if (!function_exists('str_limit')) {
    function str_limit($string, $limit, $end = '...')
    {
        return Str::limit(strip_tags(html_entity_decode($string)), $limit, $end);
    }
}
