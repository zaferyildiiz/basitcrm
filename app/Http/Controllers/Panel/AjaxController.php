<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductBrand;

class AjaxController extends Controller
{
    public function get_brand(Request $request)
    {
        $data = ProductBrand::where('category_id',$request->product_category_id)->where('deleted_at',null)->get();
        return response()->json($data);
    }
}
