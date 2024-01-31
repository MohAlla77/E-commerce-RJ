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

Route::get('/manage', [ItemController::class , 'index'])->name('manage');
Route::get('/manage/{id}', [ItemController::class , 'show'])->name('manage.show');
Route::get('/manage/{item}/edit', [ItemController::class , 'edit'])->name('manage.edit');
Route::put('/manage/{item}', [ItemController::class , 'update'])->name('manage.update');
Route::post('/manage', [ItemController::class , 'store'])->name('manage.create');
Route::delete('/manage/{id}', [ItemController::class , 'destroy'])->name('manage.destroy')->middleware('auth');
















