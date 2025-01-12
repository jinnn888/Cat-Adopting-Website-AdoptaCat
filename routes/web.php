<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\CatImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FavouriteController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function() {
    Route::get('my-cats', [CatController::class, 'index'])->name('cats.index');
    Route::get('create-cats', [CatController::class, 'create'])->name('cats.create');
    Route::post('store-cats', [CatController::class, 'store'])->name('cats.store');
    Route::get('edit-cat/{cat}', [CatController::class, 'edit'])->name('cats.edit');
    Route::put('update-cat/{cat}', [CatController::class, 'update'])->name('cats.update');

    Route::get('image-edit-cat/{cat}', [CatImageController::class, 'edit'])->name('cats.image.edit');
    Route::post('image-update-cat/{cat}', [CatImageController::class, 'update'])->name('cats.image.update');

    // Favourite

    Route::resource('favourites', FavouriteController::class)->except('destroy');
    Route::post('favourites/{id}', [FavouriteController::class, 'destroy'])->name('favourites.destroy');

});

Route::get('/cat/{cat}', [HomeController::class, 'showCat'])->name('home.cats.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
