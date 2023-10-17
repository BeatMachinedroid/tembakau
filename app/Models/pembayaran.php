<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $fillable = [
        'transaksi_id',
        'tgl_bayar',
        'total_bayar'
    ];

    use HasFactory;

}
