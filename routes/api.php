
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TaskController;

Route::apiResource('tasks', TaskController::class);
