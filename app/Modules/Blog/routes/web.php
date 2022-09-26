<?php

Route::group(['prefix' => 'admin','module' => 'Blog', 'middleware' => ['web','auth','admin'], 'namespace' => 'App\Modules\Blog\Controllers\Backend'], function() {

    Route::get('blogs/{id}/delete','BlogController@delete');
    Route::resource('blogs', 'BlogController', ['names' => [
        'index' => 'admin.blogs.index',
        'create' => 'admin.blogs.create',
        'store' => 'admin.blogs.store',
        'edit' => 'admin.blogs.edit',
        'update' => 'admin.blogs.update'
    ]]);

});


// frontend route
Route::group(['module' => 'Blog', 'middleware' => ['web'], 'namespace' => 'App\Modules\Blog\Controllers\Frontend'], function () {
    Route::get('/blogs', 'BlogController@index')->name("blogs");
    Route::get('/blogs/{blogId}', 'BlogController@showBlog')->name('blog-show');
    Route::post('/blog/comment/store', 'BlogController@storeComment')->name('blog.comment.store');
    Route::post('/blog/comment/load', 'BlogController@loadComment')->name('blog.comment.load');
});


