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
</style>
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>Cars List</h4>
                    <div class="add-product">
                        <a data-toggle="modal" data-target="#myModal">Add Car</a>
                    </div>
                    <div class="asset-inner">
                        <table>
                            <tr>
                                <th> S.No</th>
                                <!--                                   <th>org </th>
                                        <th>send </th> -->
                                <th>Year </th>
                                <th>Make </th>
                                <th>Model </th>
                                <th>Trim </th>
                                <th>DRS </th>
                                <th>Body </th>
                                <!-- <th>cab </th> -->
                                <th>Wheels </th>
                                <th>VIN </th>
                                <th>Delivered Date </th>
                                <th>View Images</th>
                                <th> Actions</th>
                            </tr>
                            @forelse(@$cars as $key => $car)
                            <tr>
                                <td>{{@$key+1}}</td>
                                <!--                               <td>{{@$car->org}} </td>
                                        <td>{{@$car->send}} </td> -->
                                <td>{{@$car->yr}} </td>
                                <td>{{@$car->make}} </td>
                                <td>{{@$car->model}} </td>
                                <td>{{@$car->trim}} </td>
                                <td>{{@$car->drs}} </td>
                                <td>{{@$car->body}} </td>
                                <!-- <td>{{@$car->cab}} </td> -->
                                <td>{{@$car->whls}} </td>
                                <td>{{@$car->vin}} </td>
                                <td>{{@$car->date_delivered}} </td>
                                <!-- <td><img class="wheelImage" src="{{asset(@$car->CarImages[0]->image)}}"></td> -->

                                <td>
                                    <a class="btn btn-default look-a-like" href="{{url('admin/car/images')}}/{{@$car->id}}">View</a>
                                </td>
                                <td>
                                    <button class="btn btn-default look-a-like" data-toggle="modal" data-target="#myModal{{@$key}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    <form action="{{ route('admin.wheel.destroy', $car->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button class="btn btn-default look-a-like" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <!--  Edit Model Start-->
                            <div class="modal fade" id="myModal{{@$key}}" role="dialog">

                                <div class="modal-body admin-form">
                                    <!-- New Model Content Start -->

                                    <div class="product-payment-inner-st edit_modal">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <ul id="myTabedu1" class="tab-review-design">
                                            <li class="active"><a href="#description2">Update Basic Details</a></li>
                                        </ul>
                                        <div id="myTabContent" class="tab-content custom-product-edit">
                                            <div class="product-tab-list tab-pane fade active in " id="description2">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="review-content-section">
                                                            <div id="dropzone1" class="pro-ad">
                                                                <form action="{{route('admin.wheel.update',@$car->id)}}" class="dropzone dropzone-custom needsclick add-professors dz-clickable" id="demo1-upload" method="POST" enctype="multipart/form-data">
                                                                    {{@csrf_field()}}
                                                                    <input type="hidden" name="_method" value="PATCH">
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="brand">Brand <span class="req">*</span></label>
                                                                                <select class="form-control select2 Brand" name="brand" required="">
                                                                                    <option value="">Select Brand</option>
                                                                                    @foreach(@$brands as $key => $brand)
                                                                                    <option value="{{$brand->brand}}" @if(@$car->brand == $brand->brand) selected @endif>{{$brand->brand}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="fname">Type <span class="req">*</span></label>
                                                                                <input type="text" name="wheeltype" class="form-control" placeholder="Type" required="" value="{{@$car->wheeltype}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="lname">Part Number <span class="req">*</span></label>
                                                                                <input type="text" name="part_no" class="form-control" placeholder="Part Number" value="{{@$car->part_no}}" required="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="fname">Style <span class="req">*</span></label>
                                                                                <input type="text" name="style" class="form-control" placeholder="Style " value="{{@$car->style}}" required="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="lname">Diameter <span class="req">*</span></label>
                                                                                <input type="text" name="wheeldiameter" class="form-control" placeholder="Diameter" value="{{@$car->wheeldiameter}}" required="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="fname">Width <span class="req">*</span></label>
                                                                                <input type="text" name="wheelwidth" class="form-control" placeholder="Width " value="{{@$car->wheelwidth}}" required="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="finish">Finish <span class="req">*</span></label>
                                                                                <input type="text" name="finish" class="form-control" placeholder="Finish" value="{{@$car->finish}}" required="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="hub">Hub</label>
                                                                                <input type="number" name="hub" class="form-control" placeholder="Hub " value="{{@$car->hub}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <label for="fname">Car Image <span class="req">*</span></label>
                                                                            <input type="file" accept="image/*" name="image" class="dropify form-control-file" aria-describedby="fileHelp" data-default-file="{{asset(@$car->image)}}" required="">
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <label for="fname">Front Back Image <span class="req">*</span></label>
                                                                            <br>
                                                                            <input type="file" accept="image/*" name="front_back_image" class="dropify form-control-file" aria-describedby="fileHelp" data-default-file="{{asset(front_back_path(@$car->image))}}" required="">
                                                                            <br>
                                                                        </div>
                                                                    </div>


                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="boldpattern1">Bold Pattern1 </label>
                                                                                <input type="number" name="boldpattern1" class="form-control" placeholder="Pattern 1" value="{{@$car->boldpattern1}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="boldpattern2">Bold Pattern2</label>
                                                                                <input type="number" name="boldpattern2" class="form-control" placeholder="Pattern 2" value="{{@$car->boldpattern2}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="boldpattern3">Bold Pattern3</label>
                                                                                <input type="number" name="boldpattern3" class="form-control" placeholder="Pattern 3" value="{{@$car->boldpattern3}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="simpleoffset">Simple Offset</label>
                                                                                <select class="form-control select2" name="simpleoffset">
                                                                                    <option value="">Select Offset</option>
                                                                                    <option value="High" {{(@$car->simpleoffset == 'High')?'selected':''}}>High</option>
                                                                                    <option value="Low" {{(@$car->simpleoffset == 'Low')?'selected':''}}>Low</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="offset1">Offset 1</label>
                                                                                <input type="number" name="offset1" class="form-control" placeholder="Offset 1" value="{{@$car->offset1}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="offset2">Offset 2</label>
                                                                                <input type="number" name="offset2" class="form-control" placeholder="Offset 2" value="{{@$car->offset2}}">
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
                            </div>
                            <!-- New Model Content End -->
                            @empty
                            <tr>
                                <td colspan="5">No Cars found</td>
                            </tr>
                            @endforelse
                        </table>

                        {{$cars->appends(['diameter' => @Request::get('diameter'),'width' => @Request::get('width'),'brand' => @Request::get('brand'),'car_id' => @Request::get('car_id'),'page' => @Request::get('page')])->links()}}
                    </div>

                    <!--  New Model Start-->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Car Information</h4>
                                </div>
                                <div class="modal-body">
                                    <!-- New Model Content Start -->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="product-payment-inner-st">
                                            <form action="{{url('/admin/car/')}}" class="dropzone dropzone-custom needsclick add-professors dz-clickable" id="demo1-upload" method="POST" enctype="multipart/form-data">
                                                {{@csrf_field()}}
                                                <ul id="myTabedu1" class="tab-review-design">
                                                    <li class="active"><a href="#description2">Basic Details</a></li>
                                                </ul>
                                                <div id="myTabContent" class="tab-content custom-product-edit">
                                                    <div class="product-tab-list tab-pane fade active in" id="description2">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="review-content-section">
                                                                    <div id="dropzone1" class="pro-ad">

                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="vif">VIF Number <span class="req">*</span></label>
                                                                                    <input type="number" name="vif" class="form-control" placeholder="VIF Series Number" value="{{old('vif')}}" required="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="date_delivered">Deliver Date <span class="req">*</span></label>
                                                                                    <input type="date" name="date_delivered" class="form-control" placeholder="VIF Series Number" value="{{old('date_delivered')}}" required="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="yr">Year <span class="req">*</span></label>
                                                                                    <select class="form-control select2" name="yr" required="">
                                                                                        <option value="">Select Year</option>
                                                                                        @for(@$yr=date('Y');$yr >=2000;$yr--)
                                                                                        <option value="{{$yr}}" @if(old('yr')==$yr) selected @endif>{{$yr}}</option>
                                                                                        @endfor
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="make">Make <span class="req">*</span></label>
                                                                                    <select class="form-control select2 Make" name="make" required="">
                                                                                        <option value="">Select Make</option>
                                                                                        @foreach(@$makes as $key => $make)
                                                                                        <option value="{{$make->make}}" @if(old('make')==$make->make) selected @endif>{{$make->make}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="model">Model <span class="req">*</span></label>
                                                                                    <select class="form-control select2" name="model" required="">
                                                                                        <option value="">Select Model</option>
                                                                                        @foreach(@$models as $key => $model)
                                                                                        <option value="{{$model->model}}" @if(old('model')==$model->model) selected @endif >{{$model->model}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="trim">Trim <span class="req">*</span></label>
                                                                                    <select class="form-control select2" name="trim" required="">
                                                                                        <option value="" selected="">Select Trim</option>
                                                                                        @foreach(@$trims as $key => $trim)
                                                                                        <option value="{{$trim->trim}}" @if(old('trim')==$trim->trim ) selected @endif >{{$trim->trim}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="whls">Wheels <span class="req">*</span></label>
                                                                                    <select class="form-control select2" name="whls" required="">
                                                                                        <option value="">Select Wheels</option>
                                                                                        @foreach(@$wheels as $key => $whls)
                                                                                        <option value="{{$whls->whls}}" @if(old('whls')==$whls->whls) selected @endif >{{$whls->whls}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="body">Body <span class="req">*</span></label>
                                                                                    <select class="form-control select2" name="body" required="">
                                                                                        <option value="" selected="">Select Body</option>
                                                                                        @foreach(@$bodies as $key => $body)
                                                                                        <option value="{{$body->body}}" @if(old('body')==$body->body ) selected @endif >{{$body->body}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="drs">DRS <span class="req">*</span></label>
                                                                                    <input type="number" name="drs" class="form-control" placeholder="DRS" value="{{old('drs')}}" required="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="vin">VIN <span class="req">*</span></label>
                                                                                    <input type="text" name="vin" class="form-control" placeholder="VIN " value="{{old('vin')}}" required="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="org">Org </label>
                                                                                    <input type="text" name="org" class="form-control" placeholder="Org" value="{{old('org')}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="send">Send <span class="req">*</span></label>
                                                                                    <input type="text" name="send" class="form-control" placeholder="Send " value="{{old('send')}}" required="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul id="myTabedu1" class="tab-review-design">
                                                    <li class="active"><a href="#description2">Car Images</a></li>
                                                </ul>
                                                <div id="myTabContent" class="tab-content custom-product-edit">
                                                    <div class="product-tab-list tab-pane fade active in" id="description2">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="review-content-section">
        <div id="dropzone1" class="pro-ad upload-section">

            <div class="row">
                <a class="btn btn-success add-upload">Add New</a>
                <a class="btn btn-danger remove-upload">Remove One</a>
            </div>
            <div class="row fixed-upload-file">

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label for="cc">CC <span class="req">*</span></label>
                        <input type="text" name="cc[]" class="form-control" placeholder="Enter CC" value="{{old('cc')}}" required="">
                    </div>
                    <div class="form-group">
                        <label for="color_code">Color Code <span class="req">*</span></label>
                        <input type="text" name="color_code[]" class="form-control" placeholder="Color Code " value="{{old('color_code')}}" required="">
                    </div>

                    <div class="form-group">
                        <label for="evoxcode">Evox Code <span class="req">*</span></label>
                        <input type="text" name="evoxcode[]" class="form-control" placeholder="Color Code " value="{{old('evoxcode')}}" required="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label for="name">Full Name <span class="req">*</span></label>
                        <input type="text" name="name[]" class="form-control" placeholder="Full name" value="{{old('name')}}" required="">
                    </div>
                    <div class="form-group">
                        <label for="simple">Simple Name <span class="req">*</span></label>
                        <input type="text" name="simple[]" class="form-control" placeholder="Simple Name " value="{{old('simple')}}" required="">
                    </div>
                    <div class="form-group">
                        <label for="rgb1">RGB Color <span class="req">*</span></label>
                        <input type="text" name="rgb1[]" class="form-control" placeholder="RGB Color Code" value="{{old('rgb1')}}" required="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <label for="fname">Upload Image <span class="req">*</span></label>
                    <br>
                    <input type="file" accept="image/*" name="car_image[]" class="car_image dropify form-control-file" aria-describedby="fileHelp" required="" data-default-file="{{old('car_image')}}">
                    <br>
                </div>
            </div>
            <br>
        </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="payment-adress">
                        <input type="submit" class="disabled btn btn-primary waves-effect waves-light" value="Submit">

                    </div>
                </div>
            </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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
    $(function() {
        $(".wheelImage").popImg();
    })

    $('.add-upload').click(function(){
        var clonedDiv = $('.fixed-upload-file').clone();
        $(clonedDiv).removeClass('fixed-upload-file');
        $(clonedDiv).addClass('dynamic-upload-file');
        // $(clonedDiv).find('.car_image').removeClass('dropify');
        // $(clonedDiv).find('.car_image').addClass('dropify');
        console.log($(clonedDiv).find('.dropify'))
        var drDestroy = $(clonedDiv).find('.dropify').dropify();
        drDestroy = drDestroy.data('dropify') 
        if ($(clonedDiv).find('.dropify').isDropified()) {
            $(clonedDiv).find('.dropify').destroy();
        } else {
            $(clonedDiv).find('.dropify').init();
        }

        $('.upload-section').append(clonedDiv);
    });
    $('.remove-upload').click(function(){
        $('.upload-section').find('.dynamic-upload-file').last().remove();
    });
</script>
@endsection