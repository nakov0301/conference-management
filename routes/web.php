<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/conferences', function () {
   return view('conferences.index', [
       'conferences' => [
           [
               'id' => 1,
               'title' => 'Conference 2024'
           ],
           [
               'id' => 2,
               'title' => 'Conference 2025'
           ]
       ]
   ]);
})->name('conferences.index');

Route::get('/conferences/create', function () {
    return view('conferences.create');
})->name('conferences.create');

Route::post('/conferences', function () {
    dd(request()->all());

    return redirect(route('conferences.index'));
})->name('conferences.store');

Route::get('/conferences/{id}', function ($id) {
    $conferences = [
        [
            'id' => 1,
            'title' => 'Conference 2024',
            'talks' => [
                [
                    'id' => 1,
                    'title' => 'Talk 1',
                    'user' => [
                        'id' => 1,
                        'name' => 'John Doe',
                    ]
                ],
                [
                    'id' => 2,
                    'title' => 'Talk 2',
                    'user' => [
                        'id' => 2,
                        'name' => 'Jane Doe',
                    ]
                ],
            ]
        ],
        [
            'id' => 2,
            'title' => 'Conference 2025',
            'talks' => [
                [
                    'id' => 3,
                    'title' => 'Talk 1 2025',
                    'user' => [
                        'id' => 1,
                        'name' => 'John Doe',
                    ]
                ],
                [
                    'id' => 4,
                    'title' => 'Talk 2 2025',
                    'user' => [
                        'id' => 2,
                        'name' => 'Jane Doe',
                    ]
                ],
            ]
        ]
    ];

    return view('conferences.show', [
        'conference' => Arr::first($conferences, fn($conference) => $conference['id'] == $id),
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
