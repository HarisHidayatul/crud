<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket_nasional extends Model
{
    use HasFactory;

    public $table = 'paket_nasional';
    public $guarded = ['id'];
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id_paket',
        'paket',
        'pagu',
        'pengadaan',
        'produk',
        'usaha',
        'metode',
        'pemilihan',
        'klpd',
        'satuan',
        'lokasi',
        'created_at',
        'updated_at'
    ];
}
