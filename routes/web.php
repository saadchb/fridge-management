<?php

use App\Http\Controllers\BonEntreController;
use App\Http\Controllers\BonLivrasonController;
use App\Http\Controllers\BonSortController;
use App\Http\Controllers\ConditionnementController;
use App\Http\Controllers\DachboardController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function () {
    Route::get('/',[DachboardController::class , 'index']);

    Route::get('/profile/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/admin/dachboard',[DachboardController::class , 'index'])->name('admin.dachboard');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('familles', FamilleController::class)->middleware(['auth', 'verified']);
    Route::resource('produits', ProduitController::class)->middleware(['auth', 'verified']);
    Route::resource('conditionnements', ConditionnementController::class)->middleware(['auth', 'verified']);

    // Dachboard route
    Route::get('/',[DachboardController::class,'index'])->name('dashboard');

    // Familles route
    Route::resource('familles', FamilleController::class);

    // Bon entree route
    Route::get('/bonentres', [BonEntreController::class, 'index'])->name('bonentres.index');
    Route::get('/bonentres/create', [BonEntreController::class, 'create'])->name('bonentres.create');
    Route::post('/bonentres', [BonEntreController::class, 'store'])->name('bonentres.store');
    Route::get('/bonentres/{bonEntre}', [BonEntreController::class, 'show'])->name('bonentres.show');
    Route::get('/bonentres/{bonEntre}/edit', [BonEntreController::class, 'edit'])->name('bonentres.edit');
    Route::put('/bonentres/{bonEntre}', [BonEntreController::class, 'update'])->name('bonentres.update');
    Route::delete('/bonentres/{bonEntre}', [BonEntreController::class, 'destroy'])->name('bonentres.destroy');
    Route::post('/detail_bon_entre', 'DetailBonEntreController@store')->name('detail_bon_entre.store');

    //Bon sortie route 
    Route::get('/bonsorts', [BonSortController::class, 'index'])->name('bonsorts.index');
    Route::get('/bonsorts/create', [BonSortController::class, 'create'])->name('bonsorts.create');
    Route::post('/bonsorts', [BonSortController::class, 'store'])->name('bonsorts.store');
    Route::get('/bonsorts/{bonSort}', [BonSortController::class, 'show'])->name('bonsorts.show');
    Route::get('/bonsorts/{bonSort}/edit', [BonSortController::class, 'edit'])->name('bonsorts.edit');
    Route::put('/bonsorts/{bonSort}', [BonSortController::class, 'update'])->name('bonsorts.update');
    Route::delete('/bonsorts/{bonSort}', [BonSortController::class, 'destroy'])->name('bonsorts.destroy');
    // route bon livraison 
    Route::get('/bonlivrasons', [BonLivrasonController::class, 'index'])->name('bonlivrasons.index');
    Route::get('/bonlivrasons/create', [BonLivrasonController::class, 'create'])->name('bonlivrasons.create');
    Route::post('/bonlivrasons', [BonLivrasonController::class, 'store'])->name('bonlivrasons.store');
    Route::get('/bonlivrasons/{bon}', [BonLivrasonController::class, 'show'])->name('bonlivrasons.show');
    Route::get('/bonlivrasons/{bon}/edit', [BonLivrasonController::class, 'edit'])->name('bonlivrasons.edit');
    Route::put('/bonlivrasons/{bon}', [BonLivrasonController::class, 'update'])->name('bonlivrasons.update');
    Route::delete('/bonlivrasons/{bon}', [BonLivrasonController::class, 'destroy'])->name('bonlivrasons.destroy');
});
require __DIR__ . '/auth.php';
