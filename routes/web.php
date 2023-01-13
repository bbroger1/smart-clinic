<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;

Route::get('/', function () {
    return view('site.index');
});


Route::prefix('app')->group(function () {
    Route::get('/', function () {
        return view('app.index');
    })->name('app.home');

    Route::get('/agenda', function () {
        return view('app.agenda');
    })->name('app.agenda');

    Route::get('/doctors/{view?}', function() {
        return view('app.doctors');
    })->name('app.doctors');

    Route::get('/login', function () {
        return view('app.login');
    })->name('app.login');

    Route::get('/register-doctor/{op?}', [DoctorController::class, 'index'])->name('app.register-doctor');
    Route::post('/register-doctor', [DoctorController::class, 'create'])->name('app.register-doctor');
});
