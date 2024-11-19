<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect("/Management");
});

Route::resource("/Management", "App\Http\Controllers\ProjectController");
Route::get('/projects', [ManagementController::class, 'index'])->name('projects.index');

