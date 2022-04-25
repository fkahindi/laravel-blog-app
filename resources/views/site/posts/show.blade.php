@extends('site.layouts.app')
@section('title'){{ $pageTitle }} @endsection
@section('content')
    <div class="container">
        <div class="row">
            <h1 class="display-one">{{ $post->title }}</h1>
            <div class="col-12 pt-2">
                {{ $post->body }}

            </div>
        </div>
    </div>
@endsection
