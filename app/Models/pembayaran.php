<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $fillable = [
        'transaksi_id',
        'tgl_bayar',
        'total_bayar',
        'keterangan'
    ];

    use HasFactory;

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class,'transaksi_id');
    }
}
