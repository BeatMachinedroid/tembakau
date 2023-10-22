<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $fillable = [
        'nama_supplier',
        'jk',
        'no_telp',
        'alamat'
    ];

    use HasFactory;

    public function barang()
    {
        return $this->hasmany(barang::class);
    }
}
