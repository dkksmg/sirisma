<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nama_lengkap', 'email', 'subject_kontak', 'pesan'];
    protected $hidden = [];

    public function data_user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}