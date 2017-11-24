<?php

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\Controller@index')->name('admin.index');

    Route::get('/board', 'Admin\BoardController@index')->name('admin.board.index');
    Route::get('/board/new', 'Admin\BoardController@createNew')->name('admin.board.new.index');
    Route::post('/board/new', 'Admin\BoardController@createPost')->name('admin.board.new.post');
});
