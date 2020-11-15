<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\ImagesController;
use App\Http\Requests\Admin\ProductRequest;
use App\Product;
use App\ProductImages;
use App\ProductPrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ProductsController extends Controller
{
    public $view = 'dashboard.products.';

    public function __construct(
            Product $model,
            ProductPrice $productPrice,
            ProductImages $productImages,
            Category $cateories
    )
    {
        $this->model = $model;
        $this->productPrice = $productPrice;
        $this->productImages = $productImages;
        $this->cateories = $cateories;
    }

    /**
     * @return view
     */
    public function index(){
        $this->data['products'] = $this->model->all();
        return view($this->view.'index',$this->data);
    }

    /**
     * @return view
     */
    public function create(){
        $this->data['categories'] = $this->cateories->all();
        return view($this->view.'create',$this->data);
    }

    public function store(ProductRequest $request){
        $create = $this->model->create($request->except('_token','usd_price','egp_price','files'));
        $files = ImagesController::upload_multiple($request->images,'uploads/images/products');
        foreach ($files as $file){
            $this->productImages->create([
                'product_id'=>$create->id,
                'image'=>$file,
            ]);
        }

        $product_price_egp =$this->productPrice->create([
            'product_id'=>$create->id,
            'price'=>$request->egp_price,
            'currency'=>'L.E'
        ]);

        $product_price_usd =$this->productPrice->create([
            'product_id'=>$create->id,
            'price'=>$request->usd_price,
            'currency'=>'USD'
        ]);
        Session::flash('success',trans('home.message_success'));
        return redirect()->back();
    }


    /**
     * @return view
     */
    public function edit($id){
        $this->data['categories'] = $this->cateories->all();
        $this->data['product'] = $this->model->find($id);
        return view($this->view.'edit',$this->data);
    }

    public function update(ProductRequest $request,$id){
        $product = $this->model->find($id);
        $update = $this->model->find($id)->update($request->except('_token','usd_price','egp_price','files'));
       if($request->hasFile('images')){
           $files = ImagesController::upload_multiple($request->images,'uploads/images/products');
           foreach ($files as $file){
               $this->productImages->create([
                   'product_id'=>$id,
                   'image'=>$file,
               ]);
           }
       }

        $product_price_egp =$this->productPrice->where('product_id',$id)->where('currency','L.E')->update([
            'product_id'=>$id,
            'price'=>$request->egp_price,
            'currency'=>'L.E'
        ]);

        $product_price_usd =$this->productPrice->where('product_id',$id)->where('currency','USD')->update([
            'product_id'=>$id,
            'price'=>$request->usd_price,
            'currency'=>'USD'
        ]);
        Session::flash('success',trans('home.message_success'));
        return redirect()->back();
    }

    public function destroy($id){
        $this->model->destroy($id);
        Session::flash('success',trans('home.message_success'));
        return redirect()->back();
    }
}
