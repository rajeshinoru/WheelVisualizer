@extends('admin.layouts.app')

@section('content')

        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Wheels List</h4>
                            <div class="add-product">
                                <a data-toggle="modal" data-target="#myModal">Add Wheel</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th> S.No</th>
                                        <th> Part No</th>
                                        <th> Brand</th>
                                        <th> Style</th>
                                        <th> Image</th>
                                        <th> Type</th>
                                        <th> Diameter</th>
                                        <th> Width</th>
                                        <th> Actions</th>
                                    </tr>
                                    @forelse(@$wheels as $key => $wheel)
                                    <tr>
                                        <td>{{@$key+1}}</td>
                                        <td>{{@$wheel->part_no}}</td>
                                        <td>{{@$wheel->brand}}</td>
                                        <td>{{@$wheel->style}}</td>
                                        <td><img src="{{asset(@$wheel->image)}}" width="100px" height="100px"></td>
                                        <td>{{@$wheel->wheeltype}}</td>
                                        <td>{{@$wheel->wheeldiameter}}</td>
                                        <td>{{@$wheel->wheelwidth}}</td>
                                        <td>
                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    @empty                                   
                                    <tr>
                                        <td colspan="5">No Users found</td>
                                    </tr>
                                    @endforelse
                                </table>

                    {{$wheels->appends(['diameter' => @Request::get('diameter'),'width' => @Request::get('width'),'brand' => @Request::get('brand'),'car_id' => @Request::get('car_id'),'page' => @Request::get('page')])->links()}}
                            </div>

                    <!--  New Model Start-->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Wheel Information</h4>
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
                                                                    <form action="{{url('/admin/wheel/')}}" class="dropzone dropzone-custom needsclick add-professors dz-clickable" id="demo1-upload" method="POST">
                                                                        {{@csrf_field()}}
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="fname">First Name</label>
                                                                                    <input name="fname" type="text" class="form-control" placeholder="First Name" value="" required="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="lname">Last Name</label>
                                                                                    <input type="text" name="lname" class="form-control" placeholder="Last Name" value="" required="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="lname">Mobile</label>
                                                                                    <input type="text" name="mobile" class="form-control" placeholder="(+91) Mobile Number " value="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="fname">Email</label>
                                                                                    <input name="email"  type="email" class="form-control" placeholder="Email " value="" required="">
                                                                                </div>
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