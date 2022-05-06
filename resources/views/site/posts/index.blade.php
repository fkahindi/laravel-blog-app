@extends('site.layouts.app')
@section('title'){{ $pageTitle }} @endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{ $pageTitle }}</h1></div>
                    <div class="card-title"><h2>{{  $subTitle }}</h2></div>
                    <div class="card-body">
                        @forelse ( $posts as $post )
                            <h4><a href="./post/{{ $post->id }}" class="text-secondary">{{ $post->title }}</a></h4>
                            <p>{{ substr($post->body, 0, 200) }}</p>
                        @empty
                            <p class="text-warning">No blog Posts available</p>
                        @endforelse
                    </div>
                    <div class="card-footer">{{ $posts->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
