@extends('admin.layouts.app')

@section('content')
<style type="text/css">
  
    .Add-modal{
      width: 1000px !important;
    }

    .td-center,.clearfix{
      padding: 20px;
      text-align: center !important;
    }
</style>


<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>Meta Keywords By Pages</h4>

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addPageModal">Add New Page</button>

                    <!-- model Start -->
                    <div class="modal fade " id="addPageModal" role="dialog">
                        <div class="Add-modal modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title text-left">Add New Meta Keywords</h4>
                                </div>
                                <div class="modal-body">
                                    <h4 class="modal-title">
                                          <div class="clearfix">
                                            <a class="btn btn-primary pull-right add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Key</a>
                                          </div>
                                        <form action="{{url('admin/metakeywords')}}" class=" needsclick addcourse" method="POST" id="demo1-upload" enctype="multipart/form-data"> 
                                            {{csrf_field()}}
                                            <table class="table table-bordered" id="tbl_posts">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Page Name</th>
                                                        <th>Meta Key</th>
                                                        <th>Content</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_posts_body">
                                                    <tr id="rec-1">
                                                        <td><span class="sn">1</span>.</td>
                                                        <td>
                                                        <div class="dropdown">
                                                            <select required="" class="form-control browser-default custom-select" name="pages[]">
                                                                <option value="">Select a Page</option>
                                                                @foreach(meta_pages() as $key => $attr)
                                                                <option value="{{$attr}}">{{ucfirst($attr)}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        </td>
                                                        <td>
                                                        <div class="dropdown">
                                                            <select required="" class="form-control browser-default custom-select" name="keys[]">
                                                                <option value="">Select a Key</option>
                                                                @foreach(meta_attributes() as $key => $attr)
                                                                <option value="{{$attr}}">{{ucfirst($attr)}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        </td>
                                                        <td><input type="text" class="form-control browser-default" name="contents[]" placeholder="Enter Content"></td>
                                                        <td><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                              <div class="td-center">
                                                  
                                                <button type="submit" class="btn btn-success">Submit</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                              </div>
                                        </form>

                                            <div style="display:none;">
                                                <table id="sample_table">
                                                    <tr id="">
                                                        <td><span class="sn"></span>.</td>
                                                        <td>
                                                        <div class="dropdown">
                                                            <select required="" class="form-control browser-default custom-select" name="pages[]">
                                                                <option value="">Select a Key</option>
                                                                @foreach(meta_pages() as $key => $attr)
                                                                <option value="{{$attr}}">{{ucfirst($attr)}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        </td>
                                                        <td>
                                                        <div class="dropdown">
                                                            <select required="" class="form-control browser-default custom-select" name="keys[]">
                                                                <option value="">Select a Key</option>
                                                                @foreach(meta_attributes() as $key => $attr)
                                                                <option value="{{$attr}}">{{ucfirst($attr)}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        </td>
                                                        <td><input type="text" class="form-control browser-default" name="contents[]" placeholder="Enter Content"></td>
                                                        <td><a class="btn btn-xs delete-record" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                    </tr>
                                                </table>
                                              </div>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="asset-inner">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Page Name</th>
                                    <th>Meta Key</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead> 
                            @foreach(@$metakeywords as $key => $metakey) 
                            <tr>
                                <td>{{@$key+1}}</td>
                                <td>{{@$metakey->page}}</td>
                                <td>{{@$metakey->key}}</td>
                                <td>{{@$metakey->value}}</td>
                                <td><a class="btn btn-xs delete-record" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
                            </tr>
                            @endforeach
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
    jQuery(document).delegate('a.delete-record', 'click', function(e) {
        e.preventDefault();
        var didConfirm = confirm("Are you sure You want to delete");
        if (didConfirm == true) {
            var id = jQuery(this).attr('data-id');
            var targetDiv = jQuery(this).attr('targetDiv');
            jQuery('#rec-' + id).remove();

            //regnerate index number on table
            $('#tbl_posts_body tr').each(function(index) {
                //alert(index);
                $(this).find('span.sn').html(index + 1);
            });
            return true;
        } else {
            return false;
        }
    });
    jQuery(document).delegate('a.add-record', 'click', function(e) {
        e.preventDefault();
        var content = jQuery('#sample_table tr'),
            size = jQuery('#tbl_posts >tbody >tr').length + 1,
            element = null,
            element = content.clone();
        element.attr('id', 'rec-' + size);
        element.find('.delete-record').attr('data-id', size);
        element.appendTo('#tbl_posts_body');
        element.find('.sn').html(size);
    });
</script>
@endsection