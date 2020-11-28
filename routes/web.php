<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;


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
// cart products route
Route::get('/homecart', 'App\Http\Controllers\ProductsController@index');

route::get('/cart', 'App\Http\Controllers\ProductsController@cart');

route::get('add-to-cart/{id}','App\Http\Controllers\ProductsController@addToCart');

Route::patch('update-cart', 'App\Http\Controllers\ProductsController@update');

Route::delete('remove-from-cart', 'App\Http\Controllers\ProductsController@remove');

//cart products route
//login
Route::get('/admin1','App\Http\Controllers\AdminController@loginAdmin');
Route::post('/admin1','App\Http\Controllers\AdminController@postloginAdmin');

//login

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/',[
            'as'=>'categories.index',
            'uses'=> 'App\Http\Controllers\CategoryController@index',
            // 'middleware'=>'can:category_list'
            ]);

        Route::get('/create',[
            'as'=>'categories.create',
            'uses'=> 'App\Http\Controllers\CategoryController@mami'
         ]) ;

    Route::post('/store',[
        'as'=>'categories.store',
        'uses'=> 'App\Http\Controllers\CategoryController@store'
     ]) ;
     Route::get('/edit/{id}',[
        'as'=>'categories.edit',
        'uses'=> 'App\Http\Controllers\CategoryController@edit'
     ]) ;
     Route::get('/delete/{id}',[
        'as'=>'categories.delete',
        'uses'=> 'App\Http\Controllers\CategoryController@delete'
     ]) ;

     Route::post('/update/{id}',[
        'as'=>'categories.update',
        'uses'=> 'App\Http\Controllers\CategoryController@update'
     ]) ;
    });

    Route::prefix('menu')->group(function () {
        Route::get('/',[
            'as'=>'menu.index',
            'uses'=> 'App\Http\Controllers\MenuController@index'
            ]);

            Route::get('/create',[
                'as'=>'menu.create',
                'uses'=> 'App\Http\Controllers\MenuController@create'
             ]) ;

             Route::post('/store',[
            'as'=>'menu.store',
            'uses'=> 'App\Http\Controllers\MenuController@store'
         ]) ;
         Route::get('/edit/{id}',[
            'as'=>'menus.edit',
            'uses'=> 'App\Http\Controllers\MenuController@edit'
         ]) ;
         Route::post('/update/{id}',[
            'as'=>'menus.update',
            'uses'=> 'App\Http\Controllers\MenuController@update'
         ]) ;
         Route::get('/delete/{id}',[
            'as'=>'menus.delete',
            'uses'=> 'App\Http\Controllers\MenuController@delete'
         ]) ;
    });
    //product
    Route::prefix('products')->group(function () {
        Route::get('/',[
            'as'=>'product.index',
            'uses'=> 'App\Http\Controllers\AdminProductController@index'
            ]);
            Route::get('/create',[
                'as'=>'product.create',
                'uses'=> 'App\Http\Controllers\AdminProductController@create'
             ]) ;

             Route::post('/store',[
                'as'=>'product.store',
                'uses'=> 'App\Http\Controllers\AdminProductController@store'
             ]) ;
             Route::get('/edit/{id}',[
                'as'=>'product.edit',
                'uses'=> 'App\Http\Controllers\AdminProductController@edit'
             ]) ;
             Route::post('/update/{id}',[
                'as'=>'product.update',
                'uses'=> 'App\Http\Controllers\AdminProductController@update'
             ]) ;
             Route::get('/delete/{id}',[
                'as'=>'product.delete',
                'uses'=> 'App\Http\Controllers\AdminProductController@delete'
             ]) ;


    });
    //slider

      Route::prefix('slider')->group(function () {
        Route::get('/',[
            'as'=>'slider.index',
            'uses'=> 'App\Http\Controllers\AdminSiderlController@index'
            ]);

        Route::get('/create',[
            'as'=>'slider.create',
            'uses'=> 'App\Http\Controllers\AdminSiderlController@create'
            ]);

        Route::post('/store',[
                'as'=>'slider.store',
                'uses'=> 'App\Http\Controllers\AdminSiderlController@store'
                ]);

        Route::get('/edit/{id}',[
                    'as'=>'slider.edit',
                    'uses'=> 'App\Http\Controllers\AdminSiderlController@edit'
                    ]);
        Route::post('/update/{id}',[
                        'as'=>'slider.update',
                        'uses'=> 'App\Http\Controllers\AdminSiderlController@update'
                        ]);
         Route::get('/delete/{id}',[
                            'as'=>'slider.delete',
                            'uses'=> 'App\Http\Controllers\AdminSiderlController@delete'
                            ]);

    });

      //Setting
      Route::prefix('setting')->group(function () {
        Route::get('/',[
            'as'=>'setting.index',
            'uses'=> 'App\Http\Controllers\AdminSettinglController@index'
            ]);
       Route::get('/create',[
             'as'=>'setting.create',
                'uses'=> 'App\Http\Controllers\AdminSettinglController@create'
                ]);
        Route::post('/store',[
                    'as'=>'setting.store',
                    'uses'=> 'App\Http\Controllers\AdminSettinglController@store'
                    ]);
         Route::get('/edit/{id}',[
                    'as'=>'setting.edit',
                    'uses'=> 'App\Http\Controllers\AdminSettinglController@edit'
                        ]);
        Route::post('/update/{id}',[
                    'as'=>'setting.update',
                    'uses'=> 'App\Http\Controllers\AdminSettinglController@update'
                            ]);
         Route::get('/delete/{id}',[
                    'as'=>'setting.delete',
                    'uses'=> 'App\Http\Controllers\AdminSettinglController@delete'
                                ]);

    });

    //user
      //Setting
      Route::prefix('user')->group(function () {
        Route::get('/',[
            'as'=>'user.index',
            'uses'=> 'App\Http\Controllers\AdminUserlController@index'
            ]);
            Route::get('/create',[
                'as'=>'user.create',
                'uses'=> 'App\Http\Controllers\AdminUserlController@create'
                ]);

                Route::post('/store',[
                    'as'=>'user.store',
                    'uses'=> 'App\Http\Controllers\AdminUserlController@store'
                    ]);

                Route::get('/edit/{id}',[
                    'as'=>'user.edit',
                    'uses'=> 'App\Http\Controllers\AdminUserlController@edit'
                    ]);
                    Route::post('/update/{id}',[
                        'as'=>'user.update',
                        'uses'=> 'App\Http\Controllers\AdminUserlController@update'
                        ]);
                        Route::get('/delete/{id}',[
                            'as'=>'user.delete',
                            'uses'=> 'App\Http\Controllers\AdminUserlController@delete'
                            ]);



    });


      Route::prefix('roles')->group(function () {
        Route::get('/',[
            'as'=>'roles.index',
            'uses'=> 'App\Http\Controllers\AdminRoleController@index'
            ]);
            Route::get('/create',[
                'as'=>'roles.create',
                'uses'=> 'App\Http\Controllers\AdminRoleController@create'
                ]);
                Route::post('/store',[
                    'as'=>'roles.store',
                    'uses'=> 'App\Http\Controllers\AdminRoleController@store'
                    ]);
          Route::get('/edit/{id}',[
                'as'=>'roles.edit',
                'uses'=> 'App\Http\Controllers\AdminRoleController@edit'
                        ]);
        Route::post('/update/{id}',[
            'as'=>'roles.update',
            'uses'=> 'App\Http\Controllers\AdminRoleController@update'
            ]);

            Route::get('/delete/{id}',[
                'as'=>'roles.delete',
                'uses'=> 'App\Http\Controllers\AdminRoleController@delete'
                        ]);
    });


});


