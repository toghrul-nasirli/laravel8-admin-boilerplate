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

    public static function all($search, $orderBy, $orderDirection, $perPage, $status)
    {
        return Social::search([
            'position',
            'icon',
            'link',
        ], $search)
            ->when($status != 'all', function ($query) use ($status) {
                $query->where('status', $status);
            })->orderBy($orderBy, $orderDirection)
            ->paginate($perPage);
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

    public static function delete($id)
    {
        $social = Social::findOrFail($id);

        Social::where('position', '>', $social->position)->update([
            'position' => DB::raw('position - 1'),
        ]);

        $social->delete();
    }

    public static function changeStatus($id)
    {
        $social = Social::find($id);
        $social->status ? $social->status = false : $social->status = true;
        $social->save();
    }

    public static function changePosition($id, $direction)
    {
        $social = Social::find($id);

        if ($social) {
            if ($direction === 'up') {
                Social::where('position', $social->position - 1)->update([
                    'position' => $social->position,
                ]);
                $social->update([
                    'position' => $social->position - 1,
                ]);
            } else if ($direction === 'down') {
                Social::where('position', $social->position + 1)->update([
                    'position' => $social->position,
                ]);
                $social->update([
                    'position' => $social->position + 1,
                ]);
            }
        }
    }
}
