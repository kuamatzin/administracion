<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/obras', 'ConstructionController');

Route::resource('/gasto_general', 'GeneralExpenditureController');

Route::resource('/tipo_gasto', 'ExpenditureTypeController');

Route::resource('/gasto', 'ExpenditureController');

Route::resource('/ingreso', 'IncomeController');

Auth::routes();

Route::get('/home', 'HomeController@index');