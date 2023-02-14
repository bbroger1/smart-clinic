<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AgendaController;


Route::prefix('agenda')->group(function () {
    Route::get('/step01', [SiteController::class, 'step01'])->name('site.step1');
    Route::get('/step02', [SiteController::class, 'step02'])->name('site.step2');

    Route::post('/create', [SiteController::class, 'create'])->name('site.create');
});

Route::prefix('app')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('app.home');
    Route::get('/agenda', [AgendaController::class, 'index'])->name('app.agenda');

    
    Route::get('/login', function () {
        return view('app.login');
    })->name('app.login');
    

    Route::prefix('/doctors')->group(function () {
        Route::get('/', [DoctorController::class, 'all'])->name('app.doctors');

        Route::get('/register', [DoctorController::class, 'index'])->name('app.register-doctor');
        Route::post('/register', [DoctorController::class, 'create'])->name('app.register-doctor');
        Route::delete('/delete', [DoctorController::class, 'delete'])->name('app.delete-doctor');
        Route::put('/desable', [DoctorController::class, 'reactivate'])->name('app.active-doctor');

        Route::get('/edit/{id}', [DoctorController::class, 'edit'])->name('app.edit-doctor');
        Route::put('/update/{id}', [DoctorController::class, 'update'])->name('app.update-doctor');
    });

});


Route::redirect('/', '/agenda/step01');
