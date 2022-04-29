@extends('site.layouts.app')
@section('title'){{ $pageTitle }} @endsection
@section('content')
    <div class="container">
        <div class="row">
            <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
            <div class="col-12 pt-2 pb-2">
                {!! $post->body !!}
            </div>
        </div><hr>
        <h4>Display comments</h4>
        <hr>
        @include('site.posts.commentsDisplay',['comments'=> $post->comments,'post_id'=>$post->id])
            <form method="post" action="{{ route('comments.store') }}">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="body" required></textarea>
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Add Comment" />
                </div>
            </form>
        {{-- <div class="row mt-2">
            <div class="col-12"><hr>
                <div class="comments-area" id="comments-area">
                    @foreach ($comments as $comment )
                        <div class="d-flex" id="{{ $comment->id }}">
                            <img src="{{ asset('images/profile.png') }}" height="30" alt="user pic">
                            <p>{{ $comment->body }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}
    </div>
    {{-- <script src="{{ asset('/js/ajax/jquery-3.4.0.min.js') }}"></script>
    <script src="{{ asset('/js/ajax/post-comment.js') }}"></script> --}}
@endsection
