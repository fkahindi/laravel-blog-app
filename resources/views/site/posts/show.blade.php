@extends('site.layouts.app')
@section('title'){{ $pageTitle }} @endsection
@section('content')
    <div class="container">
        <div class="row">
            <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
            <div class="col-12 pt-2 pb-2">
                {!! $post->body !!}

            </div> <hr>
        </div>
        <form data-action="{{ route('comments.store') }}" method="POST" id="post-comment-form">
            <div class="row">
                <div class="control-group col-12 mt-4">
                    <input type="hidden" name="user_id" id="user_id" @auth()
                        value="{{ $user_id}}"
                    @endauth>
                    <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                    @csrf
                    <label for="comment"><h5>Comment:</h5></label>
                    <textarea id="comment" class="form-control" name="comment" placeholder="Comment here" rows="5" required></textarea>
                </div>
            </div>
            <div class="row mt-2">
                <div class="control-group col-12 text-center">
                    <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                </div>
            </div>
        </form>
        <div class="row mt-2">
            <div class="col-12"><hr>
                <div class="comment-area" id="comment-area">
                    @foreach ($comments as $comment )
                        <div class="d-flex" id="{{ $comment->id }}">
                            <img src="{{ asset('images/profile.png') }}" height="30" alt="user pic">
                            <p>{{ $comment->body }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
