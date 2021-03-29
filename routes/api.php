<?php

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RegisterController;

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

Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});

Route::middleware('auth:sanctum')->get('index', function (Request $request) {
    Route::get('index', [RegisterController::class], 'index');
    return $users = DB::table('users')->get(['name','roles','quote','author','avatar','email']);
});


Route::get('delete/{id}',[RegisterController::class,'delete']);
Route::put('update/{id}',[RegisterController::class,'update']);


Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);


Route::resource('tasks', TaskController::class)->except(['create', 'show']);

