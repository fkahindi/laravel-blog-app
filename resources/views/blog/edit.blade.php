@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Edit Post</h1>
                    <p>Edit and submit this form to update a post</p>

                    <hr>

                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Post Title</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Enter Post Title" value="{{ $post->title }}" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="description">Post Description</label>
                                <input type="text" id="description" class="form-control" name="description"
                                       placeholder="Type description" value="{{ $post->description }}">
                            </div>
                            <div class="control-group col-12">
                                <label for="keywords">Post Keywords</label>
                                <input type="text" id="keywords" class="form-control" name="keywords"
                                       placeholder="Enter keywords" value="{{ $post->keywords }}">
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Post Body</label>
                                <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body"
                                          rows="5" required>{{ $post->body }}</textarea>
                            </div>
                            <div class="control-group col-12">
                                <label for="topic_id">Topic <span class="m-l-5 text-danger"> *</span></label>
                                <select type="text" id="topic_id" class="form-control" name="topic_id" required>
                                    <option value="{{ $post->topic_id }}">{{ $topic }}</option>
                                    @foreach ($topics as $topic )
                                        <option value="topic->id">{{ $topic }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Update Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
