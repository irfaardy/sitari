<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\BiayaSanggar;
use App\Models\Pembayaran;
use App\Models\User;
use Hash;
use Image;
use Cache;
use Ramsey\Uuid\Uuid;
use App\Exports\TransaksiExport;

class AdmPembayaranController extends Controller
{ 
    public function index()
    {
        $pembayaran = Pembayaran::orderBy('dibayarkan_pada','DESC')->get();
        return view('admin/pembayaran/index')->with(['pembayaran' => $pembayaran]);
    }  

    public function export(Request $request)
    {
        $pembayaran = Pembayaran::whereBetween('dibayarkan_pada', [$request->start."  00:00:00", $request->end."  00:00:00"])->where('status',$request->status)->get();
        $range = $request->start." s/d ".$request->end;
        if($request->status == 0)
        {
            $status = 'Menunggu Verifikasi Admin';
        }
        elseif($request->status == 2)
        {
            $status = 'Pembayaran Ditolak';
        }
        elseif($request->status == 1)
        {
            $status = 'Lunas';
        } else{
             $status = 'Tidak diketahui';
        }
        if(empty(count($pembayaran)))
        {
             return redirect()->route('admin.pembayaran')->with(['message_fail' => 'Tidak ada data pembayaran dengan status '.$status.' pada tanggal '.$range.'.']); 
        }
      
         return \Excel::download(new TransaksiExport($pembayaran,$range,$status), 'REPORT_TRANSAKSI_'.str_replace("/", "", $range).'.xlsx');
        
    }
      

    public function acc($id)
    {
        $pembayaran = Pembayaran::where('id', $id)->first();
        if(empty($pembayaran))
        {
            return redirect()->back()->with(['message_fail' => 'Pembayaran tidak ditemukan']);
        }
        if($pembayaran->registrasi_pertama == 1)
        {
            User::where('id',$pembayaran->user_id)->update(['status' => 1]);
        }
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
