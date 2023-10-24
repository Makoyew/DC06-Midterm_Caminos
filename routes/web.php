<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::get('edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('products', [ProductController::class, 'store'])->name('product.store');
    Route::post('products/{product}', [ProductController::class, 'destroy']);

    Route::get('sales', [SalesController::class, 'index'])->name('sales.index');
    Route::get('soldItems', [SalesController::class, 'soldItems'])->name('sales.soldItems');

    Route::group(['middleware' => 'permission:manage'], function () {
        Route::get('clients', [ClientController::class, 'index'])->name('clients');
        Route::get('clients/{client}', [ClientController::class, 'show']);
    });

    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('users', [UserController::class, 'index'])->name('users');
    });
});

require __DIR__.'/auth.php';
