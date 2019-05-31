<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\User;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){

        // if (Auth::check()) {
            $posts = Post::published(); 
            return view('posts.index', compact('posts')); 
        // }

        // return redirect('/login'); //ako si ulogovan mozes videti postove, kada se izlogujes vodi te na login stranicu
    }

    public function show($id){
        $post = Post::with('comments')->find($id); 
        \Log::info($post);
        return view('posts.show', compact('post')); 
    }

    public function create() {
        // $user = User::find($user_id);
        if (Auth::check()) {
            return view('posts.create');
        }
        return view('/posts');
    }

    public function store() {
        $this->validate(request(), Post::STORE_RULES);
        // $post = Post::create(request()->all());
        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = auth()->user()->id;
        $post->published = false;

        $post->save();

        return redirect()->route('all-posts');
        
    }
}
