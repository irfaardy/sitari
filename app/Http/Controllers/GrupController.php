<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grup;
use Hash;
class GrupController extends Controller
{
    
    public function index()
    {
        $data = Grup::get();
        return view('admin/grup/index')->with(['data' => $data]);
    }

    public function create()
    {
        return view('admin/grup/create');
    }

    public function save(Request $request)
    {
        $validate = [
                    'nama' => "required",
                    'grup_bawaan' => "nullable|boolean",
                    'deskripsi' => "required|string",
                    ];
        // dd($request->password_confirmation." ".$request->password);
        $this->validate($request, $validate);
                    
        Grup::create($this->params($request));

        return redirect()->route('grup')->with(['message_success' => 'Berhasil menambahkan grup']);
    }

    public function edit($id)
    {
        $data = Grup::where('id',$id)->first();
        return view('admin/grup/edit')->with(['data' => $data]);
    }

    public function delete($id)
    {
        $data = Grup::where('id',$id)->delete();
        return redirect()->route('grup')->with(['message_success' => 'Berhasil menghapus grup']);
    }

    public function update(Request $request)
    {
        $validate = [
                    'id' => "required|exists:\App\Models\User,id",
                    'nama' => "required",
                    'grup_bawaan' => "nullable|boolean",
                    'deskripsi' => "required|string",
                    ];
        $this->validate($request, $validate);

        Grup::where('id',$request->id)->update($this->params($request));

        return redirect()->back()->with(['message_success' => 'Berhasil mengubah data grup']);
    }
    private function params($request)
    {
        if(!empty($request->grup_bawaan))
        {
            Grup::whereNotNull('nama')->update(['grup_bawaan' => 0]);
        }
        $params = [
            'nama' => $request->nama,
            'grup_bawaan' => empty($request->grup_bawaan) ? 0:1,
            'deskripsi' => $request->deskripsi,
            'updated_by' => auth()->user()->id,
        ];
        return $params;
    }
}
