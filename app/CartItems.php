<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    protected $table = 'cart_items';
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'offers_type',
        'paid_pieces',
        'free_pieces',
        'percent',
        'price',
        'currency',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
