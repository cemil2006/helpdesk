<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
    Route::get('categories/index', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/show/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
