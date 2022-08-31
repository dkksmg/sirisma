<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationLevelPenelitians extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'id_pendidikan';
    protected $fillable = ['level_pendidikan', 'biaya', 'keterangan'];
    protected $hidden = [];

    public function education()
    {
        return $this->hasOne(Applicant::class, 'level_pendidikan', 'jenjang');
    }
}