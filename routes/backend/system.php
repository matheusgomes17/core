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
    });
});
