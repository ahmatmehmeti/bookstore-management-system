<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getAdminAttribute(){
        return Auth::user()->role == 'is_admin';
    }
    public function getPostierAttribute(){
        return Auth::user()->role == 'is_postier';
    }



    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isPostier(): bool
    {
        return $this->role === 'postier';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }
}
