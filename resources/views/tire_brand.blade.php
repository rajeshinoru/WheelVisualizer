@extends('layouts.app') @section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}"> @endsection @section('content')

<style>
    #falken-des {
        padding: 40px 0px;
    }
    
    .fal-logo {
        text-align: center;
    }
    
    .prod-headinghome p 
    {
        margin: 10px 0px;
        color: #121214;
        font-size: 12px !important;
        line-height: 30px !important;
        font-family: play !important;
    }
    
    .product-thumb h4 {
        font: 400 12px/25px "roboto", Helvetica, sans-serif;
        margin: 5px 0 10px;
        overflow: hidden;
        padding: 0;
    }
    
    .title-heading h2 {
        font-size: 18px !important;
        margin: 20px 0px !important;
        font-family: oswald !important;
    }
    
    .hometabled {
        display: table;
        text-align: center;
        width: 100%;
        background: #fff;
        margin: 25px 0px !important;
        padding: .5%;
        border-radius: 2px !important;
    }
    
    .col-sm-4.fal-logo img {
        padding: 10px 0px !important;
    }
</style>

</section>

<section id="falken-des">
    <div class="container">

        <div class="row">
            <div class="col-sm-8">
                <div class="prod-headinghome">
                    <p>Welcome to Discounted wheel Warehouse. We offer a huge selection of rims and tires to suit your needs. We carry 15 inch wheels all the way to a whopping 32 inch custom wheel. We offer quality discount tires at a price range for all. Don't miss our Closeout section as we have the best blowout deals to offer. Whether you're looking for rims or tires Discounted Wheel Warehouse has the best deal on the world wide web. We also have all the latest news and information on our Blog concerning custom wheels or car rims and all aspects of tires.</p>
                </div>
            </div>
            <div class="col-sm-4 fal-logo"><img src="{{url('image/falken-logo.png')}}"></div>
        </div>
    </div>

    <div class="container">
        <div class="hometabled">
            <div class="row">
                <div class="title-heading">
                    <h2>Passenger Tires</h2></div>
            </div>
            <div class="row">
                @forelse($tires->where('plt','') as $key => $ptire)
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
                                        <a href="{{url('/tireview')}}/{{base64_encode($ptire->id)}}">{{@$ptire->prodtitle}} <br>
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
                @empty
                @endforelse
            </div>


        </div>

        <div class="hometabled">
            <div class="row">
                <div class="title-heading">
                    <h2>Light Truck Tires</h2></div>
            </div>
            <div class="row">
                @forelse($tires->where('plt','LT') as $key => $lttire)
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
                                    <h4 class="tire-type" title="{{@$lttire->prodtitle}}"><a href="{{url('/tireview')}}/{{base64_encode($lttire->id)}}">{{@$lttire->prodtitle}} <br> Starting at: ${{@$lttire->TireDetails->sale_price}}</a></h4>
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
                @endforelse
            </div>

        </div>

    </div>
</section>

@endsection @section('shop_by_vehicle_scripts')
<!-- <script src="{{ asset('js/wheels.js') }}"></script> -->

@endsection