
<style type="text/css">
    .diff-time{
        font-style:italic;
    } 
    .list-inline-item.cursor.like-comment-1 a span
    {
      color: #0e1661 !important;
    }
</style>
@forelse($comments as $key => $comment)
    <div class="display-comment well" @if($comment->comment_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->comment_by?:'Viewer' }}</strong>
        <span class="diff-time"> {{$comment->created_at->diffForHumans()}}</span>
        @if(@$usertype == 'admin')
        <ul class="list-inline like-comment new-comment">
          <li class="list-inline-item cursor like-comment-1" style="border-right: none;">
            <a class="delete-post"><span class="PostComment"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</span></a>
            <form id="delete-form-{{$key}}" action="{{route('admin.postcomment.destroy',$comment->id)}}" method="POST" novalidate="">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
          </li>
        </ul>
        @endif
        <p>{{ $comment->content }}</p>
        <br>
        @include('blogcomments', ['comments' => $comment->replies,'type'=>'reply'])

        @if(@Auth::user() || @Auth::guard('admin')->user())
            @if(($key == 0 && $comment->comment_id == null ) || $comment->comment_id == null)
                    <form method="post" action="{{ route('comment.store') }}" style="margin-left:40px;">
                {{@csrf_field()}}
                <div class="col-md-8">

                    <div class="form-group">
                        <input type="text" name="content" class="form-control" placeholder="Reply"  required="" />
                        <input type="hidden" name="comment_id" value="{{ @$comment->id }}" />
                        <input type="hidden" name="post_id" value="{{ @$post->id }}" />

                        @if(@$usertype == 'admin')
                            <input type="hidden" name="usertype" value="admin" />
                        @endif
                    </div>
                </div>
                @if(@$usertype != 'admin' && empty(@Auth::user()))
                <div class="col-md-2">

                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Your Name"  required="" />
                    </div>
                </div>
                @endif
                
                <div class="col-md-2">

                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" value="Send" />
                    </div>
                </div>
            </form>
            <br>
            <br>
            @endif
        @endif
    </div>
@empty
    @if(@$type != 'reply')
        <div class="col-sm-6 blog-view-left"><h1>No Comments</h1></div> 
    @endif
@endforelse
