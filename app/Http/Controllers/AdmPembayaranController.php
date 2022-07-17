<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\BiayaSanggar;
use App\Models\Pembayaran;
use Hash;
use Image;
use Cache;
use Ramsey\Uuid\Uuid;

class AdmPembayaranController extends Controller
{ 
    public function index()
    {
        $pembayaran = Pembayaran::orderBy('dibayarkan_pada','DESC')->get();
        return view('admin/pembayaran/index')->with(['pembayaran' => $pembayaran]);
    }  

    public function acc($id)
    {
        Pembayaran::where('id', $id)->update(['status' => 1]); 
        return redirect()->back()->with(['message_success' => 'Berhasil menyetujui transaksi']);
    }

    public function revoke($id)
    {
         Pembayaran::where('id', $id)->update(['status' => 2]); 
         return redirect()->back()->with(['message_success' => 'Berhasil menolak transaksi']);
    } 


    private function params($request)
    {
        $cache = Cache::get(auth()->user()->id.'-payment');
        $params = [
           'user_id' => auth()->user()->id,
           'invoice_code' => "INV/".date('Y')."/".date("m")."/".time(),
           'bukti_transfer' => $this->imageProcessing($request->bukti_transfer),
           'jumlah_presensi' => $cache->presensi,
           'harga' => $cache->biaya,
           'biaya_administrasi' => $cache->administrasi,
           'ppn' => $cache->ppn,
           'total_harga' => $cache->total,
           'dibayarkan_pada' => now(),      
       ];
    
        return $params;
    }

    private function imageProcessing($file)
    {
         $uuid = Uuid::uuid4();
         $file = $file;
         $ext =  $file->getClientOriginalExtension();
         $imgname = 'TF-SITARI-'.date('Ymd')."_".auth()->user()->id."_".$uuid->toString().'.'.$ext;

         $dest_path = storage_path('app/bukti_transfer/');
          if(!is_dir($dest_path)){
             mkdir($dest_path,770);
          }

          Image::make($file->getRealPath())
                          ->resize(1000,null,function($constraint)
                            {
                              $constraint->aspectRatio();
                              $constraint->upsize();
                             })
                          ->save($dest_path."/".$imgname,75);
          return $imgname;
    }
}
