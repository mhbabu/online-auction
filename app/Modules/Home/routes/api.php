<?php

Route::group(['module' => 'Home', 'middleware' => ['api'], 'namespace' => 'App\Modules\Home\Controllers'], function() {

    Route::resource('Home', 'HomeController');

});
