<?php
use Illuminate\Support\Facades\Route;

Route::get('/coba', function () {
    echo "Coba";
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => '/master'], function () {
        Route::get('/doctype',         'Master\DoctypeController@index')->middleware('checkAuth:master/doctype');
        Route::get('/docarea',         'Master\DocareaController@index')->middleware('checkAuth:master/docarea');        
    });
});