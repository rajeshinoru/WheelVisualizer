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
                                            <a data-toggle="modal" data-target="#myModal{{@$key}}">Edit Wheel</a>
                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>

                                     <!--  Edit Model Start-->
                    <div class="modal fade" id="myModal{{@$key}}" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Update Wheel Information</h4>
                                </div>
                                <div class="modal-body">
                                    <!-- New Model Content Start -->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="product-payment-inner-st">
                                            <ul id="myTabedu1" class="tab-review-design">
                                                <li class="active"><a href="#description2">Update Basic Details</a></li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content custom-product-edit">
                                                <div class="product-tab-list tab-pane fade active in" id="description2">
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="review-content-section">
            <div id="dropzone1" class="pro-ad">
                <form action="{{route('admin.wheel.update',@$wheel->id)}}" class="dropzone dropzone-custom needsclick add-professors dz-clickable" id="demo1-upload" method="POST" enctype="multipart/form-data">
                    {{@csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="row">
                        {{--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="year">Year</label>
                                <select class="form-control select2 Year" name="year" required="">
                                    <option >Select Year</option>
                                    @for($y=date('Y');$y>=1980;$y--)
                                    <option value="{{$y}}" @if(@$wheel->year == $y) selected @endif >{{$y}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>--}}
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <select class="form-control select2 Brand" name="brand" required="">
                                    <option >Select Brand</option>
                                    @foreach(@$brands as $key => $brand)
                                    <option value="{{$brand->brand}}" @if(@$wheel->brand == $brand->brand) selected @endif>{{$brand->brand}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="fname">Finish</label>
                                <input type="text" name="finish" class="form-control" placeholder="Finish"  required="" value="{{@$wheel->finish}}">
                            </div>
                        </div>--}}
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="fname">Type</label>
                                <input type="text" name="wheeltype" class="form-control" placeholder="Type"  required="" value="{{@$wheel->wheeltype}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="lname">Part Number</label>
                                <input type="text" name="part_no" class="form-control" placeholder="Part Number" value="{{@$wheel->part_no}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="fname">Style</label>
                                <input type="text"  name="style" class="form-control" placeholder="Style "  value="{{@$wheel->style}}" required="">
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="lname">Diameter</label>
                                <input type="text" name="wheeldiameter" class="form-control" placeholder="Diameter" value="{{@$wheel->wheeldiameter}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="fname">Width</label>
                                <input type="text"  name="wheelwidth" class="form-control" placeholder="Width " value="{{@$wheel->wheelwidth}}" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="fname">Wheel Image</label>
                            <br>
                            
                                <input type="file" accept="image/*" name="image" class="dropify form-control-file" aria-describedby="fileHelp" data-default-file="{{asset(@$wheel->image)}}">  
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="fname">Front Back Image</label>
                            <br> 
                                <input type="file" accept="image/*" name="front_back_image" class="dropify sform-control-file" aria-describedby="fileHelp"  data-default-file="{{asset(front_back_path(@$wheel->image))}}">  
                                <br> 
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
                <form action="{{url('/admin/wheel/')}}" class="dropzone dropzone-custom needsclick add-professors dz-clickable" id="demo1-upload" method="POST" enctype="multipart/form-data">
                    {{@csrf_field()}}
                    <div class="row">
                        {{--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="year">Year</label>
                                <select class="form-control select2 Year" name="year" required="">
                                    <option >Select Year</option>
                                    @for($y=date('Y');$y>=1980;$y--)
                                    <option value="{{$y}}" @if(old('year') == $y) selected @endif >{{$y}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>--}}
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <select class="form-control select2 Brand" name="brand" required="">
                                    <option >Select Brand</option>
                                    @foreach(@$brands as $key => $brand)
                                    <option value="{{$brand->brand}}" @if(old('brand') == $brand->brand) selected @endif>{{$brand->brand}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="fname">Type</label>
                                <input type="text" name="wheeltype" class="form-control" placeholder="Type"  required="" value="{{old('wheeltype')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="lname">Part Number</label>
                                <input type="text" name="part_no" class="form-control" placeholder="Part Number" value="{{old('part_no')}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="fname">Style</label>
                                <input type="text"  name="style" class="form-control" placeholder="Style "  value="{{old('style')}}" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="lname">Diameter</label>
                                <input type="text" name="wheeldiameter" class="form-control" placeholder="Diameter" value="{{old('wheeldiameter')}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="fname">Width</label>
                                <input type="text"  name="wheelwidth" class="form-control" placeholder="Width " value="{{old('wheelwidth')}}" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="fname">Wheel Image</label>
                            <br>
                            
                                <input type="file" accept="image/*" name="image" class="dropify form-control-file" aria-describedby="fileHelp" required="" data-default-file="{{old('image')}}">  
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="fname">Front Back Image</label>
                            <br> 
                                <input type="file" accept="image/*" name="front_back_image" class="dropify sform-control-file" aria-describedby="fileHelp" required="" data-default-file="{{old('front_back_image')}}">  
                                <br> 
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