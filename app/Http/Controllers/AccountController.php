<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AccountController extends Controller
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

        session()->flash("error", "account.email_or_password_incorrect");

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

    public function profile() {
        return view("accounts.profile");
    }

    public function edit_profile(Request $request) {
        return redirect()->refresh();
    }
}
