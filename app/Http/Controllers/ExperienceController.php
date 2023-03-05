<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\ExperienceFunction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

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
        Gate::authorize("perform-admin-task", auth()->user());

        $request->validate([
            "companyName" => "required",
            "functions.*.id" => "required",
            "functions.*.function_title" => "required",
            "functions.*.start_date" => [ "required", "date" ],
            "functions.*.end_date" => [ "nullable", "date" ]
        ]);

        $experience = new Experience;
        $experience->company_name = $request->companyName;
        $experience->company_website = $request->companyWebsite;
        $experience->save();

        foreach ($request->functions as $requestFunction) {
            $function = new ExperienceFunction;
            $function->experience_id = $experience->id;
            $function->function_title = $requestFunction["function_title"];
            $function->description = $requestFunction["description"];
            $function->start_date = $requestFunction["start_date"];
            $function->end_date = $requestFunction["end_date"];
            $function->save();
        }

        return redirect()->route("experience.index");
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
        Gate::authorize("perform-admin-task", auth()->user());

        $request->validate([
            "companyName" => "required",
            "functions.*.id" => "required",
            "functions.*.function_title" => "required",
            "functions.*.start_date" => [ "required", "date" ],
            "functions.*.end_date" => [ "nullable", "date" ]
        ]);

        $experience = Experience::find($id);
        $experience->company_name = $request->companyName;
        $experience->company_website = $request->companyWebsite;
        $experience->update();

        foreach ($request->functions as $requestFunction) {
            $function = ExperienceFunction::find($requestFunction["id"]);
            $function->experience_id = $experience->id;
            $function->function_title = $requestFunction["function_title"];
            $function->description = $requestFunction["description"];
            $function->start_date = $requestFunction["start_date"];
            $function->end_date = $requestFunction["end_date"];
            $function->update();
        }

        return redirect()->route("experience.index");
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

        return redirect()->back();
    }
}
