<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/katalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/shop', [CatalogController::class, 'index'])->name('shop.index');
Route::get('/api/products', [CatalogController::class, 'getProducts'])->name('api.products');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // User management routes (Admin only)
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class)->except(['create', 'show', 'edit']);
    });

    // CRM Leads & AI Matchmaker (Admin & Staff)
    Route::middleware('role:admin,staff')->group(function () {
        Route::post('/leads/quick-match', [LeadController::class, 'quickMatch'])->name('leads.quick-match');
        Route::match(['GET', 'POST'], '/leads/run-hunter', [LeadController::class, 'runHunter'])->name('leads.run-hunter');
        Route::resource('leads', LeadController::class)->except(['create', 'show', 'edit']);
    });
});

require __DIR__.'/auth.php';

