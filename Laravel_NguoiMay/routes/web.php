<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\FrontController;

// Front
Route::get('/', [FrontController::class, 'home'])->name('front.home');