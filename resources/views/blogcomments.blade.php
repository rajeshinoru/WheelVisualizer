
<style type="text/css">
    .diff-time{
        font-style:italic;
    }
    .delete-post{
        color: red !important;
    }
</style>
@foreach($comments as $key => $comment)
    <div class="display-comment well" @if($comment->comment_id != null) style="margin-left:40px;" @endif>
        <strong>
            {{ $comment->comment_by?:'Viewer' }} 
            <span class="diff-time"> {{$comment->created_at->diffForHumans()}}</span>
            @if(@$usertype == 'admin')
            <button type="button" class="delete-post" data-key="{{$key}}-comment-{{$type??'comment'}}-{{$key}}"><i class="fa fa-trash"></i></button> 

            <form id="{{$key}}-comment-{{$type??'comment'}}-{{$key}}" action="{{route('admin.postcomment.destroy',$comment->id)}}" method="POST" novalidate="">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
            @endif
        </strong>
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
        <br>
        <br>
        @endif 
    </div>
@endforeach


