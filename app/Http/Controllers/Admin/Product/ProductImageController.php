<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\StoreImageRequest;
use App\Http\Requests\Image\UpdateImageRequest;
use App\Models\Image;
use App\Models\Product;
use App\Services\ImageService;

class ProductImageController extends Controller
{
    public function index($lang, Product $product)
    {   
        return view('admin.products.images.index', ['product' => $product]);
    }

    public function create($lang, Product $product)
    {
        return view('admin.products.images.create', ['product' => $product]);
    }

    public function store($lang, Product $product, StoreImageRequest $request)
    {
        ImageService::create($product, $request->validated());

        return redirect()->route('admin.products.images.index', ['lang' => _lang(), 'product' => $product])->with('success', __('admin.added'));
    }

    public function edit($lang, Product $product, Image $image)
    {
        $image->load('imageable');

        return view('admin.products.images.edit', ['image' => $image]);
    }

    public function update($lang, Product $product, Image $image, UpdateImageRequest $request)
    {
        ImageService::update($image, $request->validated());

        return redirect()->route('admin.products.images.index', ['lang' => _lang(), 'product' => $product])->with('success', __('admin.saved'));
    }
}
