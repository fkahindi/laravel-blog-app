@extends('site.layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('title'){{ $pageTitle }} @endsection
@section('content')
    <div class="container">
        <div class="row">
            <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
            <div class="col-12 pt-2 pb-2">
                {!! $post->body !!}
            </div>
        </div><hr>
        <h4>Comments</h4>
        <hr>
        @include('site.layouts.partials._comment_replies',['comments'=>$post->comments, 'post_id'=>$post->id])
        <hr>
            <form method="post" action="{{ route('comment.add') }}">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="body" required></textarea>
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Add Comment" />
                </div>
            </form>

    </div>

@endsection
