@extends('admin.layouts.app')

@section('content')



<?php
$is_read_access = VerifyAccess('feedback','read');
$is_write_access = VerifyAccess('feedback','write');
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
                                    @if($is_write_access)
                                    <th>Actions</th>
                                    @endif
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
                                @if($is_write_access)
                                <td>
                                    <form action="{{ route('admin.feedback.destroy', $feedback->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-default look-a-like" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>

                                </td>
                                @endif
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