<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';
    protected $primaryKey = 'id_pelanggan';
    
    protected $fillable = [
        'id_pelanggan',
        'nomor_kwh',
        'nama_pelanggan',
        'alamat',
        'id_tarif',
    ];
}
