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
                                <td>{{@$ticket->status}}</td>
                                <td>{{@$ticket->updated_at}}</td>
                                <td>
                                                    <a class="btn btn-info" href="{{route('admin.ticket.show',$ticket->id)}}">View</button> 
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Tickets found</td>
                            </tr>
                            @endforelse
                        </table>

                        {{$tickets->links()}}

                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add New Post</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                        <form action="{{route('ticket.store')}}" class=" needsclick addcourse" method="POST" id="demo1-upload" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Ticket For </div>
                                                    <div class="col-md-10">
                                                        <select name="subject" class="form-group form-control subject">
                                                            <option value="">Select One</option>
                                                            @foreach(getTicketSubjects() as $key => $reason)
                                                            <option value="{{$key}}">{{$reason}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Invoice Number </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="invoice" class="form-control" placeholder="Give the Invoice Number" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Email ( Used For Purchase )</div>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="email" name="email" placeholder="Give the Email ID"   required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-2">Describe your needs</div>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" name="description" rows="5" required=""></textarea>
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
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endsection+











