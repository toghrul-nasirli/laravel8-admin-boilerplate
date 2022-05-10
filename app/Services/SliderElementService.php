<?php

namespace App\Services;

use App\Models\SliderElement;

class SliderElementService extends BaseService
{
    public static function withFilter($search, $orderBy, $orderDirection, $perPage, $status)
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

    public static function update($sliderElement, $data)
    {
        if (request()->has('image')) {
            _deleteFile('images/slider-elements', $sliderElement->image);
            $data['image'] = _storeImage('slider-elements', $data['image']);
        }

        $sliderElement->update($data);
    }
}