<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DemoRequest;
use Session;

class DemoRequestController extends Controller
{
    public function index()
    {
        return view('front.demo.index');
    }

    public function demo_talep_et_post(Request $request)
    {
        $insert = DemoRequest::insert([
            'fullname'=>$request->fullname,
            'email'=>$request->email,
            'phone'=> $request->phone,
            'company_name'=> $request->company_name,
            'description'=>$request->description,
            'created_at'=>date('Y-m-d H:i:s'),
            'status'=>0
        ]);

        if($insert){
            Session::flash('success','Demo Talebiniz alındı. Bilgileriniz doğruysa en kısa sürede irtibata geçilecektir.');
            return redirect()->route('home') ;
        }
    }
}
