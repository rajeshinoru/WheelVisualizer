@extends('layouts.app')
@section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}">
@endsection @section('content')

<style>
    .wrapper {
        width: 100%;
    }

    @media(max-width:992px) {
        .wrapper {
            width: 100%;
        }
    }

    .panel-heading {
        padding: 0;
        border: 0;
    }

    .panel-title>a,
    .panel-title>a:active {
        display: block;
        padding: 15px;
        color: #555;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        word-spacing: 3px;
        text-decoration: none;
    }

    .panel-heading a:before {
        font-family: 'Glyphicons Halflings';
        content: "\e114";
        float: right;
        transition: all 0.5s;
    }

    .panel-heading.active a:before {
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        transform: rotate(180deg);
    }

    .listing-sidebar .widget-search {
        padding: 20px;
    }

    ul {
        margin-bottom: 0px;
    }

    .listing-sidebar .widget-search ul li {
        margin: 5px 2px !important;
        list-style: none;
    }

    .listing-sidebar .widget-search ul li i {
        padding-right: 10px;
    }

    .listing-sidebar .widget-search ul li span {
        background: #db2d2e;
    }

    .listing-sidebar .widget-search ul li span {
        font-size: 12px;
        width: 30px;
        height: 30px;
        line-height: 30px;
        border-radius: 50%;
        color: #ffffff;
        background: #db2d2e;
        text-align: center;
        display: inline-block;
    }

    .widget-search {
        border: 1px solid #ccc;
    }

    ul.list-group li {
        list-style: none;
        position: relative;
    }

    .list-group-item:first-child {
        border-radius: 0px;
    }

    .list-group-item {
        border-left: 0;
        border-right: 0;
        padding: 13px 15px;
    }

    .listing-sidebar .widget-search {
        padding: 20px !important;
    }

    .list-style.-none {
        padding: 0px 0px !important;
    }

    .listing-sidebar h5 {
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: 24px;
    }

    ul.list-group li {
        list-style: none;
    }

    .panel-body ul {
        list-style-type: none;
        padding: 0px 0px !important;
    }

    .widget-banner img {
        width: 100% !important;
    }

    .sorting-options-main {
        border: 1px solid #e3e3e3;
        padding: 20px;
    }

    #collapseOne,
    #collapseTwo {
        border: 1px solid #e2e4e7;
    }

    #headingOne,
    #headingTwo {
        border: 1px solid #ccc !important;
    }

    .widget-search {
        margin-bottom: 20px;
    }

    .heading {
        font-size: 13px !important;
    }

    .car-list ul li {
        border: 1px solid #e3e3e3;
        padding: 1px 10px;
        font-size: 12px;
        display: inline-block;
        margin-bottom: 0px;
    }

    .listing-sidebar #accordion .panel-title a {
        color: #000 !important;
        font-size: 13px !important;
        font-weight: 600;
    }

    #special-product,
    .container.brand-logo,
    #bott,
    footer {
        display: none !important;
    }
</style>
<style type="text/css">
    button.btn.speed {
    background: #000 !important;
    margin: 5px 0px !important;
    }
    button.btn.speed a
    {
      color: #fff !important;
      font-size: 10px !important;
    }

</style>
</section>
<section id="tire-list">
    <div class="container">
        <div class="col-sm-3">
            <!-- Side Start -->
            <div class="listing-sidebar">
                <div class="widget">
                    <div class="widget-search">
                        <div class="price-slide">
                            <div class="price">
                                <p><label for="price">Price range:</label>
                                    <input type="text" id="price" style="border:0; color:#b9cd6d; font-weight:bold;">
                                </p>
                                <div id="slider-3"></div>
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
                                                @foreach(@getTireBrandList() as $key => $brand)
                                                <li><span class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="tirebrand" name="tirebrand[]" value="{{$brand}}" @if(in_array($brand,json_decode(base64_decode(@Request::get('tirebrand')?:''))?:[])) checked @endif > {{$brand}}
                                                        </label>
                                                    </span></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="widget-search">
                                <h5 class="heading">Speed Rating</h5>
                                <div class="car-list">
                                        @foreach(@$speedratings as $key => $value)
                                        <button class="btn {{(@$value->speedrating == 
                                            json_decode(base64_decode(
                                                @Request::get('tirespeedrating')?:''
                                            ))
                                            )?'btn-inverse ':''}} speed tirespeedrating" type="button" name="tirespeedrating[]" class="tirespeedrating" value="{{@$value->speedrating}}">
                                            {{@$value->speedrating}} <!-- 130 mph --> ({{@$value->total}})
                                        </button>
                                        @endforeach
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

            <div class="row">
                @foreach($tires as $key =>$tire)
                <div class="col-sm-3">
                    <div class="product-layouts">
                        <div class="product-thumb transition">
                            <div class="image">
                                <img class="wheelImage image_thumb" src="{{viewImage('tires/'.@$tire->prodimage)}}" title="" alt="" style="cursor: zoom-in;">
                                <img class="wheelImage image_thumb_swap" src="{{viewImage('tires/'.@$tire->prodimage)}}" title="" alt="" style="cursor: zoom-in;">
                                <div class="sale-icon"><a></a></div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="tire-type"><a href="{{url('/tireview')}}/{{base64_encode(@$tire->id)}}">
                                            {{@$tire->prodtitle}}<br>
                                            <br>
                                            Size : {{@$tire->tiresize}}<br>
                                            Load : {{@$tire->loadindex}}    Speed:{{@$tire->speedrating}}<br>
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
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection 
@section('shop_by_vehicle_scripts')
<script src="{{ asset('js/wheels.js') }}"></script>



<script>
    $(function() {
        $("#slider-3").slider({
            range: true,
            min: 0,
            max: 500,
            values: [1, 200],
            slide: function(event, ui) {
                $("#price").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#price").val("$" + $("#slider-3").slider("values", 0) +
            " - $" + $("#slider-3").slider("values", 1));
    });
</script>




@endsection