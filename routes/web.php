<?php

use App\Http\Controllers\LandingController; // landing pública
use App\Http\Controllers\Panel\LandingController as PanelLandingController; // panel
use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';




// Mostrar landing pública
Route::get('/', [LandingController::class, 'index'])->name('landing.index');

// Crear resultado público (opcional, si lo necesitas)
Route::get('/landing/resultados/create', [LandingController::class, 'createResultado'])->name('landing.resultado.create');
Route::post('/landing/resultados', [LandingController::class, 'storeResultado'])->name('landing.resultado.store');


Route::prefix('panel')->name('panel.')->middleware(['auth'])->group(function () {
    Route::get('/', [PanelController::class, 'index'])->name('panel.index');
    Route::get('/landing', [PanelLandingController::class, 'index'])->name('landing.index');
    Route::get('/landing/resultados/create', [PanelLandingController::class, 'createResultado'])->name('landing.resultado.create');
    Route::post('/landing/resultados', [PanelLandingController::class, 'storeResultado'])->name('landing.resultado.store');
    Route::put('/landing/resultados/{resultado}', [PanelLandingController::class, 'update'])->name('landing.resultado.update');
      // Quiénes Somos
    Route::post('landing/quienes_somos', [LandingController::class, 'storeQuienesSomos'])->name('landing.quienes_somos.store');
    Route::put('landing/quienes_somos/{quienes_somos}', [LandingController::class, 'updateQuienesSomos'])->name('landing.quienes_somos.update');
});
