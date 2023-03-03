<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = ['shop_name','image', 'detail', 'area_id', 'genre_id', 'user_id'];

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
    public function review(){
        return $this->hasMany('App\Models\Review');
    }
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
    public function users(){
        return $this->belongsTo('App\Models\User');
    }
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
        $likers = array();
        foreach($this->likes as $like) {
            array_push($likers, $like->user_id);
        }
        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
