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

                        <div class="post_button mt-2">
                        <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                    <div class="bg-warning my-3 p-3">
                        <h6 class="cart-text py-2"> <em>Allowed image types : </em> <strong> jpg, jpeg, png, gif and webp</strong>
                    </h6>
                    <h6 class="card-foorer"><em>Max image size:</em> <strong>0.25 Mb</strong> </h6>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
