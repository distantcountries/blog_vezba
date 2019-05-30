<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use App\Post;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){

        if (Auth::check()) {
            $posts = Post::published(); 
            return view('posts.index', compact('posts')); 
        }

        return redirect('/login'); //ako si ulogovan mozes videti postove, kada se izlogujes vodi te na login stranicu
    }

    public function show($id){
        $post = Post::with('comments')->find($id); 
        \Log::info($post);
        return view('posts.show', compact('post')); 
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        $this->validate(request(), Post::STORE_RULES);
        $post = Post::create(request()->all());


        return redirect()->route('all-posts');
    }
}
