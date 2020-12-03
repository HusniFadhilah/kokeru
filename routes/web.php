<?php

use App\Http\Controllers\Supervisor\{SupervisorController};
use App\Http\Controllers\Cs\CsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\{Auth, Route};

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');


// Functions accessed by only authenticated users
Route::group(['middleware' => 'auth'], function () {

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    //Functions accessed by only supervisor users
    Route::prefix('/supervisor')
        ->namespace('Supervisor')
        ->name('supervisor.')
        ->middleware('role:Supervisor')
        ->group(function () {
            Route::get('/', [SupervisorController::class, 'index'])->name('index');
<<<<<<< HEAD
=======
            Route::get('/room', function () {
                return view('supervisor/room');
            })->name('room');
>>>>>>> 9833d09f10a360ed283c38e1e04d21cec50a81a3

            // Handle CRUD CS
            Route::resource('/cs', CrudCsController::class, [
                'names' => [
                    'index' => 'cs.data',
                    'create' => 'cs.create',
                    'destroy' => 'cs.delete'
                ]
            ]);

            //Handle CRUD room
            Route::resource('/room', CrudRoomController::class, [
                'names' => [
                    'index' => 'room.data',
                    'create' => 'room.create',
                    'destroy' => 'room.delete'
                ]
            ]);
        });

    //Functions accessed by only cs users
    Route::prefix('/cs')
        ->namespace('Cs')
        ->name('cs.')
        ->middleware('role:CS')
        ->group(function () {
            Route::get('/', [CsController::class, 'index'])->name('index');
        });
});
