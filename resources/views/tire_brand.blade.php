@extends('layouts.app') @section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}"> @endsection @section('content')

</section>

<section id="falken-des">
    <div class="container">
        @if(@$tire->Brand)
        <div class="row">
            <div class="col-sm-9 fal-des">
                <div class="prod-headinghome">
                    @if(@$tire->Brand)
                    <p class="read_more_text" data-length="1300">
                        {{@$tire->Brand->manudesc}}
                    </p>
                    @endif
                </div>
            </div>
            <div class="col-sm-3 fal-logo"><img src="{{viewImage('tires/brands/'.@$tire->Brand->manulogo)}}"></div>
        </div>
        @endif
    </div>

    <div class="container">
        @if(@$ptires->total() > 0)
        <div class="hometabled">
            <div class="row">
                <div class="title-heading">
                    <h2>Passenger Tires</h2></div>
            </div>
            <div class="row">
                @forelse($ptires as $key => $ptire)
                <?php $ptire = (object)$ptire; ?>
                <div class="col-sm-2">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="{{ViewTireImage(@$ptire->prodimage)}}" title="{{@$ptire->prodtitle}}" alt="{{@$ptire->prodtitle}}" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="{{ViewTireImage(@$ptire->prodimage)}}" title="{{@$ptire->prodtitle}}" alt="{{@$ptire->prodtitle}}" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type" title="{{@$ptire->prodtitle}}">
                                        <a href="{{url('/tirebrandmodel')}}/{{base64_encode($ptire->id)}}">{{@$ptire->prodtitle}}
                                            <!-- <br> -->
                                        <!-- @if(@$ptire->price)
                                        Starting at: {{roundCurrency(@$ptire->price)}}
                                        @else
                                        <br>
                                        @endif -->
                                        </a>
                                    </h4>
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

                            <div class="thumb-description-price-details">
                              <span class="price-new">@if(@$ptire->price)
                              Starting at: {{roundCurrency(@$ptire->price)}}
                              @else
                              <br>
                              @endif</span>
                            </div>

                        </div>
                    </div>
                </div>
                @empty @endforelse
            </div>
                <div class="row pro-pagination">
                    <div class="col-sm-6 pagi-left">
                        <p>{{(@$ptires->total())?@$ptires->total().' Passanger Tires Found':''}} </p>
                    </div>
                    <div class="col-sm-6 pagi-right">
                        {{$ptires->appends([
                        'ptpage' => @Request::get('ptpage'),
                        'ltpage' => @Request::get('ltpage')])->links()}}

                    </div>
                </div>
        </div>
        @endif
        @if(@$lttires->total() > 0)
        <div class="hometabled">
            <div class="row">
                <div class="title-heading">
                    <h2>Light Truck Tires</h2></div>
            </div>
            <div class="row">
                @forelse($lttires as $key => $lttire)
                <?php $lttire = (object)$lttire; ?>
                <div class="col-sm-2">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="{{ViewTireImage(@$lttire->prodimage)}}" title="{{@$lttire->prodtitle}}" alt="{{@$lttire->prodtitle}}" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="{{ViewTireImage(@$lttire->prodimage)}}" title="{{@$lttire->prodtitle}}" alt="{{@$lttire->prodtitle}}" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type" title="{{@$lttire->prodtitle}}"><a href="{{url('/tirebrandmodel')}}/{{base64_encode($lttire->id)}}">{{@$lttire->prodtitle}}</a></h4>
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

                            <div class="thumb-description-price-details">
                              <span class="price-new">Starting at: {{roundCurrency(@$lttire->price)}}</span>
                            </div>

                        </div>
                    </div>
                </div>
                @empty @endforelse
            </div>

                <div class="row pro-pagination">
                    <div class="col-sm-6 pagi-left">
                        <p>{{(@$lttires->total())?@$lttires->total().' Light Truck Tires Found':''}} </p>
                    </div>
                    <div class="col-sm-6 pagi-right">
                        {{$lttires->appends([
                        'ptpage' => @Request::get('ptpage'),
                        'ltpage' => @Request::get('ltpage')])->links()}}

                    </div>
                </div>
        </div>
        @endif
    </div>
</section>

@endsection
@section('custom_scripts')
<!--  -->

@endsection
