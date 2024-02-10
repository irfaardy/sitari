<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\BiayaSanggar;
use Hash;
class BiayaSanggarController extends Controller
{ 
    public function index()
    {
        $biaya = BiayaSanggar::where('code','B-001');
        $biaya_pendaftaran = BiayaSanggar::where('code','B-002');
        if($biaya->count() == 0)
        {
            $val = ['code'=> 'B-001','harga' => 0,'administrasi' => 0];
            BiayaSanggar::create($val);
        }
        if($biaya_pendaftaran->count() == 0)
        {
            $val = ['code'=> 'B-002','harga' => 0,'administrasi' => 0];
            BiayaSanggar::create($val);
        }
        return view('admin/biaya/edit')->with(['biaya' => $biaya->first(),'biaya_pendaftaran' => $biaya_pendaftaran->first()]);
    }
    public function update(Request $request)
    {
        $validate = [
                        'harga' => "required|numeric", 
                        'ppn' => "nullable|numeric", 
                        'administrasi' => "nullable|numeric",
                        'harga_p' => "required|numeric", 
                        'ppn_p' => "nullable|numeric", 
                        'administrasi_p' => "nullable|numeric",
                    ];
        $this->validate($request, $validate);

        BiayaSanggar::where('code','B-001')->update([
            'harga' => $request->harga,
            'ppn' => $request->ppn,
            'administrasi' => $request->administrasi
        ]);
        BiayaSanggar::where('code','B-002')->update([
            'harga' => $request->harga_p,
            'ppn' => $request->ppn_p,
            'administrasi' => $request->administrasi_p
        ]);

        return redirect()->back()->with(['message_success' => 'Berhasil mengubah biaya sanggar']);
    }

    private function params($request)
    {
        $params = [
            'harga' => $request->harga,
            'ppn' => $request->ppn,
            'administrasi' => $request->administrasi,
            'updated_by' => auth()->user()->id,
        ];
    
        return $params;
    }
}
