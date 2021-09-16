@extends('layouts.app')

@section('content')
<div class="container">
    <div class="hello-container">
        <h1>Welcome in Boolpress</h1>
        <div class="home-buttons">
            <div class="custom-button"><a href="/form"><i class="fas fa-pencil-alt"></i> New post</a></div>
            <div class="custom-button"><a href="/posts"><i class="far fa-list-alt"></i> Posts List</a></div>
        </div>
    </div>
</div>
@endsection