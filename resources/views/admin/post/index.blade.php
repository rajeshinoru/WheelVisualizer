@extends('admin.layouts.app')

@section('content')
<style type="text/css">
    .req {
        color: red;
    }

    .edit_modal {
        margin: 6%;
        padding: 20px;
    }

    td.scrollable {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        overflow: auto !important;
    }

    .items-modal {
        width: 1000px !important;
    }

    .td-center {
        text-align: center !important; 
    }

    .admin-form .btn.btn-default {
        color: #333 !important;
    }

    /*1131px*/
</style>

<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>List of Posts</h4>
                    <div class="add-product">
                        <a data-toggle="modal" data-target="#myModal">Add Post</a>
                    </div>
                    <div class="asset-inner">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Post By</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Visibility</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            @forelse(@$posts as $key => $post)
                            <tr>
                                <td>{{@$key+1}}</td>
                                <td>{{@$post->postby}}</td>
                                <td class="td-center"> 
                                                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#content{{$key}}">View</button> 

                                                    <div class="modal fade " id="content{{$key}}" role="dialog">
                                                        <div class="modal-dialog items-modal">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title text-left">Content</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                <h4 class="modal-title">
<pre> 
<?=@$post->content?>
</pre>
                                                                </h4> 
                                                                        <div class="form-group has-success has-feedback text-center">
                                                                            <button class="btn btn-info btn-close" type="button" data-dismiss="modal" >Close</button>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                </td> 
                                <td><img class="wheelImage" src="{{asset('storage/'.@$post->image)}}" width="100px" height="100px"></td>
                                <td>
                                    <select name="post_status[]" class="form-group form-control post_status" data-order_id="{{@$post->id}}">
                                        <option value="0" {{($post->is_visibile ==  0)?'selected':''}}>No</option>
                                        <option value="1" {{($post->is_visibile ==  1)?'selected':''}}>Yes</option>
                                    </select>
                                </td>
                                <td>{{@$post->created_at}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Posts found</td>
                            </tr>
                            @endforelse
                        </table>

                        {{$posts->links()}}
                    </div>

                    <!--  New Model Start-->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add New Post</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                        <form action="{{url('admin/post')}}" class=" needsclick addcourse" method="POST" id="demo1-upload" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Title of Post </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="title" class="form-control" placeholder="Give the title of the post" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Content</div>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control summernote required" name="content" rows="5" required=""> 
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Featured Image</div>
                                                    <div class="col-md-10"> 
                                                        <input type="file" class="form-control" name="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Is Visible?</div>
                                                    <div class="col-md-10"> 
                                    <select name="is_visibile" class="form-group form-control is_visibile" >
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                                    </div>
                                                </div>
                                            </div>




                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="payment-adress">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="payment-adress">
                                                        <a  class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--New Model End  -->

            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('custom_scripts')
<script type="text/javascript">
    $(".post_status").change(function() {
        var status = $(this).val();

        var post_id = $(this).data('post_id');
        $.ajax({
            url: "/admin/post/update/" + post_id,
            data: {
                "status": status
            },
            success: function(result) {
                // console.log(typeof result)
                $('#custom-msg').html(`
                  <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          ` + result.msg + `
                  </div>`);

            },
            error: function(jqXHR, textStatus, errorThrown) {

                // $loading.fadeOut("slow");
            }
        });
    });
</script>
@endsection