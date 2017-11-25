<?php

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\Controller@index')->name('admin.index');

    // BOARDS
    // ======

    Route::get('/board', 'Admin\BoardController@index')->name('admin.board.index');
    Route::get('/board/list', 'Admin\BoardController@list')->name('admin.board.list');

    Route::get('/board/new', 'Admin\BoardController@createNew')->name('admin.board.new.index');
    Route::post('/board/new', 'Admin\BoardController@createPost')->name('admin.board.new.post');

    Route::get('/board/activate/{boardId}', 'Admin\BoardController@activateBoard')->name('admin.board.activateBoard');
    Route::get('/board/disactivate/{boardId}', 'Admin\BoardController@disactivateBoard')->name('admin.board.disactivateBoard');
});
