<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['jenis_permohonan', 'status_opsi'];
    protected $hidden = [];


    public function type()
    {
        return $this->hasOne(Application::class, 'id', 'jenis_permohonan');
    }
}