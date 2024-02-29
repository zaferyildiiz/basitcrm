<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductCategory;
use App\Models\ProductBrand;
use Auth;
use Illuminate\Support\Facades\Storage;

class ProductBrandController extends Controller
{
    public function index()
    {
        $brand = ProductBrand::where('company_id',Auth::user()->company_id)->where('deleted_at',null)->get();
        $category = ProductCategory::where('deleted_at',null)->where('company_id',Auth::user()->company_id)->get();
        return view('panel.product.product_brand.list_product_brand',compact('category','brand'));
    }



    public function add_product_brand_post(Request $request)
    {
        // Formdan gelen verileri doğrulama
        $validatedData = $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_logo' => 'required', // Resim yükleme kuralı
            'brand_description' => 'nullable|string',
            'category_id' => 'required|integer',
            // Diğer gerekli alanlar buraya eklenebilir
        ]);

        // Eğer formdan resim geldiyse, resmi kaydet ve dosya yolunu veritabanına kaydet
        if ($request->hasFile('brand_logo')) {
            $file = $request->file('brand_logo');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('brand_logos/'.Auth::user()->company_id, 'public');
        }
        $validatedData['brand_logo'] = $filePath;
        $validatedData['created_at'] = date('Y-m-d H:i:s');
        $validatedData['created_by'] = Auth::id();
        $validatedData['updated_at'] = date('Y-m-d H:i:s');
        $validatedData['updated_by']  = Auth::id();
        $validatedData['company_id']   = Auth::user()->company_id;
        // Veritabanına yeni bir marka ekleyin
        $brand = ProductBrand::create($validatedData);

        // Başarılı bir şekilde eklendikten sonra yönlendirme yapın veya başka bir şey yapın
        return redirect()->route('panel.list_product_brand')->with('success', 'Marka başarıyla eklendi.');

    }



    public function update_product_brand_post(Request $request)
    {
           // Formdan gelen verileri doğrulama
           $validatedData = $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_description' => 'nullable|string',
            'category_id' => 'required|integer',
            // Diğer gerekli alanlar buraya eklenebilir
        ]);

        // Eğer formdan resim geldiyse, resmi kaydet ve dosya yolunu veritabanına kaydet
        if ($request->hasFile('brand_logo')) {
            $file = $request->file('brand_logo');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('brand_logos/'.Auth::user()->company_id, 'public');
            $validatedData['brand_logo'] = $filePath;
        }

        $validatedData['created_at'] = date('Y-m-d H:i:s');
        $validatedData['created_by'] = Auth::id();
        $validatedData['updated_at'] = date('Y-m-d H:i:s');
        $validatedData['updated_by']  = Auth::id();
        $validatedData['company_id']   = Auth::user()->company_id;
        // Veritabanına yeni bir marka ekleyin
        $brand = ProductBrand::where('product_brand_id',$request->id)->update($validatedData);

        // Başarılı bir şekilde eklendikten sonra yönlendirme yapın veya başka bir şey yapın
        return redirect()->route('panel.list_product_brand')->with('success', 'Marka başarıyla eklendi.');

    }


    public function delete_product_brand($id)
    {
        $delete = ProductBrand::where('product_brand_id',$id)->where('company_id',Auth::user()->company_id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
            'deleted_by'=>Auth::id()
        ]);


        if ($delete) {
            return redirect()->route('panel.list_product_brand')->with('success', 'Marka başarıyla silindi.');

        }
    }
}
