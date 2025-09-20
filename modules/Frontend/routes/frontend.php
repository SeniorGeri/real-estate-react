<?php

use Modules\Frontend\Controllers\HomeController;
use Modules\Frontend\Controllers\PropertyController;
use Modules\Frontend\Controllers\ContactController;
use Modules\Frontend\Controllers\AboutController;
use Modules\Frontend\Controllers\AgentController;
use Modules\Frontend\Controllers\FaqController;
use Modules\Frontend\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/properties', [PropertyController::class, 'list'])->name('properties');
    Route::get('/properties-map', [PropertyController::class, 'map'])->name('properties-map');
    Route::get('/agents', [AgentController::class, 'list'])->name('agents');
    Route::get('/property/{property}', [PropertyController::class, 'details'])->name('property');
    Route::get('/agent/{agent}', [AgentController::class, 'details'])->name('agent');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/faq', [FaqController::class, 'index'])->name('faq');
    Route::get('/about-us', [AboutController::class, 'index'])->name('about-us');

    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    Route::get('/set-locale/{locale}', LocaleController::class)->name('set-locale');
});
