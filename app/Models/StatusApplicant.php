<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusApplicant extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pemohon';
    protected $fillable = ['status_pemohon'];
    protected $hidden = [];
}