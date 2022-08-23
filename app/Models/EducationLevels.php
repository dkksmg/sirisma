<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationLevels extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pendidikan';
    protected $fillable = ['level_pendidikan'];
    protected $hidden = [];
}