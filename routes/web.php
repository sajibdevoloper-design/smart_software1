<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::get('/students', [studentController::class, 'index'])
    ->name('students.index');

Route::get('/students/create', function () {
    return view('students.create');
})->name('students.create');

Route::get('/students/{id}', function ($id) {
    return view('students.show', ['id' => $id]);
})->name('students.show');
Route::get('/students/{id}', [studentController::class, 'show'])->name('students.show');


Route::get('/students/{id}/edit', [StudentController::class, 'edit'])
    ->name('students.edit');

Route::put('/students/{id}', [StudentController::class, 'update'])
    ->name('students.update');
    
Route::delete('/students/{id}', [studentController::class, 'destroy'])
    ->name('students.destroy');
