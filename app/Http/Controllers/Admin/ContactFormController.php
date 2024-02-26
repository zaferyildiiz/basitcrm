<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactFormController extends Controller
{
    public function index()
    {
        $contact_form = ContactForm::all();
        return view('admin.contactform.index',compact('contact_form'));
    }
}
