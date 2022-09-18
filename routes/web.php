<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImovelController;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::resource('imovel', ImovelController::class);