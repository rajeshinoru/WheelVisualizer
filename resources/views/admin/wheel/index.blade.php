@extends('admin.layouts.app')

@section('content')

        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Wheels List</h4>
                            <div class="add-product">
                                <a href="">Add Wheel</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th> S.No</th>
                                        <th> Part No</th>
                                        <th> Brand</th>
                                        <th> Style</th>
                                        <th> Image</th>
                                        <th> Type</th>
                                        <th> Diameter</th>
                                        <th> Width</th>
                                        <th> Actions</th>
                                    </tr>
                                    @forelse(@$wheels as $key => $wheel)
                                    <tr>
                                        <td>{{@$key+1}}</td>
                                        <td>{{@$wheel->part_no}}</td>
                                        <td>{{@$wheel->brand}}</td>
                                        <td>{{@$wheel->style}}</td>
                                        <td><img src="{{asset(@$wheel->image)}}" width="100px" height="100px"></td>
                                        <td>{{@$wheel->wheeltype}}</td>
                                        <td>{{@$wheel->wheeldiameter}}</td>
                                        <td>{{@$wheel->wheelwidth}}</td>
                                        <td>
                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    @empty                                   
                                    <tr>
                                        <td colspan="5">No Users found</td>
                                    </tr>
                                    @endforelse
                                </table>

                    {{$wheels->appends(['diameter' => @Request::get('diameter'),'width' => @Request::get('width'),'brand' => @Request::get('brand'),'car_id' => @Request::get('car_id'),'page' => @Request::get('page')])->links()}}
                            </div>
<!--                             <div class="custom-pagination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection