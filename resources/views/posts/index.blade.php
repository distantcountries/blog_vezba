
@extends('layouts.master')

@section('title', 'List of posts')

@section('content')

{{-- logout code --}}
@if(Auth::check())
    <p> 
        {{ Auth()->user()->name }}
    </p>
    <a class="nav-link ml-auto" href="/logout" style="color:red; float:right;">
        Logout
    </a>
@endif
{{-- --- --}}


    <ul>
        @foreach ($posts as $post)
            <li>
                {{ $post->title }}
            </li>
        @endforeach
    </ul>

    <a href="/posts/create">Create post</a>

@endsection