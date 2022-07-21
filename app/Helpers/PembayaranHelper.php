<?php 
namespace App\Helpers;

use App\Models\Pembayaran;

class PembayaranHelper {

	public function cek_menunggu()
	{
		return Pembayaran::where('status',0)->count();
	}
}