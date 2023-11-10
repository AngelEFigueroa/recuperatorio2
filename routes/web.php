<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/lista-productos', 'App\Http\Controllers\ProductoController@index')->name('producto.index')->middleware('can:viewList,App\Models\Product');

Route::get('/new', function () {
    return 'new page';
});

