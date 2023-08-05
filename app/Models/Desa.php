<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desa extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = ['id'];

    public function alamat()
    {
        return $this->hasMany(Alamat::class,'desas_id');
    }
}
