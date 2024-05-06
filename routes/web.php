<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeController;
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

    Route::controller(MenuController::class)->name('menu.')->prefix('menu')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:menu-view');
        Route::get('/select2', 'select2')->name('select2')->middleware('permission:menu-view');
        Route::post('/', 'store')->name('store')->middleware('permission:menu-create');
        Route::get('/create', 'create')->name('create')->middleware('permission:menu-create');
        Route::get('/{menu}', 'show')->name('show')->middleware('permission:menu-view');
        Route::put('/{menu}', 'update')->name('update')->middleware('permission:menu-update');
        Route::delete('/{menu}', 'destroy')->name('destroy')->middleware('permission:menu-delete');
        Route::get('/{menu}/edit', 'edit')->name('edit')->middleware('permission:menu-update');
    });

    Route::prefix('access')->group(function() {
        Route::controller(RoleController::class)->name('role.')->prefix('role')->group(function () {
            Route::get('/', 'index')->name('index')->middleware('permission:role-view');
            // Route::get('/select2', 'select2')->name('select2')->middleware('permission:role-view');
            Route::post('/', 'store')->name('store')->middleware('permission:role-create');
            Route::get('/create', 'create')->name('create')->middleware('permission:role-create');
            Route::get('/{role}', 'show')->name('show')->middleware('permission:role-view');
            Route::put('/{role}', 'update')->name('update')->middleware('permission:role-update');
            Route::delete('/{role}', 'destroy')->name('destroy')->middleware('permission:role-delete');
            Route::get('/{role}/edit', 'edit')->name('edit')->middleware('permission:role-update');
        });
    
        Route::controller(PermissionController::class)->name('permission.')->prefix('permission')->group(function () {
            Route::get('/', 'index')->name('index')->middleware('permission:permission-view');
            // Route::get('/select2', 'select2')->name('select2')->middleware('permission:permission-view');
            Route::post('/', 'store')->name('store')->middleware('permission:permission-create');
            Route::get('/create', 'create')->name('create')->middleware('permission:permission-create');
            Route::get('/{permission}', 'show')->name('show')->middleware('permission:permission-view');
            Route::put('/{permission}', 'update')->name('update')->middleware('permission:permission-update');
            Route::delete('/{permission}', 'destroy')->name('destroy')->middleware('permission:permission-delete');
            Route::get('/{permission}/edit', 'edit')->name('edit')->middleware('permission:permission-update');
        });

    });
    
    Route::controller(TypeController::class)->name('type.')->prefix('type')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:type-view');
        Route::get('/select2', 'select2')->name('select2')->middleware('permission:type-view');
        Route::post('/', 'store')->name('store')->middleware('permission:type-create');
        Route::get('/create', 'create')->name('create')->middleware('permission:type-create');
        Route::get('/{type}', 'show')->name('show')->middleware('permission:type-view');
        Route::put('/{type}', 'update')->name('update')->middleware('permission:type-update');
        Route::delete('/{type}', 'destroy')->name('destroy')->middleware('permission:type-delete');
        Route::get('/{type}/edit', 'edit')->name('edit')->middleware('permission:type-update');
    });

    Route::controller(App\Http\Controllers\CategoryController::class)->name('category.')->prefix('category')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:category-view');
        Route::get('/select2', 'select2')->name('select2')->middleware('permission:category-view');
        Route::post('/', 'store')->name('store')->middleware('permission:category-create');
        Route::get('/create', 'create')->name('create')->middleware('permission:category-create');
        Route::get('/{category}', 'show')->name('show')->middleware('permission:category-view');
        Route::put('/{category}', 'update')->name('update')->middleware('permission:category-update');
        Route::delete('/{category}', 'destroy')->name('destroy')->middleware('permission:category-delete');
        Route::get('/{category}/edit', 'edit')->name('edit')->middleware('permission:category-update');
    });
});

Route::get('/sidebar', function () {
    return view('layouts/sidebar');
});

require __DIR__.'/auth.php';
