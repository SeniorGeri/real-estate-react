<?php

use App\Enums\RolesEnum;
use App\Http\Controllers\Main\DashboardController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

Route::get('/home', fn () => redirect()->route('dashboard'))->name('home');

Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard'); 

});

require __DIR__.'/settings.php';
// require __DIR__.'/auth.php';

