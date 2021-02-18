<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth ;

class RegisterController extends Controller 
{
    public function index(){    
        
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //dd will die dump, kill the page and only show the string 
        // dd('abc');
        // dd($request->get('email'));
        // dd($request->email);
        //dd($request->only('email', 'password'));

        //validation
        $this->validate($request, [
            // 'name' => ['required', 'max:255']
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',

        ]); 
        
        //store user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        //sign the user in
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password'=> $request->password,
        // ]);
        Auth::attempt($request->only('email', 'password'));
        //auth()->attempt($request->only('email', 'password'));

        //redirect
        return redirect()->route('dashboard');

    }


}
