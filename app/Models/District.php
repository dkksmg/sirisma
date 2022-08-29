<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['id_prov', 'nama_kota'];
    protected $primaryKey = 'id_kota';

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function subdistricts()
    {
        return $this->hasMany(SubDistrict::class);
    }
}