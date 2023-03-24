<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\ExperienceFunction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::all();

        return view("experience.index", [
            "experiences" => $experiences
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

        return view("experience.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // This is handled in the Livewire component.
        return redirect()->route("experience.index", [], 301);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->intended(route("home"), 301);
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

        $experience = Experience::find($id);

        return view("experience.edit", [
            "experience" => $experience
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
        // This is handled in the Livewire component.
        return redirect()->route("experience.index", [], 301);
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

        $experience = Experience::find($id);
        $experience->delete();

        return redirect()->route("experience.index");
    }
}
