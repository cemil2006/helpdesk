<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
    Route::get('categories/index', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/delete', [CategoryController::class, 'delete'])->name('categories.delete');
