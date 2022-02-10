<?php

namespace App\Services;

use App\Models\SliderElement;
use Illuminate\Support\Facades\DB;

class SliderElementService
{
    public static function all($search, $orderBy, $orderDirection, $perPage, $status)
    {
        return SliderElement::search([
            'position',
            'title',
            'minitext',
            'link',
        ], $search)
            ->when($status != 'all', function ($query) use ($status) {
                $query->where('status', $status);
            })->orderBy($orderBy, $orderDirection)
            ->paginate($perPage);
    }

    public static function create($data)
    {
        $data['position'] = SliderElement::max('position') + 1;
        $data['image'] = _storeImage('slider-elements', $data['image']);

        SliderElement::create($data);
    }

    public static function update($sliderItem, $data)
    {
        if (request()->has('image')) {
            _deleteFile('images/slider-elements', $sliderItem->image);
            $data['image'] = _storeImage('slider-elements', $data['image']);
        }

        $sliderItem->update($data);
    }

    public static function delete($id)
    {
        $sliderItem = SliderElement::findOrFail($id);

        _deleteFile('images/slider-elements', $sliderItem->image);

        SliderElement::where('position', '>', $sliderItem->position)->update([
            'position' => DB::raw('position - 1'),
        ]);

        $sliderItem->delete();
    }

    public static function changeStatus($id)
    {
        $sliderItem = SliderElement::find($id);
        $sliderItem->status ? $sliderItem->status = false : $sliderItem->status = true;
        $sliderItem->save();
    }

    public static function changePosition($id, $direction)
    {
        $sliderItem = SliderElement::find($id);

        if ($sliderItem) {
            if ($direction === 'up') {
                SliderElement::where('position', $sliderItem->position - 1)->update([
                    'position' => $sliderItem->position,
                ]);
                $sliderItem->update([
                    'position' => $sliderItem->position - 1,
                ]);
            } else if ($direction === 'down') {
                SliderElement::where('position', $sliderItem->position + 1)->update([
                    'position' => $sliderItem->position,
                ]);
                $sliderItem->update([
                    'position' => $sliderItem->position + 1,
                ]);
            }
        }
    }
}