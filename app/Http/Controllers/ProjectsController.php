<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
  //
  public function index()
  {
    // return "Hello Projects";
    // $projects = Project::all();
    // foreach ($projects as $project) {
    //   echo $project->title;
    //   echo "\n";
    // }
    // return Project::all();

    // Generate a new project

    // note: can't do this unless mass assignment is set to allowed on a model..
    // $newProject = new Project([
    //   'title' => rand(0, 10),
    //   'description' => rand(0, 100),
    // ]);

    // $newProject = new Project();
    // $newProject->title = rand(0, 10);
    // $newProject->description = rand(0, 100);

    // if($newProject->save()) {
    //   echo "added another project to the list...";
    // } else {
    //   echo "something went wrong...";
    // }

    return view('project', [
      'projects' => Project::all(),
    ]);
  }

  public function show($projectId)
  {
    // I would imagine that you would want to encapsulate and inject the try/catch
    // plus maybe a transaction wrapper as a 'middleware' if I understand the concept
    // correctly..?
    // try
    // {
    $readableProject = Project::all(['id' => $projectId]);
    // }
    return $readableProject;

  }

  public function store()
  {
    $newProject = new Project();
    $newProject->title = request('title');
    $newProject->description = request('description');
    if ($newProject->save()) {
      return redirect('/projects');
    } else {
      return "something went horribly wrong!";
    }
    // return request()->all();
  }

  public function create()
  {
    return view('projects.create');
  }

  public function edit($projectId)
  {
    
  }

  public function update()
  {
    return "finish this later";
  }

  public function destroy()
  {
    return "finish this later";   
  }

}