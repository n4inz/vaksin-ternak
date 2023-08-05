<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kecamatan extends Model
{
    use HasFactory ,SoftDeletes;

    protected $guarded = ['id'];

    public function desa()
    {
        return $this->hasMany(Desa::class, 'kecamatans_id');
    }

    public function alamat()
    {
        return $this->hasMany(Alamat::class, 'kecamatans_id');
    }
}
