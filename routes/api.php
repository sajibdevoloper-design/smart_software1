<?php

use Illuminate\Http\Request;
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/students', function () {});

Route::post('/students/create', [studentController::class, 'store'])->name('students.store');

