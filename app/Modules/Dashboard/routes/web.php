<?php
use Illuminate\Support\Facades\Route;

  Route::group(['prefix' => 'admin','module' => 'Dashboard', 'middleware' => ['web','auth','admin'], 'namespace' => 'App\Modules\Dashboard\Controllers\Backend'], function() {
    Route::get('dashboard','DashboardController@index')->name('admin.dashboard.index');
});

// frontend route
Route::group(['module' => 'Dashboard', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Dashboard\Controllers\Frontend'], function () {
    Route::get('dashboard','DashboardController@index');
    Route::post('change-password','DashboardController@changePassword');
});
