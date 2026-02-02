<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

Route::apiResource('authors', AuthorController::class);

Route::post('books', [BookController::class, 'store']);
Route::put('books/{id}', [BookController::class, 'update']);
Route::delete('books/{id}', [BookController::class, 'destroy']);

