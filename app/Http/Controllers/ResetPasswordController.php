<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as RulesPassword;

class ResetPasswordController extends Controller
{
    public function showForm()
    {
        return view("reset-password.request-form");
    }

    public function sendLink(Request $request)
    {
        $request->validate([
            "email" => [ "required", "email" ]
        ]);

        $status = Password::sendResetLink($request->only("email"));

        if ($status == Password::RESET_LINK_SENT) {
            return redirect()->back()->with("success", __($status));
        } else {
            return redirect()->back()->withErrors([
                "email" => __($status)
            ]);
        }
    }

    public function choosePassword($token)
    {
        return view("reset-password.reset-form", [
            "token" => $token
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            "token" => "required",
            "email" => [ "required", "email" ],
            "password" => [ "required", "confirmed", RulesPassword::defaults() ]
        ]);

        $status = Password::reset($request->only("token", "email", "password", "password_confirmation"), function(User $user, string $password) {
            $user->forceFill([
                "password" => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        });

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route("login")->with("success", __($status));
        } else {
            return redirect()->back()->withErrors([
                "email" => __($status)
            ]);
        }
    }
}
