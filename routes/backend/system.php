<?php

/**
 * All route names are prefixed with 'admin.catalog'.
 */
Route::group([
    'prefix'     => 'system',
    'as'         => 'system.',
    'namespace'  => 'System',
], function () {
    Route::group([
        'middleware' => 'role:administrator',
    ], function () {
        /*
         * Deposition Management
         */
        Route::group(['namespace' => 'Deposition'], function () {
            
            /*
             * Deposition CRUD
             */
            Route::resource('deposition', 'DepositionController');
        });

        /*
         * Gallery Management
         */
        Route::group(['namespace' => 'Gallery'], function () {
            Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
                Route::get('/', 'GalleryController@index')->name('index');
                Route::get('create', 'GalleryController@create')->name('create');
                Route::get('image/create', 'ImageGalleryController@create')->name('image.create');
                Route::post('image/create', 'ImageGalleryController@store')->name('image.store');
                Route::get('video/create', 'VideoGalleryController@create')->name('video.create');
                Route::post('video/create', 'VideoGalleryController@store')->name('video.store');
            });

            Route::group(['prefix' => 'gallery/{gallery}', 'as' => 'gallery.'], function () {
                Route::get('image/edit', 'ImageGalleryController@edit')->name('image.edit');
                Route::put('image/edit', 'ImageGalleryController@update')->name('image.update');
                Route::delete('image/destroy', 'ImageGalleryController@destroy')->name('image.destroy');
                Route::get('video/edit', 'VideoGalleryController@edit')->name('video.edit');
                Route::put('video/edit', 'VideoGalleryController@update')->name('video.update');
                Route::delete('video/destroy', 'VideoGalleryController@destroy')->name('video.destroy');
            });
        });
    });
});
