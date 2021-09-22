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

            {{-- POST CONTENT --}}
            <div class="form-title">
                <i class="fas fa-scroll"></i>
                <span>New Post</span>
            </div>
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

            {{-- POST DETAIL --}}
            <div class="form-title user-form">
                <i class="fas fa-asterisk"></i>
                <span>Post Details</span>
            </div>
            <label for="platform"><i class="fas fa-share-alt"></i> Platform</label>
            <input type="text" name="platform" id="platform">

            <label for="tag"><i class="fas fa-tag"></i> Tag</label>
            <input type="text" name="tag" id="tag">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="category_id">Category</label>
                </div>
                <select class="custom-select" id="category_id" name="category_id">
                    <option selected>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- USER DETAIL --}}
            <div class="form-title user-form">
                <i class="fas fa-user-secret"></i>
                <span>User Details</span>
            </div>
            <label for="name"><i class="fas fa-signature"></i> Name and Surname</label>
            <input type="text" name="user_name" id="user_name">

            <label for="name"><i class="fas fa-globe-americas"></i> Country</label>
            <input type="text" name="user_name" id="user_name">

            <label for="name"><i class="fas fa-at"></i> Mail</label>
            <input type="text" name="user_name" id="user_name">

            <label for="name"><i class="fas fa-phone"></i> Phone</label>
            <input type="text" name="user_name" id="user_name">

            <input class="submit-button" type="submit" value="Submit">
        </form>
    </div>
@endsection
