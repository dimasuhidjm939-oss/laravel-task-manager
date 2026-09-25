<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Redirect the root URL straight to the task list
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Full CRUD: index, create, store, edit, update, destroy
Route::resource('tasks', TaskController::class);

// Extra route: quick Pending <-> Completed toggle
Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus'])
    ->name('tasks.updateStatus');
