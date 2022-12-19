<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'star',
        'user_id',
        'shop_id',
    ];
    public function user(){
    return $this->belongsTo('App\Models\User');
    }
    public function shop(){
    return $this->belongsTo('App\Models\Shop');
    }
}
