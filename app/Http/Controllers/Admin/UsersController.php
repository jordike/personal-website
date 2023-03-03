<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = User::all();

        return view("admin.users.index", [
            "accounts" => $accounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            "email" => [ "email", "unique:users", "required" ],
            "password" => [ "min:4", "required" ]
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("admin.users.edit", [
            "account" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  User  $user
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $request->validate([
            "id" => "required",
            "email" => [ "email", "required" ],
            "phoneNumber" => [ "nullable" ],
            "password" => [ "nullable", Password::defaults() ],
            "confirmPassword" => [ "same:password" ]
        ]);

        $user->name = $request->email;
        $user->email = $request->email;
        $user->first_name = $request->firstName;
        $user->surname = $request->surname;
        $user->phone_number = $request->phoneNumber;

        if ($request->has("password") && $request->has("confirmPassword") && $request->password === $request->confirmPassword) {
            $user->password = Hash::make($request->password);
        }

        $user->update();

        session()->flash("message", "admin.account-editted");

        return redirect()->route("admin.users.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        session()->flash("message", "admin.accounts.deleted");

        return redirect()->route("admin.users.index");
    }
}
