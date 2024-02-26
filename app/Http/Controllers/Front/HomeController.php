<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;

class HomeController extends Controller
{
    public function index() {
        $blogs = Blog::where('deleted_at',null)->get();
        return view('front.home',compact('blogs'));
    }
}
