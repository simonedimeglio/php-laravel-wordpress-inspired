@extends('layouts.app')

@section('content')
<div class="container posts-container rounded">
    <div class="button-container">
        <div class="custom-button"><a href="/"><i class="fas fa-home"></i> Home</a></div>
        <div class="custom-button"><a href="/form"><i class="fas fa-pencil-alt"></i> New</a></div>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><i class="fas fa-sort-numeric-down"></i></th>
                <th scope="col"><i class="fas fa-address-card"></i> User</th>
                <th scope="col"><i class="fas fa-file-alt"></i> Post Content</th>
                <th scope="col"><i class="fas fa-image"></i></th>
                <th scope="col"><i class="fas fa-calendar-minus"></i></th>
                <th scope="col"><i class="far fa-hand-pointer"></i></th>

            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td class="user-row"><img src="{{$post->user_img}}" alt="Profile picture of {{$post->user_img}}" /><div class="user-name">{{$post->user_name}}</div></td>
                <td>{{$post->post_txt}}</td>
                <td><img src="{{$post->post_img}}" alt="{{$post->post_img}}'s picture" /></td>
                <td>{{$post->post_date}}</td>
                <td class="actions"><a href="{{ route('posts.show', $post) }}"><i class="fas fa-info-circle"></i><i class="fas fa-wrench"></i><i class="fas fa-times-circle"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection