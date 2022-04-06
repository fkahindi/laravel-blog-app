@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/admin/topics" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one">{{ ucfirst($topic->name) }}</h1>
                <p>{!! $topic->description !!}</p>
                <hr>
                <a href="/admin/topic/{{ $topic->id }}/edit" class="btn btn-outline-primary">Edit Topic</a>
                <br><br>
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Topic</button>
                </form>
            </div>
        </div>
    </div>
@endsection
