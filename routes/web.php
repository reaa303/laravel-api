<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/ui', 'products.index');
Route::view('/ui/create', 'products.create');
