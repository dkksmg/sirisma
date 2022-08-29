<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'nama_provinsi',
    ];
    protected $primaryKey = 'id_provinsi';
    public function district()
    {
        return $this->hasMany(District::class);
    }
}