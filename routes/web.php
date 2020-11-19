<?php

use App\Http\Controllers\Supervisor\SupervisorController;
use App\Http\Controllers\Cs\CsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Auth::routes();

//Functions accessed by only supervisor users
Route::prefix('/supervisor')
    ->namespace('Supervisor')
    ->name('supervisor.')
    // ->middleware('role:supervisor')
    ->group(function () {
        Route::get('/dashboard', [SupervisorController::class, 'index'])->name('index');
        Route::get('/room', function () {
            return view('supervisor.room');
        })->name('room');
    });

//Functions accessed by only cs users
Route::prefix('/cs')
    ->namespace('Cs')
    ->name('cs.')
    // ->middleware('role:cs')
    ->group(function () {
        Route::get('/dashboard', [CsController::class, 'index'])->name('index');
    });


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
