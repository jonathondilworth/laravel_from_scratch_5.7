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

// Route::get('/', function() {
//   return view('welcome', [
//     'tasks' => [
//       'Finish Up Work',
//       'E-mail University',
//       'Construct Shelves',
//     ],
//   ]);
// });

// A clean, albiet: magical, approach:

Route::get('/', function() {

  // AFAI-understand, ->with<CamelCaseName>() is parsed and 'CamelCaseName'
  // is passed to the view as a variable containing whatever included parameter.

  // return view('welcome')->withTasks([
  //   'Finish up task for work.',
  //   'E-mail the university timetale.',
  //   'Consultation for Chris.',
  // ]);

  // another way of doing this would be to simply use with, this (to me) is more intuitive
  // (and doesn't require any diving into the source to really know whats happening)

  return view('welcome')->with([
    'title' => 'Hello World',
    'someVariable' => 'value',
    'tasks' => [
      'Finish up task for work.',
      'E-mail the university timetale.',
      'Consultation for Chris.',
    ],
  ]);

});

Route::get('/contact', function() {
  return view('contact');
});

Route::get('/about', function() {
  return view('about');
});

