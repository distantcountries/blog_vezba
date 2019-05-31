@extends('layouts.master')

@section('content')

    <h2>Login</h2>
    <hr>

    <form method="POST" action="/login">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" />
            @include('partials.error-message' , ['fieldTitle' => 'email'])
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" />
            @include('partials.error-message' , ['fieldTitle' => 'password'])
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
                onmouseout="this.style.background='#ccd9ff'"> Submit </button>
        </div>

    </form>


    @if(count($errors->all()) > 0)

        @foreach ($errors->all() as $error)
            <div class="form-grup">
                <div class="alert alert-danger">
                    <p>
                        {{ $error }}
                    </p>
                </div>
            </div>
        @endforeach
    @endif
       

@endsection