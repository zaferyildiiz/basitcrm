<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('panel.product.product.list_product');
    }

    public function add_product_post(Request $request)
    {
        print_r($request->all());
    }
}
