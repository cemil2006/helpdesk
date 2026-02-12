<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
    Route::get('categories/index', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::get('categories/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('categories/delet', [CategoryController::class, 'delete'])->name('categories.delete');
