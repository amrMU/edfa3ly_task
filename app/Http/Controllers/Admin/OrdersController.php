<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public $view = 'dashboard.orders.';

    public function index  (){
        $this->data['orders'] = Cart::paginate(15);
        return view($this->view.'index',$this->data);
    }

    public function inProgressOrder($id){

       $find_cart = Cart::find($id);
       if ($find_cart == null){
           Session::flash('success',trans('home.not_valid_order'));
           return redirect()->back();
       }
       $find_cart->update([
            'status'=>'in_progress'
       ]);
        Session::flash('success',trans('home.message_success'));
        return redirect()->back();
    }

    public function acceptOrder($id){

        $find_cart = Cart::find($id);
        if ($find_cart == null){
            Session::flash('success',trans('home.not_valid_order'));
            return redirect()->back();
        }
        $find_cart->update([
            'status'=>'accept'
        ]);
        Session::flash('success',trans('home.message_success'));
        return redirect()->back();
    }
    public function deliverdOrder($id){

        $find_cart = Cart::find($id);
        if ($find_cart == null){
            Session::flash('success',trans('home.not_valid_order'));
            return redirect()->back();
        }
        $find_cart->update([
            'status'=>'deliverd'
        ]);
        Session::flash('success',trans('home.message_success'));
        return redirect()->back();
    }
    public function rejectOrder($id){

        $find_cart = Cart::find($id);
        if ($find_cart == null){
            Session::flash('success',trans('home.not_valid_order'));
            return redirect()->back();
        }
        $find_cart->update([
            'status'=>'reject'
        ]);
        Session::flash('success',trans('home.message_success'));
        return redirect()->back();
    }
}
