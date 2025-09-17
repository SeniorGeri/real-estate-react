<?php

use Modules\Frontend\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web','guest'])->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/list', [MainController::class, 'list'])->name('list');
    Route::get('/agents', [MainController::class, 'agents'])->name('agents');
    Route::get('/property', [MainController::class, 'property'])->name('property');
    Route::get('/agent', [MainController::class, 'agent'])->name('agent');
    Route::get('/contact', [MainController::class, 'contact'])->name('contact');
    Route::get('/faq', [MainController::class, 'faq'])->name('faq');
    Route::get('/about-us', [MainController::class, 'aboutUs'])->name('about-us');
});
