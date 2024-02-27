<?php

namespace App\Models;

use App\Models\Applicant;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'foto_profile',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function applicant()
    {
        return $this->hasOne(Applicant::class);
    }
    public function application()
    {
        return $this->hasMany(Application::class);
    }
    public function lastchanged()
    {
        return $this->hasMany(LastChanged::class, 'id_user', 'id');
    }
    public function lastchangedone()
    {
        return $this->hasOne(LastChanged::class, 'id_user', 'id')->latest();
    }
}
