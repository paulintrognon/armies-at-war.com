<?php

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\Controller@index')->name('admin.index');

    Route::get('/map', 'Admin\MapController@index')->name('admin.map.index');
});
