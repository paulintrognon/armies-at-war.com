<?php

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\Controller@index')->name('admin.index');

    Route::get('/board', 'Admin\BoardController@index')->name('admin.board.index');
});
