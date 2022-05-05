@foreach ($comments as $comment)
    <div class="display-comment">
        <div class="d-flex">
            <strong>{{ $comment->user->name }}</strong>
            <em>{{ date('M d, Y', strtotime($comment->created_at)) }}</em>
        </div>
        <div class="d-flex p-3">
            <img src="{{ asset('images/profile.png') }}" height="30" alt="user pic">
            <div class="d-flex-column">
                <p class="p-2">{{ $comment->body }}</p>
                <a class="btn btn-link btn-sm" type="button" data-bs-toggle="collapse" href="#replyForm_{{ $comment->id }}" role="button" aria-expanded="false" aria-controls="replyForm_{{ $comment->id }}">Reply</a>
            </div>

        </div>

        <div id="replyForm_{{ $comment->id }}" class="collapse">
            <form method="post" action="{{ route('reply.add') }}">
                @csrf
                <div class="form-group">
                    <textarea name="reply_body" class="form-control" rows="1" placeholder="Reply here..." required></textarea>
                    <input type="hidden" name="post_id" value="{{ $post_id }}" />
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-outline-secondary my-2" value="Reply" />
                </div>
            </form>
        </div>

        @include('site.layouts.partials._comment_replies', ['comments' => $comment->replies])
    </div>
@endforeach
