<?php

use App\Http\Controllers\BonLivrasonController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConditionnementController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');

// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', function () {
    $table = 'dachboard';
    return view('Backend.dachboard', compact('table'));
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/dachboard', function () {
    $table = 'dachboard';
    return view('Backend.dachboard', compact('table'));
})->name('admin.dachboard');


Route::resource('familles', FamilleController::class)->middleware(['auth', 'verified']);
Route::resource('produits', ProduitController::class)->middleware(['auth', 'verified']);
Route::resource('conditionnements', ConditionnementController::class)->middleware(['auth', 'verified']);
Route::resource('clients', ClientController::class)->middleware(['auth', 'verified']);
Route::resource('bonlivrasons', BonLivrasonController::class)->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
