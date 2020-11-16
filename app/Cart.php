<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
        'address',
        'phone',
        'user_id',
        'status',
        'total_price',
        'currency',
    ];

    public function items(){
        return $this->hasMany(CartItems::class);
    }
}
