@extends('layouts.master')

@section('content')
    <h1>User: {{ $user->name }}</h1>

    @foreach($user->posts as $post)

        <div class="blog-post">
            <h2 class="blog-post-title"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>

            <p>{{ $post->body }}</p>
        </div>

    @endforeach

@endsection
