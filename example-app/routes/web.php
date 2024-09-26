<?php

use App\Http\Controllers\CharController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MonsterController;
use App\Http\Controllers\RegisterController;
use App\Models\Monster;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/monsters', [MonsterController::class, 'index'])->name("monsters");
Route::get('/monsters/{monster}', [MonsterController::class, 'show'])->name("monster");
Route::get('/add', [MonsterController::class, 'create']);
Route::post('/add', [MonsterController::class, 'store']);
Route::get('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy']);
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/profile/{user}', [LoginController::class, 'show']);
