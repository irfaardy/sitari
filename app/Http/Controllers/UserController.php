<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
class UserController extends Controller
{
    
   
    public function index()
    {
        $user = User::get();
        return view('admin/pengguna/index')->with(['user' => $user]);
    }

    public function create()
    {
        return view('admin/pengguna/create');
    }

    public function save(Request $request)
    {
        $validate = [
                    'name' => "required|string|max:60",
                    'email' => "required|email|unique:\App\Models\User,email",
                    'password' => "required|confirmed|min:8",
                    'no_hp' => "required|string",
                    'role' => "required|in:member,admin",
                    'jenis_kelamin' => "required|in:L,P",
                    'status' => "required|in:0,1,2",
                    ];
        // dd($request->password_confirmation." ".$request->password);
        $this->validate($request, $validate);

        User::create($this->params($request));

        return redirect()->route('pengguna')->with(['message_success' => 'Berhasil menambahkan pengguna']);
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin/pengguna/edit')->with(['user' => $user]);
    }

    public function update(Request $request)
    {
        $validate = [
                    'id' => "required|exists:\App\Models\User,id",
                    'name' => "required|string|max:60",
                    'email' => "required|email|unique:\App\Models\User,email,".$request->id,
                    'password' => "nullable|confirmed|min:8",
                    'no_hp' => "required|string",
                    'role' => "required|in:member,admin",
                    'jenis_kelamin' => "required|in:L,P",
                    'status' => "required|in:0,1,2",
                    ];
        $this->validate($request, $validate);

        User::where('id',$request->id)->update($this->params($request));

        return redirect()->back()->with(['message_success' => 'Berhasil mengubah data Pengguna']);
    }
    private function params($request)
    {
        $params = [
            'name' => $request->name,
            'email' => $request->email,
           
            'tempat_lahir' => $request->tempat_lahir,
            'no_hp' => $request->no_hp,
            'role' => $request->role,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat_lengkap' => $request->alamat_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email_verified_at' => now(),
            'status' => $request->status
        ];
        if(!empty($request->password)):
            $params['password'] =   Hash::make($request->password);
        endif;
        return $params;
    }
}
