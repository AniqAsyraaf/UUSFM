<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('Login/Index');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        // dd(bcrypt($credentials['password']));
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // dd('success');
            // dd(auth()->user()->id);
            return redirect()->intended('/home');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
