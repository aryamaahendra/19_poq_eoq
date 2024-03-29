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

        Route::get('users/data', [\App\Http\Controllers\UserController::class, 'data'])
            ->name('users.data');

        Route::resource('users', \App\Http\Controllers\UserController::class)
            ->parameters(['users' => 'm_user']);

        Route::get(
            'components/categories/data',
            [\App\Http\Controllers\ComponentCategoriesController::class, 'data']
        )
            ->name('components.categories.data');

        Route::resource('components/categories', \App\Http\Controllers\ComponentCategoriesController::class)
            ->parameters(['categories' => 'm_category'])
            ->names('components.categories');

        Route::get('/', fn () =>  view('dashboard'))->name('index');
    }
);
