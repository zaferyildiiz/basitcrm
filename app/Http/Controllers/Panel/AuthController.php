<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\User;
use Auth;
use Session;
use Hash;


class AuthController extends Controller
{
    public function login()
    {
        return view('panel.auth.login');
    }

    public function login_post(Request $request){
        $user = User::where('email',$request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('panel.home');
        }else{
            return back();
        }
    }
}
