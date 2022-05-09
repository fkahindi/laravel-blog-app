@extends('admin.layouts.app')
@section('title'){{ $pageTitle }} @endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="/admin/posts" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="card border rounded mt-3 pl-4 pr-4 pt-4 pb-4">
                    <div class="card-header"><h1>{{ $pageTitle }}</h1></div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="control-group mb-2">
                                <label for="title">Post Title <span class="m-l-5 text-danger"> *</span></label>
                                <input type="text" id="title" class="form-control" name="title"
                                    placeholder="Enter Post Title" required>
                            </div>
                            <div class="control-group mb-2">
                                <label for="description">Post Description</label>
                                <input type="text" id="description" class="form-control" name="description"
                                    placeholder="Type description">
                            </div>
                            <div class="control-group mb-2">
                                <label for="keywords">Post Keywords</label>
                                <input type="text" id="keywords" class="form-control" name="keywords"
                                    placeholder="Enter keywords">
                            </div>
                            <div class="control-group mb-2">
                                <label for="image">Post image</label>
                                <input type="file" id="image" class="form-control" name="image" placeholder="Select image">
                            </div>
                            <div class="control-group mb-2">
                                <label for="image_caption">Image caption</label>
                                <input type="text" id="image_caption" class="form-control" name="image_caption" placeholder="Type image caption">
                            </div>
                            <div class="control-group mt-2">
                                <label for="body">Post Body <span class="m-l-5 text-danger"> *</span></label>
                                <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body"
                                        rows="" required></textarea>
                            </div>
                            <div class="control-group mb-2">
                                <label for="topic_id">Topic <span class="m-l-5 text-danger"> *</span></label>
                                <select type="text" id="topic_id" class="form-control" name="topic_id" required>
                                    <option value="0">Select topic</option>
                                    @foreach ($topics as $topic )
                                        <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="user_id" value="1">
                                <input type="hidden" name="url" value="{{ url()->previous() }}">
                            </div>
                            <div class="control-group text-end">
                                <button id="btn-submit" class="btn btn-success">
                                    Create Post
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
