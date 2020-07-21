@extends('admin.layouts.app')

@section('content')

<?php
$is_read_access = VerifyAccess('chassis','read');
$is_write_access = VerifyAccess('chassis','write');
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
                    <h4>List of Chassis</h4>
                    <div style="text-align:right;padding-bottom: 20px">
                    @if($is_write_access)
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Chassis</button> 
                    @endif
                    <a  class="btn btn-info"  href="{{url('admin/exportTable')}}?module=Chassis">Export CSV </a>
                    
                    </div>
                    <div class="asset-inner">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Chassis ID</th>
                                    <th>PCD</th>
                                    <th>Centre Bore</th>
                                    <th>Center Bore R</th>
                                    <th>Max.Wheel Load</th>
                                    <th>Nutbolt</th>
                                    <th>Nutbolt Thread Type</th>
                                    <th>Nutbolt Hex</th>
                                    <th>Bolt Length</th>
                                    <th>Min.Bolt Length</th>
                                    <th>Max.Bolt Length</th>
                                    <th>Nutbolt Torque</th>
                                    <th>Front Vehicle Track</th>
                                    <th>Rear Vehicle Track</th>
                                    <th>Max Rim Width</th>
                                    <th>Min Rim Width</th>
                                    <th>Max Rim Width Front</th>
                                    <th>Max Rim Width Rear</th>
                                    <th>Max ET Front</th>
                                    <th>Min ET Front</th>
                                    <th>Max ET Rear</th>
                                    <th>Min ET Rear</th>
                                    <th>GVW</th>
                                    <th>Max Speed</th>
                                    <th>Front Axle Weight</th>
                                    <th>Rear Axle Weight</th>
                                    <th>Kerb Weight</th>
                                    <th>Caliper</th>
                                    <th>OE Tire Description</th>
                                    <th>TPMS</th>
                                    <th>XFactor</th>
                                    @if($is_write_access)
                                    <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            @forelse(@$chassises as $key => $chassis)
                            <tr>
                                <td>{{@$key+1}}</td>
                                <td>{{@$chassis->chassis_id?:'-'}}</td>
                                <td>{{@$chassis->pcd?:'-'}}</td>
                                <td>{{@$chassis->centre_bore?:'-'}}</td>
                                <td>{{@$chassis->centre_borer?:'-'}}</td>
                                <td>{{@$chassis->max_wheel_load?:'-'}}</td>
                                <td>{{@$chassis->nutbolt?:'-'}}</td>
                                <td>{{@$chassis->nutbolt_thread_type?:'-'}}</td>
                                <td>{{@$chassis->nutbolt_hex?:'-'}}</td>
                                <td>{{@$chassis->boltlength?:'-'}}</td>
                                <td>{{@$chassis->min_bolt_length?:'-'}}</td>
                                <td>{{@$chassis->max_bolt_length?:'-'}}</td>
                                <td>{{@$chassis->nutbolt_torque?:'-'}}</td>
                                <td>{{@$chassis->front_vehicle_track?:'-'}}</td>
                                <td>{{@$chassis->rear_vehicle_track?:'-'}}</td>
                                <td>{{@$chassis->max_rim_width?:'-'}}</td>
                                <td>{{@$chassis->min_rim_width?:'-'}}</td>
                                <td>{{@$chassis->max_rim_width_front?:'-'}}</td>
                                <td>{{@$chassis->max_rim_width_rear?:'-'}}</td>
                                <td>{{@$chassis->max_et_front?:'-'}}</td>
                                <td>{{@$chassis->min_et_front?:'-'}}</td>
                                <td>{{@$chassis->max_et_rear?:'-'}}</td>
                                <td>{{@$chassis->min_et_rear?:'-'}}</td>
                                <td>{{@$chassis->gvw?:'-'}}</td>
                                <td>{{@$chassis->max_speed?:'-'}}</td>
                                <td>{{@$chassis->front_axle_weight?:'-'}}</td>
                                <td>{{@$chassis->rear_axle_weight?:'-'}}</td>
                                <td>{{@$chassis->kerb_weight?:'-'}}</td>
                                <td>{{@$chassis->caliper?:'-'}}</td>
                                <td class="td-center">
                                    @if($chassis->oe_tire_description)
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
                                                        <?=@$chassis->oe_tire_description?>
                                                        </pre>
                                                    </h4>
                                                    <div class="form-group has-success has-feedback text-center">
                                                        <button class="btn btn-info btn-close" type="button" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{@$chassis->tpms?:'-'}}</td>
                                <td>{{@$chassis->xfactor?:'-'}}</td>
                                @if($is_write_access)
                                <td>

                                    <a class="btn btn-info" href="{{route('admin.chassismodel.show',$chassis->id)}}">View Models</a> 
                                    <a type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$key}}"><i class="fa fa-edit"></i></a>


                                    <a type="button" class="btn btn-danger delete-post" data-key="{{$key}}"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{$key}}" action="{{route('admin.chassis.destroy',$chassis->id)}}" method="POST" novalidate="">
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
                                    <h4 class="modal-title">Edit Chassis</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                        <form action="{{ route('admin.chassis.update', $chassis->id)}}" class=" needsclick addcourse" method="POST" id="update-post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}


                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Chassis ID</div>
                                                    <div class="col-md-6">
<input type="text" name="chassis_id" class="form-control" placeholder="Give the chassis_id of the chassis" required="" value="{{$chassis->chassis_id}}">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">PCD</div>
                                                    <div class="col-md-6">
<input type="text" name="pcd" class="form-control" placeholder="Give the pcd of the chassis" required="" value="{{$chassis->pcd}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Centre Bore</div>
                                                    <div class="col-md-6">
<input type="text" name="centre_bore" class="form-control" placeholder="Give the centre_bore of the chassis" value="{{$chassis->centre_bore}}">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Center Bore R</div>
                                                    <div class="col-md-6">
<input type="text" name="centre_borer" class="form-control" placeholder="Give the centre_borer of the chassis"  value="{{$chassis->centre_borer}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Max.Wheel Load</div>
                                                    <div class="col-md-6">
<input type="text" name="max_wheel_load" class="form-control" placeholder="Give the max_wheel_load of the chassis"  value="{{$chassis->max_wheel_load}}">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Nutbolt</div>
                                                    <div class="col-md-6">
<input type="text" name="nutbolt" class="form-control" placeholder="Give the nutbolt of the chassis"  value="{{$chassis->nutbolt}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Nutbolt Thread Type</div>
                                                    <div class="col-md-6">
<input type="text" name="nutbolt_thread_type" class="form-control" placeholder="Give the nutbolt_thread_type of the chassis"  value="{{$chassis->nutbolt_thread_type}}">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Nutbolt Hex</div>
                                                    <div class="col-md-6">
<input type="text" name="nutbolt_hex" class="form-control" placeholder="Give the nutbolt_hex of the chassis"  value="{{$chassis->nutbolt_hex}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Bolt Length</div>
                                                    <div class="col-md-6">
<input type="text" name="boltlength" class="form-control" placeholder="Give the boltlength of the chassis"  value="{{$chassis->boltlength}}">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Min.Bolt Length</div>
                                                    <div class="col-md-6">
<input type="text" name="min_bolt_length" class="form-control" placeholder="Give the min_bolt_length of the chassis"  value="{{$chassis->min_bolt_length}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Max.Bolt Length</div>
                                                    <div class="col-md-6">
<input type="text" name="max_bolt_length" class="form-control" placeholder="Give the max_bolt_length of the chassis"  value="{{$chassis->max_bolt_length}}">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Nutbolt Torque</div>
                                                    <div class="col-md-6">
<input type="text" name="nutbolt_torque" class="form-control" placeholder="Give the nutbolt_torque of the chassis"  value="{{$chassis->nutbolt_torque}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Front Vehicle Track</div>
                                                    <div class="col-md-6">
<input type="text" name="front_vehicle_track" class="form-control" placeholder="Give the front_vehicle_track of the chassis"  value="{{$chassis->front_vehicle_track}}">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Rear Vehicle Track</div>
                                                    <div class="col-md-6">
<input type="text" name="rear_vehicle_track" class="form-control" placeholder="Give the rear_vehicle_track of the chassis"  value="{{$chassis->rear_vehicle_track}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Max Rim Width</div>
                                                    <div class="col-md-6">
<input type="text" name="max_rim_width" class="form-control" placeholder="Give the max_rim_width of the chassis"  value="{{$chassis->max_rim_width}}">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Min Rim Width</div>
                                                    <div class="col-md-6">
<input type="text" name="min_rim_width" class="form-control" placeholder="Give the min_rim_width of the chassis"  value="{{$chassis->min_rim_width}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Max Rim Width Front</div>
                                                    <div class="col-md-6">
<input type="text" name="max_rim_width_front" class="form-control" placeholder="Give the max_rim_width_front of the chassis"  value="{{$chassis->max_rim_width_front}}">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Max Rim Width Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="max_rim_width_rear" class="form-control" placeholder="Give the max_rim_width_rear of the chassis"  value="{{$chassis->max_rim_width_rear}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Max ET Front</div>
                                                    <div class="col-md-6">
<input type="text" name="max_et_front" class="form-control" placeholder="Give the max_et_front of the chassis"  value="{{$chassis->max_et_front}}">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Min ET Front</div>
                                                    <div class="col-md-6">
<input type="text" name="min_et_front" class="form-control" placeholder="Give the min_et_front of the chassis"  value="{{$chassis->min_et_front}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Max ET Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="max_et_rear" class="form-control" placeholder="Give the max_et_rear of the chassis"  value="{{$chassis->max_et_rear}}">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Min ET Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="min_et_rear" class="form-control" placeholder="Give the min_et_rear of the chassis"  value="{{$chassis->min_et_rear}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">GVW</div>
                                                    <div class="col-md-6">
<input type="text" name="gvw" class="form-control" placeholder="Give the gvw of the chassis"  value="{{$chassis->gvw}}">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Max Speed</div>
                                                    <div class="col-md-6">
<input type="text" name="max_speed" class="form-control" placeholder="Give the max_speed of the chassis"  value="{{$chassis->max_speed}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Front Axle Weight</div>
                                                    <div class="col-md-6">
<input type="text" name="front_axle_weight" class="form-control" placeholder="Give the front_axle_weight of the chassis"  value="{{$chassis->front_axle_weight}}">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Rear Axle Weight</div>
                                                    <div class="col-md-6">
<input type="text" name="rear_axle_weight" class="form-control" placeholder="Give the rear_axle_weight of the chassis"  value="{{$chassis->rear_axle_weight}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Kerb Weight</div>
                                                    <div class="col-md-6">
<input type="text" name="kerb_weight" class="form-control" placeholder="Give the kerb_weight of the chassis"  value="{{$chassis->kerb_weight}}">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Caliper</div>
                                                    <div class="col-md-6">
<input type="text" name="caliper" class="form-control" placeholder="Give the caliper of the chassis"  value="{{$chassis->caliper}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">OE Tire Description</div>
                                                    <div class="col-md-6">
<input type="text" name="oe_tire_description" class="form-control" placeholder="Give the oe_tire_description of the chassis"  value="{{$chassis->oe_tire_description}}">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">TPMS</div>
                                                    <div class="col-md-6">
<input type="text" name="tpms" class="form-control" placeholder="Give the tpms of the chassis"  value="{{$chassis->tpms}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">XFactor</div>
                                                    <div class="col-md-6">
<input type="text" name="xfactor" class="form-control" placeholder="Give the xfactor of the chassis"  value="{{$chassis->xfactor}}">
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
                            @empty

                            <tr>
                                <td colspan="5">No Chassis Details found</td>
                            </tr>
                            @endforelse
                        </table>

                        {{$chassises->links()}}
                    </div>
 

                    <!--  New Model Start-->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add New Chassis</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                        <form action="{{ route('admin.chassis.store')}}" class=" needsclick addcourse" method="POST" id="demo1-upload" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Chassis ID</div>
                                                    <div class="col-md-6">
<input type="text" name="chassis_id" class="form-control" placeholder="Give the chassis_id of the chassis" required="" value="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">PCD</div>
                                                    <div class="col-md-6">
<input type="text" name="pcd" class="form-control" placeholder="Give the pcd of the chassis" required="" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Centre Bore</div>
                                                    <div class="col-md-6">
<input type="text" name="centre_bore" class="form-control" placeholder="Give the centre_bore of the chassis" value="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Center Bore Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="centre_borer" class="form-control" placeholder="Give the centre_bore rear of the chassis"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Max.Wheel Load</div>
                                                    <div class="col-md-6">
<input type="text" name="max_wheel_load" class="form-control" placeholder="Give the max_wheel_load of the chassis"  value="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Nutbolt</div>
                                                    <div class="col-md-6">
<input type="text" name="nutbolt" class="form-control" placeholder="Give the nutbolt of the chassis"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Nutbolt Thread Type</div>
                                                    <div class="col-md-6">
<input type="text" name="nutbolt_thread_type" class="form-control" placeholder="Give the nutbolt_thread_type of the chassis"  value="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Nutbolt Hex</div>
                                                    <div class="col-md-6">
<input type="text" name="nutbolt_hex" class="form-control" placeholder="Give the nutbolt_hex of the chassis"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Bolt Length</div>
                                                    <div class="col-md-6">
<input type="text" name="boltlength" class="form-control" placeholder="Give the boltlength of the chassis"  value="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Min.Bolt Length</div>
                                                    <div class="col-md-6">
<input type="text" name="min_bolt_length" class="form-control" placeholder="Give the min_bolt_length of the chassis"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Max.Bolt Length</div>
                                                    <div class="col-md-6">
<input type="text" name="max_bolt_length" class="form-control" placeholder="Give the max_bolt_length of the chassis"  value="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Nutbolt Torque</div>
                                                    <div class="col-md-6">
<input type="text" name="nutbolt_torque" class="form-control" placeholder="Give the nutbolt_torque of the chassis"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Front Vehicle Track</div>
                                                    <div class="col-md-6">
<input type="text" name="front_vehicle_track" class="form-control" placeholder="Give the front_vehicle_track of the chassis"  value="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Rear Vehicle Track</div>
                                                    <div class="col-md-6">
<input type="text" name="rear_vehicle_track" class="form-control" placeholder="Give the rear_vehicle_track of the chassis"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Max Rim Width</div>
                                                    <div class="col-md-6">
<input type="text" name="max_rim_width" class="form-control" placeholder="Give the max_rim_width of the chassis"  value="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Min Rim Width</div>
                                                    <div class="col-md-6">
<input type="text" name="min_rim_width" class="form-control" placeholder="Give the min_rim_width of the chassis"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Max Rim Width Front</div>
                                                    <div class="col-md-6">
<input type="text" name="max_rim_width_front" class="form-control" placeholder="Give the max_rim_width_front of the chassis"  value="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Max Rim Width Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="max_rim_width_rear" class="form-control" placeholder="Give the max_rim_width_rear of the chassis"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Max ET Front</div>
                                                    <div class="col-md-6">
<input type="text" name="max_et_front" class="form-control" placeholder="Give the max_et_front of the chassis"  value="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Min ET Front</div>
                                                    <div class="col-md-6">
<input type="text" name="min_et_front" class="form-control" placeholder="Give the min_et_front of the chassis"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Max ET Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="max_et_rear" class="form-control" placeholder="Give the max_et_rear of the chassis"  value="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Min ET Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="min_et_rear" class="form-control" placeholder="Give the min_et_rear of the chassis"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">GVW</div>
                                                    <div class="col-md-6">
<input type="text" name="gvw" class="form-control" placeholder="Give the gvw of the chassis"  value="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Max Speed</div>
                                                    <div class="col-md-6">
<input type="text" name="max_speed" class="form-control" placeholder="Give the max_speed of the chassis"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Front Axle Weight</div>
                                                    <div class="col-md-6">
<input type="text" name="front_axle_weight" class="form-control" placeholder="Give the front_axle_weight of the chassis"  value="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Rear Axle Weight</div>
                                                    <div class="col-md-6">
<input type="text" name="rear_axle_weight" class="form-control" placeholder="Give the rear_axle_weight of the chassis"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Kerb Weight</div>
                                                    <div class="col-md-6">
<input type="text" name="kerb_weight" class="form-control" placeholder="Give the kerb_weight of the chassis"  value="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Caliper</div>
                                                    <div class="col-md-6">
<input type="text" name="caliper" class="form-control" placeholder="Give the caliper of the chassis"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">OE Tire Description</div>
                                                    <div class="col-md-6">
<input type="text" name="oe_tire_description" class="form-control" placeholder="Give the oe_tire_description of the chassis"  value="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">TPMS</div>
                                                    <div class="col-md-6">
<input type="text" name="tpms" class="form-control" placeholder="Give the tpms of the chassis"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">XFactor</div>
                                                    <div class="col-md-6">
<input type="text" name="xfactor" class="form-control" placeholder="Give the xfactor of the chassis"  value="">
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
            if (confirm("Are you sure want to remove chassis ? .It's chassismodels will be deleted!")) {
                $('#delete-form-'+$(this).data('key')).submit();
            }
            return false;
    })
</script>
@endsection











