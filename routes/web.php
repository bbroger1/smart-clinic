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

    
    Route::get('/login', function () {
        return view('app.login');
    })->name('app.login');
    
    Route::get('/doctors/{view?}/{page?}/{op?}', [DoctorController::class, 'all'])->name('app.doctors');
    Route::get('/register-doctor/{op?}', [DoctorController::class, 'index'])->name('app.register-doctor');
    Route::post('/register-doctor', [DoctorController::class, 'create'])->name('app.register-doctor');
    Route::delete('/doctors', [DoctorController::class, 'delete'])->name('app.delete-doctor');
    Route::put('/doctors', [DoctorController::class, 'reactivate'])->name('app.active-doctor');
});
