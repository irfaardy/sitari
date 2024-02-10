<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Hash;
class PengumumanController extends Controller
{
    
   
    public function index()
    {
        $pengumuman = Pengumuman::get();

        return view('admin/pengumuman/index')->with(['pengumuman' => $pengumuman]);
    } 


    public function create()
    {
        return view('admin/pengumuman/create');
    }

    public function save(Request $request)
    {
        $validate = [
                    'title' => "required", 
                    'deskripsi' => "required",
                    ];
        // dd($request->password_confirmation." ".$request->password);
        $this->validate($request, $validate);
        
        Pengumuman::create($this->params($request));

        return redirect()->route('pengumuman')->with(['message_success' => 'Berhasil menambahkan Pengumuman']);
    }

    public function detail($id)
    {
       
        $pengumuman = Pengumuman::where('id',$id)->firstOrFail();

        return view('admin/pengumuman/detail')->with(['pengumuman' => $pengumuman]);
    }

    public function edit($id)
    {
      $pengumuman = Pengumuman::where('id',$id)->firstOrFail();
        return view('admin/pengumuman/edit')->with(['pengumuman' => $pengumuman]);
    }

    public function update(Request $request)
    {
        $validate = [
                    'title' => "required", 
                    'deskripsi' => "required",
                    ];
        $this->validate($request, $validate);

        Pengumuman::where('id',$request->id)->update($this->params($request));

        return redirect()->route('pengumuman')->with(['message_success' => 'Berhasil mengubah data Pengumuman']);
    }

    public function delete($id)
    {
      

        Pengumuman::where('id',$id)->delete();

        return redirect()->back()->with(['message_success' => 'Berhasil menghapus pengumuman']);
    }
    private function params($request)
    {
        $params = [
            
            'title' => $request->title,
           
            'deskripsi' => $request->deskripsi,
            'updated_by' => auth()->user()->id,
        ];
        return $params;
    }
}
