@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> -->

            <!-- <div class="card-container"> -->
                @foreach($allPosts as $post)
                <div class="card">
                    <div class="user">
                        <img class="user-img" src="{{ $post->user_img }}" alt="{{$post->user_name}}'s profile picture" />
                        <span class="user-name">{{$post->user_name}}</span>
                    </div>
                    <div class="content">
                        <p class="post-txt">{{$post->post_txt}}</p>
                        <img class="post-img" src="{{ $post->post_img }}" alt="{{$post->user_name}}'s post picture" />
                        <h6 class="date"><i>Posted in date: {{ $post->post_date }}</i></h6>
                    </div>
                </div>
                @endforeach
            <!-- </div> -->

        </div>
    </div>
</div>
@endsection