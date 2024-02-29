<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
class ProductCategoryController extends Controller
{
    public function index(){
        $category = ProductCategory::where('deleted_at',null)->where('company_id',Auth::user()->company_id)->get();
        return view('panel.product.product_category.list_product_category',compact('category'));
    }

    public function add_product_category_post(Request $request)
    {
          // Formdan gelen verileri doğrulama
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
            'category_description' => 'nullable|string',
        ]);

        // Formdan gelen verileri kullanarak yeni bir kategori oluşturma
        $category = new ProductCategory();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->parent_id = $request->parent_id ?? null;
        $category->slug = Str::slug($request->category_name,"-");
        $category->created_at = date('Y-m-d H:i:s');
        $category->created_by= Auth::id();
        $category->updated_at= date("Y-m-d H:i:s");
        $category->updated_by= Auth::id();
        $category->company_id = Auth::user()->company_id;

        $category->save();

        // Başarılı olursa, kullanıcıya mesaj gönderme ve yönlendirme
        return redirect()->back()->with('success', 'Kategori başarıyla eklendi.');

    }
}
