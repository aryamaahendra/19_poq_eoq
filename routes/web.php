<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () =>  view('welcome'));

Route::group(
    [
        'middleware' => ['auth'],
        'prefix' => 'dashboard',
        'as' => 'dshb.'
    ],
    function () {

        Route::get('users/data', [\App\Http\Controllers\UserController::class, 'data']);
        Route::resource('users', \App\Http\Controllers\UserController::class)
            ->parameters(['users' => 'm_user']);

        Route::get('/', fn () =>  view('dashboard'))->name('index');
    }
);
