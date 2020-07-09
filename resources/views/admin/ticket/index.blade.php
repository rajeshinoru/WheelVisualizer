@extends('admin.layouts.app') @section('content')
<style type="text/css">
   
    .items-modal{
      width: 1000px !important;
    }
    .td-center{
        text-align: center !important;
    } 
    .profile-img{
        text-align: center;
    }

</style>
 <div class="product-status mg-b-15">
    <div class="container-fluid" style="min-height: 680px;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>All Tickets</h4>
                    <div style="text-align:right;padding-bottom: 20px">
                        <div class="row"> 
                                <div class="col-md-10 form-group "> </div>
                                <div class="col-md-2 form-group ">  
                                    <select name="status" class="form-group form-control status_filtered">
                                        <option value="">Select Status for Filter</option>
                                        <option value="ALL">All</option>
                                        @foreach(TicketStatus() as $tkey => $status)
                                        <option value="{{$status}}" {{($status == json_decode(base64_decode(@Request::get('status'))))?'selected':''}}>{{ViewTicketStatus(@$status)}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                        </div>
                    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Ticket</button>  -->
                    
                    <!-- <a  class="btn btn-info"  href="{{url('admin/exportTable')}}?module=T">Export CSV </a> -->
                    
                    </div>
                    <div class="asset-inner">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name </th>  
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Ticket Number</th>  
                                    <th>Status</th> 
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead> 
                            @forelse(@$tickets as $key => $ticket) 
                            <tr>
                                <td>{{@$key+1}}</td> 
                                <td>{{@$ticket->firstname}} {{@$ticket->lastname}}</td>
                                <td>{{@$ticket->email}}</td>
                                <td>{{@$ticket->phone?:'-'}}</td>
                                <td>{{@$ticket->ticketno}}</td>
                                <td>{{ViewTicketStatus(@$ticket->status)}}</td>
                                <td>{{@$ticket->updated_at}}</td>
                                <td>
                                                    <a class="btn btn-info" href="{{route('admin.ticket.show',$ticket->id)}}">View</a> 
                                            <a type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$key}}"><i class="fa fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                            <div class="modal fade" id="editModal{{$key}}" role="dialog">
                                <div class="modal-dialog admin-form">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit Ticket</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div id="dropzone1" class="pro-ad addcoursepro">
                                                <form action="{{ route('admin.ticket.update', $ticket->id)}}" class=" needsclick addcourse" method="POST" id="update-post" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    {{method_field('PATCH')}} 
                                                   <!--  
                                                    <br>  -->
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="col-md-2 form-group "><label>Ticket Status?</label></div>
                                                            <div class="col-md-10">
                                                                <select name="status" class="form-group form-control status">
                                                                    @foreach(TicketStatus() as $tkey => $status)
                                                                    <option value="{{$status}}" {{($status == $ticket->status)?'selected':''}}>{{$status}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row reason" style="display: none;">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="col-md-2 form-group "><label>Reason?</label></div>
                                                            <div class="col-md-10">
                                                                <textarea class="form-group form-control required" name="reason" rows="5"></textarea>
                                                            </div>
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
                                <td colspan="5">No Tickets found</td>
                            </tr>
                            @endforelse
                        </table>

                        {{$tickets->appends([ 'status' => @Request::get('status')])->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('custom_scripts') 

<script type="text/javascript"> 
    $('.status').change(function() { 
        var selectedOption = $(this).find('option:selected').val(); 
        if(selectedOption == 'CLOSED')
        {
            $('.reason').show();
            $('.reason').find('textarea').attr('required',true);
        }else{
            $('.reason').find('textarea').val('');
            $('.reason').find('textarea').removeAttr('required');

            $('.reason').hide();
        }

    });
    $('.status_filtered').change(function() { 
        var selectedOption = $(this).find('option:selected').val(); 
        if(selectedOption != 'ALL' && selectedOption != ''  ){
            updateParamsToUrl('status',selectedOption);
        }else{
            removeParamsFromUrl('status');
        }

    });


</script>

@endsection









