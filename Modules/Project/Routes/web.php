<?php

use Illuminate\Support\Facades\Route;
use Modules\Project\Http\Controllers\ProjectController;

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('projects', [ProjectController::class, 'index'])->name('projects');
});
