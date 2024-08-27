<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registration(){
        return view('auth.registration');
    }
    public function login(){
        return view('auth.login');
    }
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->regenerate();
            if($user->role == 'user'){
                $products = Bus::all();
                return view('user.index');

            }
            else if($user->role == 'admin'){
                $categories = Reserve::paginate(10);
                return view('admin.index');
            }
        }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}