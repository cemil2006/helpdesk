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
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('tickets/index', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('tickets/store', [TicketController::class, 'store'])->name('tickets.store'); 
    Route::get('tickets/edit/{ticket}', [TicketController::class, 'edit'])->name('tickets.edit');
    Route::put('tickets/update/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
    Route::delete('tickets/destroy/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');

    
