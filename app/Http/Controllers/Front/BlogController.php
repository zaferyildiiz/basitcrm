<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    public function blog_detail($slug)
    {
        $blog = Blog::where('slug',$slug)->first();

        return view('front.blog.detail',compact('blog'));
    }
}