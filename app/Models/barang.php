<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $fillable = [
        'nama_barang',
        'harga',
        'stock',
        'supplier_id',
        'category'
    ];

    use HasFactory;

    public function transaksi()
    {
        return $this->hasmany(transaksi::class);
    }

    public function supplier()
    {
        return $this->belongsTo(supplier::class,'supplier_id' );
    }

}
