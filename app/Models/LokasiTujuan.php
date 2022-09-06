<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LokasiTujuan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['lokasi_tujuan', 'status'];
    protected $hidden = [];
}