<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LastChanged extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id_user', 'nama_pengubah', 'aksi_dilakukan', 'rincian', 'role'];
    protected $hidden = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}