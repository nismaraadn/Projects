<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function index()
    {
        return view("sesi.index");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Input Your Email',
            'email.email' => 'Please enter a valid email address',
            'password.required' => 'Input Your Password'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            switch ($user->role) {
                case 'petugas gudang':
                    return redirect()->route('new-dashboard')->with('success', 'Login Success');
                case 'produksi':
                    return redirect()->route('new-dashboard-prod')->with('success', 'Login Success');
                case 'qc':
                    return redirect()->route('new-dashboard-qc')->with('success', 'Login Success');
                case 'sales':
                    return redirect()->route('new-dashboard-sales')->with('success', 'Login Success');
               
            }
        }

        return redirect()->route('login.form')
            ->withInput($request->only('email'))
            ->withErrors(['login' => 'Email and Password are Invalid.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form')->with('success', 'Logout Success');
    }
}