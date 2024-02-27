<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;
use Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view('panel.home.home');
    }
}
