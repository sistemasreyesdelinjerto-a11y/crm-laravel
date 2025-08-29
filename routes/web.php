<?php

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

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('landing.home');
})->name('landing.home');

Route::get('/clinicas', function () {
    return view('landing.clinicas'); // Nueva página de clínicas
})->name('landing.clinicas');

Route::get('/santafe', function () {
    return view('landing.santafe'); // Nueva página de Santa Fe
})->name('landing.santafe');

Route::get('/queretaro', function () {
    return view('landing.queretaro'); // Nueva página de Querétaro
})->name('landing.queretaro');

Route::get('/pedregal', function () {
    return view('landing.pedregal'); // Nueva página de Predregal
})->name('landing.predregal');

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/dr-santana', function () {
    return view('landing.dr_santana');
})->name('landing.dr-santana');