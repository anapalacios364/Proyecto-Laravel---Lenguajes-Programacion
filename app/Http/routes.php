<?php

Route::get('/', 'RecetitasController@create'); 

Route::resource('/recetitas', 'RecetitasController@index');
