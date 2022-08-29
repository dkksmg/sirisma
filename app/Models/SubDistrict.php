<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubDistrict extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['id_prov', 'id_kota', 'nama_kecamatan'];
    protected $primaryKey = 'id_kec';

    public function distict()
    {
        return $this->belongsTo(District::class);
    }

    public function villages()
    {
        return $this->hasMany(Village::class);
    }
}