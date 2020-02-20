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
</style>
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>@lang('admin.brands.brand_list')</h4>
                    <div class="add-product">
                        <!-- <a data-toggle="modal" data-target="#myModal">@lang('admin.brands.add_brand')</a> -->
                    </div>
                    <div class="asset-inner">
                        <table>
                            <thead>
                                <tr>
                                    <th>@lang('admin.common.s_no')</th>
                                    <th>@lang('admin.brands.manufacturer') </th>
                                    <th>@lang('admin.brands.description') </th>
                                    <th>@lang('admin.brands.logo') </th>
                                    <th>@lang('admin.brands.brand') </th>                                    
                                    <th>@lang('admin.common.actions')</th>
                                </tr>
                            </thead>                            
                            @forelse(@$brands as $key => $brand)
                            <tr>
                                <td>{{@$key+1}}</td>                                
                                <td>{{@$brand->manufacturer}} </td>
                                <td>{{@$brand->manudesc}} </td>
                                <td>{{@$brand->manulogo}} </td>
                                <td>{{@$brand->manubanner}} </td>                                
                                <td>
                                    <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">

                                        <!-- <a class="btn btn-default look-a-like" data-toggle="modal" data-target="#myModal{{@$key}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> -->
                                        <button class="btn btn-default look-a-like" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>                            
                            @empty
                            <tr>
                                <td colspan="5">@lang('admin.common.no_brand')</td>
                            </tr>
                            @endforelse

                            <tfoot>
                                <tr>
                                    <th>@lang('admin.common.s_no')</th>
                                    <th>@lang('admin.brands.manufacturer') </th>
                                    <th>@lang('admin.brands.description') </th>
                                    <th>@lang('admin.brands.logo') </th>
                                    <th>@lang('admin.brands.brand') </th>                                    
                                    <th>@lang('admin.common.actions')</th>
                                </tr>
                            </tfoot>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  New Model Start-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog admin-form">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('admin.common.add_brand')</h4>
            </div>
            <div class="modal-body">
                <!-- New Model Content Start -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <form action="{{url('/admin/brands/')}}" class="dropzone dropzone-custom needsclick add-professors dz-clickable" id="demo1-upload" method="POST" enctype="multipart/form-data">
                            {{@csrf_field()}}                                                    
                            <div class="product-tab-list tab-pane fade active in" id="description2">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div id="dropzone1" class="pro-ad">

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="vif">VIF Number <span class="req">*</span></label>
                                                            <input type="number" name="vif" class="form-control" placeholder="VIF Series Number" value="{{old('vif')}}" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="date_delivered">Deliver Date <span class="req">*</span></label>
                                                            <input type="date" name="date_delivered" class="form-control" placeholder="VIF Series Number" value="{{old('date_delivered')}}" required="">
                                                        </div>
                                                    </div>
                                                </div>                                                                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                                                                                
                        </form>
                    </div>                
                    <!-- New Model Content End -->
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
        </div>
    </div>
</div>
<!--New Model End  -->
@endsection
@section('custom_scripts')
<script type="text/javascript">
    $(function() {
        $(".wheelImage").popImg();
    })

    $('.add-upload').click(function() {
        var clonedDiv = $('.fixed-upload-file').clone();
        $(clonedDiv).removeClass('fixed-upload-file');
        $(clonedDiv).addClass('dynamic-upload-file');
        $('.upload-section').append(clonedDiv);
    });
    
    $('.remove-upload').click(function() {
        $('.upload-section').find('.dynamic-upload-file').last().remove();
    });
</script>
@endsection