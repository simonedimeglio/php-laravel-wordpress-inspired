@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="button-container">
            <div class="custom-button"><a href="/"><i class="fas fa-home"></i> Home</a></div>
            <div class="custom-button"><a href="/posts"><i class="far fa-list-alt"></i> Posts List</a></div>
        </div>

        {{-- ERRORS ALERT SYSTEM --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('posts.store') }}" method="post">
            @csrf

            <label for="name"><i class="fas fa-user"></i> User Name</label>
            <input type="text" name="user_name" id="user_name">

            <label for="name"><i class="fas fa-portrait"></i> User Img</label>
            <input type="text" name="user_img" id="user_img">

            <label for="name"><i class="fas fa-file-alt"></i> Post Txt</label>
            <input type="text" name="post_txt" id="post_txt">

            <label for="name"><i class="fas fa-file-image"></i> Post Img</label>
            <input type="text" name="post_img" id="post_img">

            <label for="name"><i class="fas fa-calendar-minus"></i> Post Date</label>
            <input type="date" name="post_date" id="post_date">

            <input class="submit-button" type="submit" value="Submit">
        </form>

    </div>
@endsection
