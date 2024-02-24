<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


use Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_id',1)->where('deleted_at',null)->get();
        return view('admin.user.list_user',compact('users'));
    }


    public function add_user_post(Request $request)
    {
        // Formdan gelen verileri doğrulayalım
        $validatedData = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'username' => 'required|string|unique:users',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'notes' => 'nullable|string',
            'last_login_date' => 'nullable|date',
            'role_id' => 'required|integer',
            'status' => 'required|integer',
            'company_id' => 'required|integer',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|unique:users',
            'password' => 'required|string',

        ]);

        // Kullanıcıyı oluştur
        $user = new User();
        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->username = $validatedData['username'];
        $user->birth_date = $validatedData['birth_date'];
        $user->gender = $validatedData['gender'];
        $user->address = $validatedData['address'];
        $user->city = $validatedData['city'];
        $user->district = $validatedData['district'];
        $user->notes = $validatedData['notes'];
        $user->last_login_date = date('Y-m-d H:i:s');
        $user->role_id = $validatedData['role_id'];
        $user->status = $validatedData['status'];
        $user->company_id = 1;
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->password = bcrypt($validatedData['password']); // Şifreyi hash'le
        $user->created_at = date('Y-m-d H:i:s');
        $user->created_by= Auth::id();
        $user->updated_at= date("Y-m-d H:i:s");
        $user->updated_by= Auth::id();
        $user->save();

        // Kullanıcı oluşturulduktan sonra başka bir sayfaya yönlendir
        return redirect()->route('admin.list_user')->with('success', 'Kullanıcı başarıyla oluşturuldu.');

    }


    public function update_user_post(Request $request)
    {
          // Formdan gelen verileri doğrula
          $validatedData = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'username' => 'required|string|unique:users,username,'.$request->id,
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'notes' => 'nullable|string',
            'last_login_date' => 'nullable|date',
            'role_id' => 'required|integer',
            'status' => 'required|integer',
            'company_id' => 'required|integer',
            'email' => 'required|email|unique:users,email,'.$request->id,
            'phone' => 'required|string|unique:users,phone,'.$request->id,
            'password' => 'nullable|string',
        ]);

        // Kullanıcıyı güncelle
        $user = User::findOrFail($request->id);
        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->username = $validatedData['username'];
        $user->birth_date = $validatedData['birth_date'];
        $user->gender = $validatedData['gender'];
        $user->address = $validatedData['address'];
        $user->city = $validatedData['city'];
        $user->district = $validatedData['district'];
        $user->notes = $validatedData['notes'];
        $user->role_id = $validatedData['role_id'];
        $user->status = $validatedData['status'];
        $user->company_id = $validatedData['company_id'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->save();

        // Kullanıcı güncellendikten sonra başka bir yere yönlendir
        return redirect()->route('admin.list_user')->with('success', 'Kullanıcı başarıyla güncellendi.');

    }



    public function delete_user($id)
    {
        $delete = User::where('id',$id)->update([
            "deleted_at"=>date('Y-m-d H:i:s'),
            "deleted_by"=>Auth::id()
        ]);
        if ($delete) {
            return redirect()->route('admin.list_user')->with('success', 'Kullanıcı başarıyla güncellendi.');

        }
    }
}
