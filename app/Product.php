<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;
class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name_ar','name_en','content_ar','content_en','category_id',
        'offers_type','paid_pieces','free_pieces','percent'
    ];
    protected  $appends = ['price','currency','tax','tax_plus'];

    public function getPriceAttribute()
    {
        $currency =Request::get('cur');
        if(isset($currency) && !empty($currency)){
            $query = $this->prices->where('currency',$currency)->first()->price;

        }else{
            $query = $this->prices->where('currency','usd')->first()->price;

        }
       return @$query ;
    }

    public function getCurrencyAttribute()
    {
        $currency = Request::get('cur');
        if(isset($currency)  && !empty($currency)) {
            $query = $this->prices->where('currency',$currency)->first()->currency;
        }else{
            $query = $this->prices->where('currency', 'usd')->first()->currency;
        }
        return @$query ;
    }

    public function getTaxAttribute()
    {
        $currency = Request::get('cur');
        if(isset($currency)  && !empty($currency)) {
            $query = $this->prices->where('currency',$currency)->first()->tax;
        }else{
            $query = $this->prices->where('currency', 'usd')->first()->tax;
        }

        return @$query ;
    }
    public function getTaxPlusAttribute()
    {
        $currency = Request::get('cur');
        if(isset($currency)  && !empty($currency)) {
            $query = $this->prices->where('currency',$currency)->first()->tax_plus;
        }else{
            $query = $this->prices->where('currency', 'usd')->first()->tax_plus;
        }

        return @$query ;
    }

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
