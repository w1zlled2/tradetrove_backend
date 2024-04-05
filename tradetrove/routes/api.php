<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/auth', [UserController::class, 'auth']);
Route::apiResource("role", RoleController::class)
    ->middleware('role:admin');
Route::apiResource("category", CategoryController::class)
    ->middleware('role:admin');
Route::apiResource("condition", ConditionController::class)
    ->middleware('role:admin');
Route::apiResource("status", StatusController::class)
    ->middleware('role:admin');
Route::apiResource("user", UserController::class, ['except' => ['show']])
    ->middleware('role:admin');
Route::resource('user', UserController::class, ['only' => ['show']])
    ->withoutMiddleware('auth:api');
Route::prefix("user")
    ->group(function () {
        Route::patch("/{user}/change-role", [UserController::class, "changeRole"])
            ->middleware('role:admin');
        Route::group(['middleware' => 'role:moderator'], function() {
            Route::patch('/{user}/publishing-block', [UserController::class, 'publishingBlock']);
            Route::patch('/{user}/publishing-unlock', [UserController::class, 'publishingUnlock']);
        });
    });

Route::apiResource("post", PostController::class, ['except' => ['index', 'show']])
    ->middleware('role:user');
Route::resource('post', PostController::class, ['only' => ['index', 'show']])
    ->withoutMiddleware('auth:api');
Route::prefix("post")
    ->group(function () {
        Route::patch("/moderate/{post}", [PostController::class, "moderate"])
            ->middleware('role:moderator');
    });
Route::get('/myPosts', [PostController::class, 'userPosts']);

Route::post("/register", [UserController::class, "store"])
    ->withoutMiddleware('auth:api');
Route::post("/login", [UserController::class, "login"])
    ->withoutMiddleware('auth:api');
Route::get("/logout", [UserController::class, "logout"]);

Route::apiResource('complaint', ComplaintController::class);


//Route::get('test', function () {echo 'api test';})
//->withoutMiddleware('auth:api');
//
