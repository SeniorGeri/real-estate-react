<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Finance\Controllers\LiquidationController;
use Modules\Finance\Controllers\ExpenseController;
use Modules\Finance\Controllers\TransactionController;

Route::prefix('backoffice/')->group(function () {

    Route::prefix('liquidation')->as('liquidation.')->middleware(['web',  'auth:sanctum'])->group(function () {

        Route::get('/list', [LiquidationController::class, 'index'])->name('list')->permission('liquidation.read');
        Route::get('load', [LiquidationController::class, 'show'])->name('load')->permission('liquidation.read');
        Route::post('list/{liquidation}', [LiquidationController::class, 'store'])->name('store')->permission('liquidation.create');
        Route::put('/list/{liquidation}', [LiquidationController::class, 'update'])->name('update')->permission('liquidation.update');
        Route::delete('/list/{liquidation}', [LiquidationController::class, 'destroy'])->name('destroy')->permission('liquidation.delete');
    });

    Route::prefix('expense')->as('expense.')->middleware(['web',  'auth:sanctum'])->group(function () {

        Route::get('/list', [ExpenseController::class, 'index'])->name('list')->permission('expense.read');
        Route::get('load', [ExpenseController::class, 'show'])->name('load')->permission('expense.read');
        Route::post('/list', [ExpenseController::class, 'store'])->name('store')->permission('expense.create');
        Route::put('/list/{expense}', [ExpenseController::class, 'update'])->name('update')->permission('expense.update');
        Route::delete('/list/{expense}', [ExpenseController::class, 'destroy'])->name('destroy')->permission('expense.delete');
    });

    Route::prefix('transaction')->as('transaction.')->middleware(['web',  'auth:sanctum'])->group(function () {

        Route::get('/list', [TransactionController::class, 'index'])->name('list')->permission('transaction.read');
        Route::get('load', [TransactionController::class, 'show'])->name('load')->permission('transaction.read');
    });

});

