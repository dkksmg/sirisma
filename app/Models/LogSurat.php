<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogSurat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id_application', 'status_surat', 'update_oleh', 'update_waktu', 'keterangan', 'role'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'update_oleh', 'id');
    }
    public function applicationmany()
    {
        return $this->belongsToMany(Application::class, 'id_application', 'id_application');
    }
    public function applicationone()
    {
        return $this->belongsTo(Application::class, 'id_application', 'id_application');
    }
}