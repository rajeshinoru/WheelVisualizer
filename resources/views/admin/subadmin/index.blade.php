@extends('admin.layouts.app')

@section('content')

<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>Subadmin List</h4>
                    <div class="add-product">
                        <a data-toggle="modal" data-target="#myModal">Add Subadmin</a>
                    </div>
                    <div class="asset-inner">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Subadmin ID</th>
                                    <th>Name</th> 
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @forelse(@$subadmins as $key => $subadmin)
                            <tr>
                                <td>{{$key+1}}</td> 
                                <td>{{@$subadmin->name}}</td> 
                                <td>{{@$subadmin->email}}</td>
                                <td>{{@$subadmin->phone}}</td>
                                <td>{{@$subadmin->created_at}}</td>
                                <td>
                                    <a type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$key}}"><i class="fa fa-edit"></i></a>


                                    <a type="button" class="btn btn-danger delete-subadmin" data-key="{{$key}}"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{$key}}" action="{{route('admin.subadmin.destroy',$subadmin->id)}}" method="POST" novalidate="">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Subadmins found</td>
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
                    {{@$subadmins->links()}}
 
                            @forelse(@$subadmins as $key => $subadmin)
                            <div class="modal fade" id="editModal{{$key}}" role="dialog">
                                <div class="modal-dialog admin-form">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit Subadmin</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div id="dropzone1" class="pro-ad addcoursepro">
                                                <form action="{{ route('admin.subadmin.update', $subadmin->id)}}" class=" needsclick addcourse" method="POST" id="update-post" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    {{method_field('PATCH')}}
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="name">Name</label>
                                                                <input name="name" type="text" class="form-control" placeholder="Name"   required="" value="{{@$subadmin->name}}">
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="fname">Email</label>
                                                                <input name="email" type="email" class="form-control" placeholder="Email "   required="" value="{{@$subadmin->email}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="phone">phone</label>
                                                                <input name="phone" type="text" class="form-control" placeholder="Phone "   value="{{@$subadmin->phone}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 
                                                            <label>Access Modules</label>
                                                                <table>
                                                                    <thead>  
                                                                    <th>Modules</th>
                                                                    <th>Read</th>
                                                                    <th>Write</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach(getAdminModules() as $mkey => $module)
                                                                        <tr>
                                                                            <td>{{$module}}</td>
                                                                            <td><input type="checkbox" name="read[{{$mkey}}]" value="1" {{(in_array($mkey,json_decode($subadmin->Roles->read??'')??[]))?'checked':''}} ></td>
                                                                            <td><input type="checkbox" name="write[{{$mkey}}]" value="1" {{(in_array($mkey,json_decode($subadmin->Roles->write??'')??[]))?'checked':''}}  ></td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>

                                                                </table> 
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
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse

                    <!--  New Model Start-->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Subadmin Information</h4>
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
                                                                    <form action="{{url('/admin/subadmin/')}}" class="dropzone dropzone-custom needsclick add-professors dz-clickable" id="demo1-upload" method="POST">
                                                                        {{@csrf_field()}}
                                                                        <div class="row">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="name">Name</label>
                                                                                    <input name="name" type="text" class="form-control" placeholder="Name" value="" required="">
                                                                                </div>
                                                                            </div> 
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="fname">Email</label>
                                                                                    <input name="email" type="email" class="form-control" placeholder="Email " value="" required="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="phone">Phone</label>
                                                                                    <input type="text" name="phone" class="form-control" placeholder="(+91) Phone Number " value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 
                                                                            <label>Access Modules</label>
                                                                                    <table nocellpadding>
                                                                                        <thead>  
                                                                                        <th>Modules</th>
                                                                                        <th>Read</th>
                                                                                        <th>Write</th>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach(getAdminModules() as $mkey => $module)
                                                                                            <tr>
                                                                                                <td>{{$module}}</td>
                                                                                                <td><input type="checkbox" name="read[{{$mkey}}]" value="1"></td>
                                                                                                <td><input type="checkbox" name="write[{{$mkey}}]" value="1"></td>
                                                                                            </tr>
                                                                                            @endforeach
                                                                                        </tbody>

                                                                                    </table> 
                                                                            </div> 
                                                                        </div>
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
 
    $('.delete-subadmin').click(function(){
            if (confirm("Are you sure want to remove subadmin?")) {
                $('#delete-form-'+$(this).data('key')).submit();
            }
            return false;
    })
</script>
@endsection