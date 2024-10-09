<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Dashboard route

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    // update route

    Route::put('/update_task/{id}', [TodoController::class, 'update'])->name('tasks.update');
    // update list route 

    Route::get('/updates/{id}', [TodoController::class, 'update_list'])->name('update.list');

    //  delete route
    Route::get('/deletetodo/{id}', [TodoController::class, 'delete_todo'])->name('delete.todo');
    // filter list and displays all todos

    Route::get('/filter', [TodoController::class, 'filter'])->name('filters.list');

    // mark as completed route

    Route::get('/completetodo/{id}', [TodoController::class, 'complete_todo'])->name('completed.todo');
    // profile route
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // show all todos

    Route::get('/user', [TodoController::class, 'filter'])->name('filters.list');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');


    Route::get('/todoform', function () {
        return view('todoform');
    })->name('todo.form');
    Route::post('/addtodo', [TodoController::class, 'add'])->name('add.list');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
