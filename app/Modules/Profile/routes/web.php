<?php

Route::group(['prefix' => 'admin','module' => 'Profile', 'middleware' => ['web','auth','admin'], 'namespace' => 'App\Modules\Profile\Controllers\Backend'], function() {

    Route::post('profile/change-password', 'ProfileController@changePassword')->name('admin.profile.change-password');
    Route::resource('profile', 'ProfileController', ['names' => [
        'index'     => 'admin.profile.index',
        'create'    => 'admin.profile.create',
        'edit'      => 'admin.profile.edit',
        'store'     => 'admin.profile.store',
        'update'    => 'admin.profile.update',
        'show'      => 'admin.profile.show'
    ]]);

});


Route::group(['module' => 'Profile', 'middleware' => ['web'], 'namespace' => 'App\Modules\Profile\Controllers\Frontend'], function() {

   Route::get('my-account','ProfileController@index');

});
