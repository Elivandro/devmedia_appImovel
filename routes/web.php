<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/', [PageController::class, 'index'])->name('page.index');
Route::get('/show/{id}/imovel', [PageController::class, 'show'])->name('page.show');
Route::get('/{type}/imoveis', [PageController::class, 'filter'])->name('page.filter');

Route::get('/imovel/delete/{id}', [ImovelController::class, 'delete'])->name('imovel.delete');
Route::resource('/imovel', ImovelController::class)->middleware('auth');