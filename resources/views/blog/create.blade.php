@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Create a New Post</h1>
                    <p>Fill and submit this form to create a post</p>

                    <hr>

                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Post Title <span class="m-l-5 text-danger"> *</span></label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Enter Post Title" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="description">Post Description</label>
                                <input type="text" id="description" class="form-control" name="description"
                                       placeholder="Type description">
                            </div>
                            <div class="control-group col-12">
                                <label for="keywords">Post Keywords</label>
                                <input type="text" id="keywords" class="form-control" name="keywords"
                                       placeholder="Enter keywords">
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Post Body</label>
                                <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body"
                                          rows="" required></textarea>
                            </div>
                            <div class="control-group col-12">
                                <label for="topic_id">Topic <span class="m-l-5 text-danger"> *</span></label>
                                <select type="text" id="topic_id" class="form-control" name="topic_id" required>
                                    <option value="0">Select topic</option>
                                    @foreach ($topics as $topic )
                                        <option value="topic->id">{{ $topic }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Create Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
