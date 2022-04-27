@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="d-flex w-100 justify-content-between">
                    <a href="/admin/posts" class="btn btn-outline-primary btn-sm">Go back</a>
                <a href="/admin/post/{{ $post->id }}/edit" class="btn btn-outline-primary btn-sm">Edit Post</a>
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm">Delete Post</button>
                </form>
                </div><hr>

                <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
                <p>{!! $post->body !!}</p>


                <br><br>

            </div>
        </div>
    </div>
@endsection
