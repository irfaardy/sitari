<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaSanggar extends Model
{
    use HasFactory;
    protected $table = 'biaya_sanggar';
    protected $fillable = [
      'code','harga','ppn','administrasi','updated_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
