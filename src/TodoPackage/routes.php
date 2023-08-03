<?php

use Illuminate\Support\Facades\Route;
use Shibly\TodoPackage\TodoPackage\Http\Controllers\TodoController;

Route::group(['namespace' => 'YourVendor\TodoPackage\Http\Controllers', 'middleware' => 'web'], function () {
    Route::get('todos', [TodoController::class, 'index'])->name('todos.index');
    Route::post('todos', [TodoController::class, 'store'])->name('todos.store');
    Route::patch('todos/{id}', [TodoController::class, 'update'])->name('todos.update');
    Route::delete('todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');
});
