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
            <div class="col-md-2 pt-2 pb-2"></div>
            <div class="col-md-8 pt-2 pb-2">
                <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
                {!! $post->body !!}
            </div>
            <div class="col-md-2 pt-2 pb-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2 pt-2 pb-2"></div>
            <div class="col-md-8 pt-2 pb-2">

                <hr>
                <h4>Comments</h4>
                @include('site.layouts.partials._comment_replies',['comments'=>$post->comments, 'post_id'=>$post->id])
                <hr>
                <h5>Add Comment</h5>
                    <form method="post" action="{{ route('comment.add') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="3" placeholder="Type comment here..." required></textarea>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-dark my-2" value="Add Comment" />
                        </div>
                    </form>
            </div>
            <div class="col-md-2 pt-2 pb-2"></div>
        </div>
    </div>
@endsection
