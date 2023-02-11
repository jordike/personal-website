<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            "email" => "email|required",
            "password" => "required"
        ]);

        if (Auth::attempt(["email" => $request->email, "password" => $request->password], $request->rememberMe)) {
            $request->session()->regenerate();

            session()->flash("message", "account.logged_in");

            return redirect()->intended(route("home"));
        }

        session()->flash("error_message", "account.email_or_password_incorrect");

        return redirect()
            ->route("login")
            ->withInput($request->all());
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("home");
    }

    public function edit_profile(Request $request) {
        return redirect()->refresh();
    }
}
