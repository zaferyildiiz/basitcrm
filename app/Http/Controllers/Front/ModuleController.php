<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        return view('front.module.module');
    }
}
