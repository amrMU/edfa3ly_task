<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $this->data['products']= Product::orderBy('created_at','desc')->get();
        return view('front.index',$this->data);
    }
}
