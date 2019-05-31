
@extends('layouts.master')

@section('title', 'List of posts')

@section('content')

    {{-- logout code --}}
    @if(Auth::check())
        <p style="font-weight: bold;"> 
            {{ Auth()->user()->name }}  is logged in!
        </p>
    @endif
    {{-- --- --}}

    <div style="display: block;">
        <a href="/posts/create" 
            style="
                    background-color: #990033;
                    color: white;
                    padding: 14px 25px;
                    text-align: center;
                    text-decoration: none;
                    display: block;
                    border-radius: 0.5rem;"
            onmouseover="this.style.background='#cc0044'"
            onmouseout="this.style.background='#990033'">Create post</a>
       {{--  <p style="font-weight: bold; color:red; float: right;">Please login first!</p> --}}
    </div><br>

    <ul>
        @foreach ($posts as $post)
            <li>
                <a style="color:#990033; font-weight: bold;" 
                    href="{{ route('single-post', ['id' => $post->id]) }}"> {{ $post->title }} 
                </a>
                {{-- created by: <a href="/users/{{ $post->user_id }}"> {{ $post->user->name }} </a> --}}
            </li>
        @endforeach
    </ul>

    

@endsection