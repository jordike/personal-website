<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        return view("admin.accounts.create");
    }

    public function create_account(Request $request) {
        $request->validate([
            "email" => "email|unique:users|required",
            "password" => "min:4|required"
        ]);

        $account = new User;
        $account->name = $request->email;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $account->first_name = $request->firstName;
        $account->surname = $request->surname;
        $account->phone_number = $request->phoneNumber;
        $account->save();

        return redirect()
            ->refresh()
            ->with("message", "account.created");
    }
}
