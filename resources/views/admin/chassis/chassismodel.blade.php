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
</style>

<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>Chassis  > {{@$chassis->chassis_id}} Models </h4>
                    <div style="text-align:right;padding-bottom: 20px">
                        
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Model</button> 
                    
                    <a  class="btn btn-info"  href="{{url('admin/exportTable')}}?module=ChassisModel">All ChassisModel - Export CSV </a>
                    
                    </div>
                    <div class="asset-inner">
                        <table>
                            <thead>
                                <tr>
                                    <th> S.No </th>
                                    <th>Chassis ID</th>
                                    <th>Model ID</th>
                                    <th>P/LT</th>
                                    <th>Tire Size</th>
                                    <th>Load Index</th>
                                    <th>Speed Index</th>
                                    <th>Tire pressure</th>
                                    <th>Tire Size Rear</th>
                                    <th>Rim Size</th>
                                    <th>Rim Size Rear</th>
                                    <th>Load Index Rear</th>
                                    <th>Speed Index Rear</th>
                                    <th>Tire pressure Rear</th>
                                    <th>Model Laden TP Front</th>
                                    <th>Model Laden TP Rear</th>
                                    <th>Run Flat Front</th>
                                    <th>Run Flat Rear</th>
                                    <th>Extra Load Front</th>
                                    <th>Extra Load Rear</th>
                                    <th>TP Front PSI</th>
                                    <th>TP Rear PSI</th>
                                    <th>LTP Front PSI</th>
                                    <th>LTP Rear PSI</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @forelse(@$chassismodels as $key => $chassismodel)
                            <tr>
                                <td>{{@$key+1}}</td>
                                <td>{{@$chassismodel->chassis_id?:'-'}}</td> 
                                <td>{{@$chassismodel->model_id?:'-'}}</td>
                                <td>{{@$chassismodel->p_lt?:'-'}}</td>
                                <td>{{@$chassismodel->tire_size?:'-'}}</td>
                                <td>{{@$chassismodel->load_index?:'-'}}</td>
                                <td>{{@$chassismodel->speed_index?:'-'}}</td>
                                <td>{{@$chassismodel->tire_pressure?:'-'}}</td>
                                <td>{{@$chassismodel->tire_size_r?:'-'}}</td>
                                <td>{{@$chassismodel->rim_size?:'-'}}</td>
                                <td>{{@$chassismodel->rim_size_r?:'-'}}</td>
                                <td>{{@$chassismodel->load_index_r?:'-'}}</td>
                                <td>{{@$chassismodel->speed_index_r?:'-'}}</td>
                                <td>{{@$chassismodel->tire_pressure_r?:'-'}}</td>
                                <td>{{@$chassismodel->model_laden_tp_f?:'-'}}</td>
                                <td>{{@$chassismodel->model_laden_tp_r?:'-'}}</td>
                                <td>{{@$chassismodel->run_flat_f?:'-'}}</td>
                                <td>{{@$chassismodel->run_flat_r?:'-'}}</td>
                                <td>{{@$chassismodel->extra_load_f?:'-'}}</td>
                                <td>{{@$chassismodel->extra_load_r?:'-'}}</td>
                                <td>{{@$chassismodel->tp_f_psi?:'-'}}</td>
                                <td>{{@$chassismodel->tp_r_psi?:'-'}}</td>
                                <td>{{@$chassismodel->ltp_f_psi?:'-'}}</td>
                                <td>{{@$chassismodel->ltp_r_psi?:'-'}}</td>
                                <td>

                                    
                                    <a type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$key}}"><i class="fa fa-edit"></i></a>


                                    <a type="button" class="btn btn-danger delete-post" data-key="{{$key}}"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{$key}}" action="{{route('admin.chassismodel.destroy',$chassismodel->id)}}" method="POST" novalidate="">
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
                                    <h4 class="modal-title">Edit Model</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                        <form action="{{ route('admin.chassismodel.update', $chassismodel->id)}}" class=" needsclick addcourse" method="POST" id="update-post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}

                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Chassis ID</div>
                                                    <div class="col-md-6">
<input type="text" name="chassis_id" class="form-control" placeholder="Give the chassis_id of the chassis model" required="" value="{{$chassismodel->chassis_id}}">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Model ID</div>
                                                    <div class="col-md-6">
<input type="text" name="model_id" class="form-control" placeholder="Give the model_id of the chassis model" required="" value="{{$chassismodel->model_id}}">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">P/LT</div>
                                                    <div class="col-md-6">
<input type="text" name="p_lt" class="form-control" placeholder="Give the p_lt of the chassis model"  value="{{$chassismodel->p_lt}}">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Tire Size</div>
                                                    <div class="col-md-6">
<input type="text" name="tire_size" class="form-control" placeholder="Give the tire_size of the chassis model" required="" value="{{$chassismodel->tire_size}}">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Load Index</div>
                                                    <div class="col-md-6">
<input type="text" name="load_index" class="form-control" placeholder="Give the load_index of the chassis model" required="" value="{{$chassismodel->load_index}}">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Speed Index</div>
                                                    <div class="col-md-6">
<input type="text" name="speed_index" class="form-control" placeholder="Give the speed_index of the chassis model" required="" value="{{$chassismodel->speed_index}}">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Tire pressure</div>
                                                    <div class="col-md-6">
<input type="text" name="tire_pressure" class="form-control" placeholder="Give the tire_pressure of the chassis model"  value="{{$chassismodel->tire_pressure}}">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Tire Size Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="tire_size_r" class="form-control" placeholder="Give the tire_size_r of the chassis model"  value="{{$chassismodel->tire_size_r}}">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Rim Size</div>
                                                    <div class="col-md-6">
<input type="text" name="rim_size" class="form-control" placeholder="Give the rim_size of the chassis model"  value="{{$chassismodel->rim_size}}">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Rim Size Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="rim_size_r" class="form-control" placeholder="Give the rim_size_r of the chassis model"  value="{{$chassismodel->rim_size_r}}">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Load Index Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="load_index_r" class="form-control" placeholder="Give the load_index_r of the chassis model"  value="{{$chassismodel->load_index_r}}">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Speed Index Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="speed_index_r" class="form-control" placeholder="Give the speed_index_r of the chassis model"  value="{{$chassismodel->speed_index_r}}">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Tire pressure Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="tire_pressure_r" class="form-control" placeholder="Give the tire_pressure_r of the chassis model"  value="{{$chassismodel->tire_pressure_r}}">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Model Laden TP Front</div>
                                                    <div class="col-md-6">
<input type="text" name="model_laden_tp_f" class="form-control" placeholder="Give the model_laden_tp_f of the chassis model"  value="{{$chassismodel->model_laden_tp_f}}">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Model Laden TP Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="model_laden_tp_r" class="form-control" placeholder="Give the model_laden_tp_r of the chassis model"  value="{{$chassismodel->model_laden_tp_r}}">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Run Flat Front</div>
                                                    <div class="col-md-6">
<input type="text" name="run_flat_f" class="form-control" placeholder="Give the run_flat_f of the chassis model"  value="{{$chassismodel->run_flat_f}}">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Run Flat Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="run_flat_r" class="form-control" placeholder="Give the run_flat_r of the chassis model"  value="{{$chassismodel->run_flat_r}}">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Extra Load Front</div>
                                                    <div class="col-md-6">
<input type="text" name="extra_load_f" class="form-control" placeholder="Give the extra_load_f of the chassis model"  value="{{$chassismodel->extra_load_f}}">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Extra Load Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="extra_load_r" class="form-control" placeholder="Give the extra_load_r of the chassis model"  value="{{$chassismodel->extra_load_r}}">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">TP Front PSI</div>
                                                    <div class="col-md-6">
<input type="text" name="tp_f_psi" class="form-control" placeholder="Give the tp_f_psi of the chassis model"  value="{{$chassismodel->tp_f_psi}}">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">TP Rear PSI</div>
                                                    <div class="col-md-6">
<input type="text" name="tp_r_psi" class="form-control" placeholder="Give the tp_r_psi of the chassis model"  value="{{$chassismodel->tp_r_psi}}">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">LTP Front PSI</div>
                                                    <div class="col-md-6">
<input type="text" name="ltp_f_psi" class="form-control" placeholder="Give the ltp_f_psi of the chassis model"  value="{{$chassismodel->ltp_f_psi}}">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">LTP Rear PSI</div>
                                                    <div class="col-md-6">
<input type="text" name="ltp_r_psi" class="form-control" placeholder="Give the ltp_r_psi of the chassis model"  value="{{$chassismodel->ltp_r_psi}}">
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
                                <td colspan="5">No Chassis Models found</td>
                            </tr>
                            @endforelse
                        </table>

                        {{$chassismodels->links()}}
                    </div>
 

                    <!--  New Model Start-->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add New Model</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                        <form action="{{ route('admin.chassismodel.store')}}" class=" needsclick addcourse" method="POST" id="demo1-upload" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            
                                          
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Chassis ID</div>
                                                    <div class="col-md-6">
<input type="text" name="chassis_id" class="form-control" placeholder="Give the chassis_id of the chassis model" required="" value="{{@$chassis->chassis_id}}">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Model ID</div>
                                                    <div class="col-md-6">
<input type="text" name="model_id" class="form-control" placeholder="Give the model_id of the chassis model" required="" value="">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">P/LT</div>
                                                    <div class="col-md-6">
<input type="text" name="p_lt" class="form-control" placeholder="Give the p_lt of the chassis model"  value="">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Tire Size</div>
                                                    <div class="col-md-6">
<input type="text" name="tire_size" class="form-control" placeholder="Give the tire_size of the chassis model" required="" value="">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Load Index</div>
                                                    <div class="col-md-6">
<input type="text" name="load_index" class="form-control" placeholder="Give the load_index of the chassis model" required="" value="">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Speed Index</div>
                                                    <div class="col-md-6">
<input type="text" name="speed_index" class="form-control" placeholder="Give the speed_index of the chassis model" required="" value="">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Tire pressure</div>
                                                    <div class="col-md-6">
<input type="text" name="tire_pressure" class="form-control" placeholder="Give the tire_pressure of the chassis model"  value="">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Tire Size Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="tire_size_r" class="form-control" placeholder="Give the tire_size_r of the chassis model"  value="">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Rim Size</div>
                                                    <div class="col-md-6">
<input type="text" name="rim_size" class="form-control" placeholder="Give the rim_size of the chassis model"  value="">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Rim Size Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="rim_size_r" class="form-control" placeholder="Give the rim_size_r of the chassis model"  value="">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Load Index Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="load_index_r" class="form-control" placeholder="Give the load_index_r of the chassis model"  value="">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Speed Index Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="speed_index_r" class="form-control" placeholder="Give the speed_index_r of the chassis model"  value="">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Tire pressure Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="tire_pressure_r" class="form-control" placeholder="Give the tire_pressure_r of the chassis model"  value="">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Model Laden TP Front</div>
                                                    <div class="col-md-6">
<input type="text" name="model_laden_tp_f" class="form-control" placeholder="Give the model_laden_tp_f of the chassis model"  value="">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Model Laden TP Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="model_laden_tp_r" class="form-control" placeholder="Give the model_laden_tp_r of the chassis model"  value="">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Run Flat Front</div>
                                                    <div class="col-md-6">
<input type="text" name="run_flat_f" class="form-control" placeholder="Give the run_flat_f of the chassis model"  value="">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Run Flat Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="run_flat_r" class="form-control" placeholder="Give the run_flat_r of the chassis model"  value="">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Extra Load Front</div>
                                                    <div class="col-md-6">
<input type="text" name="extra_load_f" class="form-control" placeholder="Give the extra_load_f of the chassis model"  value="">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">Extra Load Rear</div>
                                                    <div class="col-md-6">
<input type="text" name="extra_load_r" class="form-control" placeholder="Give the extra_load_r of the chassis model"  value="">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">TP Front PSI</div>
                                                    <div class="col-md-6">
<input type="text" name="tp_f_psi" class="form-control" placeholder="Give the tp_f_psi of the chassis model"  value="">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">TP Rear PSI</div>
                                                    <div class="col-md-6">
<input type="text" name="tp_r_psi" class="form-control" placeholder="Give the tp_r_psi of the chassis model"  value="">
                                                    </div>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">LTP Front PSI</div>
                                                    <div class="col-md-6">
<input type="text" name="ltp_f_psi" class="form-control" placeholder="Give the ltp_f_psi of the chassis model"  value="">
                                                    </div>
                                                </div>  
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6">LTP Rear PSI</div>
                                                    <div class="col-md-6">
<input type="text" name="ltp_r_psi" class="form-control" placeholder="Give the ltp_r_psi of the chassis model"  value="">
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
            if (confirm("Are you sure want to remove chassis models?")) {
                $('#delete-form-'+$(this).data('key')).submit();
            }
            return false;
    })
</script>
@endsection











