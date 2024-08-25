<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemController;

Route::resource('items', ItemController::class);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Homepage with item list
Route::get('/', [ItemController::class, 'index'])->name('home');

// Admin routes
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth')->name('admin.dashboard');

// Admin routes for items
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // CRUD operations for items
    Route::get('/items', [ItemController::class, 'index'])->name('admin.items.index');
    Route::get('/items/create', [ItemController::class, 'create'])->name('admin.items.create');
    Route::post('/items', [ItemController::class, 'store'])->name('admin.items.store');
    Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('admin.items.edit');
    Route::put('/items/{id}', [ItemController::class, 'update'])->name('admin.items.update');
    Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('admin.items.destroy');
});

// Admin logout route
Route::post('admin/logout', function () {
    Auth::logout();
    return redirect()->route('admin.login');
})->name('admin.logout');
