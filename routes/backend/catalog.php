<?php

/**
 * All route names are prefixed with 'admin.catalog'.
 */
Route::group([
    'prefix'     => 'catalog',
    'as'         => 'catalog.',
    'namespace'  => 'Catalog',
], function () {
    Route::group([
        'middleware' => 'role:administrator',
    ], function () {
        /*
         * Product Management
         */
        Route::group(['namespace' => 'Product'], function () {

            /*
             * Product Status'
             */
            Route::get('product/deactivated', 'ProductStatusController@getDeactivated')->name('product.deactivated');
            Route::get('product/deleted', 'ProductStatusController@getDeleted')->name('product.deleted');

            /*
             * Product CRUD
             */
            Route::resource('product', 'ProductController');

            /*
             * Specific Product
             */
            Route::group(['prefix' => 'product/{product}'], function () {
                
                // Status
                Route::get('mark/{status}', 'ProductStatusController@mark')->name('product.mark')->where(['status' => '[0,1]']);
            });

            /*
             * Deleted Product
             */
            Route::group(['prefix' => 'product/{deletedProduct}'], function () {
                Route::get('delete', 'ProductStatusController@delete')->name('product.delete-permanently');
                Route::get('restore', 'ProductStatusController@restore')->name('product.restore');
            });
        });

        /*
         * Category Management
         */
        Route::group(['namespace' => 'Category'], function () {

            /*
             * Category CRUD
             */
            Route::resource('category', 'CategoryController');
        });
    });
});
