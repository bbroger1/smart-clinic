<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\LoginController;


Route::prefix('agenda')->group(function () {
    Route::get('/step01', [SiteController::class, 'step01'])->name('site.step1');
    Route::get('/step02', [SiteController::class, 'step02'])->name('site.step2');

    Route::post('/create', [SiteController::class, 'create'])->name('site.create');
});

Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'login'])->name('site.login');

Route::get('/register', [LoginController::class, 'register'])->name('site.register');
Route::post('/register', [LoginController::class, 'store'])->name('site.register');

Route::get('/logout', [LoginController::class, 'logout'])->name('site.logout');

Route::middleware([AuthMiddleware::class])->prefix('app')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('app.home');

    Route::prefix('agenda')->group(function () {
        Route::get('/', [AgendaController::class, 'index'])->name('app.agenda');
        Route::get('/confirm/{id}', [AgendaController::class, 'confirm'])->name('app.confirm');
        Route::get('/canceled/{id}', [AgendaController::class, 'cancel'])->name('app.cancel');
    });

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
