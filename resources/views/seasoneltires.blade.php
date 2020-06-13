@extends('layouts.app') @section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}">

@endsection
@section('metakeywords')
<?=@MetaViewer('Contact');?>
@endsection
@section('content')

<style type="text/css">
    .contact-container {
        border: 1px solid #ccc;
        /*box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, .05);*/
        /*background-color: #fff;*/
        border-radius: 2px !important;
    }
</style>
<style>
    .ban-ser {
        border: 1px solid #ddd9d9 !important;
    }

    .wheel-list {
        column-width: 15em;
        padding: 10px 15px !important;
    }

    .wheel-list li a {
        color: #474646;
        display: block;
        font-size: 12px !important;
        text-align: center;
        font-family: Montserrat !important;
    }

    .wheel-list ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    .wheel-list li {
        padding: 3px;
        margin: 3px;
        margin-top: 3px;
        margin-top: 3px;
        border: 1px solid #ccc;
        box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, .05);
        background-color: #fff;
        border-radius: 2px !important;
    }

    .wheel-list ul li:first-child {
        margin-top: 0;
    }

    #heading h1 {
        font-family: Montserrat;
        color: #121214;
        font-size: 18px !important;
        text-align: center;
        font-weight: 700 !important;
        margin: 20px 0px;
    }

    .col-sm-3.payments3-card img {
        width: 100% !important;
    }

    .col-sm-3.payments-card,.center {
        text-align: center !important;
    }

    .prod-headinghome p {
        text-align: justify;
        margin: 10px 0px;
        color: #121214;
        line-height: 30px;
        font-family: poppins !important;
        font-size: 12px !important;
    }

    .col-sm-4.wheel-img {
        text-align: center !important;
    }

    /* pro Start */
    .hometabled {
        display: table;
        text-align: center;
        width: 100%;
        background: #fff;
        box-shadow: 0 2px 3px 0 rgba(180, 180, 180, .6) !important;
        border: 1px solid #d8d7d7;
        margin-bottom: 15px;
        padding: .5%;
        border-radius: 2px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
    }

    .pTopBar {
        display: table;
        width: 100%;
        padding: .5% 1%;
        margin-bottom: 1%;
        border-radius: 2px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        background: #0e1661 !important;
    }

    .pTopCell {
        display: table-cell;
        width: 50%;
        color: #fff;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .75);
        font-size: 12px;
        font-family: Montserrat !important;
    }

    .pTopCell.Phone a {
        color: #fff;
        text-decoration: none;
    }

    .asItems {
        border: 0px;
    }

    .asItems {
        padding: 0;
        padding-top: 0px;
        width: 100%;
        padding-top: 5px;
        text-align: center;
        margin: 0 auto 10px;
        background: #fff;
        border: 1px solid #cecece;
        border-radius: 2px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        box-shadow: 0 0 3px rgba(0, 0, 0, .125);
        font-family: open sans, Arial, sans-serif;
    }

    .asItems {
        text-align: center;
        font-family: open sans, Arial, sans-serif;
    }

    .gridList {
        margin: 0 auto;
        padding: 0;
        width: auto;
        display: table;
    }

    .gridItem {
        display: inline-block;
        width: 210px;
        text-align: center;
        padding: 5px;
    }

    .homecelld b {
        color: #222 !important;
        font-size: 12px !important;
        font-family: Montserrat !important;
    }

    .hometabled {
        margin: 25px 0px !important;
    }

    .gridList.wheels.suggested .gridItem homeapge1 {
        height: 180px;
    }

    .asItems {
        border: 0px;
    }

    .prod-headinghome h2 {
        color: #0e1661 !important;
        text-align: center;
        font-family: Montserrat !important;
        font-size: 18px !important;
        font-weight: 700 !important;
    }

    .prod-heading p {
        color: rgb(18, 18, 20) !important;
        font-family: Montserrat !important;
        font-size: 12px !important;
    }

    .prod-heading-center {
        text-align: center;
    }

    .prod-headinghome h3 {
        width: 100%;
        font-size: medium;
        font-family: open sans, Arial, sans-serif;
        color: #000 !important;
        font-weight: 600 !important;
        text-align: center;
    }

    .prod-heading-center p {
        color: #0e1661 !important;
        font-size: 15px;
        line-height: 30px !important;
        font-family: Montserrat !important;
        font-weight: 700 !important;
    }

    .prod-heading-bold {
        font-family: open sans, Arial, sans-serif;
        color: #121214;
    }

    b {
        font-weight: bold;
    }

    .h1-nl {
        font-size: 20px;
    }

    hr {
        border: 0.5px solid #ccc !important;
    }

    #produst,
    #special-product,
    footer,
    #bott,
    .container.brand-logo {
        display: none !important;
    }

    .container-fluid.home-page {
        padding: 0px 0px !important;
        background: #f1f1f1 !important;
    }

    .prod-heading-bold a {
        color: #337ab7 !important;
    }

    #contact-form label {
        float: left;
        color: #121214;
        line-height: 30px !important;
        font-family: poppins !important;
        font-size: 12px !important;
    }

    #contact-form .form-control {
        border-radius: 2px;
    }

    #contact-us {
        padding: 20px 0px !important;
    }

    .contact-head h1 {
        font-family: Montserrat !important;
        font-size: 18px !important;
        font-weight: 700 !important;
        margin: 20px 0px;
    }

    .contact-head h2 {
        font-family: Montserrat !important;
        font-size: 15px !important;
        font-weight: 700 !important;
        margin: 20px 0px;
        color: #0e1661 !important;
    }

    .contact-head h3 {
        font-family: Montserrat !important;
        font-size: 14px !important;
        font-weight: 700 !important;
        margin: 20px 0px;
        color: #0e1661 !important;
    }

    .contact-head h4 {
        font-family: Montserrat !important;
        font-size: 15px !important;
        line-height: 30px;
        font-weight: 700 !important;
        margin: 20px 0px;
        color: #0e1661 !important;
    }

    .contact-head p {
        color: #121214;
        line-height: 30px !important;
        font-family: poppins !important;
        font-size: 12px !important;
        margin: 0px !important;
    }

    .cont-details {
        text-align: center;
    }

    .main-contact-2 {
        margin: 50px 0px;
    }

    .btn.btn-success.checkout-btn.btn-send {
        background: #0e1661 !important;
        color: #fff !important;
        border: none !important;
    }

    .cont-form {
        border: 1px solid #ccc;
        box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }

    .cont-form .form-group {
        margin-bottom: 0px !important;
    }
    
    .col-sm-6.cont-img {
        padding: 0px !important;
        text-align: center;
    }
</style>

<br>


@include('include.sizelinks')

<!-- Contact Us Section Start -->
<section id="contact-us" class="contact-page">
    <div class="container">

        @if(Setting::get('seasoneltires') != "")
            <?=Setting::get('seasoneltires')?>
        @else

        <div class="about-page title-header">
            <div id="heading" class="title">
                <h1>Seasonal Tires</h1>
            </div>
        </div>
        <div class="row main-contact">

            <div class="col-sm-12 cont-img">
                <div class="contacttablecell" style="text-align: center;"><img src="{{asset('/image/Seasonal_Tires.png')}}" class="ri"  ></div>
            </div>

        </div> 
        <div class="row main-contact">

            <div class="col-sm-6 cont-para">
                <div class="prod-headinghome">
                    <h4>Summer</h4>
                    <p>Summer tires are made for driving in warm weather, and generally emphasize high-speed performance. They tend to have shallow tread depths and fewer lateral grooves, resulting in a rib-like tread pattern that puts as much rubber in contact with the road as possible. This increased tread contact area sharply improves driving stability and response, allowing for more precise steering and braking.</p>  
                    <p>Summer tires excel on both wet and dry roads, and are also called three-season tires. The tread compounds used in summer tires are soft and flexible, so they adhere very well to both wet and dry pavement, improving response to driver input. Their longitudinal grooves evacuate water from under the treads to prevent hydroplaning. However, the rubber compounds in summer tires start to harden at temperatures below 40° F (5° C), becoming rigid, incapable of traction, and susceptible to cracking. This makes summer tires dangerous to use in extremely cold weather or on snowy roads.</p>
                    <p>In climates with warm temperatures throughout the year, such as parts of Southern California, some drivers may opt to drive on summer tires year-round.</p>
                </div>
            </div>

            <div class="col-sm-6 cont-img" >
                <div class="contacttablecell"><img src="{{asset('/image/Seasonal_Tires-2.png')}}" class="ri"></div>
            </div>

        </div>
        <hr>
        <div class="row main-contact">

            <div class="col-sm-6 cont-para">
                <div class="prod-headinghome">
                    <h4>Winter</h4>
                    <p>Winter tires are made for driving in cold weather, and generally emphasize driver safety. They tend to have deep tread depths with extensive grooves and siping, providing a high quantity of biting edges that excel at gripping ice, snow, and slippery roads. These deep, wide grooves also help to channel slush and water away from the treads to prevent slip accidents. Winter tires may feature a three-peak Mountain Snowflake symbol, which indicates that the tire fulfills U.S. and Canadian tire standards for driving in substantial snow.</p>
                    <p>Winter tires excel in snow traction, but are also designed for dry traction in very cold temperatures. The tread compounds used in winter tires are even softer than in summer tires, and remain soft and pliable at temperatures below 45° F (7° C). This allows winter tires to maintain traction when driving on snow-covered roads, keeping drivers safe and in control. However, the tread rubber becomes too soft at temperatures above 45° F (7° C), and rapidly wears out. This makes winter tires less desirable during the warmer seasons of the year.</p>
                    <p>In climates with very pronounced seasons, such as Canada and parts of Europe, drivers generally switch between summer and winter tires during the year to adapt to hot summer days and heavy winter snowfalls.</p>
                </div>
            </div>

            <div class="col-sm-6 cont-img">
                <div class="contacttablecell"><img src="{{asset('/image/Seasonal_Tires-3.png')}}" class="ri"  ></div>
            </div>

        </div>
        <hr>
        <div class="row main-contact">

            <div class="col-sm-6 cont-para">
                <div class="prod-headinghome">
                    <h4>All-Season</h4>
                    <p>All-season tires are made for driving in all parts of the year, and combine aspects of summer and winter tires to provide decent traction in dry, wet, and snowy conditions. All-season tires tend to have moderate tread depths with wide longitudinal grooves, providing moderate tread contact for driving stability as well as biting edges to provide grip on slippery roads. All-season tires may feature a M+S rating, which indicates that the tire fulfills U.S. and Canadian tire standards for driving on mud and light snow.</p> 
                    <p>Because all-season tires are intended for year-round use, they generally have an emphasis on mileage and long tread life. The tread compounds in all-season tires remain flexible at colder temperatures than summer tires, yet also wear longer in warmer temperatures than winter tires. However, in exchange for their durability, all-season tire treads are less pliable, and they lack the responsive handling response of dedicated summer tires or the biting snow grip of dedicated winter tires. In fact, because their compounds are stiffer, all-season tires are actually outperformed by summer tires in wet conditions. All-season tires are compatible with a wide range of temperatures for day-to-day driving, but are not ideal for extreme heat or extreme cold.</p>
                    <p>In climates with relatively mild seasons, especially in the United States, drivers tend to rely on all-season tires year-round rather than alternate between summer and winter tires.</p>
                </div>
            </div>

            <div class="col-sm-6 cont-img">
                <div class="contacttablecell"><img src="{{asset('/image/Seasonal_Tires-4.png')}}" class="ri"  ></div>
            </div>

        </div>
        @endif
    </div>
</section>
<!-- Contact Us Section End -->



@endsection
@section('custom_scripts')
@endsection