<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/', [PageController::class, 'index'])->name('todos.imoveis');
Route::get('/show/{id}', [PageController::class, 'show'])->name('detail.imoveis');

Route::get('/imovel/delete/{id}', [ImovelController::class, 'delete'])->name('imovel.delete');
Route::resource('imovel', ImovelController::class)->middleware('auth');