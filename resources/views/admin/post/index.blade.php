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

    div.show-image:hover img{
        opacity:0.5;
    }
    div.show-image:hover input {
        display: block;
    }
    div.show-image input {
        position:absolute;
        display:none;
    } 
    div.show-image input.delete {
        top:0;
        left:55%;
    }
    /*1131px*/
</style>

<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>List of Posts</h4>
                    <div style="text-align:right;padding-bottom: 20px">
                        
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Post</button> 
                    
                    <a  class="btn btn-info"  href="{{url('admin/exportTable')}}?module=Post">Export CSV </a>
                    
                    </div>
                    <div class="asset-inner">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Post By</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Visibility</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @forelse(@$posts as $key => $post)
                            <tr>
                                <td>{{@$key+1}}</td>
                                <td>{{@$post->title}}</td>
                                <td>{{@$post->postby}}</td>
                                <td class="td-center">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#content{{$key}}">View</button>

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
                                                        <button class="btn btn-info btn-close" type="button" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td><img class="wheelImage" id="featured-img-list-{{$key}}"  src="{{asset('storage/'.@$post->image)}}" width="100px" height="100px"></td>
                                <td>
                                    {{($post->is_visible ==  0)?'NO':'YES'}}
                                </td>
                                <td>{{@$post->created_at}}</td>
                                <td>
                                    <a type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$key}}"><i class="fa fa-edit"></i></a>


                                    <a type="button" class="btn btn-danger delete-post" data-key="{{$key}}"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{$key}}" action="{{route('admin.post.destroy',$post->id)}}" method="POST" novalidate="">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Posts found</td>
                            </tr>
                            @endforelse
                        </table>

                        {{$posts->links()}}
                    </div>


                    @foreach(@$posts as $key => $post)
                    <!--  New Model Start-->
                    <div class="modal fade" id="editModal{{$key}}" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Post</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                        <form action="{{ route('admin.post.update', $post->id)}}" class=" needsclick addcourse" method="POST" id="update-post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Title of Post </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="title" class="form-control" placeholder="Give the title of the post" required="" value="{{$post->title}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Content</div>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control summernote required" name="content" rows="5" required="">{{$post->content}}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Featured Image</div>

                                                    <div class="col-md-10">
                                                        <div class="col-md-6 show-image">
                                                            <img id="featured-img-{{$key}}" src="{{asset('storage/'.$post->image)}}" style="width:200px !important;height:auto !important">
                                                            
                                                            <input class="delete featured-img-delete btn btn-danger" type="button" data-key="{{$key}}" value="Remove Image" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="file" class="form-control featured-img" data-key="{{$key}}" id="featured-img-input-{{$key}}" name="image" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Is Visible?</div>
                                                    <div class="col-md-10">
                                                        <select name="is_visible" class="form-group form-control is_visible">
                                                            <option value="1" {{($post->is_visible == "1"  )?'selected':''}}>Yes</option>
                                                            <option value="0" {{($post->is_visible == "0"  )?'selected':''}}>No</option>
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
                                                        <a class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Cancel</a>
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
                    @endforeach

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
                                        <form action="{{ route('admin.post.store')}}" class=" needsclick addcourse" method="POST" id="demo1-upload" enctype="multipart/form-data">
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
                                                        <select name="is_visible" class="form-group form-control is_visible">
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
                                                        <a class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Cancel</a>
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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = (function (input) {   
                
                var key = $(input).data('key');
                return function(e){
                    $('#featured-img-'+key).attr('src', e.target.result);
                };

            })(input); 
            reader.readAsDataURL(input.files[0]);
        }
    } 

    $('.featured-img').change(function(){ 
        readURL(this); 
    });

    $('.featured-img-delete').click(function(){
        var key = $(this).data('key');
        $('#featured-img-input-'+key).val('');
        $('#featured-img-'+key).attr('src',$('#featured-img-list-'+key).attr('src'));
    })

    $('.delete-post').click(function(){
            if (confirm("Are you sure want to remove post?")) {
                $('#delete-form-'+$(this).data('key')).submit();
            }
            return false;
    })
</script>
@endsection