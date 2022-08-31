<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderElement\StoreSliderElementRequest;
use App\Http\Requests\SliderElement\UpdateSliderElementRequest;
use App\Models\SliderElement;
use App\Services\SliderElementService;

class SliderElementController extends Controller
{
    public function index()
    {
        return view('admin.slider-elements.index');
    }

    public function create()
    {
        return view('admin.slider-elements.create');
    }

    public function store(StoreSliderElementRequest $request)
    {
        SliderElementService::create($request->validated());

        return redirect()->route('admin.slider-elements.index', _lang())->with('success', __('admin.added'));
    }

    public function edit($lang, SliderElement $sliderElement)
    {
        return view('admin.slider-elements.edit', ['sliderElement' => $sliderElement]);
    }

    public function update($lang, SliderElement $sliderElement, UpdateSliderElementRequest $request)
    {
        SliderElementService::update($sliderElement, $request->validated());

        return redirect()->route('admin.slider-elements.index', _lang())->with('success', __('admin.saved'));
    }
}
