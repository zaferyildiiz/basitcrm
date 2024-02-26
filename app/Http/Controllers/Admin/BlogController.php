<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {

        $blogs = Blog::where('deleted_at',null)->get();
        return view("admin.blog.list_blog",compact('blogs'));
    }



    public function add_blog_post(Request $request)
    {
        // Formdan gelen verileri doğrula
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'slug' => 'required|string|unique:blogs',
            'blog_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB ve sadece belirli uzantılara izin ver

        ]);

        // Dosya yükleme
        $imagePath = $request->file('blog_image')->store('blog_images', 'public');

        // Blog yazısını oluştur ve veritabanına kaydet
        $blogPost = new Blog();
        $blogPost->title = $validatedData['title'];
        $blogPost->content = $validatedData['content'];
        $blogPost->slug = $validatedData['slug'];
        $blogPost->user_id = Auth::id();
        $blogPost->blog_image_url = $imagePath; // Dosya yolu buraya kaydedilir
        $blogPost->hit = 0;
        $blogPost->created_at = date('Y-m-d H:i:s');
        $blogPost->created_by= Auth::id();
        $blogPost->updated_at= date("Y-m-d H:i:s");
        $blogPost->updated_by= Auth::id();
        $blogPost->save();

        // Blog yazısı başarıyla oluşturulduğunda kullanıcıyı yönlendir
        return redirect()->route('admin.list_blog')->with('success', 'Blog yazısı başarıyla oluşturuldu.');

    }

    public function update_blog_post(Request $request)
    {

        $blog = Blog::where('blog_id',$request->id)->first();
        if ($request->file('blog_image')) {
            $imagePath = $request->file('blog_image')->store('blog_images', 'public');
        }else{
            $imagePath =  $blog->blog_image_url;
        }


        $blog = Blog::findOrFail($request->id);
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->slug = $request->input('slug');
        $blog->blog_image_url = $imagePath;
        $blog->save();

        return redirect()->route('admin.list_blog')->with('success', 'Blog gönderisi başarıyla güncellendi.');

    }

    public function delete_blog($id)
    {
        $delete = Blog::where('blog_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
            'deleted_by'=>Auth::id()
        ]);

        if ($delete) {
            return redirect()->route('admin.list_blog')->with('success', 'Blog gönderisi başarıyla güncellendi.');

        }
    }
}
