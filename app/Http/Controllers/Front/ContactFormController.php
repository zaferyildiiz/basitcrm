<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ContactForm;

class ContactFormController extends Controller
{
    public function index(Request $request)
    {
        $insert = ContactForm::insert([
            'name'=>$request->name,
            'phone'=>"+90".$request->phone,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'content'=>$request->content,
            'status'=>0,
            'created_at'=>date('Y-m-d H:i:s')
        ]);

        if ($insert) {
            Session::flash('success','Mesajınız alındı. Bilgileriniz doğruysa en kısa sürede irtibata geçilecektir.');
            return redirect()->route('home') ;
        }
    }


    public function iletisim()
    {
        return view('front.contact.contact');
    }
}
