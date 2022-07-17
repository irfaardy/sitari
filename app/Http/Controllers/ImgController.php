<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class ImgController extends Controller
{
  public function buktiTF($file)
   {
    if($file == "default"){
        $img = file_get_contents(storage_path('app/bukti_transfer/default.png'));
        return response($img)->header('Content-type','image/jpeg');
    }
        $pic= Pembayaran::where('bukti_transfer', '=', $file)->first();
        
     if($pic != null)
     {
        $path = storage_path('app/bukti_transfer/'.$pic->bukti_transfer);
        if(file_exists($path))
        { 
            $img = file_get_contents($path);
            return response($img)->header('Content-type','image/jpeg');
        } else {
            $img = file_get_contents(storage_path('app/bukti_transfer/default.png'));
            return response($img)->header('Content-type','image/jpeg');
        }
     } else {
        $img = file_get_contents(storage_path('app/bukti_transfer/default.png'));
        return response($img)->header('Content-type','image/jpeg');
    }

    }
}
