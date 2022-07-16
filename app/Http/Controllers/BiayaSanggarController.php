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
        if($biaya->count() == 0)
        {
            $val = ['code'=> 'B-001','harga' => 0,'administrasi' => 0];
            BiayaSanggar::create($val);
        }
        return view('admin/biaya/edit')->with(['biaya' => $biaya->first()]);
    }
    public function update(Request $request)
    {
        $validate = [
                        'harga' => "required|numeric", 
                        'ppn' => "nullable|numeric", 
                        'administrasi' => "nullable|numeric",
                    ];
        $this->validate($request, $validate);

        BiayaSanggar::where('code','B-001')->update($this->params($request));

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
