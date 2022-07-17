<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = [
      'user_id','invoice_code','bukti_transfer','jumlah_presensi','harga','biaya_administrasi','ppn','total_harga','dibayarkan_pada','status','updated_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function updateUser()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
