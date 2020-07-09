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
    .right-text{
        text-align:right !important;
    }

</style>
 <div class="product-status mg-b-15" style="min-height: 680px;">
    <div class="container-fluid" >
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="min-height: 680px;">
                <div class="product-status-wrap drp-lst">
                        <table class="table" >
                        <tr>
                            <td><h4>Ticket : {{$ticket->ticketno}}</h4></td>
                            <td><h4>Subject : {{getTicketSubjects($ticket->subject)}}</h4>  </td>
                            <td><h4>Invoice Number : {{$ticket->invoice}}</h4></td>
                            <td>
                                <h4>Status : {{ViewTicketStatus($ticket->status)}}<br><br>
                                @if($ticket->status == 'CLOSED' )
                                    Reason : {{$ticket->closed_reason}}</h4>
                                @endif
                            </td> 
                        </tr>  
                        </table>
                      
                    <div class="asset-inner"  style="min-height: 680px;">
                        <table class="table"> 
                            <tbody>
                            @foreach($messages as $key => $message)
                            <tr>
                                <td class="{{($message->postby == 'admin')?'right-text':''}}">
                                    <p>
                                    {{($message->postby == 'user')?$ticket->firstname:'Admin'}} 
                                    <i class="fa fa-clock-o" aria-hidden="true"></i> {{$message->created_at->diffForHumans()}}
                                    </p> 
                                    <div  class="col-md-12 well">
                                    {{$message->description}}
                                    </div > 
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>
                                        <form action="{{route('admin.ticket.store')}}"   method="POST"  enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                                            <input type="hidden" name="postby" value="admin">
                                            <div class="row">
                                                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11"> 
                                                    <div class="col-md-12 form-group">
                                                        <textarea class="form-control" name="description" rows="2" required="" placeholder="Type your reply..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">

                                                    <div class="payment-adress">
                                                        
                                                        <input type="submit" class="btn btn-success" value="Send">
                                                    </div>
                                                    <br>

                                                    <div class="payment-adress">
                                                        <a href="{{route('admin.ticket.index')}}" class="btn btn-danger">Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                </td>
                            </tr>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            </div>
        </div>
    </div>
</div>

@endsection