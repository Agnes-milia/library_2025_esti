<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//bárki által elérhető

Route::post('/register',[RegisteredUserController::class, 'store']);
Route::post('/login',[AuthenticatedSessionController::class, 'store']);

//autentikált
Route::middleware(['auth:sanctum'])
->group(function () {
    Route::get("/users/{id}", [UserController::class, "show"]);
    Route::get('/book-with-copies', [BookController::class, "bookWithCopies"]);
    Route::get("/my-lending-with-copies", [LendingController::class, "myLendingWithCopies"]);
    // Kijelentkezés útvonal
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
});

//admin útvonalak
Route::middleware(['auth:sanctum', Admin::class])
->group(function () {
    Route::get("/lending-with-copies/{id}", [LendingController::class, "lendingWithCopies"]);
    Route::get('/users', [UserController::class, 'index']);
});





