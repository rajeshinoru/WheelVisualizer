@extends('admin.layouts.app')

@section('content')


<?php
$is_read_access = VerifyAccess('logs','read');
$is_write_access = VerifyAccess('logs','write');
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
    .items-modal{
      width: 1000px !important;
    }
    .td-center{
        text-align: center !important;
    }
/*1131px*/
</style>

<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>Live Report for Inventories</h4>
                    <div style="text-align:right;padding-bottom: 20px"> 
                    <!-- <a  class="btn btn-info"  href="{{url('admin/exportTable')}}?module=Order">Export CSV </a> -->
                    
                    </div>
                    <div class="asset-inner">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Dropshipper</th>
                                    <th>Today Updated</th>
                                    <th>Total</th> 
                                </tr>
                            </thead> 
                            <?php $i=1; ?>
                            <tbody >
                              
                            @forelse(@$liveData['dropshippers'] as $dropshipper => $count) 
                            <tr> 
                                <td>{{@$i++}}</td>
                                <td>{{@$dropshipper}}</td>
                                <td>{{@$liveData['today_dropshippers'][$dropshipper]??0}}</td>
                                <td>{{@$count}}</td>  
                            </tr> 
                            @empty
                            <tr>
                                <td colspan="5">No Dropshippers found</td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom_scripts')
<script type="text/javascript">

// $(".order_status").change(function(){
//   var status = $(this).val();  

//   var order_id = $(this).data('order_id');
//         $.ajax({
//             url: "/admin/order/update/"+order_id,
//             data:{"status":status  }, 
//             success: function(result){  
//                 // console.log(typeof result)
//                  $('#custom-msg').html(`
//                   <div class="alert alert-success">
//                           <button type="button" class="close" data-dismiss="alert">×</button>
//                           `+result.msg+`
//                   </div>`);

//             },
//             error: function (jqXHR, textStatus, errorThrown) {
            
//                     // $loading.fadeOut("slow");
//             }
//         });  
// });

    
</script>
@endsection