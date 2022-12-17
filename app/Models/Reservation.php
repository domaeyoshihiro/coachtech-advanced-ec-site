<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'reservationtime',
        'number',
        'user_id',
        'shop_id',
    ];
    public function users(){
    return $this->belongsTo('App\Models\User');
    }
    public function shop(){
    return $this->belongsTo('App\Models\Shop');
    }
}
