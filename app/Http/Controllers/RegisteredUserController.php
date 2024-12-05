<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        // validate
        $validatedAttributes = request()->validate([
            'fullName' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(5), 'confirmed'],
        ]);
        // create user
        $user = User::create($validatedAttributes);
        // log in
        Auth::login($user);
        // redirect
        return redirect('/jobs');
    }
}
