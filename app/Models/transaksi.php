<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $fillable = [
        'code_transaksi',
        'barang_id',
        'alamat',
        'nama_pembeli',
        'jumlah',
    ];

    use HasFactory;

    public function barang()
    {
        return $this->belongsTo(barang::class,'barang_id');
    }

    public function pembayaran()
    {
        return $this->hasmany(pembayaran::class);
    }
}
