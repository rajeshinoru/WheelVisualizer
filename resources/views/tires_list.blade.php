@extends('layouts.app')
@section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}">
@endsection @section('content')
<style type="text/css">
.product-layouts {
    min-height: 445px !important;
}
</style>
<section id="tire-list">
    <div class="container">
        <!-- <div class="row">
            <div class="col-sm-12 tire-list-change">
              <div class="col-sm-8 vehicle-change"><p> Your selected vehicle: <b>2020 Acura RDX Base</b> OEM Tire Size: <b>235/55R19</b> </p></div>
              <div class="col-sm-2"><button type="submit" class="btn vehicle-change"><a href="">Change</a></button></div>
            </div>
      </div> -->

        <div class="row">
            <div class="col-sm-3">
                <!-- Side Start -->
                <div class="listing-sidebar">
                    <div class="widget">
                        <div class="widget-search">
                            <div class="price-slide">
                                <div class="price">
                                    <p><label for="price">Price range:</label>
                                        <!-- <input type="text" id="price" class="price_range" style="border:0; color:#b9cd6d; font-weight:bold;"> -->
                                    </p>
                                    <!-- <div id="slider-3"></div> -->
                                    <div class="vehicle-list">
                                                        <div class="dropdown">
                                                            <select required="" class="form-control browser-default custom-select minprice" id="minprice" name="minprice">
                                                            <option value="">Select Min.Price</option>
                                                            @for($amt=10;$amt<10000;$amt=$amt+10)

                                                            <option value="{{$amt}}"
                                                            @if($amt==json_decode(base64_decode(@Request::get('minprice')?:'')))    selected
                                                            @endif

                                                            @if($amt > json_decode(base64_decode(@Request::get('maxprice')?:'')) && @Request::get('maxprice'))    disabled
                                                            @endif
                                                            > Above ${{$amt}}</option>
                                                            @endfor
                                                            </select>
                                                        </div>
                                                        <div class="dropdown">
                                                            <select required="" class="form-control browser-default custom-select maxprice" id="maxprice" name="maxprice">
                                                            <option value="">Select Max.Price</option>
                                                            @for($amt=10;$amt<10000;$amt=$amt+10)

                                                            <option value="{{$amt}}"
                                                            @if($amt==json_decode(base64_decode(@Request::get('maxprice')?:'')))
                                                                selected
                                                            @endif

                                                            @if($amt <= json_decode(base64_decode(@Request::get('minprice')?:'')))    disabled
                                                            @endif
                                                            > Below ${{$amt}}</option>
                                                            @endfor
                                                            </select>
                                                        </div>
                                      </div>
                                      
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="wrapper center-block">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading " role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Shop By Brand</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <ul style="display: block;">
                                                    @foreach(@$brands as $key => $brand)
                                                    <li><input type="checkbox" name="tirebrand[]" class="tirebrand" value="{{$brand->prodbrand}}"
                                                        @if(in_array($brand->prodbrand,json_decode(base64_decode(@Request::get('tirebrand')?:''))?:[]))
                                                             checked
                                                        @endif

                                                        @if(!@$countsByBrand[$brand->prodbrand])
                                                            disabled
                                                        @endif
                                                        >
                                                        @if(@$countsByBrand[$brand->prodbrand])
                                                        {{$brand->prodbrand}} ( {{$countsByBrand[$brand->prodbrand]}} )
                                                        @else
                                                        <span style="color: #a0a0a0;">{{$brand->prodbrand}} ( 0 )</span >
                                                        @endif
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Speed Rating</a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <ul style="display: block;">
                                                    @foreach(@$speedratings as $key => $value)
                                                    <li><span class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="tirespeedrating[]" class="tirespeedrating" value="{{@$value->speedrating}}"
                                                                @if(in_array($value->speedrating,
                                                                json_decode(base64_decode(@Request::get('tirespeedrating')?:''))?:[])) checked @endif  > {{@$value->speedrating}} ( {{@$value->total}} )
                                                            </label>
                                                        </span></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Load Index</a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <ul style="display: block;">
                                                    @foreach(@$load_indexs as $key => $value)
                                                    <li><span class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="tireloadindex[]" class="tireloadindex" value="{{@$value->loadindex}}" @if(in_array($value->loadindex,json_decode(base64_decode(@Request::get('tireloadindex')?:''))?:[])) checked @endif > {{@$value->loadindex}} ( {{@$value->total}})
                                                            </label>
                                                        </span></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="widget-banner">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{url('image/Banner.jpg')}}" alt="Los Angeles">
                                </div>

                                <div class="item">
                                    <img src="{{url('image/Banner-1')}}.jpg" alt="Chicago">
                                </div>

                                <div class="item">
                                    <img src="{{url('image/Banner-2')}}.jpg" alt="New York">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- Side End -->
            </div>
            <div class="col-sm-9">

              @if(@$vehicle || @count($request->all())>0)
              <div class="wheel-list-change-tab">
                  <div class="row">
                      <div class="col-md-8 left-head">
                        <p> 
                            @if(@$vehicle)
                            Your Selected Vehicle: 
                                <b>{{@$vehicle->year}} {{@$vehicle->make}} {{@$vehicle->model}} {{@$vehicle->submodel}}</b>
                            OEM Tire Size:
                                <b>{{@$chassis_model->tire_size}}</b> ,

                            Speed Rating:
                                <b>{{@$chassis_model->speed_index}}</b> ,

                            Load Index:
                                <b>{{@$chassis_model->load_index}}</b> 
                            <br>
                            @endif
                            @if(@count($request->all())>0)

                            Your Selected  
                            @if(@$request->width)

                            Width:
                                <b>{{@$request->width}}</b> ,
                            @endif

                            @if(@$request->profile)
                            Profile:
                                <b>{{@$request->profile}}</b> ,
                            @endif

                            @if(@$request->diameter)
                            Diameter:
                                <b>{{@$request->diameter}}</b> ,
                            @endif
                            @endif
                        </p>
                      </div>
                      <div class="col-md-4 right-button"><button type="submit" class="btn vehicle-change"><a href="{{url('/tirelist')}}">Change</a></button></div>
                  </div>
              </div>
              @endif
                <div class="row">
                    @forelse($tires as $key =>$tire)
                    <?php $tire=(object)$tire; ?>

                    <div class="col-sm-3">
                        <div class="product-layouts">
                            <div class="product-thumb transition">
                                <div class="image">
                                    <img class="wheelImage image_thumb" src="{{ViewTireImage(@$tire->prodimage)}}" title="" alt="" style="cursor: zoom-in;">
                                    <img class="wheelImage image_thumb_swap" src="{{ViewTireImage(@$tire->prodimage)}}" title="" alt="" style="cursor: zoom-in;">
                                    <div class="sale-icon"><a></a></div>
                                </div>
                                <div class="thumb-description">
                                    <div class="caption">
                                        <h4 class="tire-type"><a href="{{url('/tireview')}}/{{base64_encode(@$tire->id)}}/{{base64_encode(@$vehicle->id)}}">
                                                {{@$tire->prodtitle}}<br>
                                                <br>
                                                Size : {{@$tire->tiresize}}<br>
                                                Load : {{@$tire->loadindex}} Speed:{{@$tire->speedrating}}<br>
                                                <b>${{@$tire->price}}</b>
                                            </a></h4>
                                        <br>
                                    </div>
                                    <div class="button-group">
                                        <button class="btn-cart" type="button" title="Add to Cart" onclick="cart.add('46');"><i class="fa fa-shopping-cart"></i>
                                            <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span>
                                        </button>
                                        <button class="btn-wishlist" title="Add to Wish List" onclick="wishlist.add('46');"><i class="fa fa-heart"></i>
                                            <span title="Add to Wish List">Add to Wish List</span>
                                        </button>
                                        <button class="btn-compare" title="Add to compare" onclick="compare.add('46');"><i class="fa fa-exchange"></i>
                                            <span title="Add to compare">Add to compare</span>
                                        </button>
                                        <button class="btn-quickview" type="button" title="Quick View"> <i class="fa fa-eye"></i>
                                            <span>Quick View</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                      <div class="col-md-12 left-head text-center" >
                        <br>
                          <h5> <b>No Results found for your selected vehicle.Please try selecting a different brand or attribute on the left.</b> </h5>
                      </div>
                    @endforelse
                </div>

                <div class="row pro-pagination">
                    <div class="col-sm-6 pagi-left">
                        <p>{{(@$tires->total())?@$tires->total().' Tires Found':''}} </p>
                    </div>
                    <div class="col-sm-6 pagi-right">
                        {{$tires->appends([ 
                        'tirebrand' => @Request::get('tirebrand'), 
                        'tirespeedrating' => @Request::get('tirespeedrating'), 
                        'tireloadindex' => @Request::get('tireloadindex'), 
                        'page' => @Request::get('page'), 
                        'zip' => @Request::get('zip'), 
                        'width'=> @Request::get('width'), 
                        'profile'=> @Request::get('profile'), 
                        'minprice'=> @Request::get('minprice'), 
                        'maxprice'=> @Request::get('maxprice'), 
                        'diameter'=> @Request::get('diameter')])->links()}}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('custom_scripts')


<!--

<script>
    $(function() {
        $("#slider-3").slider({
            range: true,
            min: 0,
            max: 500,
            values: [1, 200],
            slide: function(event, ui) {
                console.log(ui.values);
                $("#price").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#price").val("$" + $("#slider-3").slider("values", 0) +
            " - $" + $("#slider-3").slider("values", 1));
    });
</script>
 -->



@endsection
