<?php

declare(strict_types=1);

use Modules\Settings\Controllers\CountryController;
use Modules\Settings\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use Modules\Settings\Controllers\CityController;
use Modules\Settings\Controllers\CurrencyController;
use Modules\Settings\Controllers\PaymentController;
use Modules\Settings\Controllers\ZoneController;

Route::prefix('backoffice/')->group(function () {
    
    Route::prefix('country')->as('country.')->middleware(['web',  'auth:sanctum'])->group(function () {

        Route::get('/list', [CountryController::class, 'index'])->name('list')->permission('country.read');
        Route::get('load', [CountryController::class, 'show'])->name('load')->permission('country.read');
        Route::post('/list', [CountryController::class, 'store'])->name('store')->permission('country.create');
        Route::put('/list/{country}', [CountryController::class, 'update'])->name('update')->permission('country.update');
        Route::delete('/list/{country}', [CountryController::class, 'destroy'])->name('destroy')->permission('country.delete');
    });

    Route::prefix('language')->as('language.')->middleware(['web',  'auth:sanctum'])->group(function () {

        Route::get('/list', [LanguageController::class, 'index'])->name('list')->permission('language.read');
        Route::get('load', [LanguageController::class, 'show'])->name('load')->permission('language.read');
        Route::post('/list', [LanguageController::class, 'store'])->name('store')->permission('language.create');
        Route::put('/list/{language}', [LanguageController::class, 'update'])->name('update')->permission('language.update');
        Route::delete('/list/{language}', [LanguageController::class, 'destroy'])->name('destroy')->permission('language.delete');
    });

    Route::prefix('city')->as('city.')->middleware(['web',  'auth:sanctum'])->group(function () {

        Route::get('/list', [CityController::class, 'index'])->name('list')->permission('city.read');
        Route::get('load', [CityController::class, 'show'])->name('load')->permission('city.read');
        Route::post('/list', [CityController::class, 'store'])->name('store')->permission('city.create');
        Route::put('/list/{city}', [CityController::class, 'update'])->name('update')->permission('city.update');
        Route::delete('/list/{city}', [CityController::class, 'destroy'])->name('destroy')->permission('city.delete');
    });

    Route::prefix('currency')->as('currency.')->middleware(['web',  'auth:sanctum'])->group(function () {

        Route::get('/list', [CurrencyController::class, 'index'])->name('list')->permission('currency.read');
        Route::get('load', [CurrencyController::class, 'show'])->name('load')->permission('currency.read');
        Route::post('/list', [CurrencyController::class, 'store'])->name('store')->permission('currency.create');
        Route::put('/list/{currency}', [CurrencyController::class, 'update'])->name('update')->permission('currency.update');
        Route::delete('/list/{currency}', [CurrencyController::class, 'destroy'])->name('destroy')->permission('currency.delete');
    });

    Route::prefix('zone')->as('zone.')->middleware(['web',  'auth:sanctum'])->group(function () {

        Route::get('/list', [ZoneController::class, 'index'])->name('list')->permission('zone.read');
        Route::get('load', [ZoneController::class, 'show'])->name('load')->permission('zone.read');
        Route::post('/list', [ZoneController::class, 'store'])->name('store')->permission('zone.create');
        Route::put('/list/{zone}', [ZoneController::class, 'update'])->name('update')->permission('zone.update');
        Route::delete('/list/{zone}', [ZoneController::class, 'destroy'])->name('destroy')->permission('zone.delete');
    });
});
