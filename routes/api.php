<?php

// routes/api.php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', [TaskController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/tasks', [TaskController::class, 'userTasks']);
    Route::put('/tasks/{task}', [TaskController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
});
