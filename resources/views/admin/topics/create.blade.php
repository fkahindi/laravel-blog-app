@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/topic" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Create Topic</h1>
                    <hr>
                    <h3 class="display-4"></h3>
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="name">Topic Name <span class="m-l-5 text-danger"> *</span></label>
                                <input type="text" id="name" class="form-control" name="name"
                                       placeholder="Enter Topic Name" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="description">Topic Description</label>
                                <textarea type="text" id="description" class="form-control" name="description"
                                       placeholder="Type description"></textarea>
                            </div>
                            <div class="control-group col-12">
                                <label for="keywords">Topic Keywords</label>
                                <input type="text" id="keywords" class="form-control" name="keywords"
                                       placeholder="Enter keywords">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Create Topic
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
