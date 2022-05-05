@extends('site.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Add image') }}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('image.update') }}"
                            enctype="multipart/form-data">
                        @csrf
                        <div class="image">
                        <label><h4>Add image</h4></label>
                        <input type="file" class="form-control" required name="image">
                        </div>

                        <div class="post_button">
                        <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
