<?php

Route::group(['prefix'=>'admin','module' => 'Product', 'middleware' => ['web','auth','admin'], 'namespace' => 'App\Modules\Product\Controllers\Backend'], function() {

    /*
     * Product Category Routes
     */
    Route::get('product/categories/{id}/delete','ProductCategoryController@delete');
    Route::resource('product/categories', 'ProductCategoryController', ['names' => [
        'index'     => 'admin.product.categories.index',
        'create'    => 'admin.product.categories.create',
        'store'     => 'admin.product.categories.store',
        'edit'      => 'admin.product.categories.edit',
        'update'    => 'admin.product.categories.update'
    ]]);

    /*
    * Product Types Routes
    */
    Route::get('product/types/{id}/delete','ProductTypeController@delete');
    Route::resource('product/types', 'ProductTypeController', ['names' => [
        'index'     => 'admin.product.types.index',
        'create'    => 'admin.product.types.create',
        'store'     => 'admin.product.types.store',
        'edit'      => 'admin.product.types.edit',
        'update'    => 'admin.product.types.update'
    ]]);
});

Route::group(['prefix'=>'admin','module' => 'Product', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Product\Controllers\Backend'], function() {

    /*
     * Product Routes
     */
    Route::get('products/{id}/delete','ProductController@delete');
    Route::resource('products', 'ProductController', ['names' => [
        'index'     => 'admin.products.index',
        'create'    => 'admin.products.create',
        'store'     => 'admin.products.store',
        'edit'      => 'admin.products.edit',
        'update'    => 'admin.products.update'
    ]]);

});

Route::group(['module' => 'Product', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Product\Controllers\Frontend'], function() {

    /*
      * Product related routes
    */
    Route::post('product-bid/{productId}','ProductController@storeBid')->name('place-bid');
    Route::get('customer/bidding-price','ProductController@customerBiddingPrice');
    Route::get('/send-mail/{productId}','ProductController@sendMail');

});

Route::group(['module' => 'Product', 'middleware' => ['web'], 'namespace' => 'App\Modules\Product\Controllers\Frontend'], function() {

    /*
      * Product related routes
    */
    Route::get('/all-products','ProductController@index');
    Route::get('product-details/{slug}', 'ProductController@productDetail')->name('product-details');
    Route::get('/product-categories/{categoryId}','ProductController@categoryWiseProduct');

});
