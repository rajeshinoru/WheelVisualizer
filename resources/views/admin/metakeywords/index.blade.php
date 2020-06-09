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
                    <div style="text-align:right;padding-bottom: 20px">
                        
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addPageModal">Add New Page</button>
                        
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#csvModal">Upload CSV </button>
                    
                    <a  class="btn btn-info"  href="{{url('admin/exportTable')}}?module=MetaKeyword">Export CSV </a>
                    
                    </div>
 
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
                                <td>
                                    <form action="{{ route('admin.metakeywords.destroy', $metakey->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">

                                    <a class="btn btn-default look-a-like" data-toggle="modal" data-target="#editPageModal{{@$key}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <button class="btn btn-default look-a-like" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>



                    <!-- model Start -->
                    <div class="modal fade " id="editPageModal{{@$key}}" role="dialog">
                        <div class="Add-modal modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title text-left">Update Meta Keywords</h4>
                                </div>
                                <div class="modal-body">
                                    <h4 class="modal-title">
                                        <form action="{{route('admin.metakeywords.update',$metakey->id)}}" class=" needsclick addcourse" method="POST" id="demo1-upload" enctype="multipart/form-data"> 
                                                                    {{@csrf_field()}}
                                                                    <input type="hidden" name="_method" value="PATCH">
                                            <div class="row">
                                                <div class="col-md-6">

                                                        <div class="form-group  dropdown">
                                                            <select required="" class="form-control browser-default custom-select" name="page">
                                                                <option value="">Select a Page</option>
                                                                @foreach(meta_pages() as $key => $attr)
                                                                <option value="{{$attr}}" {{($metakey->page == $attr)?'selected':''}}>{{ucfirst($attr)}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div> 
                                                    </div>
                                                <div class="col-md-6">
                                                        <div class="form-group dropdown">
                                                            <select required="" class="form-control browser-default custom-select" name="key">
                                                                <option value="">Select a Key</option>
                                                                @foreach(meta_attributes() as $key => $attr)
                                                                <option value="{{$attr}}" {{($metakey->key == $attr)?'selected':''}}>{{ucfirst($attr)}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div> 
                                                    </div>
                                            </div> 
                                            <div class="row form-group ">
                                                <div class="col-md-12">
                                                <textarea class="form-control browser-default" name="content" placeholder="Enter Content" required="">{{$metakey->value}}</textarea>
                                                </div>
                                            </div>
                                              <div class="td-center">
                                                  
                                                <button type="submit" class="btn btn-success">Submit</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                              </div>
                                        </form>
 
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                            @endforeach
                        </table>
                        {{$metakeywords->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                    <!--  New Model Start-->
                    <div class="modal fade" id="csvModal" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Upload CSV File</h4>
                                </div>
                                <div class="modal-body">
                                    <!-- New Model Content Start -->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="product-payment-inner-st"> 
                                            <div id="myTabContent" class="tab-content custom-product-edit">
                                                <div class="product-tab-list tab-pane fade active in" id="description2">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="review-content-section">
                                                                <div id="dropzone1" class="pro-ad">

                                                                    <form action="{{url('/admin/metakeywords/uploadcsv')}}" class="dropzone dropzone-custom needsclick add-professors dz-clickable" id="demo1-upload" method="POST" enctype="multipart/form-data">
                                                                        {{@csrf_field()}} 
                                                                        <div class="row">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <label for="tireuploadedfile">CSV Formated File <span class="req">*</span></label>
                                                                                <br>
                                                                                <input type="file"  name="uploadedfile"  class="dropify form-control-file" aria-describedby="fileHelp" required="">
                                                                            </div> 
                                                                        </div>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="payment-adress">
                                                                                    <input type="submit" class="btn btn-primary waves-effect waves-light" value="Submit">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- New Model Content End -->
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