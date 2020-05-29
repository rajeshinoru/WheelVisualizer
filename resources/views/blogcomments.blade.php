@foreach($comments as $comment)
    <div class="display-comment" @if($comment->comment_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->comment_by }} <span>2 Weeks ago</span></strong>
        <p>{{ $comment->content }}</p> 
        <form method="post" action="{{ route('comment.store') }}" style="margin-left:40px;">
            {{@csrf_field()}}
            <div class="form-group">
                <input type="text" name="content" class="form-control" placeholder="Your Reply" />
                
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                <input type="hidden" name="post_id" value="{{ @$post->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Send" />
            </div>
        </form>
        @include('blogcomments', ['comments' => $comment->replies])
    </div>
@endforeach