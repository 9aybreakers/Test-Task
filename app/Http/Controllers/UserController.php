<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function loginForm()
    {
        return view('user.login');
    }

    public function login(LoginRequest $request)
    {

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]))
        {
            session()->flash('success', 'You are logged in');
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('home');
            }
        } else {
            session()->flash('error', 'Incorrect login or password');
            return redirect()->back();
        }
    }
}
