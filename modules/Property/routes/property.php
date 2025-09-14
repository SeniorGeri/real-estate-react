<?php

declare(strict_types=1);

use Modules\Property\Controllers\PropertyStatusController;
use Modules\Property\Controllers\PropertyTypeController;
use Illuminate\Support\Facades\Route;
use Modules\Property\Controllers\PropertyController;

Route::prefix('backoffice/')->group(function () {
    
    Route::prefix('property')->as('property.')->middleware(['web',  'auth:sanctum'])->group(function () {

        Route::get('/status/list', [PropertyStatusController::class, 'index'])->name('status.list')->permission('property_status.read');
        Route::get('/status/load', [PropertyStatusController::class, 'show'])->name('status.load')->permission('property_status.read');
        Route::post('/status/list', [PropertyStatusController::class, 'store'])->name('status.store')->permission('property_status.create');
        Route::put('/status/list/{property_status}', [PropertyStatusController::class, 'update'])->name('status.update')->permission('property_status.update');
        Route::delete('/status/list/{property_status}', [PropertyStatusController::class, 'destroy'])->name('status.destroy')->permission('property_status.delete');

        Route::get('/type/list', [PropertyTypeController::class, 'index'])->name('type.list')->permission('property_type.read');
        Route::get('/type/load', [PropertyTypeController::class, 'show'])->name('type.load')->permission('property_type.read');
        Route::post('/type/list', [PropertyTypeController::class, 'store'])->name('type.store')->permission('property_type.create');
        Route::put('/type/list/{property_type}', [PropertyTypeController::class, 'update'])->name('type.update')->permission('property_type.update');
        Route::delete('/type/list/{property_type}', [PropertyTypeController::class, 'destroy'])->name('type.destroy')->permission('property_type.delete');

        Route::get('/list', [PropertyController::class, 'index'])->name('list')->permission('property.read');
        Route::get('load', [PropertyController::class, 'show'])->name('load')->permission('property.read');
        Route::get('/create', [PropertyController::class, 'create'])->name('create')->permission('property.create');
        Route::post('/create', [PropertyController::class, 'store'])->name('store')->permission('property.create');
        Route::get('/edit/{property}', [PropertyController::class, 'edit'])->name('edit')->permission('property.update');
        Route::put('/edit/{property}', [PropertyController::class, 'update'])->name('update')->permission('property.update');
        Route::delete('/list/{property}', [PropertyController::class, 'destroy'])->name('destroy')->permission('property.delete');
    });

});