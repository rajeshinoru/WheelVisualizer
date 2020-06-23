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



.upload-csv{
    float: right;
    /* position: absolute; */
    top: 20px;
    right: 35px;
    background: #ecb23d !important;
    padding: 6px 20px;
    color: #fff !important;
    border-radius: 4px;
    cursor: pointer;
    font-family: Montserrat !important;
    font-size: 12px !important;
}
.upload-csv>a{
    color: white;
}



</style>

<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>List of Vehicles</h4>
                    <div style="text-align:right;padding-bottom: 20px">
                        
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Vehicle</button>
                        
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#csvModal">Upload CSV </button>
                    
                    <a  class="btn btn-info"  href="{{url('admin/exportTable')}}?module=Vehicle">Export CSV </a>
                    
                    </div>
                    <div class="asset-inner">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Vehicle ID</th> 
                                    <th>VIF ID</th>  
                                    <th>Year</th>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Submodel</th>
                                    <!-- <th>sort_by_vehicle_type</th> -->
                                    <!-- <th>year_make_model_submodel</th> -->
                                    <!-- <th>make_model_submodel</th> -->
                                    <th>Wheel Type</th>
                                    <th>RF / LC</th>
                                    <th>Offroad</th>
                                    <th>Drive Type</th>
                                    <th>Body Type</th>
                                    <th>Body Number of Doors</th>
                                    <th>Bed Length</th>
                                    <th>Vehicle Type</th>
                                    <th>Liter</th> 
                                    <th>Region</th>
                                    <th>Custom Note</th>
                                    <th>Body</th>
                                    <th>Option</th>
                                    <th>Chassis ID</th> 
                                    <th>Model ID </th>
                                    <th> Actions</th>
                                </tr>
                            </thead> 
                            @forelse(@$vehicles as $key => $vehicle) 
                            <tr>
                                <td>{{@$key+1}}</td> 

                                <td>{{$vehicle->vehicle_id}}</td>
                                <!-- <td>{{$vehicle->base_vehicle_id}}</td> -->
                                <td>{{$vehicle->vif}}</td>
                                <td>{{$vehicle->year}}</td>
                                <td>{{$vehicle->make}}</td>
                                <td>{{$vehicle->model}}</td>
                                <td>{{$vehicle->submodel}}</td>
                                <!-- <td>{{$vehicle->sort_by_vehicle_type}}</td> -->
                                <!-- <td>{{$vehicle->year_make_model_submodel}}</td> -->
                                <!-- <td>{{$vehicle->make_model_submodel}}</td> -->
                                <td>{{$vehicle->wheel_type}}</td>
                                <td>{{$vehicle->rf_lc}}</td>
                                <td>{{$vehicle->offroad}}</td>
                                <td>{{$vehicle->drive_type}}</td>
                                <td>{{$vehicle->body_type}}</td>
                                <td>{{$vehicle->body_number_doors}}</td>
                                <td>{{$vehicle->bed_length}}</td>
                                <td>{{$vehicle->vehicle_type}}</td>
                                <td>{{$vehicle->liter}}</td>
                                <!-- <td>{{$vehicle->region_id}}</td> -->
                                <td>{{$vehicle->region}}</td>
                                <td>{{$vehicle->custom_note}}</td>
                                <td>{{$vehicle->body}}</td>
                                <td>{{$vehicle->option}}</td>
                                <td>{{$vehicle->dr_chassis_id}}</td>
                                <td>{{$vehicle->dr_model_id}}</td>
                                <td>

                                    <form action="{{ route('admin.vehicle.destroy', $vehicle->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">

                                    <a class="btn btn-default look-a-like" data-toggle="modal" data-target="#myModal{{@$key}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <button class="btn btn-default look-a-like" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>

                            <div class="modal fade" id="myModal{{@$key}}" role="dialog">
                                <div class="modal-body admin-form">
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

                                                                <form action="{{route('admin.vehicle.update',@$vehicle->id)}}" class=""   method="POST" enctype="multipart/form-data">
                                                                    {{@csrf_field()}}
                                                                    <input type="hidden" name="_method" value="PATCH"> 
                                                                        <div class="row">
                                                                   
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                               <div class="form-group">
                                                                                    <label for="make">Make <span class="req">*</span></label>
                                                                                    <input type="text" name="make" class="form-control" placeholder="Make" required="" value="{{@$vehicle->make}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                               <div class="form-group">
                                                                                    <label for="year">Year <span class="req">*</span></label>
                                                                                    <input type="text" name="year" class="form-control" placeholder="Year" required="" value="{{@$vehicle->year}}">
                                                                                </div>
                                                                            </div> 
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                               <div class="form-group">
                                                                                    <label for="model">Model <span class="req">*</span></label>
                                                                                    <input type="text" name="model" class="form-control" placeholder="Model" required="" value="{{@$vehicle->model}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                               <div class="form-group">
                                                                                    <label for="submodel">Submodel <span class="req">*</span></label>
                                                                                    <input type="text" name="submodel" class="form-control" placeholder="Sub Model" required="" value="{{@$vehicle->submodel}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>   
                                                                        <div class="row">         
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="wheel_type">Wheel Type  </label>
                                                                                    <input type="text" name="wheel_type" class="form-control" placeholder="Wheel Type" value="{{@$vehicle->wheel_type}}"  >
                                                                                </div>
                                                                            </div>          
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="rf_lc">RF / LC  </label>
                                                                                    <input type="text" name="rf_lc" class="form-control" placeholder="RF / LC" value="{{@$vehicle->rf_lc}}"  >
                                                                                </div>
                                                                            </div>    
                                                                        </div>
                                                                        <div class="row">
                                                                                  
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="offroad">Offroad  </label>
                                                                                    <input type="text" name="offroad" class="form-control" placeholder="Offroad" value="{{@$vehicle->offroad}}"  >
                                                                                </div>
                                                                            </div>                                                         
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="drive_type">Drive Type  </label>
                                                                                    <input type="text" name="drive_type" class="form-control" placeholder="Drive Type" value="{{@$vehicle->drive_type}}"  >
                                                                                </div>
                                                                            </div>   
                                                                        </div>
                                                                        <div class="row">
                                                                                  
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="body_type">Body Type  </label>
                                                                                    <input type="text" name="body_type" class="form-control" placeholder="Body Type" value="{{@$vehicle->body_type}}"  >
                                                                                </div>
                                                                            </div>                                                        
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="body_number_doors">Body Number of Doors</label>
                                                                                    <input type="text" name="body_number_doors" class="form-control" placeholder="Body Number of Doors" value="{{@$vehicle->body_number_doors}}"  >
                                                                                </div>
                                                                            </div>   
                                                                        </div>
                                                                        <div class="row">
                                                                                  
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="bed_length">Bed Length  </label>
                                                                                    <input type="text" name="bed_length" class="form-control" placeholder="Bed Length" value="{{@$vehicle->bed_length}}"  >
                                                                                </div>
                                                                            </div>                                                        
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="vehicle_type">Vehicle Type</label>
                                                                                    <input type="text" name="vehicle_type" class="form-control" placeholder="Vehicle Type" value="{{@$vehicle->vehicle_type}}"  >
                                                                                </div>
                                                                            </div>   
                                                                        </div>
                                                                        <div class="row">
                                                                                  
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="liter">Liter  </label>
                                                                                    <input type="text" name="liter" class="form-control" placeholder="Liter" value="{{@$vehicle->liter}}"  >
                                                                                </div>
                                                                            </div>                                                        
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="region">Region</label>
                                                                                    <input type="text" name="region" class="form-control" placeholder="Region" value="{{@$vehicle->region}}"  >
                                                                                </div>
                                                                            </div>   
                                                                        </div>
                                                                        <div class="row">                                                        
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="body">Body</label>
                                                                                    <input type="text" name="body" class="form-control" placeholder="Body" value="{{@$vehicle->body}}"  >
                                                                                </div>
                                                                            </div>                                                
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="option">Option</label>
                                                                                    <input type="text" name="option" class="form-control" placeholder="Option" value="{{@$vehicle->option}}"  >
                                                                                </div>
                                                                            </div>   
                                                                        </div>
                                                                        <div class="row">
                                                                                  
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="custom_note">Custom Note  </label>
                                                                                    <input type="text" name="custom_note" class="form-control" placeholder="Custom Note" value="{{@$vehicle->custom_note}}"  >
                                                                                </div>
                                                                            </div>           
                                                                        </div>

                                                                        <div class="row">
                                                                                  
                                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="vehicle_id">Vehicle ID  </label>
                                                                                    <input type="text" name="vehicle_id" class="form-control" placeholder="Vehicle ID" value="{{@$vehicle->vehicle_id}}"  >
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="vif">VIF ID  </label>
                                                                                    <input type="text" name="vif" class="form-control" placeholder="VIF ID" value="{{@$vehicle->vif}}"  >
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="dr_chassis_id">Chassis ID  </label>
                                                                                    <input type="text" name="dr_chassis_id" class="form-control" placeholder="Chassis ID" value="{{@$vehicle->dr_chassis_id}}"  >
                                                                                </div>
                                                                            </div>                                                        
                                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="dr_model_id">Model ID</label>
                                                                                    <input type="text" name="dr_model_id" class="form-control" placeholder="Model ID" value="{{@$vehicle->dr_model_id}}"  >
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
                            </div>


                            @empty
                            <tr>
                                <td colspan="5">No Vehicle found</td>
                            </tr>
                            @endforelse
                        </table>

                    </div>

                        {{$vehicles->links()}}
                    <!--  New Model Start-->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Vehicle Information</h4>
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

                                                                    <form action="{{url('/admin/vehicle/')}}" class="dropzone dropzone-custom needsclick add-professors dz-clickable" id="demo1-upload" method="POST" enctype="multipart/form-data">
                                                                        {{@csrf_field()}}
                                                                        <div class="row">
                                                                   
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                               <div class="form-group">
                                                                                    <label for="make">Make <span class="req">*</span></label>
                                                                                    <input type="text" name="make" class="form-control" placeholder="Make" required="" value="{{old('make')}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                               <div class="form-group">
                                                                                    <label for="year">Year <span class="req">*</span></label>
                                                                                    <input type="text" name="year" class="form-control" placeholder="Year" required="" value="{{old('year')}}">
                                                                                </div>
                                                                            </div> 
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                               <div class="form-group">
                                                                                    <label for="model">Model <span class="req">*</span></label>
                                                                                    <input type="text" name="model" class="form-control" placeholder="Model" required="" value="{{old('model')}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                               <div class="form-group">
                                                                                    <label for="submodel">Submodel <span class="req">*</span></label>
                                                                                    <input type="text" name="submodel" class="form-control" placeholder="Sub Model" required="" value="{{old('submodel')}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>   
                                                                        <div class="row">         
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="wheel_type">Wheel Type  </label>
                                                                                    <input type="text" name="wheel_type" class="form-control" placeholder="Wheel Type" value="{{old('wheel_type')}}"  >
                                                                                </div>
                                                                            </div>          
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="rf_lc">RF / LC  </label>
                                                                                    <input type="text" name="rf_lc" class="form-control" placeholder="RF / LC" value="{{old('rf_lc')}}"  >
                                                                                </div>
                                                                            </div>    
                                                                        </div>
                                                                        <div class="row">
                                                                                  
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="offroad">Offroad  </label>
                                                                                    <input type="text" name="offroad" class="form-control" placeholder="Offroad" value="{{old('offroad')}}"  >
                                                                                </div>
                                                                            </div>                                                         
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="drive_type">Drive Type  </label>
                                                                                    <input type="text" name="drive_type" class="form-control" placeholder="Drive Type" value="{{old('drive_type')}}"  >
                                                                                </div>
                                                                            </div>   
                                                                        </div>
                                                                        <div class="row">
                                                                                  
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="body_type">Body Type  </label>
                                                                                    <input type="text" name="body_type" class="form-control" placeholder="Body Type" value="{{old('body_type')}}"  >
                                                                                </div>
                                                                            </div>                                                        
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="body_number_doors">Body Number of Doors</label>
                                                                                    <input type="text" name="body_number_doors" class="form-control" placeholder="Body Number of Doors" value="{{old('body_number_doors')}}"  >
                                                                                </div>
                                                                            </div>   
                                                                        </div>
                                                                        <div class="row">
                                                                                  
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="bed_length">Bed Length  </label>
                                                                                    <input type="text" name="bed_length" class="form-control" placeholder="Bed Length" value="{{old('bed_length')}}"  >
                                                                                </div>
                                                                            </div>                                                        
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="vehicle_type">Vehicle Type</label>
                                                                                    <input type="text" name="vehicle_type" class="form-control" placeholder="Vehicle Type" value="{{old('vehicle_type')}}"  >
                                                                                </div>
                                                                            </div>   
                                                                        </div>
                                                                        <div class="row">
                                                                                  
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="liter">Liter  </label>
                                                                                    <input type="text" name="liter" class="form-control" placeholder="Liter" value="{{old('liter')}}"  >
                                                                                </div>
                                                                            </div>                                                        
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="region">Region</label>
                                                                                    <input type="text" name="region" class="form-control" placeholder="Region" value="{{old('region')}}"  >
                                                                                </div>
                                                                            </div>   
                                                                        </div>
                                                                        <div class="row">                                                        
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="body">Body</label>
                                                                                    <input type="text" name="body" class="form-control" placeholder="Body" value="{{old('body')}}"  >
                                                                                </div>
                                                                            </div>                                                
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="option">Option</label>
                                                                                    <input type="text" name="option" class="form-control" placeholder="Option" value="{{old('option')}}"  >
                                                                                </div>
                                                                            </div>   
                                                                        </div>
                                                                        <div class="row">
                                                                                  
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="custom_note">Custom Note  </label>
                                                                                    <input type="text" name="custom_note" class="form-control" placeholder="Custom Note" value="{{old('custom_note')}}"  >
                                                                                </div>
                                                                            </div>           
                                                                        </div>

                                                                        <div class="row">
                                                                                  
                                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="vehicle_id">Vehicle ID  </label>
                                                                                    <input type="text" name="vehicle_id" class="form-control" placeholder="Vehicle ID" value="{{old('vehicle_id')}}"  >
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="vif">VIF ID  </label>
                                                                                    <input type="text" name="vif" class="form-control" placeholder="VIF ID" value="{{old('vif')}}"  >
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="dr_chassis_id">Chassis ID  </label>
                                                                                    <input type="text" name="dr_chassis_id" class="form-control" placeholder="Chassis ID" value="{{old('dr_chassis_id')}}"  >
                                                                                </div>
                                                                            </div>                                                        
                                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="dr_model_id">Model ID</label>
                                                                                    <input type="text" name="dr_model_id" class="form-control" placeholder="Model ID" value="{{old('dr_model_id')}}"  >
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

                    <!--  New Model Start-->
                    <div class="modal fade" id="csvModal" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Upload CSV File</h4>
                                </div>
                                <div class="modal-body">
                                    <!-- New Model Content Start -->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="product-payment-inner-st"> 
                                            <div id="myTabContent" class="tab-content custom-product-edit">
                                                <div class="product-tab-list tab-pane fade active in" id="description2">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="review-content-section">
                                                                <div id="dropzone1" class="pro-ad">

                                                                    <form action="{{url('/admin/vehicle/uploadcsv')}}" class="dropzone dropzone-custom needsclick add-professors dz-clickable" id="demo1-upload" method="POST" enctype="multipart/form-data">
                                                                        {{@csrf_field()}} 
                                                                        <div class="row">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <label for="vehicleuploadedfile">CSV Formated File <span class="req">*</span></label>
                                                                                <br>
                                                                                <input type="file"  name="vehicleuploadedfile"  class="dropify form-control-file" aria-describedby="fileHelp" required="">
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
    $(function() {
        $(".wheelImage").popImg();
    });
// $(".form-control-file").click(function(){
//     // $new = $(this).clone().removeClass('dropify');
//     // $(this).after($new);

//   $(this).parent().closest('.dropify-wrapper').find('.hidden-file-input').click();
// });

    
</script>
@endsection