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

class PembayaranController extends Controller
{ 
    public function index()
    {
        $presensi = Presensi::where('user_id',auth()->user()->id)->where('status_kehadiran','H')->count();
        $biaya = BiayaSanggar::where('code','B-001')->first();
        $cek_pembayaran = Pembayaran::where('dibayarkan_pada','like',date('Y-m').'%')->where('user_id', auth()->user()->id);
        $sts = empty($cek_pembayaran->first()) ? null:$cek_pembayaran->first()->status; 
        return view('member/payment/index')->with(['presensi' => $presensi,'biaya' => $biaya,'status' => $sts,'cek_pembayaran' => $cek_pembayaran->count()]);
    } 

    public function checkout()
    {
        $presensi = Presensi::where('user_id',auth()->user()->id)->where('status_kehadiran','H')->count();
        $biaya = BiayaSanggar::where('code','B-001')->first();
       
        $val = (object)['biaya' => $biaya->harga,
                'administrasi' => $biaya->administrasi, 
                'ppn' => $biaya->ppn,
                'presensi' => $presensi,
                'total' => (($biaya->harga+$biaya->administrasi+(($biaya->harga+$biaya->administrasi)*($biaya->ppn/100))) * $presensi)
                ];
        Cache::put(auth()->user()->id.'-payment', $val);
        return view('member/payment/checkout')->with(['presensi' => $presensi,'biaya' => $biaya]);
    }
    public function upload(Request $request)
    {
        $validate = [
                        'bukti_transfer' => 'required|mimes:pdf,jpg,png,jpeg|max:3100'
                    ];
        $this->validate($request, $validate);
        // dd(Cache::get(auth()->user()->id.'-payment'));

        Pembayaran::create($this->params($request));

        return redirect()->route('member.pembayaran')->with(['message_success' => 'Upload Berhasil, Mohon tunggu verifikasi pembayaran dari admin']);
    }

    private function params($request)
    {
        $cache = Cache::get(auth()->user()->id.'-payment');
        $params = [
           'user_id' => auth()->user()->id,
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
