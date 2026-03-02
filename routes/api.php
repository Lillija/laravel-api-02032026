<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('test', function (){
    return ['name' => 'Līga'];
});

Route::get('/books', [BookController::class, 'index']);         // Get all books
Route::post('/books', [BookController::class, 'store']);        // Create a new book
Route::get('/books/{id}', [BookController::class, 'show']);     // Get a specific book
Route::put('/books/{id}', [BookController::class, 'update']);   // Update a book
Route::delete('/books/{id}', [BookController::class, 'destroy']); // Delete a book