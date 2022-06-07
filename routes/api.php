<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestoController;

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

//Resto routes
Route::post('/add_resto', [RestoController::class, 'addResto']);
Route::get('/restaurants', [RestoController::class, 'getAllRestos']);
Route::get('/restaurant/{id}', [RestoController::class, 'getRestoById']);


Route::get('/all_users/{id?}', [UserController::class, 'getAllUsers']);
Route::post('/register/{user_type_id}', [UserController::class, 'signUp']);






