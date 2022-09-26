<?php

Route::group(['module' => 'Dashboard', 'middleware' => ['api'], 'namespace' => 'App\Modules\Dashboard\Controllers'], function() {

    Route::resource('Dashboard', 'DashboardController');

});
