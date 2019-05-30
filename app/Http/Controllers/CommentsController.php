<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CommentsController extends Controller
{
    public function store($postId) 
    {
        $post = Post::find($postId);
        $post->comments()->create(request()->all());
        return redirect()->route('single-posts',['id' => $postId]);
    }
}
