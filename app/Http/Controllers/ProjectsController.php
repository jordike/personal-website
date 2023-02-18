<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view("projects.index", [
            "projects" => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize("perform-admin-task", auth()->user());

        return view("projects.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize("perform-admin-task", auth()->user());

        $request->validate([
            "name" => [ "required", "max:40" ],
            "description" => [ "required", "min:4", "max:500" ],
        ]);

        $project = new Project;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->programming_languages = $request->programmingLanguages;
        $project->tools = $request->tools;
        $project->links = $request->links;
        $project->save();

        session()->flash("message", "project.created");

        return redirect()->route("projects.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route("projects.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize("perform-admin-task", auth()->user());

        $project = Project::find($id);

        return view("projects.edit", [
            "project" => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize("perform-admin-task", auth()->user());

        $request->validate([
            "name" => [ "required", "max:40" ],
            "description" => [ "required", "min:4", "max:500" ],
        ]);

        $project = Project::find($id);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->programming_languages = $request->programmingLanguages;
        $project->tools = $request->tools;
        $project->links = $request->links;
        $project->update();

        session()->flash("success", "project.updated");

        return redirect()->route("projects.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize("perform-admin-task", auth()->user());

        $project = Project::find($id);
        $project->delete();

        return redirect()->route("projects.index");
    }
}
