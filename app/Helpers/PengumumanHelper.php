<?php 
namespace App\Helpers;

use App\Models\Pengumuman;

class PengumumanHelper {

	public function get($max)
	{
		return Pengumuman::where('text_berjalan',true)->limit(3)->orderBy('updated_at','DESC')->get();
	}
}