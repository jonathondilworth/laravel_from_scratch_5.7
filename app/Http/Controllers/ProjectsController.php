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

    $newProject = new Project();
    $newProject->title = rand(0, 10);
    $newProject->description = rand(0, 100);

    if($newProject->save()) {
      echo "added another project to the list...";
    } else {
      echo "something went wrong...";
    }

    return view('project', [
      'projects' => Project::all(),
    ]);
  }
}