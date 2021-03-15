<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //construct is added for preventing a login user to access this page , cause you wont 
    //need to login again
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {   

        return view('auth.login');
    }

    public function store(Request $request)
    {
        //dd($request->remember);           
        
        //validation
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',

        ]); 
        
        if (!Auth::attempt($request->only('email','password'), $request->remember )){
            return back()->with('status', 'Invalid login details');
        }
        //auth()->Auth::attempt($request->only('email','password'));

        return redirect()->route('dashboard');
    }
}
