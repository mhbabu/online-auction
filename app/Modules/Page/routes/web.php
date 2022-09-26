<?php

  Route::group(['prefix' => 'admin','as' => 'admin.','module' => 'Page', 'middleware' => ['web','auth','admin'], 'namespace' => 'App\Modules\Page\Controllers\Backend'], function() {
    Route::get('pages/{pageName}','PageController@page')->name('pages');
    Route::Post('pages/{pageName}','PageController@pageUpdate')->name('pages.update');

    // fqa route
    Route::get('fqas/{id}/delete','FQAController@delete');
    Route::resource('fqas', 'FQAController', ['names' => [
        'index'   => 'fqas.index',
        'create'  => 'fqas.create',
        'store'   => 'fqas.store',
        'edit'    => 'fqas.edit',
        'update'  => 'fqas.update'
    ]])->except([
        'show','destroy'
    ]);

    Route::get('contact-info','PageController@contactInfo')->name('contact-info.index');
    Route::post('contact-info','PageController@contactInfoStore')->name('contact-info.store');


    // contact route
    Route::get('contact-us/{id}/delete','ContactUsController@delete');
    Route::resource('contact-us', 'ContactUsController', ['names' => [
        'index'   => 'contact-us.index',
        'show'    => 'contact-us.show',
    ]])->only([
        'index', 'show'
    ]);

});

// frontend route
Route::group(['module' => 'Page', 'middleware' => ['web'], 'namespace' => 'App\Modules\Page\Controllers\Frontend'], function () {
    Route::get('help-pages/{pageName}','PageController@index')->name('help-page');
    Route::get('contact-us','ContactController@index')->name('contact-us');
    Route::Post('contact-us','ContactController@contactUsStore')->name('contact-us');

    Route::get('/about-us','AboutUsController@index')->name('about-us');
});


