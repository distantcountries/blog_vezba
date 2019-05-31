

@extends('layouts.master')

@section('title', $post->title)


@section('content')

    <h1>
        {{ $post->title }}<br>
        {{-- created by: <a href="/users/{{ $post->user_id }}"> {{ $post->user->name }} </a> --}}
    </h1>
    
    <p>
        {{ $post->body }}
    </p>

    @if(count($post->comments))
        <div style="background-color: #efeff5; padding: 2rem; border-radius: 2rem; margin: 2rem 0;">
            <h4 style="color:#400000"> Comments </h4><hr>
                <ul>
                    @foreach ($post->comments as $comment)
                        <li>
                            <p style="font-style: italic;">
                                <a href="{{ route('single-user', ['id' => $comment->id]) }}" > {{ $comment->author }} </a>
                            </p>

                            <p>
                                {{ $comment->text }}
                            </p>
                            
                        </li>
                    @endforeach  
                </ul>
        </div>
    @endif

    
    <div style="background-color: #e0ebeb; padding: 2rem; border-radius: 2rem; margin-bottom: 2rem;">
        <h4>Post a comment</h4><hr>
            <form method="POST" action="{{ route('comments-post', 
                    ['post_id' => $post->id]) }}">
                @csrf

                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" id="author" name="author" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="text">Text</label>
                    <textarea class="form-control" id="text" name="text" rows="4" cols="50"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit"
                    style="
                        width: 100%;
                        background-color: #ccd9ff;
                        padding: 14px 20px;
                        margin: 8px 0;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;"
                    onmouseover="this.style.background='#cce6ff'"
                    onmouseout="this.style.background='#ccd9ff'">Submit</button>
                </div>
            </form>
        </div>

@endsection