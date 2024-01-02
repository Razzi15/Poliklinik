<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemeriksaPasien extends Model
{
    use HasFactory;
   // protected $fillable = ['id', 'id_daftar_poli', 'tgl_periksa', 'catatan', 'biaya_periksa'];

    protected $fillable = [
        'id_periksa', 'id_obat',
    ];
    public function periksa()
    {
        return $this->belongsTo(MemeriksaPasien::class, 'id_periksa');
    }
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
