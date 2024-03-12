<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductCategory;

use Auth;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function index()
    {
        $productCategory = ProductCategory::where('company_id',Auth::user()->company_id)->where('deleted_at',null)->get();
        $product = Product::with('brands')->where('company_id',Auth::user()->company_id)->where('deleted_at',null)->get();
        return view('panel.product.product.list_product',compact('productCategory','product'));
    }

    public function add_product_post(Request $request)
    {
       // Formdan gelen verileri al
       $data = $request->validate([
        'product_name' => 'required|string',
        'product_code' => 'required|string',
        'product_category_id' => 'required|integer',
        'product_brand_id' => 'required|integer',
        'buying_price' => 'required|numeric',
        'product_old_price' => 'required|numeric',
        'product_price' => 'required|numeric',
        'description' => 'required|string',
        'stock_quantity' => 'required|integer',
        'stock_type' => 'required|string',
        'stock_alert_level' => 'required|integer',
        'status' => 'required|boolean',
        'is_installment' => 'required|boolean',
        'max_installment_number' => 'nullable|integer',
    ]);


    $data['created_at']=date('Y-m-d H:i:s');
    $data['updated_at']=date('Y-m-d H:i:s');
    $data['created_by']=Auth::id();
    $data['updated_by']=Auth::id();
    $data['company_id']=Auth::user()->company_id;

    $product = Product::create($data);

    // Resimlerin yolu storage klasörüne kaydet
    $imagePaths = [];

    foreach ($request->file('aksfileupload') as $image) {
        $destinationPath = 'product_uploads';
        $myimage = $image->getClientOriginalName();
        $image->move(public_path($destinationPath.'/'.Auth::user()->company_id."/".$product->product_id), $myimage);
        array_push($imagePaths, "/product_uploads".'/'.Auth::user()->company_id.'/'.$product->product_id.'/'.$myimage);
        }

    // Resimlerin yollarını JSON formatına çevir
    $product->image_json = json_encode($imagePaths);
    $product->save();

    // Başarılı ekleme durumunda kullanıcıyı yönlendir, isteğe bağlı
    return redirect()->route('panel.list_product')->with('success', 'Ürün başarıyla eklendi!');

    }

    public function update_product_post(Request $request)
    {
        // Formdan gelen verileri al
        $data = $request->validate([
            'product_name' => 'required|string',
            'product_code' => 'required|string',
            'product_category_id' => 'required|integer',
            'product_brand_id' => 'required|integer',
            'buying_price' => 'required|numeric',
            'product_old_price' => 'required|numeric',
            'product_price' => 'required|numeric',
            'description' => 'required|string',
            'stock_quantity' => 'required|integer',
            'stock_type' => 'required|string',
            'stock_alert_level' => 'required|integer',
            'status' => 'required|boolean',
            'is_installment' => 'required|boolean',
            'max_installment_number' => 'nullable|integer',
        ]);

        // Güncellenecek ürünün ID'sini al
        $product_id = $request->input('id');

        // Veritabanından ürünü bul
        $product = Product::findOrFail($product_id);

        // Verileri güncelle
        $product->update($data);

        // Güncelleme tarihini ayarla
        $product->updated_at = now();

        // Kullanıcı ve şirket bilgilerini güncelle
        $product->updated_by = Auth::id();
        $product->company_id = Auth::user()->company_id;

        // Veritabanına kaydet
        $product->save();

        // Başarılı güncelleme durumunda kullanıcıyı yönlendir, isteğe bağlı
        return redirect()->route('panel.list_product')->with('success', 'Ürün başarıyla güncellendi!');
    }




    public function update_product_image($id)
    {
        $product = Product::where('company_id',Auth::user()->company_id)->where('product_id',$id)->first();
        $images = $product->image_json;
        $images = json_decode($images);

        $image_url = [];
        foreach ($images as $key => $value) {
            $image_url[$value]=$value;
        }


        return view('panel.product.product.update_product_image',compact('image_url'));
    }


    public function delete_product_image(Request $request){



        $path = $request->image_path;
        $array =explode('/',$path);

        $path = $array[5]."/".$array[6]."/".$array[7]."/".$array[8];



        if (file_exists(public_path($path))){
         $filedeleted = unlink(public_path($path));
          if ($filedeleted) {
              return redirect()->route('panel.list_product')->with('success', 'Ürün resmi silindi!');
          }
          } else {
             echo 'Unable to delete the given file';
          }


    }


    public function add_update_product_image(Request $request)
    {

        $product = Product::where('product_id',$request->product_id)->where('company_id',Auth::user()->company_id)->first();
        $images = json_decode($product->image_json,true);

        foreach ($request->file('aksfileupload') as $image) {
            $destinationPath = 'product_uploads';
            $myimage = $image->getClientOriginalName();
            $image->move(public_path($destinationPath.'/'.Auth::user()->company_id."/".$product->product_id), $myimage);
            array_push($images, "/product_uploads".'/'.Auth::user()->company_id.'/'.$product->product_id.'/'.$myimage);
            }



        $update = Product::where('product_id',$request->product_id)
        ->update([
            'image_json'=>json_encode($images)
        ]);

        if ($update) {
            return redirect()->route('panel.list_product')->with('success', 'Ürün resmi güncellendi!');

        }
    }
}
