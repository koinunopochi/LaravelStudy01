<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateTaskAction;
use App\Http\Controllers\GetTaskAction;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function () {
    $message = 'Hello';

    return response()->json([
        'message' => $message
    ]);
});

Route::post('/tasks', CreateTaskAction::class);

Route::get('/tasks/{id}', GetTaskAction::class)->where('id', '[0-9]+');
