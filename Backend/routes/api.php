<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsletterController;
use App\Http\Controllers\Api\ProgrammeInterestController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// This gives you the endpoint: POST http://localhost:8000/api/newsletter
Route::post('/subscribe', [NewsletterController::class, 'store']);

// This gives you the endpoint: POST http://localhost:8000/api/programme-interest
Route::post('/programme-interest', [ProgrammeInterestController::class, 'store']);

// GET request to list everyone
Route::get('/subscribers', [NewsletterController::class, 'index']);

// PUT request to update user #ID (Notice the {id} in the URL!)
Route::put('/subscribers/{id}', [NewsletterController::class, 'update']);

// DELETE request to destroy user #ID
Route::delete('/subscribers/{id}', [NewsletterController::class, 'destroy']);