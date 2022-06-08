<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;

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

//User routes
Route::post('/sign_up', [UserController::class, 'signUp']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/user/{id?}', [UserController::class, 'getUserById']);
Route::get('/users', [UserController::class, 'getAllUsers']);

//Review routes
Route::post('/add-review', [ReviewController::class, 'addReview']);
Route::post('/delete-review', [ReviewController::class, 'deleteReview']);






