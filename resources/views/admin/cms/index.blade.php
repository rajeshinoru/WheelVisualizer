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
<style type="text/css">
    td{
    word-break: break-all !important;
    }
</style>
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>List of pages</h4>
                    <div class="add-product">
                        <a data-toggle="modal" data-target="#myModal">Add Page</a>
                    </div>
                    <div class="asset-inner">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Page Category</th>
                                    <th>Title</th>
                                    <th>Route Name</th>
                                    <th>Description</th>
                                    <th>Content</th> 
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @forelse(@$pages as $key => $page)
                            <tr>
                                <td>{{@$key+1}}</td>
                                <td>{{@$page->pagecategory}}</td>   
                                <td>{{@$page->title}}</td>   
                                <td>{{@$page->routename}}</td> 
                                <td class="description">{{@$page->description}}</td> 
                                <td class="td-center">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#content{{$key}}">View</button>

                                    <div class="modal fade " id="content{{$key}}" role="dialog">
                                        <div class="modal-dialog items-modal">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title text-left">Page Content</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h4 class="modal-title">
                                                        <pre>
<?=@$page->content?>
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
                                <td>{{@$page->created_at}}</td>
                                <td>
                                    <a type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$key}}"><i class="fa fa-edit"></i></a>


                                    <a type="button" class="btn btn-danger delete-post" data-key="{{$key}}"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{$key}}" action="{{route('admin.cmspage.destroy',$page->id)}}" method="POST" novalidate="">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </td>
                            </tr>
                    <div class="modal fade" id="editModal{{$key}}" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Page</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                        <form action="{{ route('admin.cmspage.update', $page->id)}}" class=" needsclick addcourse" method="POST" id="update-post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Title of Page </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="title" class="form-control" placeholder="Give the title of the page" required="" value="{{$page->title}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Page Category </div>
                                                    <div class="col-md-10">
                                                        <select name="pagecategory" class="form-group form-control" required=""> 
                                                            <option value="">Select One</option>
                                                            @foreach(cmspagecategories() as $category)
                                                            <option value="{{$category}}" {{($category == $page->pagecategory)?'selected':''}}>{{$category}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Content</div>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control summernote required" name="content" rows="5" required="">{{$page->content}}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <br> 
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Route Name</div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="routename" value="{{@$page->routename}}" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Description</div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="description" value="{{@$page->description}}">
                                                    </div>
                                                </div>
                                            </div>
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
                            @empty
                            <tr>
                                <td colspan="5">No Pages found</td>
                            </tr>
                            @endforelse
                        </table>

                        {{$pages->links()}}
                    </div>

                    <!--  New Model Start-->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add New Page</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                        <form action="{{ route('admin.cmspage.store')}}" class=" needsclick addcourse" method="POST" id="demo1-upload" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Title of Page </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="title" class="form-control" placeholder="Give the title of the page" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Page Category </div>
                                                    <div class="col-md-10">
                                                        <select name="pagecategory" class="form-group form-control" required=""> 
                                                            <option value="">Select One</option>
                                                            @foreach(cmspagecategories() as $category)
                                                            <option value="{{$category}}">{{$category}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Content</div>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control summernote required" name="content" rows="5" required="" class="Content of the Page">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Route Name</div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="routename" placeholder="Route name must be unique">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Description</div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="description" placeholder="Enter Description" >
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Category</div>
                                                    <div class="col-md-10">
                                                        <select name="is_visible" class="form-group form-control is_visible">
                                                            <option value="1">Top Nav Bar</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> -->
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
            if (confirm("Are you sure want to remove page?")) {
                $('#delete-form-'+$(this).data('key')).submit();
            }
            return false;
    })
</script>
@endsection