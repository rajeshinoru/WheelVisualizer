@extends('layouts.app') @section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{asset('choosen/css/chosen.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}">
@endsection
@section('content')
<!-- BAnner Down Sestion Start -->
<section id="produst">
    <div class="container pro">
        <div class="row">
            <div class="col-sm-12 sub-head">
                <h1>{{implode(', ',json_decode(base64_decode(@Request::get('brand')?:''))?:[])}} Wheels</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 wheel-des">
                @forelse(@$branddesc as $desc)
                <p>{!! @$desc->proddesc !!}</p>
                @empty @endforelse
            </div>
        </div>
        <div class="row main-pro">
            <div class="col-sm-3 main-pro-inner-category">
                <div class="header-bottom col-sm-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="price-heading">SIZE</div>
                                <!--  -->
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion123456" href="#collapseOne" class="{{(@Request::get('diameter'))?'':'collapsed123456'}}" aria-expanded="{{(@Request::get('diameter'))?'true':'false'}}" aria-controls="collapseOne">
                                                    Diameter
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse1 collapse in in123456 {{(@Request::get('diameter'))?' in':''}} " role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <ul style="list-style-type: none;">
                                                    @forelse($wheeldiameter as $diameter)
                                                    <li><input type="checkbox" name="wheeldiameter[]" class="wheeldiameter" value="{{$diameter->wheeldiameter}}" @if(in_array($diameter->wheeldiameter,json_decode(base64_decode(@Request::get('diameter')?:''))?:[])) checked @endif> {{$diameter->wheeldiameter.'('.$diameter->total.')'}}
                                                    </li>
                                                    @empty
                                                    <li>No Diameter Available</li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion123456" href="#collapseTwo" class="{{(@Request::get('width'))?'':'collapsed123456'}}" aria-expanded="{{(@Request::get('width'))?'true':'false'}}" aria-controls="collapseTwo">
                                                    Width
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse2 collapse in in123456  {{(@Request::get('width'))?' in':''}}  " role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <ul style="list-style-type: none;">
                                                    @forelse($wheelwidth as $width)
                                                    <li><input type="checkbox" name="wheelwidth[]" class="wheelwidth" value="{{$width->wheelwidth}}" @if(in_array($width->wheelwidth,json_decode(base64_decode(@Request::get('width')?:''))?:[])) checked @endif> {{$width->wheelwidth.'('.$width->total.')'}} </li>
                                                    @empty
                                                    <li>No width Available</li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion123456" href="#collapseThree" class="{{(@Request::get('brand'))?'':'collapsed123456'}}" aria-expanded="{{(@Request::get('brand'))?'true':'false'}}" aria-controls="collapseThree">
                                                    Brand
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse3 collapse in in123456" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                <ul style="list-style-type: none;">
                                                    @forelse($brands as $brand)
                                                    <li><input type="checkbox" name="brand[]" class="brand" value="{{$brand->prodbrand}}"
                                                        @if(in_array($brand->prodbrand,json_decode(base64_decode(@Request::get('brand')?:''))?:[]))
                                                             checked
                                                        @endif
                                                        >
                                                        @if(@$countsByBrand[$brand->prodbrand])
                                                        {{$brand->prodbrand}} ( {{$countsByBrand[$brand->prodbrand]}} )
                                                        @endif
                                                    </li>
                                                    @empty
                                                    <li>No Brands Available</li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingFour">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion123456" href="#collapseFour" class="{{(@Request::get('width'))?'':'collapsed123456'}}" aria-expanded="{{(@Request::get('width'))?'true':'false'}}" aria-controls="collapseFour">
                                                    Finish
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse4 collapse in in123456  {{(@Request::get('finish'))?' in':''}}  " role="tabpanel" aria-labelledby="headingFour">
                                            <div class="panel-body">
                                                <ul style="list-style-type: none;">
                                                    @forelse($wheelfinish as $finish)
                                                    <li><input type="checkbox" name="finish[]" class="finish" value="{{$finish->prodfinish}}" @if(in_array($finish->prodfinish,json_decode(base64_decode(@Request::get('finish')?:''))?:[])) checked @endif> {{$finish->prodfinish.'('.$finish->total.')'}} </li>
                                                    @empty
                                                    <li>No Finish Available</li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="col-sm-9 col-sm-9 main-pro-inner">
              @if(@$vehicle || @$flag=='searchByWheelSize')
              <div class="wheel-list-change-tab">
                  <div class="row">
                      <div class="col-md-8 left-head">
                        <p> 
                            @if(@$vehicle)
                            Your Selected Vehicle: 
                                <b>{{@$vehicle->year}} {{@$vehicle->make}} {{@$vehicle->model}} {{@$vehicle->submodel}}</b>
                            <br>
                            @endif
                            @if(@$flag=='searchByWheelSize')

                            Your Selected  
                            @if(@$request->wheeldiameter)

                            Diameter:
                                <b>{{@$request->wheeldiameter}}</b> ,
                            @endif

                            @if(@$request->wheelwidth)
                            Width:
                                <b>{{@$request->wheelwidth}}</b> ,
                            @endif

                            @if(@$request->boltpattern)
                            Bolt Pattern:
                                <b>{{showBoltPattern(@$request->boltpattern)}}</b> ,
                            @endif

                            @if(@$request->minoffset)
                            Offset:
                                <b>{{@$request->minoffset}}</b> 
                                @if(@$request->maxoffset)<b> to {{@$request->maxoffset}}</b> @endif
                            @endif
                            @endif
                        </p>
                      </div>
                      <div class="col-md-4 right-button"><button type="submit" class="btn vehicle-change"><a href="{{url('/wheelproducts')}}">Change</a></button></div>
                  </div>
              </div>
              @endif
                <div class="row">
                    @forelse($products as $key => $product)
                        <?php $product = (object)$product; ?>
                        <div class="col-sm-4">
                            <div class="product-layouts">
                                <div class="product-thumb transition">
                                    <div class="image">
                                        <img class="wheelImage image_thumb" src="{{ViewWheelProductImage(@$product->prodimage)}}" title="{{@$product->prodbrand}}" alt="{{@$product->prodbrand}}">
                                        <img class="wheelImage image_thumb_swap" src="{{ViewWheelProductImage($product->prodimage)}}" title="{{$product->prodbrand}}" alt="{{$product->prodbrand}}">
                                        <div class="sale-icon"><a>Sale</a></div>
                                    </div>

                                    <div class="thumb-description">
                                        <div class="caption">
                                            <h4><a href="{{url('/wheelproductview',$product->id)}}{{@$flag?'/'.$flag:''}}">{{$product->prodtitle}}
                                                @if(@Request::get('diameter'))
                                                    <br> {{'Diameter : '.$product->wheeldiameter}}
                                                @endif
                                                @if(@Request::get('width'))
                                                    <br> {{'Width : '.$product->wheelwidth}}
                                                @endif
                                                    <!-- <br> {{'PN : '.$product->partno}}  -->
                                                </a>
                                              </h4>

                                            <!-- <div class="price">
                                                <span class="price-new">Starting at : {{roundCurrency(@$product->price)}}</span>
                                            </div> -->
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
                                    <div class="thumb-description-price-details">
                                      <span class="price-new">Starting at : {{roundCurrency(@$product->price)}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @empty 
                     <div class="col-md-12 left-head text-center" >
                        <br>
                          <h5> <b>No Results found for your selected.Please try selecting a different brand or attribute on the left.</b> </h5>
                      </div>

                        @endforelse
                </div>

                <div class="row pro-pagination">
                    <div class="col-sm-6 pagi-left">
                        <p>{{(@$products->total())?@$products->total().' Wheels Found':''}} </p>
                    </div>
                    <div class="col-sm-6 pagi-right">
                        {{$products->appends([ 'diameter' => @Request::get('diameter'), 'width' => @Request::get('width'), 'brand' => @Request::get('brand'), 'car_id' => @Request::get('car_id'), 'page' => @Request::get('page'), 'flag' => @Request::get('flag'), 'make' => @Request::get('make'), 'year' => @Request::get('year'), 'model' => @Request::get('model'), 'submodel' => @Request::get('submodel'), 'zip' => @Request::get('zip'), 'wheeldiameter'=> @Request::get('wheeldiameter'), 'wheelwidth'=> @Request::get('wheelwidth'), 'boltpattern'=> @Request::get('boltpattern'), 'minoffset'=> @Request::get('minoffset'), 'maxoffset'=> @Request::get('maxoffset') ])->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('custom_scripts')
@endsection
