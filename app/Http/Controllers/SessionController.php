<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        // validate
        $validatedAttributes = request()->validate([
            'no_pekerja' => ['required'],
            'password' => ['required']
        ]);
        // attempt login
        if (! Auth::attempt($validatedAttributes)) {
            throw ValidationException::withMessages([
                'no_pekerja' => 'Incorrect',
                'password' => 'Incorrect'
            ]);
        }
        // regenerate session token
        request()->session()->regenerate(); // prevent Session Hijacking
        // redirect
        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
