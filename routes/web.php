<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Item;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Items;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class , 'index'])->name('home');

Route::get('/register', [AuthController::class , 'register'])->name('register');
Route::post('/register', [AuthController::class , 'store']);

Route::get('/login', [AuthController::class , 'login'])->name('login');
Route::post('/login', [AuthController::class , 'authenticate']);

Route::post('/logout', [AuthController::class , 'logout'])->name('logout');

Route::get('/manage', [ItemController::class , 'show'])->name('manage');


Route::delete('/Item/{id}', [ItemController::class , 'destroy'])->name('Item.destroy')->middleware('auth');











