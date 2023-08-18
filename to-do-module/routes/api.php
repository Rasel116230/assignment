<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/tasks', [TodoController::class, 'index']);
Route::prefix('/tasks')->group(function(){
    Route::post('/save',[TodoController::class, 'store']);
    Route::get('/edit/{id}',[TodoController::class, 'edit']);
    Route::put('/{id}' , [TodoController::class, 'update']);
    Route::delete('/{id}', [TodoController::class, 'destroy'] );
    Route::get('/status/{id}', [TodoController::class, 'updateStatus'] );
});
