@extends('layouts.app')

@section('content')
    <div class="container posts-container rounded">
        <div class="button-container">
            <div class="custom-button"><a href="/"><i class="fas fa-home"></i> Home</a></div>
            @if (Auth::check())
                <div class="custom-button"><a href="/form"><i class="fas fa-pencil-alt"></i> New</a></div>
            @endif
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
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td class="user-row"><img src="{{ $post->user_img }}"
                                alt="Profile picture of {{ $post->user_img }}" />
                            <div class="user-name">{{ $post->user_name }}</div>
                        </td>
                        <td>{{ $post->post_txt }}</td>
                        <td><img src="{{ $post->post_img }}" alt="{{ $post->post_img }}'s picture" /></td>
                        <td>{{ $post->post_date }}</td>
                        <td class="actions">
                            <a href="{{ route('posts.show', $post) }}">
                                <button class="info"><i class="fas fa-info-circle"></i></button>
                            </a>
                            @if (Auth::check())
                                <a href="{{ route('posts.edit', $post) }}">
                                    <button class="mod"><i class="fas fa-wrench"></i></button>
                                </a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <!-- TRIGGER -->
                                    <button type="button" class="destroy" data-toggle="modal"
                                        data-target="#modal-{{ $post->id }}">
                                        <i class=" fas fa-trash-alt"></i>
                                    </button>

                                    <!-- MODAL -->
                                    <div class="modal fade" id="modal-{{ $post->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete a post</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-msg">
                                                        <span>Are you sure you want to delete the selected post?</span>
                                                        <span>Beware: The action is irreversible</span>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="back" data-dismiss="modal"><i
                                                            class="fas fa-undo"></i> Cancel</button>
                                                    <button type="subimt" class="destroy"><i
                                                            class=" fas fa-skull-crossbones"></i>
                                                        Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
