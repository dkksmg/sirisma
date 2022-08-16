<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $fillable = ['id_prov', 'id_kota', 'id_kec', 'nama_kelurahan'];
    protected $hidden = [];
    protected $primaryKey = 'id_kel';

    public function subdistrict()
    {
        return $this->belongsTo(SubDistrict::class);
    }
}