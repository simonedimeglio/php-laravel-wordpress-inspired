@extends('layouts.app')

@section('content')
<div class="container posts-container rounded">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><i class="fas fa-sort-numeric-down"></i></th>
                <th scope="col"><i class="fas fa-address-card"></i> User</th>
                <th scope="col"><i class="fas fa-file-alt"></i> Post Content</th>
                <th scope="col"><i class="fas fa-image"></i></th>
                <th scope="col"><i class="fas fa-calendar-minus"></i></th>
                <th scope="col"><i class="fas fa-info"></i></th>

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
                <td><a href="{{ route('posts.show', $post) }}"><i class="fas fa-info-circle"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection