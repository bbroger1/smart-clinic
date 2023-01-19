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
    

    Route::prefix('/doctors')->group(function () {
        Route::get('/', [DoctorController::class, 'all'])->name('app.doctors');
        
        Route::get('/register', [DoctorController::class, 'index'])->name('app.register-doctor');
        Route::post('/register', [DoctorController::class, 'create'])->name('app.register-doctor');
        Route::delete('/delete', [DoctorController::class, 'delete'])->name('app.delete-doctor');
        Route::put('/update', [DoctorController::class, 'reactivate'])->name('app.active-doctor');
    });

});
