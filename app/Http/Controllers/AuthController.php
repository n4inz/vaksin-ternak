<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function index()
    {
        // $user = User::create([
        //     'name' => 'admin',
            
        //     'email' => 'admin@gmail.com',
          
        //     'password' => Hash::make(123456),
        // ]);

        
        // $user->assignRole('admin');
        return Inertia::render('auth/login');
    }


    public function loginStore(Request $request)
    {
        
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            
            
            return Inertia::location('/dashboard');

        }
        
        return redirect()->back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        // Redirect to the desired page after logout
        return redirect('/');
    }
}
