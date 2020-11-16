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
        $data= $this->getAvilableOvers($request->all());

        $create = $this->model->create([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'content_ar'=>$request->content_ar,
            'content_en'=>$request->content_en,
            'category_id'=>$request->category_id,
            'offers_type'=>$data['available_offers'],
            'paid_pieces'=>$data['paid_pieces'],
            'free_pieces'=>$data['free_pieces'],
            'percent'=>$data['percent'],
        ]);

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
            'tax'=>$request->egp_tax,
            'tax_plus'=>$request->egp_total_tax,
            'currency'=>'l.e'
        ]);

        $product_price_usd =$this->productPrice->create([
            'product_id'=>$create->id,
            'price'=>$request->usd_price,
            'tax'=>$request->usd_tax,
            'tax_plus'=>$request->usd_total_tax,
            'currency'=>'usd'
        ]);
        Session::flash('success',trans('home.message_success'));
        return redirect()->back();
    }


    public function getAvilableOvers($request){

        if ($request['available_offers'] == 'pieces'){
            $data  =  [
                'paid_pieces'=>$request['paid_pieces'],
                'free_pieces'=>$request['free_pieces'],
                'percent'=>0,
                'available_offers'=>'pieces',

            ];
            return $data;
        }elseif($request['available_offers'] == 'percent'){
            $data  =  [
                'paid_pieces'=>0,
                'free_pieces'=>0,
                'percent'=>$request['percent'],
                'available_offers'=>'percent',

            ];
            return $data;
        }else{
            $data = [
                  'paid_pieces'=>0,
                  'free_pieces'=>0,
                  'percent'=>0,
                  'available_offers'=>'none',

              ];

            return $data;
        }

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
        $data= $this->getAvilableOvers($request->all());

        $update = $this->model->find($id)->update([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'content_ar'=>$request->content_ar,
            'content_en'=>$request->content_en,
            'category_id'=>$request->category_id,
            'offers_type'=>$data['available_offers'],
            'paid_pieces'=>$data['paid_pieces'],
            'free_pieces'=>$data['free_pieces'],
            'percent'=>$data['percent'],
        ]);
       if($request->hasFile('images')){
           $files = ImagesController::upload_multiple($request->images,'uploads/images/products');
           foreach ($files as $file){
               $this->productImages->create([
                   'product_id'=>$id,
                   'image'=>$file,
               ]);
           }
       }

        $product_price_egp =$this->productPrice->where('product_id',$id)->where('currency','l.e')->update([
            'product_id'=>$id,
            'price'=>$request->egp_price,
            'tax'=>$request->egp_tax,
            'tax_plus'=>$request->egp_total_tax,
            'currency'=>'l.e'
        ]);

        $product_price_usd =$this->productPrice->where('product_id',$id)->where('currency','usd')->update([
            'product_id'=>$id,
            'price'=>$request->usd_price,
            'tax'=>$request->usd_tax,
            'tax_plus'=>$request->usd_total_tax,
            'currency'=>'usd'
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
