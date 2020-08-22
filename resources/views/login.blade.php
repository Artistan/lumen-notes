@extends('layouts.app')

@section('title')
    Welcome
@endsection

@section('content')

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <i id="icon" class="fad fa-login"></i>
            </div>

            <!-- Login Form -->
            <form action="/authenticate" method="post">
                <input type="text" id="email" class="fadeIn second" name="email" placeholder="email" value="{{ env('TEST_EMAIL','') }}">
                <input type="text" id="password" class="fadeIn third" name="password" placeholder="password" value="{{ env('TEST_PASSWORD','') }}">
                <button type="submit" class="fadeIn fourth">
                    <i class="fad fa-sign-in-alt"></i> Log In
                </button>
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>

@endsection
