<?php

use App\Exports\MonthlyExport;
use App\Models\Kanban;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', fn () =>  view('welcome'));

Route::get(
    'dashboard/components/data',
    [\App\Http\Controllers\ComponentController::class, 'data']
)->name('components.data');

Route::group(
    [
        'middleware' => ['auth'],
        'prefix' => 'dashboard',
        'as' => 'dshb.'
    ],
    function () {

        Route::get('kanban-board/data', [\App\Http\Controllers\KanbanController::class, 'data']);
        Route::get('/kanban-board', fn () =>  view('kanban'))->name('kanban');

        Route::post('algorithm/proses', [\App\Http\Controllers\AlgorithmController::class, 'proses'])
            ->name('algoritm.proses');

        Route::get('algorithm/data', [\App\Http\Controllers\AlgorithmController::class, 'data'])
            ->name('algoritm.data');

        Route::get('algorithm', [\App\Http\Controllers\AlgorithmController::class, 'index'])
            ->name('algoritm.index');

        Route::get('users/data', [\App\Http\Controllers\UserController::class, 'data'])
            ->name('users.data');

        Route::resource('users', \App\Http\Controllers\UserController::class)
            ->parameters(['users' => 'm_user']);

        Route::get(
            'components/categories/data',
            [\App\Http\Controllers\ComponentCategoriesController::class, 'data']
        )
            ->name('components.categories.data');

        Route::resource(
            'components/categories',
            \App\Http\Controllers\ComponentCategoriesController::class
        )
            ->parameters(['categories' => 'm_category'])
            ->names('components.categories');

        Route::resource('components', \App\Http\Controllers\ComponentController::class)
            ->parameters(['components' => 'm_component']);

        Route::get(
            'penjualan/data',
            [\App\Http\Controllers\SellController::class, 'data']
        )
            ->name('sell.data');

        Route::get(
            'penjualan/{m_sell}/excel',
            [\App\Http\Controllers\SellController::class, 'excel']
        )
            ->name('sell.excel');

        Route::resource('penjualan', \App\Http\Controllers\SellController::class)
            ->parameters(['penjualan' => 'm_sell'])->names('sell');

        Route::get(
            'pembelian/data',
            [\App\Http\Controllers\OrderController::class, 'data']
        )->name('order.data');

        Route::put(
            'pembelian/status/{m_order}',
            [\App\Http\Controllers\OrderController::class, 'status']
        )->name('order.status');

        Route::get(
            'pembelian/recommended',
            [\App\Http\Controllers\OrderController::class, 'recommended']
        )->name('order.recommended');

        Route::get(
            'pembelian/{m_order}/excel',
            [\App\Http\Controllers\OrderController::class, 'excel']
        )->name('order.excel');

        Route::resource('pembelian', \App\Http\Controllers\OrderController::class)
            ->parameters(['pembelian' => 'm_order'])->names('order');

        Route::get('export', function () {
            $export = new MonthlyExport(
                (int) request()->query('month'),
                (int) request()->query('year')
            );
            return Excel::download($export, 'text.xlsx');
        })->name('export.monthly');

        Route::get('/', fn () =>  view('dashboard'))->name('index');
    }
);
