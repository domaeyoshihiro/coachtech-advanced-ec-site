<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'reservation_time',
        'number',
        'user_id',
        'shop_id',
        'course_id',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function shop(){
        return $this->belongsTo('App\Models\Shop');
    }
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}
