<?php

namespace App\Http\Controllers\Front;

use App\Cart;
use App\CartItems;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Auth;
use function Matrix\trace;

class CartController extends Controller
{
   public function addCartForm(Request $request ,$product_id ){
       $product  = Product::find($product_id);
       $cart = $this->createCartIfNotExist();
       $item = $this->AddItemToCart($request,$product,$cart);
        Session::flash('success',trans('home.product_added_to_cart_successfully'));
       return redirect()->back();
    }

    public function createCartIfNotExist(){
       $cart = Cart::where('user_id',Auth::id())->where('status','none')->first(); // = in cart
        if ($cart == null){
            $cart = Cart::create([
                'user_id'=>Auth::id(),
                'status'=>'none',
            ]);
        }

        return $cart;
   }

   public function AddItemToCart($request,$product,$cart)
   {
       $offer = $this->productInOffer($product);

       $item = CartItems::create([
           'product_id'=>$product->id,
           'cart_id'=>$cart->id,
           'quantity'=>$request['quantity'],
           'offers_type' => $offer['offers_type'],
           'paid_pieces' => $offer['paid_pieces'],
           'free_pieces' => $offer['free_pieces'],
           'percent' => $offer['percent'],

       ]);
       return $item;
   }

    public function productInOffer($product){
      return $offer = [
           'offers_type' => $product->offers_type,
           'paid_pieces' => $product->paid_pieces,
           'free_pieces' => $product->free_pieces,
           'percent' => $product->percent,
       ];

    }
}
