<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () =>  view('welcome'));

Route::group(
    [
        'middlerware' => ['auth'],
        'prefix' => 'dashboard',
        'as' => 'dshb.'
    ],
    function () {
        Route::get('/', fn () =>  view('welcome'))->name('index');
    }
);
