<?php

Route::group(['module' => 'Profile', 'middleware' => ['api'], 'namespace' => 'App\Modules\Profile\Controllers'], function() {

    Route::resource('Profile', 'ProfileController');

});
