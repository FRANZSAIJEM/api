<?php
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\WorkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/authors',[AuthorController::class, 'index']);
Route::get('/authors/{author}',[AuthorController::class,'show']);
Route::post('/authors',[AuthorController::class, 'store']);
Route::put('/authors/{author}', [AuthorController::class, 'update']);
Route::delete('/authors/{author}',[AuthorController::class, 'destroy']);

Route::get('/works',[WorkController::class, 'index']);
Route::get('/works/{work}',[WorkController::class,'show']);
Route::post('/works',[WorkController::class, 'store']);
Route::put('/works/{work}', [WorkController::class, 'update']);
Route::delete('/works/{work}',[WorkController::class, 'destroy']);
