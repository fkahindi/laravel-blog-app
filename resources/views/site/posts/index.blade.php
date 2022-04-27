@extends('site.layouts.app')
@section('title'){{ $pageTitle }} @endsection
@section('content')
    <div class="container">
        <div class="row">
            <h1 class="display-one">{{ $pageTitle }}</h1><hr/>
            <div class="col-12 pt-2">
                <h4>{{  $subTitle }}</h4>
                @forelse($posts as $post)
                    <ul>
                        <li><a href="./post/{{ $post->id }}">{{ ucfirst($post->title) }}</a></li>
                    </ul>
                @empty
                    <p class="text-warning">No blog Posts available</p>
                @endforelse
                <div class="d-flex">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
