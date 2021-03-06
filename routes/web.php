<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
    ],
    function()
    {


        Route::group(['middleware' => 'auth'], function () {

            Route::group(['prefix' => '/admin','middleware'=>'admin'], function () {
                // $set_local_ar =  LaravelLocalization::setLocale('ar') ;

                Route::get('setting','Admin\SettingController@create');
                Route::post('setting','Admin\SettingController@store');

                Route::get('home','Admin\HomeController@index');
                Route::get('reports_browsing','Admin\ReportsController@GetBrowsingInfo');
                Route::get('reports_browsing/{id}/u/{user_name}','Admin\ReportsController@getUserBrowseInfo');
                Route::get('reports_browsing/{id}/delete','Admin\ReportsController@delete_reports');

                Route::get('file/{id}/delete','Admin\SettingController@delete_external_file');

                Route::resource('users','Admin\UsersController');
                Route::get('users_export','Admin\UsersController@ExportExelSheet');

                Route::resource('categories','Admin\CategoriesController');
                Route::get('categories/{id}/delete','Admin\CategoriesController@destroy');
                Route::get('categories_export','Admin\CategoriesController@ExportExelSheet');

                Route::resource('products','Admin\ProductsController');
                Route::get('products/{id}/delete','Admin\ProductsController@destroy');
                Route::get('orders','Admin\OrdersController@index');
                Route::get('orders/in-progress/{id}','Admin\OrdersController@inProgressOrder');
                Route::get('orders/accept/{id}','Admin\OrdersController@acceptOrder');
                Route::get('orders/reject/{id}','Admin\OrdersController@rejectOrder');
                Route::get('orders/deliverd/{id}','Admin\OrdersController@deliverdOrder');

            });


            Route::get('logout','Auth\LoginController@logout');
        });

        Auth::routes();
//Route::get('/','Auth\LoginController@showLoginForm');
        Route::get('/','Front\HomeController@index');
        Route::get('/category/{category_name}/{category_id}','Front\CategoryController@index');
        Route::get('/product/{product_name}/{product_id}','Front\ProductController@show');
        Route::group(['middleware' => 'auth'], function () {
            Route::get('i/orders','Front\CartController@CartList');
            Route::post('/add/cart/{product_id}','Front\CartController@addCartForm');
            Route::post('/i/checkout/{cart_id}','Front\CheckOutController@complateOrder');
        });
    });


