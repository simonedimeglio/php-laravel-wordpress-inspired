@extends('layouts.app')

@section('content')
<div class="container">
    <div class="hello-container">
        @if(Auth::check())
            <i class="far fa-hand-peace welcome-logo"></i>
            <h1>Hi {{ Auth::user()->name }}. Welcome back!</h1>
            <div class="welcome-txt">It's nice to see you again.</div>
        @else 
            <i class="far fa-handshake welcome-logo"></i>
            <h1>Welcome in Boolpress</h1>
            <div class="welcome-txt">Welcome to the Boolpress post manager. Through authentication you can access the full version which will allow you to add, edit and delete posts, as well as being able to see additional details.</div>
        @endif
        
        <div class="home-buttons">
            @if(Auth::check())
                <div class="custom-button"><a href="/form"><i class="fas fa-pencil-alt"></i> New post</a></div>
            @endif
            <div class="custom-button"><a href="/posts"><i class="far fa-list-alt"></i> Posts List</a></div>
        </div>
    </div>
</div>
@endsection