<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Company;
use Illuminate\Support\Facades\Redis;

class CompanyController extends Controller
{
    public function index(){
        $company = Company::where('deleted_at',null)->get();
        return view('admin.company.list_company',compact('company'));
    }

    public function add_company_post(Request $request){
      // Formdan gelen verileri doğrulama işlemi yapabilirsiniz
      $validatedData = $request->validate([
        'company_name' => 'required|string',
        'company_type' => 'required|string',
        'tax_no' => 'required|string',
        'city' => 'required|string',
        'district' => 'required|string',
        'address' => 'required|string',
        'phone' => 'required|string',
        'contact_person_name' => 'required|string',
        'contact_person_email' => 'required|email',
        'contact_person_phone' => 'required|string',
        'activity_area' => 'required|string',
        'customer_note' => 'nullable|string',
        ]);

        // Company modelini kullanarak yeni bir şirket oluşturun
        $company = new Company();
        $company->company_name = $validatedData['company_name'];
        $company->company_type = $validatedData['company_type'];
        $company->tax_no = $validatedData['tax_no'];
        $company->city = $validatedData['city'];
        $company->district = $validatedData['district'];
        $company->address = $validatedData['address'];
        $company->phone = $validatedData['phone'];
        $company->contact_person_name = $validatedData['contact_person_name'];
        $company->contact_person_email = $validatedData['contact_person_email'];
        $company->contact_person_phone = $validatedData['contact_person_phone'];
        $company->activity_area = $validatedData['activity_area'];
        $company->customer_note = $validatedData['customer_note'];
        $company->created_at = date('Y-m-d H:i:s');
        $company->created_by= Auth::id();
        $company->updated_at= date("Y-m-d H:i:s");
        $company->updated_by= Auth::id();

        // Şirketi veritabanına kaydedin
        $company->save();

        // Yeni eklenen şirketin ID'sini döndürün veya başka bir yönlendirme işlemi yapabilirsiniz
        return redirect()->route('admin.list_company')->with('success', 'Firma başarıyla oluşturuldu.');

    }



    public function update_company_post(Request $request){

         // Formdan gelen verileri doğrulama işlemi yapabilirsiniz
    $validatedData = $request->validate([
        'company_name' => 'required|string',
        'company_type' => 'required|string',
        'tax_no' => 'required|string',
        'city' => 'required|string',
        'district' => 'required|string',
        'address' => 'required|string',
        'phone' => 'required|string',
        'contact_person_name' => 'required|string',
        'contact_person_email' => 'required|email',
        'contact_person_phone' => 'required|string',
        'activity_area' => 'required|string',
        'customer_note' => 'nullable|string',
    ]);


 // İlgili şirketi bul
        $company = Company::findOrFail($request->id);

        // Şirket bilgilerini güncelle
        $company->company_name = $validatedData['company_name'];
        $company->company_type = $validatedData['company_type'];
        $company->tax_no = $validatedData['tax_no'];
        $company->city = $validatedData['city'];
        $company->district = $validatedData['district'];
        $company->address = $validatedData['address'];
        $company->phone = $validatedData['phone'];
        $company->contact_person_name = $validatedData['contact_person_name'];
        $company->contact_person_email = $validatedData['contact_person_email'];
        $company->contact_person_phone = $validatedData['contact_person_phone'];
        $company->activity_area = $validatedData['activity_area'];
        $company->customer_note = $validatedData['customer_note'];
        $company->updated_at = now(); // Laravel'ın sunduğu yardımcı fonksiyon
        $company->updated_by = Auth::id();

        // Şirketi kaydet
        $company->save();

    // Yönlendirme işlemi veya başka bir işlem yapabilirsiniz
    return redirect()->route('admin.list_company')->with('success', 'Firma başarıyla güncellendi.');

    }


    public function delete_company($id)
    {
        $delete = Company::where('company_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
            'deleted_by'=>Auth::id()
        ]);

        if ($delete) {
            return redirect()->route('admin.list_company')->with('success', 'Firma başarıyla silindi.');
        }
    }
}
