<?php

Route::view('/', 'todo.index')->name('todo.index');
Route::view('/trash', 'todo.trash')->name('todo.view.trash');

Route::get('view/trash/list' , 'TodoController@viewTrash')->name('todo.trash');
Route::get('get/trash/list' , 'TodoController@getTrash')->name('todo.trash');
Route::get('get/list' , 'TodoController@index')->name('todo.list');
Route::get('delete/{todo}' , 'TodoController@destroy')->name('delete');
Route::get('todo/create' , 'TodoController@create')->name('create');
Route::post('todo/store' , 'TodoController@store')->name('store');
Route::get('todo/edit/{todo}' , 'TodoController@edit')->name('edit');
Route::post('todo/update/{todo}' , 'TodoController@update')->name('update');

Route::get('trash/delete/{todo}' , 'TodoController@deleteTrash')->name('trash.delete');
Route::get('trash/restore/{todo}' , 'TodoController@restoreTrash')->name('trash.restore');