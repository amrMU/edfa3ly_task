<?php

namespace App\Http\Controllers\Front;

use App\Cart;
use App\Http\Requests\ComplateOrderRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class CheckOutController extends Controller
{
    public function complateOrder(ComplateOrderRequest $request,$cart_id){
        Cart::find($cart_id)->update([
            'phone'=>$request->phone,
            'address'=>$request->address,
            'status'=>'pending'
        ]);
        Session::flash('success',trans('home.order_complated_successfuly'));
        return redirect()->back();
    }



}
