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
        $invoice = empty($cek_pembayaran->first()) ? null:$cek_pembayaran->first()->invoice_code; 
        return view('member/payment/index')->with(['presensi' => $presensi,'biaya' => $biaya,'status' => $sts,'cek_pembayaran' => $cek_pembayaran->count(),'invoice' => $invoice]);
    } 

    public function pembayaran_pertama()
    {
        $presensi = 4;
        $biaya = BiayaSanggar::where('code','B-002')->first();
        $cek_pembayaran = Pembayaran::where('dibayarkan_pada','like',date('Y-m').'%')->where('user_id', auth()->user()->id);
        $sts = empty($cek_pembayaran->first()) ? null:$cek_pembayaran->first()->status; 
        $invoice = empty($cek_pembayaran->first()) ? null:$cek_pembayaran->first()->invoice_code; 
        return view('member/payment/pembayaran_pertama')->with(['presensi' => $presensi,'biaya' => $biaya,'status' => $sts,'cek_pembayaran' => $cek_pembayaran->count(),'invoice' => $invoice]);
    } 

    public function riwayat_pembayaran(Request $request)
    {
        $pembayaran = Pembayaran::where('user_id', auth()->user()->id)->orderBy('dibayarkan_pada','DESC')->get();
        return view('member/payment/riwayat_pembayaran')->with(['pembayaran' => $pembayaran]);
    }

    public function checkout()
    {
        $presensi = Presensi::where('user_id',auth()->user()->id)->where('status_kehadiran','H')->count();
        $biaya = BiayaSanggar::where('code','B-001')->first();
        if($presensi == 0)
        {
            return redirect()->route('member.pembayaran')->with(['message_fail' => 'Kehadiran anda masih 0 buluan ini']);  
        }
        $val = (object)['biaya' => $biaya->harga,
                'administrasi' => $biaya->administrasi, 
                'ppn' => $biaya->ppn,
                'presensi' => $presensi,
                'total' => (($biaya->harga+$biaya->administrasi+(($biaya->harga+$biaya->administrasi)*($biaya->ppn/100))) * $presensi)
                ];
        Cache::put(auth()->user()->id.'-payment', $val);
        return view('member/payment/checkout')->with(['presensi' => $presensi,'biaya' => $biaya]);
    }
    public function checkout_pendaftaran()
    {
        $biaya = BiayaSanggar::where('code','B-002')->first();

        $val = (object)['biaya' => $biaya->harga,
                'administrasi' => $biaya->administrasi, 
                'ppn' => $biaya->ppn,
                'total' => (($biaya->harga+$biaya->administrasi+(($biaya->harga+$biaya->administrasi)*($biaya->ppn/100))))
                ];
        Cache::put(auth()->user()->id.'-payment-pendaftaran', $val);
        return view('member/payment/checkout_pendaftaran')->with(['biaya' => $biaya]);
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

    public function upload_pendaftaran(Request $request)
    {
        $validate = [
                        'bukti_transfer' => 'required|mimes:pdf,jpg,png,jpeg|max:3100'
                    ];
        $this->validate($request, $validate);
        // dd(Cache::get(auth()->user()->id.'-payment'));

        Pembayaran::create($this->params_daftar($request));

        return redirect()->route('member.pembayaran')->with(['message_success' => 'Upload Berhasil, Mohon tunggu verifikasi pembayaran dari admin']);
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

    private function params_daftar($request)
    {
        $cache = Cache::get(auth()->user()->id.'-payment-pendaftaran');
        $params = [
            'user_id' => auth()->user()->id,
            'invoice_code' => "INV/REG/".date('Y')."/".date("m")."/".time(),
            'bukti_transfer' => $this->imageProcessing($request->bukti_transfer),
            'jumlah_presensi' => 0,
            'harga' => $cache->biaya,
            'biaya_administrasi' => $cache->administrasi,
            'ppn' => $cache->ppn,
            'registrasi_pertama' => true,
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
