
<style type="text/css">
    .diff-time{
        font-style:italic;
    }

</style>
@foreach($comments as $key => $comment)
    <div class="display-comment" @if($comment->comment_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->comment_by?:'Viewer' }} <span class="diff-time"> {{$comment->created_at->diffForHumans()}}</span></strong>
        <p>{{ $comment->content }}</p> 
        @include('blogcomments', ['comments' => $comment->replies,'type'=>'reply'])
        @if(($key == 0 && $comment->comment_id == null ) || $comment->comment_id == null)
                <form method="post" action="{{ route('comment.store') }}" style="margin-left:40px;">
            {{@csrf_field()}}
            <div class="col-md-8">
                
                <div class="form-group">
                    <input type="text" name="content" class="form-control" placeholder="Reply"  required="" />
                    <input type="hidden" name="comment_id" value="{{ @$comment->id }}" />
                    <input type="hidden" name="post_id" value="{{ @$post->id }}" />
                </div>
            </div>
            <div class="col-md-2">
                
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Your Name"  required="" />
                </div>
            </div>
            <div class="col-md-2">
                    
                <div class="form-group">
                    <input type="submit" class="btn btn-warning" value="Send" />
                </div>
            </div>
        </form>
        @endif
    </div>
@endforeach


