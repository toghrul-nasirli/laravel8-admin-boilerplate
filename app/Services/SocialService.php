<?php

namespace App\Services;

use App\Models\Social;
use Illuminate\Support\Facades\DB;

class SocialService
{
    public const ICONS = [
        'Facebook 1' => 'fab fa-facebook',
        'Facebook 2' => 'fab fa-facebook-f',
        'Facebook 3' => 'fab fa-facebook-square',
        'Twitter 1' => 'fab fa-twitter',
        'Twitter 2' => 'fab fa-twitter-square',
        'Instagram 1' => 'fab fa-instagram',
        'Instagram 2' => 'fab fa-instagram-square',
        'Linkedin 1' => 'fab fa-linkedin-in',
        'Linkedin 2' => 'fab fa-linkedin',
        'Youtube 1' => 'fab fa-youtube',
        'Youtube 2' => 'fab fa-youtube-square',
        'Vimeo 1' => 'fab fa-vimeo-v',
        'Vimeo 2' => 'fab fa-vimeo',
        'Vimeo 3' => 'fab fa-vimeo-square',
        'Pinterest 1' => 'fab fa-pinterest',
        'Pinterest 2' => 'fab fa-pinterest-p',
        'Pinterest 3' => 'fab fa-pinterest-square',
    ];
    
    public static function all()
    {
        return Social::orderBy('position')->get();
    }

    public static function create($data)
    {
        $data['position'] = Social::max('position') + 1;
        
        Social::create($data);
    }

    public static function update($social, $data)
    {
        $social->update($data);
    }

    public static function delete($social)
    {
        Social::where('position', '>', $social->position)->update([
            'position' => DB::raw('position - 1'),
        ]);

        $social->delete();
    }
}