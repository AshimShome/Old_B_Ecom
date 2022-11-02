<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\EmployeerController;
use App\Http\Controllers\Backend\AuthenticatedSessionController;
use App\Http\Controllers\Backend\EmployeeSalary;
use App\Http\Controllers\Backend\DepartmentController;

// employeer prefix route
Route::group(['prefix' => 'employeer', 'middleware' => ['employeer:employeer']], function () {
    Route::get('/login', [EmployeerController::class, 'loginForm'])->name('employeer.loginForm');
    Route::post('/login', [EmployeerController::class, 'store'])->name('employeer.login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:employeer'
        ]));
});

Route::middleware(['auth:employeer'])->group(function () {
    // employeer Route
    Route::get('/employeer/dashboard', function () {

        return view('admin.index');
    })->name('employeer.dashboard');

    Route::get('employeer/logout', [AuthenticatedSessionController::class, 'employeerDestroy'])->name('employeer.logout');
});

  
