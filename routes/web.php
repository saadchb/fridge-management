<?php

use App\Http\Controllers\BonEntreController;
use App\Http\Controllers\FamilleController;
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

Route::middleware('auth')->group(function () {

    Route::get('/profile/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/dachboard', function () {
    $table = 'dachboard';
    return view('Backend.dachboard', compact('table'));
})->name('admin.dachboard');


Route::middleware(['auth', 'verified'])->group(function () {

    // Dachboard route
    Route::get('/dashboard', function () {
        $table = 'dachboard';
        return view('Backend.dachboard', compact('table'));
    })->name('dashboard');

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

});
require __DIR__ . '/auth.php';
