<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('categoria/{slug}', 'CatalogController@category')->name('category');
Route::get('produto/{slug}', 'CatalogController@product')->name('product');
