<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signup(Request $request)
    {
        $v = Validator::make($request->all(), [
            'login' => 'required|string|unique:users',
            'email' => 'required|string|email',
            'name'=> 'required|string',
            'number' => 'required|string|min:11|max:11',
            'password' => 'required|string|min:6',
        ]);

        if($v->fails())
        {
            return redirect()->back()->withErrors($v);
        }

        if($request->password != $request->password2)
        {
            return redirect()->back()->withErrors(['error' => 'Пароли не совпадают']);
        }

        $user = User::create([
            'login' => $request->login,
            'email' => $request->email,
            'name'=> $request->name,
            'number' => $request->number,
            'password' => Hash::make($request->password),
            'level' => 'user'
        ]);

        Auth::login($user);

        return redirect('/');
    }
    public function login(Request $request)
    {
        $v = Validator::make($request->all(), [
            'login' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        if($v->fails())
        {
            return redirect()->back()->withErrors($v);
        }

        if(Auth::attempt($request->only('login', 'password'))){
            return redirect('/');
        }else{
            return redirect()->back()->withErrors(['error' => 'Не верный логин или пароль']);
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/login');
    }
}
