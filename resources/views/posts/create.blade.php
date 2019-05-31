@extends('layouts.master')

@section('title')
    Create new post
@endsection

@section('content')
    <h2 class="blog-post-title">Create new post</h2><br>

<form method="POST" action="{{ route('store-post') }}">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" />
        @include('partials.error-message' , ['fieldTitle' => 'title'])
    </div>

    <div class="form-group">
        <label for="body">Body</label>
        <input type="text" class="form-control" id="body" name="body" />
    </div>

<div class="form-group">
    <label for="published">Published</label>
    <input type="checkbox"  
            id="published" 
            name="published" 
            value="1" 
            style="height: 25px;
                    width: 25px;
                    background-color: #eee;
                    margin-left: 0.3rem;" />
    @include('partials.error-message' , ['fieldTitle' => 'body'])
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
            onmouseout="this.style.background='#ccd9ff'"> Submit post </button>
</div>

</form>

@endsection