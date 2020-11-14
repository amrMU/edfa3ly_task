<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name_ar','name_en','content_ar','content_en','category_id'
    ];

    public function images(){
        return $this->hasMany(ProductImages::class);
    }

    public function prices(){
        return $this->hasMany(ProductPrice::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
