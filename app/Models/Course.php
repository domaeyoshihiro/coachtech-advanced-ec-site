<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'coursename',
        'price',
        'shop_id',
    ];
    public function shop(){
        return $this->belongsTo('App\Models\Shop');
    }
    public function reservation(){
        return $this->hasMany('App\Models\Reservation');
    }
}
