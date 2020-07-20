@extends('admin.layouts.app') @section('content')

<?php
$is_read_access = VerifyAccess('post','read');
$is_write_access = VerifyAccess('post','write');
?>



<style type="text/css">
   
    .items-modal{
      width: 1000px !important;
    }
    .td-center{
        text-align: center !important;
    } 
    .profile-img{
        text-align: center;
    }
    .right-text{
        text-align:right !important;
    }

</style>
 <div class="product-status mg-b-15" style="min-height: 680px;">
    <div class="container-fluid" >
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="min-height: 680px;">
                <div class="product-status-wrap drp-lst well"> 
                            <h3>Post Title  : {{$post->title}} </h3> 
                        <div class="controls col-md-10">
                            <div class="form-group"> 
                                <?=$post->content?>
                            </div>  
                        </div>
                    <div class="asset-inner" >
                            <h3>Post Comments</h3>
                            <div class="col-md-12">
                                @include('blogcomments', ['comments' => $post->comments, 'post' => $post])
                            </div> 
                            @if($is_write_access) 
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form id="comment-form" action="{{route('comment.store')}}" method="post" novalidate="true">
                                            {{@csrf_field()}}
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <input type="hidden" name="usertype" value="admin">
                                            <div class="controls col-md-10">
                                                <div class="form-group">
                                                    <label for="form_message">Add Comment</label>
                                                    <textarea id="form_message" name="content" class="form-control" placeholder="Your Comments" rows="2" required="required" data-error="Please, leave us a message."></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>  
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <br>
                                                        <input type="submit" class="btn btn-success post-button" value="Submit">

                                                </div>               
                                                <div class="form-group">
                                              <br>
                                                        <a href="{{url('admin/post')}}" class="btn btn-danger">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> 
                            @endif 
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            </div>
        </div>
    </div>
</div>

@endsection