<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = ['shopname','image', 'detail', 'area_id', 'genre_id'];

    public function reservations(){
    return $this->hasMany('App\Models\Reservation');
    }
    public function likes(){
    return $this->hasMany('App\Models\Like');
    }
    public function area(){
    return $this->belongsTo('App\Models\Area');
    }
    public function genre(){
    return $this->belongsTo('App\Models\Genre');
    }
}
