<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\User;
use App\Exports\PresensiExport;
use Hash;
class PresensiController extends Controller
{
    
   
    public function index()
    {
        $presensi = Presensi::get();

        return view('admin/presensi/index')->with(['presensi' => $presensi]);
    }

    public function export(Request $request)
    {
         $presensi = Presensi::whereBetween('tanggal', [$request->start, $request->end])->get();
         $range = $request->start." s/d ".$request->end;
        if(empty(count($presensi)))
        {
             return redirect()->route('presensi')->with(['message_fail' => 'Tidak ada data presensi pada tanggal '.$range.'.']); 
        }
         return \Excel::download(new PresensiExport($presensi,$range), 'Presensi_'.str_replace("/", "", $range).'.xlsx');
    }

    public function create()
    {

        $user = User::where('role','member')->get();
        return view('admin/presensi/create')->with(['user' => $user]);
    }

    public function save(Request $request)
    {
        $validate = [
                    'user_id' => "required|exists:\App\Models\User,id", 
                    'tanggal' => "required|date",
                    'status' => "required|in:S,I,A,H",
                    ];
        // dd($request->password_confirmation." ".$request->password);
        $this->validate($request, $validate);
        $cek = Presensi::where(['user_id' => $request->user_id,'tanggal' => $request->tanggal])->first();
        if(!empty($cek))
        {
           return redirect()->route('presensi')->with(['message_fail' => 'Anda sudah menambahkan absensi '.$cek->user->name.' pada hari ini.']); 
        }
        Presensi::create($this->params($request));

        return redirect()->route('presensi')->with(['message_success' => 'Berhasil menambahkan presensi']);
    }

    public function edit($id)
    {
      $user = User::where('role','member')->get();
      $presensi = Presensi::where('id',$id)->first();
        return view('admin/presensi/edit')->with(['user' => $user,'presensi' => $presensi]);
    }

    public function update(Request $request)
    {
        $validate = [
                    'id' => "required|exists:\App\Models\Presensi,id", 
                    // 'user_id' => "required|exists:\App\Models\User,id", 
                    'tanggal' => "required|date",
                    'status' => "required|in:S,I,A,H",
                    ];
        $this->validate($request, $validate);

        Presensi::where('id',$request->id)->update($this->params($request));

        return redirect()->route('presensi')->with(['message_success' => 'Berhasil mengubah data presensi']);
    }

    public function delete($id)
    {
      

        Presensi::where('id',$id)->delete();

        return redirect()->back()->with(['message_success' => 'Berhasil menghapus presensi']);
    }
    private function params($request)
    {
        $params = [
            
            'status_kehadiran' => $request->status,
           
            'tanggal' => $request->tanggal,
            'updated_by' => auth()->user()->id,
        ];
        if(!empty($request->user_id))
        {
         $params['user_id'] = $request->user_id;   
        }
        return $params;
    }
}
