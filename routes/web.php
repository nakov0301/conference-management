<?php

use App\Http\Controllers\ApproveTalkController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TalkCommentController;
use App\Http\Controllers\TalkController;
use App\Jobs\ImportCSVConferences;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {

    ImportCSVConferences::dispatch();

    return 'Done';
});

Route::resource('conferences', ConferenceController::class)
    ->middleware('auth');

Route::get('/talks/{talk}', [TalkController::class, 'show'])
    ->middleware('auth')
    ->name('talks.show');

Route::resource('conferences/{conference}/talks', TalkController::class)
    ->middleware('auth')
    ->only(['index', 'create', 'store']);

Route::get('conferences/{conference}/edit', [ConferenceController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'conference')
    ->name('conferences.edit');

Route::patch('conferences/{conference}/update', [ConferenceController::class, 'update'])
    ->middleware('auth')
    ->can('edit', 'conference')
    ->name('conferences.update');

Route::delete('conferences/{conference}/delete', [ConferenceController::class, 'destroy'])
    ->middleware('auth')
    ->can('delete')
    ->name('conferences.destroy');

Route::post('/talks/{talk}/approve', ApproveTalkController::class)
    ->name('talks.approve');

Route::post('/talks/{talk}/comment', TalkCommentController::class)
    ->name('talks.comment');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
