<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function signup(Request $request)
    {

    }
    public function login(Request $request)
    {

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
