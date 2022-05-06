<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }
}
