<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {   
        //return all posts in natural database order , which the 
        //output is a Collection type
        // $posts = Post::get();

        //Select how many you want to display per page
        //This returns a Parginator instead of Collector
        $posts = Post::paginate(20);

        // $posts = Post::where();
        // $posts = Post::find(1);// find by ID
        $posts = Post::with(['user', 'likes'])->paginate(20);

        return view('posts.index', [
            'posts' => $posts

        ] );
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'body' => 'required'
        ]);

        // Post::create([
        //     'user_id' => auth() -> id(),
        //     'body' => $request -> body
        // ]
        // );

        // auth()->user()->posts()->create();

        // $request->user()->posts()->create([
        //     'body' => $request->body
        // ]);

        $request->user()->posts()->create($request->only('body'));
    
        return back();
    }

    public function destroy(Post $post)
    {
        // dd($post);
        $post->delete();
        return back();
    }

}
