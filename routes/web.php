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


Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/contact', 'PagesController@contact');


// Route::get('/', function() {
//   return view('welcome')->with([
//     'tasks' => [
//       'Finish up task for work.',
//       'E-mail the university timetale.',
//       'Consultation for Chris.',
//     ],
//   ]);
// });

// Route::get('/contact', function() {
//   return view('contact');
// });

// Route::get('/about', function() {
//   return view('about');
// });

