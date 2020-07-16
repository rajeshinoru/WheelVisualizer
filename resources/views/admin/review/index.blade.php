@extends('admin.layouts.app')

@section('content')


<?php
$is_read_access = VerifyAccess('review','read');
$is_write_access = VerifyAccess('review','write');
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
                    <h4>List of Reviews</h4>
                    <div style="text-align:right;padding-bottom: 20px">
                        
                    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Post</button>  -->
                    
                    <!-- <a  class="btn btn-info"  href="{{url('admin/exportTable')}}?module=Post">Export CSV </a> -->
                    
                    </div>
                    <div class="asset-inner">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Category</th>
                                    <th>Product</th> 
                                    <th>Comment</th>
                                    <th>Average Rating</th>
                                    <th>Feature Ratings</th>
                                    <th>Visibility</th>
                                    <th>Created At</th>
                                    @if($is_write_access)                                    
                                    <th>Actions</th>
                                    @endif                                    
                                </tr>
                            </thead>
                            @forelse(@$reviews as $key => $review)
                            <tr>
                                <td>{{@$key+1}}</td>
                                <td>{{@$review->category}}</td>
                                <td>{{@$review->partno}}</td> 
                                <td>{{@$review->comment}}</td> 
                                <td>{{@$review->avgrating?round($review->avgrating, 1):'0'}} <i class='fa fa-star fa-fw'></i> </td> 
                                <td class="td-center">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#featureratings{{$key}}">View</button>

                                    <div class="modal fade " id="featureratings{{$key}}" role="dialog">
                                        <div class="modal-dialog items-modal">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title text-left">Feature Ratings</h4>
                                                </div>
                                                <div class="modal-body"> 
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Feature</th>
                                                                <th>Rating Stars</th> 
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse(@$review->Ratings as $key1 => $rating)
                                                            <tr>
                                                                <td>{{@$key1+1}}</td>
                                                                <td>{{@getRatingList($rating->feature)}}</td>
                                                                <td>{{@$rating->rating}} <i class='fa fa-star fa-fw'></i> </td>
                                                            </tr>
                                                            @empty
                                                            <tr>
                                                                <td colspan="3">No Ratings found</td>
                                                            </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <div class="form-group has-success has-feedback text-center">

                                                        <button class="btn btn-info btn-close" type="button" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    {{($review->approval ==  0)?'NO':'YES'}}
                                </td>
                                <td>{{@$review->created_at}}</td>
                                @if($is_write_access)
                                <td>
                                    <a type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$key}}"><i class="fa fa-edit"></i></a>


                                    <a type="button" class="btn btn-danger delete-post" data-key="{{$key}}"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{$key}}" action="{{route('admin.review.destroy',$review->id)}}" method="POST" novalidate="">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Reviews found</td>
                            </tr>
                            @endforelse
                        </table>

                        {{$reviews->links()}}
                    </div>


                    @foreach(@$reviews as $key => $review)
                    <!--  New Model Start-->
                    <div class="modal fade" id="editModal{{$key}}" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Review</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                        <form action="{{ route('admin.review.update', $review->id)}}" class=" needsclick addcourse" method="POST" id="update-post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}} 
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Comment</div>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control required" name="comment" rows="5" required="">{{$review->comment}}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <br> 
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Is Visible?</div>
                                                    <div class="col-md-10">
                                                        <select name="approval" class="form-group form-control approval">
                                                            <option value="1" {{($review->approval == "1"  )?'selected':''}}>Yes</option>
                                                            <option value="0" {{($review->approval == "0"  )?'selected':''}}>No</option>
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
            if (confirm("Are you sure want to remove review?")) {
                $('#delete-form-'+$(this).data('key')).submit();
            }
            return false;
    })
</script>
@endsection