<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Initial sloppy way of doing things
//
// Route::get('/', function () {
//   $tasks = [
//     'Task One',
//     'Task Two',
//     'Task Three',
//   ];
//   return view('welcome', ['tasks' => $tasks]);
// });

// Methodology Two ... Essentially the same, just different whitespace.
//
// Route::get('/', function() {
//   $tasks = ['Finish off work for Gavin', 'e-mail the university', 'construct shelves'];
//   return view('welcome', ['tasks' => $tasks]);
// });

// Compact Methodology

// Route::get('/', function() {
//   $tasks = ['Finish off work for Gavin', 'e-mail the university', 'construct shelves'];
//   return view('welcome', compact('tasks'));
// });

// (supposedly) Readable Methodology, I don't think this is a great way of doing things.
// As it is a nested array, the indentation is a little confusing, esp with larger data structures.

Route::get('/', function() {
  return view('welcome', [
    'tasks' => [
      'Finish Up Work',
      'E-mail University',
      'Construct Shelves',
    ],
  ]);
});

Route::get('/contact', function() {
  return view('contact');
});

Route::get('/about', function() {
  return view('about');
});
