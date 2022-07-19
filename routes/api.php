<?php

use App\Http\Controllers\HydraController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\CategoryController;
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
// Route::apiResource('users', UserController::class)->except(['edit', 'create', 'store', 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin']);
// Route::post('users', [UserController::class, 'store']);
// Route::put('users/{user}', [UserController::class, 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
// Route::post('users/{user}', [UserController::class, 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
// Route::patch('users/{user}', [UserController::class, 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
// Route::get('me', [UserController::class, 'me'])->middleware('auth:sanctum');
// Route::apiResource('roles', RoleController::class)->except(['create', 'edit'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
// Route::apiResource('users.roles', UserRoleController::class)->except(['create', 'edit', 'show', 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin']);

//public routes
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'store']);
Route::get('categories', [CategoryController::class, 'index']);

//routes for admin
Route::group(['middleware' => ['auth:sanctum', 'ability:admin']], function () {

    //category
    Route::post('create-category',[CategoryController::class, 'store']);
    Route::post('categories/{category}',[CategoryController::class, 'update']);
    Route::delete('categories/{category}',[CategoryController::class, 'destroy']);
});

//routes for every logged in user
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [UserController::class, 'logout']);
});