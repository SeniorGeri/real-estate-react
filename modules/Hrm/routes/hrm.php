<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Hrm\Controllers\Agent\AgentController;
use Modules\Hrm\Controllers\Agent\AgentProfileController;

Route::prefix('backoffice/')->group(function () {

    Route::prefix('agent')->as('agent.')->middleware(['web',  'auth:sanctum'])->group(function () {

        Route::get('/list', [AgentController::class, 'index'])->name('list')->permission('agent.read');
        Route::get('load', [AgentController::class, 'show'])->name('load')->permission('agent.read');
        Route::post('/list', [AgentController::class, 'store'])->name('store')->permission('agent.create');
        Route::put('/list/{agent}', [AgentController::class, 'update'])->name('update')->permission('agent.update');
        Route::delete('/list/{agent}', [AgentController::class, 'destroy'])->name('destroy')->permission('agent.delete');
        Route::put('/password/{agent}', [AgentController::class, 'password'])->name('password')->permission('agent.update');
        
        Route::get('/profile/{agent}', [AgentProfileController::class, 'index'])->name('profile')->permission('agent.read');
        Route::get('/property/{agent}', [AgentProfileController::class, 'properties'])->name('property')->permission('agent.read');

    });

});
