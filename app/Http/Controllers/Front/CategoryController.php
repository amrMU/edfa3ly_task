<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index($category_name,$category_id){
        $this->data['category'] = Category::find($category_id);
        $this->data['products']= Product::where('category_id',$category_id)->orderBy('created_at','desc')->get();
        return view('front.category',$this->data);
    }
}
