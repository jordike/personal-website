<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function dashboard() {
        $experiences = Experience::all();
        $projects = Project::all();

        return view("admin.dashboard", [
            "experiences" => $experiences,
            "projects" => $projects
        ]);
    }
}
