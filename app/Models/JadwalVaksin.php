<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalVaksin extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function nama_vaksin()
    {
        return $this->belongsTo(DataVaksin::class, 'data_vaksins_id');
    }

    public function pendaftaran_vaksin()
    {
        return $this->hasMany(PendaftaranVaksin::class ,'jadwal_vaksin_id');
    }

}
