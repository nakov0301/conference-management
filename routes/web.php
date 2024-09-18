<?php

use App\Http\Controllers\ApproveTalkController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TalkController;
use App\Models\Conference;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('conferences', ConferenceController::class)
    ->middleware('auth');

Route::resource('conferences/{conference}/talks', TalkController::class)
    ->middleware('auth');

Route::post('/talks/{talk}/approve', ApproveTalkController::class)
    ->name('talks.approve');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
