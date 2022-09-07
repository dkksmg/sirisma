<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddOnApplicant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['kode_permohonan', 'nama_pemohon', 'nim_nik', 'no_hp'];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}