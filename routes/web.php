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

Route::get('/', function() {
  return view('welcome', [
    'tasks' => [],
  ]);
});

// Handling 'Projects'

/*
  GET /projects (index)
  GET /projects/create (create)
  GET /projects/{project} (show)
  POST /projects (store)
  GET /projects/{project}/edit (edit)
  PATCH /projects/{project} (update)
  DELETE /projects/{project} (destory) 
*/

// Route::get('/projects', 'ProjectsController@index');

// Route::get('/projects/create', 'ProjectsController@create');

// Route::post('/projects', 'ProjectsController@store');

// Route::get('/projects/{project}', 'ProjectsController@show');

// Route::patch('/projects/{project}', 'ProjectsController@update');

// Route::get('/projects/{project}/edit', 'ProjectsController@edit');

// Route::get('/projects/delete', 'ProjectsController@destory');

// This is the same as:

Route::resource('projects', 'ProjectsController');