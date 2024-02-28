<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use Auth;
use Session;

class CustomerController extends Controller
{
    public function index()
    {

        $customer = Customer::where('company_id',Auth::user()->id)->where('deleted_at',null)->get();
        return view('panel.customer.list_customer',compact('customer'));
    }


    public function add_customer_post(Request $request)
    {
        // Formdan gelen verileri doğrulama
        $validatedData = $request->validate([
            'customer_name' => 'required|string',
            'customer_type' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'tax_no' => 'nullable|string',
            'tax_office' => 'nullable|string',
            'contact_person_name' => 'required|string',
            'contact_person_email' => 'required|email',
            'contact_person_phone' => 'required|string',
            'activity_area' => 'required|string',
            'customer_note' => 'nullable|string',
            // Diğer alanlar için gereken doğrulamaları ekleyebilirsiniz
        ]);

        // Customer modeli üzerinden yeni bir müşteri oluştur
        $customer = new Customer();
        $customer->customer_name = $validatedData['customer_name'];
        $customer->customer_type = $validatedData['customer_type'];
        $customer->city = $validatedData['city'];
        $customer->district = $validatedData['district'];
        $customer->address = $validatedData['address'];
        $customer->phone = $validatedData['phone'];
        $customer->email = $validatedData['email'];
        $customer->tax_no = $validatedData['tax_no'];
        $customer->tax_office = $validatedData['tax_office'];
        $customer->contact_person_name = $validatedData['contact_person_name'];
        $customer->contact_person_email = $validatedData['contact_person_email'];
        $customer->contact_person_phone = $validatedData['contact_person_phone'];
        $customer->activity_area = $validatedData['activity_area'];
        $customer->customer_note = $validatedData['customer_note'];
        $customer->created_at = date('Y-m-d H:i:s');
        $customer->created_by= Auth::id();
        $customer->updated_at= date("Y-m-d H:i:s");
        $customer->updated_by= Auth::id();
        $customer->company_id = Auth::user()->company_id;


        // Müşteriyi veritabanına kaydet
        $customer->save();

        // Başarılı bir şekilde kaydedildikten sonra bir yönlendirme yapabilirsiniz
        return redirect()->back()->with('success', 'Müşteri başarıyla kaydedildi.');

    }


    public function update_customer_post(Request $request)
    {
        // Formdan gelen verileri doğrulama
        $validatedData = $request->validate([
            'customer_name' => 'required|string',
            'customer_type' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'tax_no' => 'nullable|string',
            'tax_office' => 'nullable|string',
            'contact_person_name' => 'required|string',
            'contact_person_email' => 'required|email',
            'contact_person_phone' => 'required|string',
            'activity_area' => 'required|string',
            'customer_note' => 'nullable|string',
            // Diğer alanlar için gereken doğrulamaları ekleyebilirsiniz
        ]);
         $validatedData['updated_at']= date('Y-m-d H:i:s');
         $validatedData['updated_by'] = Auth::id();
        // Müşteri modelini kullanarak güncellenecek müşteriyi bul
        $customer = Customer::findOrFail($request->id);

        // Formdan gelen verileri kullanarak müşteri bilgilerini güncelle
        $customer->update($validatedData);

        // Başarılı bir şekilde güncellendikten sonra bir yönlendirme yapabilirsiniz
        return redirect()->back()->with('success', 'Müşteri başarıyla güncellendi.');

    }
}
