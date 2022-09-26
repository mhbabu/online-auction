<?php

Route::group(['module' => 'Blog', 'middleware' => ['api'], 'namespace' => 'App\Modules\Blog\Controllers'], function() {

    Route::resource('Blog', 'BlogController');

});
