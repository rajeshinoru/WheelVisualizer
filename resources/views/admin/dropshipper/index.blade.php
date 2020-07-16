@extends('admin.layouts.app')

@section('content')



<?php
$is_read_access = VerifyAccess('dropshipper','read');
$is_write_access = VerifyAccess('dropshipper','write');
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
                    <h4>List of Dropshippers</h4>
                    <div style="text-align:right;padding-bottom: 20px">
                    @if($is_write_access)                                                
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add New</button> 
                    @endif                                        
                    <a  class="btn btn-info"  href="{{url('admin/exportTable')}}?module=Dropshipper">Export CSV </a>
                    
                    </div>
                    <div class="asset-inner">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Dropshipper</th>
                                    <th>Code</th>
                                    <th>Address1</th>
                                    <th>Address2</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip</th>
                                    <th>Allowshipsep2</th>
                                    <th>Emailaddress</th>
                                    <th>CC-Emailaddress</th>
                                    <th>Contactname</th>
                                    <th>Bandable</th>
                                    <th>Password</th>
                                    @if($is_write_access)                        
                                    <th>Actions</th>
                                    @endif                    
                                </tr>
                            </thead>
                            @forelse(@$dropshippers as $key => $dropshipper)
                            <tr>
                                <td>{{@$key+1}}</td>
                                <td>{{@$dropshipper->dropshipper}}</td>
                                <td>{{@$dropshipper->code}}</td>
                                <td>{{@$dropshipper->address1}}</td>
                                <td>{{@$dropshipper->address2}}</td>
                                <td>{{@$dropshipper->city}}</td>
                                <td>{{@$dropshipper->state}}</td>
                                <td>{{@$dropshipper->zip}}</td>
                                <td>{{@$dropshipper->allowshipsep2}}</td>
                                <td>{{@$dropshipper->emailaddress}}</td>
                                <td>{{@$dropshipper->ccemailaddress}}</td>
                                <td>{{@$dropshipper->contactname}}</td>
                                <td>{{@$dropshipper->bandable}}</td>
                                <td>{{@$dropshipper->password}}</td>
                                @if($is_write_access)                        
                                <td>
                                    <a type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$key}}"><i class="fa fa-edit"></i></a>


                                    <a type="button" class="btn btn-danger delete-dropshipper" data-key="{{$key}}"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{$key}}" action="{{route('admin.dropshipper.destroy',$dropshipper->id)}}" method="POST" novalidate="">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </td>
                                @endif                    
                            </tr>


                                                <!--  New Model Start-->
                            <div class="modal fade" id="editModal{{$key}}" role="dialog">
                                <div class="modal-dialog admin-form">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit Dropshipper</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div id="dropzone1" class="pro-ad addcoursepro">
                                                <form action="{{ route('admin.dropshipper.update', $dropshipper->id)}}" class=" needsclick addcourse" method="POST" id="update-slider" enctype="multipart/form-data">


                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}
                                            <div class="row"> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="dropshipper">Dropshipper</label>
                                                        <input type="text" name="dropshipper" class="form-control" placeholder="Give the dropshipper name" value="{{@$dropshipper->dropshipper}}" required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="code">Dropshipper Code</label>
                                                        <input type="text" name="code" class="form-control" placeholder="Give the code of the Dropshipper" value="{{@$dropshipper->code}}" required="">
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="row"> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="address1">Dropshipper Address1</label>
                                                        <input type="text" name="address1" class="form-control" placeholder="Give the address of dropshipper" value="{{@$dropshipper->address1}}" required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="address2">Dropshipper Address2</label>
                                                        <input type="text" name="address2" class="form-control" placeholder="Give the address of Dropshipper" value="{{@$dropshipper->address2}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row"> 
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="city">Dropshipper City</label>
                                                        <input type="text" name="city" class="form-control" placeholder="Give the city of Dropshipper" value="{{@$dropshipper->city}}" required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="state">Dropshipper State</label>
                                                        <input type="text" name="state" class="form-control" placeholder="Give the state of the Dropshipper" value="{{@$dropshipper->state}}" required="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="zip">Dropshipper Zip</label>
                                                        <input type="text" name="zip" class="form-control" placeholder="Give the zip of the Dropshipper" value="{{@$dropshipper->zip}}" required="">
                                                    </div>
                                                </div> 
                                            </div>
                                            <br>
                                            <div class="row"> 
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="contactname">Dropshipper Contact</label>
                                                        <input type="text" name="contactname" class="form-control" placeholder="Give the contact name of the Dropshipper" value="{{@$dropshipper->contactname}}" required="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="emailaddress">Dropshipper Email</label>
                                                        <input type="email" name="emailaddress" class="form-control" placeholder="Give the Emailaddress of the Dropshipper" value="{{@$dropshipper->emailaddress}}" required="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="ccemailaddress">Dropshipper CC Email</label>
                                                        <input type="email" name="ccemailaddress" class="form-control" placeholder="Give the CC - Emailaddress of the Dropshipper" value="{{@$dropshipper->ccemailaddress}}" >
                                                    </div>
                                                </div> 
                                            </div>
                                            <br> 
                                            <div class="row">  
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="allowshipsep2">Allowshipsep2</label> 
                                                        <select name="allowshipsep2" class="form-group form-control Allowshipsep2">
                                                            <option value=""  >Select One</option>
                                                            <option value="Y"  {{(@$dropshipper->allowshipsep2 == "Y"  )?'selected':''}}  >Yes</option>
                                                            <option value="N"  {{(@$dropshipper->allowshipsep2 == "N"  )?'selected':''}}  >No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="bandable">Dropshipper Bandable</label>
                                                        <input type="text" name="bandable" class="form-control" placeholder="Give the bandable of the Dropshipper" value="{{@$dropshipper->bandable}}" >
                                                    </div>
                                                </div> 
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="password">Dropshipper Password</label>
                                                        <input type="text" name="password" class="form-control" placeholder="Give the password of the Dropshipper" value="{{@$dropshipper->password}}">
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
                                        
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @empty
                            <tr>
                                <td colspan="5">No Dropshippers found</td>
                            </tr>
                            @endforelse
                        </table>

                        {{$dropshippers->links()}}
                    </div>
                </div>
            </div>
                                <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add New Dropshipper</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                        <form action="{{ route('admin.dropshipper.store')}}" class=" needsclick addcourse" method="POST" id="demo1-upload" enctype="multipart/form-data">
                                            {{csrf_field()}}   
                                            <div class="row"> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="dropshipper">Dropshipper</label>
                                                        <input type="text" name="dropshipper" class="form-control" placeholder="Give the dropshipper name" value="" required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="code">Dropshipper Code</label>
                                                        <input type="text" name="code" class="form-control" placeholder="Give the code of the Dropshipper" value="" required="">
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="row"> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="address1">Dropshipper Address1</label>
                                                        <input type="text" name="address1" class="form-control" placeholder="Give the address of dropshipper" value="" required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="address2">Dropshipper Address2</label>
                                                        <input type="text" name="address2" class="form-control" placeholder="Give the address of Dropshipper" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row"> 
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="city">Dropshipper City</label>
                                                        <input type="text" name="city" class="form-control" placeholder="Give the city of Dropshipper" value="" required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="state">Dropshipper State</label>
                                                        <input type="text" name="state" class="form-control" placeholder="Give the state of the Dropshipper" value="" required="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="zip">Dropshipper Zip</label>
                                                        <input type="text" name="zip" class="form-control" placeholder="Give the zip of the Dropshipper" value="" required="">
                                                    </div>
                                                </div> 
                                            </div>
                                            <br>
                                            <div class="row"> 
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="contactname">Dropshipper Contact</label>
                                                        <input type="text" name="contactname" class="form-control" placeholder="Give the contact name of the Dropshipper" value="" required="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="emailaddress">Dropshipper Email</label>
                                                        <input type="email" name="emailaddress" class="form-control" placeholder="Give the Emailaddress of the Dropshipper" value="" required="">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="ccemailaddress">Dropshipper CC Email</label>
                                                        <input type="email" name="ccemailaddress" class="form-control" placeholder="Give the CC - Emailaddress of the Dropshipper" value="" >
                                                    </div>
                                                </div> 
                                            </div>
                                            <br> 
                                            <div class="row">  
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="allowshipsep2">Allowshipsep2</label> 
                                                        <select name="allowshipsep2" class="form-group form-control Allowshipsep2">
                                                            <option value=""  >Select One</option>
                                                            <option value="Y"  >Yes</option>
                                                            <option value="N"  >No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="bandable">Dropshipper Bandable</label>
                                                        <input type="text" name="bandable" class="form-control" placeholder="Give the bandable of the Dropshipper" value="" >
                                                    </div>
                                                </div> 
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="password">Dropshipper Password</label>
                                                        <input type="text" name="password" class="form-control" placeholder="Give the password of the Dropshipper" value="">
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
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                                </div>
                            </div>
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

    $('.delete-dropshipper').click(function(){
            if (confirm("Are you sure want to remove dropshipper?")) {
                $('#delete-form-'+$(this).data('key')).submit();
            }
            return false;
    })
</script>
@endsection