<?php

namespace App\Http\Controllers\Front;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public $view = 'front.products.';

    public function show($name,$id){
        $this->data['product'] = Product::find($id);
        return view($this->view.'show',$this->data);
    }
}
