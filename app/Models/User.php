<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id_users';
    protected $fillable = [
        'username',
        'email',
        'password',
        'telp',
        'alamat',
        'ktp',
        'kk',
        'id_role'
    ];
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
}
