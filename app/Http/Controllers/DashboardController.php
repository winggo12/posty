<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {   
        // If we have signed in , the auth->user will return a user object
        //dd(auth()->user());
    
        return view('dashboard');
    }
}
