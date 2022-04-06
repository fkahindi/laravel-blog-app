@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Topics</h1>
                    </div>
                    <div class="col-4">
                        <p>Create new Topic</p>
                        <a href="/admin/topic/create/topic" class="btn btn-primary btn-sm">Add Topic</a>
                    </div>
                </div>
                @forelse($topics as $topic)
                    <ul>
                        <li><a href="./topic/{{ $topic->id }}">{{ ucfirst($topic->name) }}</a></li>
                    </ul>
                @empty
                    <p class="text-warning">No Topics available</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
