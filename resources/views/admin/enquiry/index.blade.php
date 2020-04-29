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
                    <h4>List of Enquiries</h4>
                    <div class="asset-inner">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Requested For</th>
                                    <th>Message</th>
                                    <th>Requested At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead> 
                            @forelse(@$enquiries as $key => $enquiry) 
                            <tr>
                                <td>{{@$key+1}}</td>
                                <td>{{@$enquiry->name}}</td>
                                <td>{{@$enquiry->email}}</td>
                                <td>{{enquiries_list(@$enquiry->request_to)}}</td> 
                                <td>
                                                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#vehicle{{$key}}">View Message</button>
                                                    <!-- model Start -->
                                                    <!-- model Start -->
                                                    <div class="modal fade " id="vehicle{{$key}}" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title text-left">Message</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                <h4 class="modal-title">
<pre>
{{$enquiry->message}}

</pre>
                                                                </h4> 
                                                                        <div class="form-group has-success has-feedback text-center">
                                                                            <button class="btn btn-info btn-close" type="button" data-dismiss="modal" >Close</button>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Model End  -->

                                </td>
                                <td>{{@$enquiry->created_at}}</td>
                                <td>
                                    <form action="{{ route('admin.enquiry.destroy', $enquiry->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-default look-a-like" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Orders found</td>
                            </tr>
                            @endforelse
                        </table>

                        {{$enquiries->links()}}
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