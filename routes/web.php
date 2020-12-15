<?php

use App\Http\Controllers\Supervisor\{SupervisorController, ScheduleController};
use App\Http\Controllers\Cs\{CsController};
use App\Http\Controllers\{HomeController, ProfileController};
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

            //Handle Store Schedule
            Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.data');
            Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('schedule.create');
            Route::post('/schedule/store', [ScheduleController::class, 'store'])->name('schedule.store');
            Route::get('/schedule/edit/{schedule}', [ScheduleController::class, 'edit'])->name('schedule.edit');
            Route::patch('/schedule/update/{schedule}', [ScheduleController::class, 'update'])->name('schedule.update');
            Route::delete('/schedule/destroy/{schedule}', [ScheduleController::class, 'destroy'])->name('schedule.delete');
            Route::post('/schedule/reset', [ScheduleController::class, 'reset'])->name('schedule.reset');

            Route::get('/report', [App\Http\Controllers\Supervisor\ReportController::class, 'index'])->name('report.data');
            Route::get('/report/export_excel', [App\Http\Controllers\Supervisor\ReportController::class, 'export_excel'])->name('report.export.excel');
            Route::get('/report/export_pdf', [App\Http\Controllers\Supervisor\ReportController::class, 'export_pdf'])->name('report.export.pdf');
        });

    //Functions accessed by only cs users
    Route::prefix('/cs')
        ->namespace('Cs')
        ->name('cs.')
        ->middleware('role:CS')
        ->group(function () {
            Route::get('/', [CsController::class, 'index'])->name('index');

            //Handle Store Task Cleaning
            Route::resource('/report', ReportController::class, [
                'names' => [
                    'index' => 'report.data',
                    'update' => 'report.update',
                ]
            ]);
        });

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
});
Route::patch('/schedule/reset', ResetScheduleController::class)->name('schedule.reset');
