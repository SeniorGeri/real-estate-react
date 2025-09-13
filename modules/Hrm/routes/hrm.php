<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Hrm\Controllers\Agent\AgentController;
use Modules\Hrm\Controllers\Agent\AgentProfileController;
use Modules\Hrm\Controllers\Student\StudentController;
use Modules\Hrm\Controllers\Student\StudentProfileController;

Route::prefix('backoffice/')->group(function () {

    Route::prefix('agent')->as('agent.')->middleware(['web',  'auth:sanctum'])->group(function () {

        Route::get('/list', [AgentController::class, 'index'])->name('list')->permission('agent.read');
        Route::get('load', [AgentController::class, 'show'])->name('load')->permission('agent.read');
        Route::post('/list', [AgentController::class, 'store'])->name('store')->permission('agent.create');
        Route::put('/list/{agent}', [AgentController::class, 'update'])->name('update')->permission('agent.update');
        Route::delete('/list/{agent}', [AgentController::class, 'destroy'])->name('destroy')->permission('agent.delete');
        
        Route::get('/profile/{agent}', [AgentProfileController::class, 'index'])->name('profile')->permission('agent.read');

    });

    Route::prefix('student')->as('student.')->middleware(['web',  'auth:sanctum'])->group(function () {

        Route::get('/list', [StudentController::class, 'index'])->name('list')->permission('student.read');
        Route::get('load', [StudentController::class, 'show'])->name('load')->permission('student.read');
        Route::post('/list', [StudentController::class, 'store'])->name('store')->permission('student.create');
        Route::put('/list/{student}', [StudentController::class, 'update'])->name('update')->permission('student.update');
        Route::delete('/list/{student}', [StudentController::class, 'destroy'])->name('destroy')->permission('student.delete');
        
        Route::get('/profile/{student}', [StudentProfileController::class, 'index'])->name('profile')->permission('student.read');
    });

});
