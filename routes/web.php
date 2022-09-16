<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImovelController;

Route::resource('imovel', ImovelController::class);