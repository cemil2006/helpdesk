<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController; 
Route::get('/', function () {
    return view('welcome');
});
    Route::get('categories/index', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/show/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::get('categories/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('categories/delet', [CategoryController::class, 'delete'])->name('categories.delete');

    Route::get('tickets/index', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::get('tickets/store', [TicketController::class, 'store'])->name('tickets.store'); 
    Route::get('tickets/edit', [TicketController::class, 'edit'])->name('tickets.edit');
    Route::get('tickets/update', [TicketController::class, 'update'])->name('tickets.update');
    Route::get('tickets/delet', [TicketController::class, 'delete'])->name('tickets.delete');

