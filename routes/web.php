<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/datatable', [MainController::class, 'index']);
    Route::get('/form', [MainController::class, 'create']);

    Route::get('/index', function () {
        return view('layouts.index');
    });

    Route::get('/users', [UserController::class, 'datatable'])->name('users.index');
     
    Route::controller(BranchController::class)->name('branch.')->prefix('branch')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:branch-view');
        Route::get('/select2', 'select2')->name('select2')->middleware('permission:branch-view');
        Route::post('/', 'store')->name('store')->middleware('permission:branch-create');
        Route::get('/create', 'create')->name('create')->middleware('permission:branch-create');
        Route::get('/{branch}', 'show')->name('show')->middleware('permission:branch-view');
        Route::put('/{branch}', 'update')->name('update')->middleware('permission:branch-update');
        Route::delete('/{branch}', 'destroy')->name('destroy')->middleware('permission:branch-delete');
        Route::get('/{branch}/edit', 'edit')->name('edit')->middleware('permission:branch-update');
    });
});

Route::get('/sidebar', function () {
    return view('layouts/sidebar');
});

require __DIR__.'/auth.php';
