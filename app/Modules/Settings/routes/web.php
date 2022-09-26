<?php

Route::group(['prefix' => 'admin','module' => 'Settings', 'middleware' => ['web','auth','admin'], 'namespace' => 'App\Modules\Settings\Controllers\Backend'], function() {

    /*
     * Appearance Routes
     */
    Route::resource('settings/appearance', 'AppearanceController', ['names' => [
        'index'     => 'admin.settings.appearance.index',
        'store'     => 'admin.settings.appearance.store'
    ]]);

    /*
     * newsletters Management Routes
     */
    Route::get('settings/newsletters/{id}/delete','NewsletterController@delete');
    Route::resource('settings/newsletters', 'NewsletterController', ['names' => [
        'index'     => 'admin.settings.newsletters.index',
        'create'    => 'admin.settings.newsletters.create',
        'store'     => 'admin.settings.newsletters.store',
        'edit'      => 'admin.settings.newsletters.edit',
        'update'    => 'admin.settings.newsletters.update',
    ]]);

    /*
     * Sliders Management Routes
     */
    Route::get('settings/sliders/{id}/delete','SliderController@delete');
    Route::resource('settings/sliders','SliderController', ['names' => [
        'index'     => 'admin.settings.sliders.index',
        'create'    => 'admin.settings.sliders.create',
        'store'     => 'admin.settings.sliders.store',
        'edit'      => 'admin.settings.sliders.edit',
        'update'    => 'admin.settings.sliders.update',
    ]]);

    /*
     * Advertisemen Management Routes
     */
    Route::get('settings/advertisements/{id}/delete','AdvertisementController@delete');
    Route::resource('settings/advertisements','AdvertisementController', ['names' => [
        'index'     => 'admin.settings.advertisements.index',
        'create'    => 'admin.settings.advertisements.create',
        'store'     => 'admin.settings.advertisements.store',
        'edit'      => 'admin.settings.advertisements.edit',
        'update'    => 'admin.settings.advertisements.update',
    ]]);

    /*
     * Service & Supports Management Routes
     */
    Route::get('settings/service-supports/{id}/delete','ServiceSupportController@delete');
    Route::resource('settings/service-supports', 'ServiceSupportController', ['names' => [
        'index'     => 'admin.settings.service-supports.index',
        'create'    => 'admin.settings.service-supports.create',
        'store'    => 'admin.settings.service-supports.store',
        'edit'      => 'admin.settings.service-supports.edit',
        'update'     => 'admin.settings.service-supports.update',
    ]]);

    /*
     * News Events Management Routes
     */
    Route::get('settings/news-events/{id}/delete','NewsEventController@delete');
    Route::resource('settings/news-events', 'NewsEventController', ['names' => [
        'index'     => 'admin.settings.news-events.index',
        'create'    => 'admin.settings.news-events.create',
        'store'    => 'admin.settings.news-events.store',
        'edit'      => 'admin.settings.news-events.edit',
        'update'     => 'admin.settings.news-events.update',
    ]]);

    /*
     * Photos Management Routes
     */
    Route::get('settings/photos/{userId}/delete','SettingsController@deletePhoto')->name('admin.settings.photos.delete');
});

Route::group(['module' => 'Settings', 'middleware' => ['web'], 'namespace' => 'App\Modules\Settings\Controllers\Frontend'], function() {
    Route::post('subscribers','SubscribeController@store');
    Route::get('division-wise-districts-autoload','SubscribeController@getDistrictsByDivision');
});
