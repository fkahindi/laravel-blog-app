@extends('layouts.app')
@section('title'){{ $pageTitle }} @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">

                {{-- @forelse($posts as $post)
                    <ul>
                        <li><a href="./post/{{ $post->id }}">{{ ucfirst($post->title) }}</a></li>
                    </ul>
                @empty --}}
                    <p class="text-warning">No blog Posts available</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
