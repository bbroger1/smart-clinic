<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return '<h1>Hello</h1>';
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

    Route::get('/register-doctor', function () {
        return view('app.register-doctor');
    });
});
