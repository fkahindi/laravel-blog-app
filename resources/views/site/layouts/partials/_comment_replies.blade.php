@foreach ($comments as $comment)
    <div class="display-comment">
        <div class="d-flex">
            <strong>{{ $comment->user->name }}</strong>
            <em>{{ date('M d, Y', strtotime($comment->created_at)) }}</em>
        </div>
        <div class="d-flex">
            <img src="{{ asset('images/profile.png') }}" height="30" alt="user pic">
            <p class="p-3">{{ $comment->body }}</p>
        </div>
        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group">
                <textarea name="reply_body" class="form-control" row="2" required></textarea>
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('site.layouts.partials._comment_replies', ['comments' => $comment->replies])
    </div>
@endforeach
