@extends('admin.layouts.app')

@section('content')

<?php
$is_read_access = VerifyAccess('user','read');
$is_write_access = VerifyAccess('user','write');
?>


<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>Users List</h4>
                    <div class="add-product">
                        <a data-toggle="modal" data-target="#myModal">Add User</a>
                    </div>
                    <div class="asset-inner">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Profile</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Zipcode</th>
                                    <th>Created At</th>
                                    @if($is_write_access)
                                    <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            @forelse(@$users as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><img class="wheelImage" id="profile-img-list-{{$key}}"  src="{{ViewUserProfileImage($user->profileimage)}}" width="100px" height="100px"></td>
                                <td>{{@$user->fname}}</td>
                                <td>{{@$user->lname}}</td>
                                <td>{{@$user->email}}</td>
                                <td>{{@$user->mobile?:'-'}}</td>
                                <td>{{@$user->address?:'-'}}</td>
                                <td>{{@$user->zipcode?:'-'}}</td>
                                <td>{{@$user->created_at}}</td>
                                    @if($is_write_access)
                                <td>
                                    <a type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$key}}"><i class="fa fa-edit"></i></a>


                                    <a type="button" class="btn btn-danger delete-user" data-key="{{$key}}"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{$key}}" action="{{route('admin.user.destroy',$user->id)}}" method="POST" novalidate="">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </td>
                                    @endif
                            </tr>
                            <div class="modal fade" id="editModal{{$key}}" role="dialog">
                                <div class="modal-dialog admin-form">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit User</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div id="dropzone1" class="pro-ad addcoursepro">
                                                <form action="{{ route('admin.user.update', $user->id)}}" class=" needsclick addcourse" method="POST" id="update-post" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    {{method_field('PATCH')}}
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="col-md-2">
                                                                <label>First Name</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" name="fname" class="form-control" placeholder="Give the First Name" required="" value="{{$user->fname}}">
                                                            </div>
                                                        </div> 
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="col-md-2">
                                                                <label>Last Name</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" name="lname" class="form-control" placeholder="Give the Last Name" required="" value="{{$user->lname}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="col-md-2">
                                                                <label>Email</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="email" name="email" class="form-control" placeholder="Give the email id" required="" value="{{$user->email}}">
                                                            </div>
                                                        </div> 
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="col-md-2">
                                                                <label>Mobile</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" name="mobile" class="form-control" placeholder="Give the mobile number" value="{{$user->mobile}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="col-md-2">
                                                                <label>Address</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea name="address" class="form-control" placeholder="Give your address" >{{$user->address}}</textarea> 
                                                            </div>
                                                        </div> 
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="col-md-2">
                                                                <label>Zipcode</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" name="zipcode" class="form-control" placeholder="Give the zipcode" value="{{$user->zipcode}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                                                            <div class="col-md-2">
                                                                <label>Profile Image</label>
                                                            </div>

                                                            <div class="col-md-10">
                                                                <div class="col-md-6 show-image">
                                                                    <div class="col-md-6">
                                                                        <img id="profile-img-{{$key}}" src="{{ViewUserProfileImage($user->profileimage)}}" style="width:100px !important;height:auto !important">
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <input class="delete profile-img-delete   btn btn-danger" type="button"  data-key="{{$key}}" value="Remove Image"  style="display: {{(@$user->profileimage)?'block':'none'}};" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="file" class="form-control profile-img"  id="profile-img-input-{{$key}}" data-key="{{$key}}"  name="profileimage" style="display: {{(@$user->profileimage)?'none':'block'}};" >
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                    <br>
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
                            @empty
                            <tr>
                                <td colspan="5">No Users found</td>
                            </tr>
                            @endforelse

                            <!-- <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Setting</th> 
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                    {{@$users->links()}}
                    <!-- <div class="custom-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div> -->


                    <!--  New Model Start-->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">User Information</h4>
                                </div>
                                <div class="modal-body">
                                    <!-- New Model Content Start -->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="product-payment-inner-st">
                                            <ul id="myTabedu1" class="tab-review-design">
                                                <li class="active"><a href="#description2">Basic Details</a></li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content custom-product-edit">
                                                <div class="product-tab-list tab-pane fade active in" id="description2">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="review-content-section">
                                                                <div id="dropzone1" class="pro-ad">
                                                                    <form action="{{url('/admin/user/')}}" class="dropzone dropzone-custom needsclick add-professors dz-clickable" id="demo1-upload" method="POST" enctype="multipart/form-data">
                                                                        {{@csrf_field()}}
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="col-md-2">
                                                                <label>First Name</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" name="fname" class="form-control" placeholder="Give the First Name" required="" value="">
                                                            </div>
                                                        </div> 
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="col-md-2">
                                                                <label>Last Name</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" name="lname" class="form-control" placeholder="Give the Last Name" required="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="col-md-2">
                                                                <label>Email</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="email" name="email" class="form-control" placeholder="Give the email id" required="" value="">
                                                            </div>
                                                        </div> 
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="col-md-2">
                                                                <label>Mobile</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" name="mobile" class="form-control" placeholder="Give the mobile number" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="col-md-2">
                                                                <label>Address</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea name="address" class="form-control" placeholder="Give your address" ></textarea> 
                                                            </div>
                                                        </div> 
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="col-md-2">
                                                                <label>Zipcode</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" name="zipcode" class="form-control" placeholder="Give the zipcode" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                                                            <div class="col-md-2">
                                                                <label>Profile Image</label>
                                                            </div>

                                                            <div class="col-md-10">
                                                                <div class="col-md-6 show-image">
                                                                    <div class="col-md-6">
                                                                        <img id="profile-img-new" src="{{ViewUserProfileImage('')}}" style="width:100px !important;height:auto !important">
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <input class="delete profile-img-delete   btn btn-danger" type="button"  data-key="new" value="Remove Image"  style="display:none" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="file" class="form-control profile-img"  id="profile-img-input-new" data-key="new"  name="profileimage" style="display:block" >
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                    <br>
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="payment-adress">
                                                                                    <input type="submit" class="btn btn-primary waves-effect waves-light" value="Submit">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- New Model Content End -->
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
                    $('#profile-img-'+key).attr('src', e.target.result);
                };

            })(input); 
            reader.readAsDataURL(input.files[0]);
        }
    } 

    $('.profile-img').change(function(){ 
        readURL(this); 
        var key = $(this).data('key');
        $('#profile-img-input-'+key).hide();
        $('.profile-img-delete').show();
    });

    $('.profile-img-delete').click(function(){
        var key = $(this).data('key');
        $('#profile-img-input-'+key).show();
        $('.profile-img-delete').hide();
        $('#profile-img-input-'+key).val('');
        $('#profile-img-'+key).attr('src',$('#profile-img-list-'+key).attr('src'));
    })

    $('.delete-user').click(function(){
            if (confirm("Are you sure want to remove user?")) {
                $('#delete-form-'+$(this).data('key')).submit();
            }
            return false;
    })
</script>
@endsection