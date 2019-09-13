<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['user_id', 'cart', 'address', 'name', 'payment_id'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
