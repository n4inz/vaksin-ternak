<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class VaksinatorController extends Controller
{
    public function index()
    {
        $user = User::query()->orderBy('id','desc')->get();
        // return $user;
        return Inertia::render('Vaksinator/User',[
            'users' => $user
        ]);
    }


    public function addVaksinator()
    {
       
       
        return Inertia::render('Vaksinator/UserAdd');
    }

    public function storeVaksinator(Request $request)
    {
        $request->validate([
            'name' => 'required',
            
            'email' => 'required|unique:users,email',
            'password' => 'required|min:3',
        ]);
        $user = User::create([
            'name' => $request->name,
            
            'email' => $request->email,
          
            'password' => Hash::make($request->password),
        ]);

        
        $user->assignRole('vaksinator');


        
        return Redirect::route('vaksinator')->with('success', 'Data berhasil disimpan!');
        
    }

    public function deleteVaksinator(Request $request , User $id)
    {
        $id->delete();
        // return Redirect::route('vaksinator.add')->with('success', 'Data berhasil disimpan!');

    }
}
