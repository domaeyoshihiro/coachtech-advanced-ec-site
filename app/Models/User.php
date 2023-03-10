<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function reservations(){
        return $this->hasMany('App\Models\Reservation');
    }
    public function likes(){
        return $this->hasMany('App\Models\Like');
    }
    public function review(){
        return $this->hasMany('App\Models\Review');
    }
    public function shops(){
        return $this->hasOne('App\Models\Shop');
    }
}