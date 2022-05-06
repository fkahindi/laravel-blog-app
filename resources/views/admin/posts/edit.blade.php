@extends('admin.layouts.app')
@section('title'){{ $pageTitle }}@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="/admin/post/{{ $post->id }}" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="card border rounded mt-3 pl-4 pr-4 pt-4 pb-4">
                    <div class="card-header"><h1>{{ $pageTitle }}</h1></div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="control-group mb-2">
                                    <label for="title" class="mb-1"><strong>Title <span class="m-l-5 text-danger"> *</span></strong></label>
                                    <input type="text" id="title" class="form-control" name="title"
                                        placeholder="Enter Post Title" value="{{ $post->title }}" required>
                                </div>
                                <div class="control-group mb-2">
                                    <label for="description" class="mb-1"><strong>Post Description</strong></label>
                                    <input type="text" id="description" class="form-control" name="description"
                                        placeholder="Type description" value="{{ $post->description }}">
                                </div>
                                <div class="control-group mb-2">
                                    <label for="keywords" class="mb-1"><strong>Post Keywords</strong></label>
                                    <input type="text" id="mkeywords" class="form-control" name="keywords"
                                        placeholder="Enter keywords" value="{{ $post->keywords }}">
                                </div>
                                <div class="control-group mb-2">
                                    <label for="image" class="mb-1"><strong>Post image</strong></label>
                                    <div class="d-flex">
                                        <input type="file" id="image" class="form-control" name="image" placeholder="Select image">
                                        <div class="col-md-6 pl-2 text-center">
                                            <img src="{{ /* asset('images/profile.png') */$post->image }}" height="40" width="40" alt="post image">
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group mb-2">
                                    <label for="image_caption" class="mb-1"><strong>Image caption</strong></label>
                                    <input type="text" id="image_caption" class="form-control" name="image_caption" placeholder="Type image caption" value="{{ $post->image_caption }}">
                                </div>
                                <div class="control-group mb-2">
                                    <label for="body" class="mb-1"><strong>Post Body <span class="m-l-5 text-danger"> *</span></strong></label>
                                    <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body"
                                            rows="5" required>{{ $post->body }}</textarea>
                                </div>
                                <div class="control-group mb-2">
                                    <label for="topic_id" class="mb-1"><strong>Topic <span class="m-l-5 text-danger"> *</span></strong></label>
                                    <select id="topic_id" class="form-control" name="topic_id" required>
                                        <option value="{{ $post->topic_id }}">{{ $edit_topic }}</option>
                                        @foreach ($topics as $topic )
                                            <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                                        @endforeach

                                    </select>
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="id" value="{{ $post->id }}">
                                </div>
                            </div>
                            <div class="control-group text-end">
                                <button type="submit" id="btn-submit" class="btn btn-success">
                                    Update Post
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
