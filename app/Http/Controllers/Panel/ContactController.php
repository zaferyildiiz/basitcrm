<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Contact;
use Auth;
use Session;


class ContactController extends Controller
{
    public function index()
    {
        $customer = Customer::where('company_id',Auth::user()->company_id)->where('deleted_at',null)->get();
        $contact = Contact::where('company_id',Auth::user()->company_id)->where('deleted_at',null)->get();
        return view('panel.contact.list_contact',compact('customer','contact'));
    }


    public function add_contact_post(Request $request)
    {
    // Formdan gelen verileri doğrulama
    $validatedData = $request->validate([
        'contact_name' => 'required|string|max:255',
        'contact_surname' => 'required|string|max:255',
        'contact_email' => 'required|string|email|max:255',
        'customer_id' => 'required|integer', // customer_id alanı için doğrulama kuralı eklendi
        'position' => 'nullable|string|max:255', // Boş geçilebilir, opsiyonel olarak eklendi
        'city' => 'nullable|string|max:255', // Boş geçilebilir, opsiyonel olarak eklendi
        'district' => 'nullable|string|max:255', // Boş geçilebilir, opsiyonel olarak eklendi
        'customer_note' => 'nullable|string', // Boş geçilebilir, opsiyonel olarak eklendi
    ]);

    // Veritabanına yeni bir kişi ekleyin
    $contact = new Contact();
    $contact->contact_name = $request->contact_name;
    $contact->contact_surname = $request->contact_surname;
    $contact->contact_email = $request->contact_email;
    $contact->contact_phone = $request->contact_phone;
    $contact->customer_id = $request->customer_id;
    $contact->position = $request->position;
    $contact->city = $request->city;
    $contact->district = $request->district;
    $contact->customer_note = $request->customer_note;
    $contact->created_at = date('Y-m-d H:i:s');
    $contact->created_by= Auth::id();
    $contact->updated_at= date("Y-m-d H:i:s");
    $contact->updated_by= Auth::id();
    $contact->company_id = Auth::user()->company_id;
    $contact->save();

    // Başarılı bir şekilde eklendikten sonra yönlendirme yapın veya başka bir şey yapın
    return redirect()->route('panel.list_contact')->with('success', 'Kontak başarıyla eklendi!');
    }


    public function update_contact_post(Request $request)
    {

        // Formdan gelen verileri doğrulama
        $validatedData = $request->validate([
            'edit_contact_name' => 'required|string|max:255',
            'edit_contact_surname' => 'required|string|max:255',
            'edit_contact_email' => 'required|string|email|max:255',
            'edit_contact_phone' => 'required|string|max:255',
            'edit_customer_id' => 'required|integer',
            'edit_position' => 'nullable|string|max:255',
            'edit_city' => 'nullable|string|max:255',
            'edit_district' => 'nullable|string|max:255',
            'edit_customer_note' => 'nullable|string',
        ]);

        // Veritabanında ilgili kişiyi bul ve güncelle
        $contact = Contact::findOrFail($request->id);
        $contact->contact_name = $request->edit_contact_name;
        $contact->contact_surname = $request->edit_contact_surname;
        $contact->contact_email = $request->edit_contact_email;
        $contact->contact_phone = $request->edit_contact_phone;
        $contact->customer_id = $request->edit_customer_id;
        $contact->position = $request->edit_position;
        $contact->city = $request->edit_city;
        $contact->district = $request->edit_district;
        $contact->customer_note = $request->edit_customer_note;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id();
        $contact->save();

        // Başarılı bir şekilde güncellendikten sonra yönlendirme yapın veya başka bir şey yapın
        return redirect()->back()->with('success', 'Kontak başarıyla güncellendi!');
    }



    public function delete_contact($id)
    {
        $delete = Contact::where('contact_id',$id)->where('company_id',Auth::user()->company_id)->update(["deleted_at"=>date('Y-m-d H:i:s'),"deleted_by"=>Auth::id()]);
        if ($delete) {
            return redirect()->back()->with('success', 'Kontak başarıyla silindi!');
        }
    }
}
