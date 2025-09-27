<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

// === Pages publiques KIM ===
Route::view('/', 'home')->name('home');
Route::view('/a-propos', 'about')->name('about.show');
Route::view('/contact', 'contact')->name('contact.show');

// === Recettes ===
Route::prefix('recettes')->name('recipes.')->group(function () {
    Route::get('/', [RecipeController::class, 'index'])->name('index'); // /recettes

    Route::middleware('auth')->group(function () {
        Route::get('/ajouter', [RecipeController::class, 'create'])->name('create'); // /recettes/ajouter
        Route::post('/', [RecipeController::class, 'store'])->name('store');         // POST /recettes
    });

    Route::get('/{slug}', [RecipeController::class, 'show'])->name('show'); // /recettes/{slug}
});

// === Dashboard (utilisateur connecté) ===
Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// === (Optionnel) Routes profil si tu n'as pas installé Breeze ===
// Décommente si besoin et crée ProfileController + vue profile.edit

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// === Routes Breeze (authentification) ===
// Laisse cette ligne si Breeze est installé (elle fournit /login, /register, /profile, etc.)
require __DIR__.'/auth.php';
