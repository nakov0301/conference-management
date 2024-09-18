<?php

use App\Http\Controllers\ProfileController;
use App\Models\Conference;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/conferences', function () {
    return view('conferences.index', [
        'conferences' => Conference::all(),
    ]);
})->name('conferences.index');

Route::get('/conferences/create', function () {
    return view('conferences.create');
})->name('conferences.create');

Route::post('/conferences', function () {
    $data = request()->validate([
        'title' => 'required',
    ]);

    Conference::create([
        'title'   => $data['title'],
        'user_id' => 1,
    ]);

    return redirect(route('conferences.index'));
})->name('conferences.store');

Route::get('/conferences/{id}/edit', function ($id) {
    $conference = Conference::findOrFail($id);

    return view('conferences.edit', ['conference' => $conference]);
})->name('conferences.edit');

Route::delete('/conferences/{id}/delete', function ($id) {
    $conference = Conference::findOrFail($id);

    $conference->delete();

    return redirect(route('conferences.index'));
})->name('conferences.delete');

Route::patch('/conferences/{id}', function ($id) {
    $conference = Conference::findOrFail($id);

    $data = request()->validate([
        'title' => ['required', 'min:3'],
    ]);

    $conference->update([
        'title'   => $data['title'],
    ]);

    return redirect(route('conferences.index'));
})->name('conferences.update');

Route::get('/conferences/{id}', function ($id) {
    $conference = Conference::findOrFail($id);

    return view('conferences.show', [
        'conference' => $conference,
    ]);
})->name('conferences.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
