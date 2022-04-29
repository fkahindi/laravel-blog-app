@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <div class="d-flex">
            <strong>{{ $comment->user->name }}</strong>
            <em>{{ date('M d, Y', strtotime($comment->created_at)) }}</em>
        </div>
        <div class="d-flex">
            <img src="{{ asset('images/profile.png') }}" height="30" alt="user pic">
            <p class="p-3">{{ $comment->body }}</p>
        </div>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Reply" />
            </div>
            <hr />
        </form>
        {{-- @include('site.posts.commentsDisplay', ['comments' => $comments->replies]) --}}
    </div>
@endforeach
