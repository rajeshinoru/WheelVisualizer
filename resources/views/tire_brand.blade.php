@extends('layouts.app') @section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}"> @endsection @section('content')

</section>

<section id="falken-des">
    <div class="container">

        <div class="row">
            <div class="col-sm-9">
                <div class="prod-headinghome">
                    @if(@$tire->Brand)
                    <p>
                        {{@$tire->Brand->manudesc}}
                    </p>
                    @else
                    <p>
                        Shop for Falken tires at wholesale prices at Discounted Wheel Warehouse! We sell low-priced, high-performing Falken tires for today's passenger car, crossover, SUV, and light truck owners. Designed with performance in mind, Falken tires deliver exceptional value for the everyday driver. We have the best bargain prices on UHP, all-season, and off-road Falken tires here at Discounted Wheel Warehouse.
                    </p>
                    <p>
                        Our warehouse has affordable Falken performance tires for all sorts of passenger vehicles, including coupes, sedans, crossovers, compact SUVs, and sport trucks. Our Falken lineup includes all-season Ziex and Sincera passenger tires for year-round tread life and versatile performance in rain, sun, or snow. We sell Falken Azenis summer tires that deliver outstanding wet and dry handling capabilities for sports performance. We also stock a great selection of highway and all-terrain light truck tires from Falken's acclaimed Wildpeak tire series for resilient handling in both on-road and off-road applications. All Falken tires at Discounted Wheel Warehouse are sold at wholesale prices.
                    </p>
                    <p>
                        Falken tires are engineered with advanced performance technologies for the street, the track, or off the road. From rugged Wildpeak tires for SUVs and pickup trucks, to all-season performance Falken tires for passenger cars, all Falken tires deliver great quality at value prices. Save money on your next set of replacement tires, and get a set of affordable, reliable Falken tires at a discount from Discounted Wheel Warehouse!
                    </p>
                    @endif
                </div>
            </div>
            <div class="col-sm-3 fal-logo"><img src="{{viewImage('tires/brands/'.@$tire->Brand->manulogo)}}"></div>
        </div>
    </div>

    <div class="container">
        <div class="hometabled">
            <div class="row">
                <div class="title-heading">
                    <h2>Passenger Tires</h2></div>
            </div>
            <div class="row">
                @forelse($tires->where('detaildesctype','Passenger') as $key => $ptire)
                <div class="col-sm-2">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="{{viewImage('/tires/'.@$ptire->prodimage)}}" title="{{@$ptire->prodtitle}}" alt="{{@$ptire->prodtitle}}" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="{{viewImage('/tires/'.@$ptire->prodimage)}}" title="{{@$ptire->prodtitle}}" alt="{{@$ptire->prodtitle}}" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type" title="{{@$ptire->prodtitle}}">
                                        <a href="{{url('/tirebrandmodel')}}/{{base64_encode($ptire->id)}}">{{@$ptire->prodtitle}} <br>
                                        @if(@$ptire->price)
                                        Starting at: ${{@$ptire->price}}
                                        @else
                                        <br>
                                        @endif
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
                        </div>
                    </div>
                </div>
                @empty @endforelse
            </div>

        </div>

        <div class="hometabled">
            <div class="row">
                <div class="title-heading">
                    <h2>Light Truck Tires</h2></div>
            </div>
            <div class="row">
                @forelse($tires->where('detaildesctype','!=','Passenger') as $key => $lttire)
                <div class="col-sm-2">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="{{viewImage('/tires/'.@$lttire->prodimage)}}" title="{{@$lttire->prodtitle}}" alt="{{@$lttire->prodtitle}}" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="{{viewImage('/tires/'.@$lttire->prodimage)}}" title="{{@$lttire->prodtitle}}" alt="{{@$lttire->prodtitle}}" style="cursor: zoom-in;">
                                <div class="sale-icon"><a>Sale</a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type" title="{{@$lttire->prodtitle}}"><a href="{{url('/tirebrandmodel')}}/{{base64_encode($lttire->id)}}">{{@$lttire->prodtitle}} <br> Starting at: ${{@$lttire->price}}</a></h4>
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
                @empty @endforelse
            </div>

        </div>

    </div>
</section>

@endsection @section('shop_by_vehicle_scripts')
<!-- <script src="{{ asset('js/wheels.js') }}"></script> -->

@endsection
