@extends('admin.layouts.app')

@section('content')


<?php
$is_read_access = VerifyAccess('slider','read');
$is_write_access = VerifyAccess('slider','write');
?>





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
                    <h4>List of Sliders</h4>
                    <div style="text-align:right;padding-bottom: 20px">
                    @if($is_write_access)                        
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Image</button> 
                    @endif                    
                    <a  class="btn btn-info"  href="{{url('admin/exportTable')}}?module=Slider">Export CSV </a>
                    
                    </div>
                    <div class="asset-inner">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Page</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Redirect To</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @forelse(@$sliders as $key => $slider)
                            <tr>
                                <td>{{@$key+1}}</td>
                                <td>{{@$slider->page}}</td> 
                                <td>{{@$slider->title}}</td>

                                <td><img class="wheelImage" id="featured-img-list-{{$key}}"  src="{{asset('storage/'.@$slider->image)}}" width="100px" height="100px"></td>
                                <td>{{@$slider->description}}</td>
                                <td><a href="{{url('/'.@$slider->redirectlink)}}" target="_blank"> Redirect To </a></td>
                                <td>{{@$slider->order}}</td> 
                                @if($is_write_access)
                                <td>
                                    <a type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$key}}"><i class="fa fa-edit"></i></a>


                                    <a type="button" class="btn btn-danger delete-slider" data-key="{{$key}}"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{$key}}" action="{{route('admin.slider.destroy',$slider->id)}}" method="POST" novalidate="">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </td>
                                @endif
                            </tr>


                             
                    @if($is_write_access)                   <!--  New Model Start-->
                    <div class="modal fade" id="editModal{{$key}}" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Slider</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                        <form action="{{ route('admin.slider.update', $slider->id)}}" class=" needsclick addcourse" method="POST" id="update-slider" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Slider Image</div>

                                                    <div class="col-md-10">
                                                        <div class="col-md-6 show-image">
                                                            <img id="featured-img-{{$key}}" src="{{asset('storage/'.$slider->image)}}" style="width:200px !important;height:auto !important">
                                                            
                                                            <input class="delete featured-img-delete btn btn-danger" type="button" data-key="{{$key}}" value="Remove Image" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="file" class="form-control featured-img" data-key="{{$key}}" id="featured-img-input-{{$key}}" name="image" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row"> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="title">Title (Optional)</label>
                                                        <input type="text" name="title" class="form-control" placeholder="Give the title of the Slider" value="{{@$slider->title}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="description">Description (Optional)</label>
                                                        <input type="text" name="description" class="form-control" placeholder="Give the description of the Slider" value="{{@$slider->description}}">
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="row"> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="page">Slider Page <span class="req">*</span></label>
                                                        
                                                        <select name="page" class="form-group form-control" required="">
                                                            <option value="">Select One</option>
                                                            <option value="Home" {{($slider->page == 'Home')?'selected':''}}>Home</option> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="page">Sliding Order <span class="req">*</span></label>
                                                        <input type="number" name="order" class="form-control"   min=0 value="{{@$slider->order}}" >
                                                    </div>
                                                </div> 
                                            </div>  
                                            <div class="row"> 
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="title">Redirect Link</label>
                                                        <input type="text" name="redirectlink" class="form-control" placeholder="Give the routename Except '{{url('/')}}'" value="{{@$slider->redirectlink}}">
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
                    @endif

                            @empty
                            <tr>
                                <td colspan="5">No Sliders found</td>
                            </tr>
                            @endforelse
                        </table>

                        {{$sliders->links()}}
                    </div>

 

                    <!--  New Model Start-->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add New Image</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                        <form action="{{ route('admin.slider.store')}}" class=" needsclick addcourse" method="POST" id="demo1-upload" enctype="multipart/form-data">
                                            {{csrf_field()}} 
                                            <div class="row"> 
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="prodimage">Slider Image  <span class="req">*</span></label>
                                                        <input type="file" accept="image/*" name="image" class="dropify form-control-file" aria-describedby="fileHelp" required="" data-default-file="{{old('image')}}">
                                                    </div>
                                                </div> 
                                            </div>
                                            <br>
                                            <div class="row"> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="title">Title (Optional)</label>
                                                        <input type="text" name="title" class="form-control" placeholder="Give the title of the Slider" value="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="description">Description (Optional)</label>
                                                        <input type="text" name="description" class="form-control" placeholder="Give the description of the Slider" value="">
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="row"> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="page">Slider Page <span class="req">*</span></label>
                                                        
                                                        <select name="page" class="form-group form-control" required="">
                                                            <option value="">Select One</option>
                                                            <option value="Home">Home</option> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="page">Sliding Order <span class="req">*</span></label>
                                                        <input type="number" name="order" class="form-control"   min=0 >
                                                    </div>
                                                </div> 
                                            </div>  
                                            <div class="row"> 
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="title">Redirect Link</label>
                                                        <input type="text" name="redirectlink" class="form-control" placeholder="Give the routename Except '{{url('/')}}'"  >
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