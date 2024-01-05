<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class JadwalPeriksa extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'id_dokter', 'hari', 'jam_mulai', 'jam_selesai'];
    public function dokter(){
        return $this->belongsTo(Dokter::class,'id_dokter','id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $user = Auth::user();
            if ($user) {
                $model->id_dokter = $user->id_dokter;
            }
        });
    }
}
