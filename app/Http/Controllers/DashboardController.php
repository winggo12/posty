<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
            $this->middleware(['auth']);
    }
    public function index()
    {   
        // If we have signed in , the auth->user will return a user object
        //dd(auth()->user());
        
        //dd(auth()->user()->posts);
        
        //Return a Carbon Object , third party Data Time Library for php
        // dd(Post::find(2)->created_at);
        
        return view('dashboard');
    }
}
