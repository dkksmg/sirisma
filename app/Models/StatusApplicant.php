<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusApplicant extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'id_pemohon';
    protected $fillable = ['status_pemohon'];
    protected $hidden = [];
}