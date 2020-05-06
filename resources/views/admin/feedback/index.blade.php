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
                    <h4>List of Feedback</h4>
                    <div class="asset-inner">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email Address</th>
                                    <th>Phone Address</th>
                                    <th>Invoice</th>
                                    <th>Comments</th>
                                    <th>Received At</th>
                                </tr>
                            </thead> 
                            @forelse(@$feedbacks as $key => $feedback) 
                            <tr>
                                <td>{{@$key+1}}</td>
                                <td>{{@$feedback->firstname}}</td>
                                <td>{{@$feedback->lastname}}</td>
                                <td>{{@$feedback->email}}</td>
                                <td>{{@$feedback->phone}}</td>
                                <td>{{@$feedback->invoice}}</td>
                                <td>{{@$feedback->comments}}</td> 
                                <td>{{@$feedback->created_at}}</td>
                            </tr> 
                            @empty
                            <tr>
                                <td colspan="7">No Feedback found</td>
                            </tr>
                            @endforelse
                        </table>

                        {{$feedbacks->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom_scripts')
<script type="text/javascript">

// $(".form-control-file").click(function(){
//     // $new = $(this).clone().removeClass('dropify');
//     // $(this).after($new);

//   $(this).parent().closest('.dropify-wrapper').find('.hidden-file-input').click();
// });

    
</script>
@endsection