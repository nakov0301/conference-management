<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/test', function () {
//   return 'Testing';
//});

//Route::get('/test', function () {
//   return [
//       [
//           'id' => 1,
//           'title' => 'Conference 2024'
//       ],
//       [
//           'id' => 2,
//           'title' => 'Conference 2025'
//       ]
//   ];
//});
