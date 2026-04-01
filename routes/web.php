<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketStatusController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('login', [UserController::class, 'login']);
    Route::post('logout', [UserController::class, 'logout'])->name('logout');

    Route::get('users/index', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/update/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('categories/index', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/show/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('tickets/index', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('tickets/my', [TicketController::class, 'myTickets'])->name('tickets.my');
    Route::get('tickets/show/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    Route::get('tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('tickets/store', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('tickets/edit/{ticket}', [TicketController::class, 'edit'])->name('tickets.edit');
    Route::put('tickets/update/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
    Route::delete('tickets/destroy/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');

    Route::get('ticket-statuses/index', [TicketStatusController::class, 'index'])->name('ticket-statuses.index');
    Route::get('ticket-statuses/show/{status}', [TicketStatusController::class, 'show'])->name('ticket-statuses.show');
    Route::get('ticket-statuses/create', [TicketStatusController::class, 'create'])->name('ticket-statuses.create');
    Route::post('ticket-statuses/store', [TicketStatusController::class, 'store'])->name('ticket-statuses.store');
    Route::get('ticket-statuses/edit/{status}', [TicketStatusController::class, 'edit'])->name('ticket-statuses.edit');
    Route::put('ticket-statuses/update/{status}', [TicketStatusController::class, 'update'])->name('ticket-statuses.update');
    Route::delete('ticket-statuses/destroy/{status}', [TicketStatusController::class, 'destroy'])->name('ticket-statuses.destroy');
});
