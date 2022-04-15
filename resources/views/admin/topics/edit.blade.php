@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/admin/topic/{{ $topic->id }}" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Edit Topic</h1>
                    <hr>
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="name">Topic name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                       placeholder="Enter Post Title" value="{{ $topic->name }}" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="description">Topic Description</label>
                                <textarea type="text" id="description" class="form-control" name="description"
                                       placeholder="Type description" rows="5">{{ $topic->description }}
                                </textarea>
                            </div>
                            <div class="control-group col-12">
                                <label for="keywords">Topic Keywords</label>
                                <input type="text" id="keywords" class="form-control" name="keywords"
                                       placeholder="Enter keywords" value="{{ $topic->keywords }}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Update Topic
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
