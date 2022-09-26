<?php

Route::group(['module' => 'Settings', 'middleware' => ['api'], 'namespace' => 'App\Modules\Settings\Controllers'], function() {

    Route::resource('Settings', 'SettingsController');

});
