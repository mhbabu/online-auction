<?php

Route::group(['module' => 'Product', 'middleware' => ['api'], 'namespace' => 'App\Modules\Product\Controllers'], function() {

    Route::resource('Product', 'ProductController');

});
