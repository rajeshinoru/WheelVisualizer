@extends('layouts.app')
@section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}">
@endsection
@section('metakeywords')
<?=@MetaViewer('About');?>
@endsection
@section('content')

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

    .col-sm-3.payments-card {
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

    .prod-headinghome h1 {
        font-family: Montserrat !important;
        font-size: 18px !important;
        font-weight: 700 !important;
        margin: 20px 0px;
    }

    .prod-headinghome a {
        color: #0e1661;
    }

    .abt-img {
        text-align: center;
    }

    .abt-img .prod-heading-bold h1 {
        font-family: Montserrat !important;
        font-size: 12px !important;
        font-weight: 700 !important;
    }

    .abt-img .prod-heading-bold h2 {
        font-family: Montserrat !important;
        font-size: 12px !important;
        font-weight: 700 !important;
    }

    .prod-heading-bold {
        padding: 94px 0px !important;
    }

    #about-us {
        padding: 20px 0px !important;
    }
</style>
<br>

@include('include.sizelinks')

<!-- About Section Start -->
<section id="about-us" class="about-page">


    <div class="container">


        @if(Setting::get('information') != "")
            <?=Setting::get('information')?>
        @else

        <div class="about-page title-header">
            <div id="heading" class="title">
                <h1>Wheel and Tire information links - Discounted Wheel Warehouse</h1>
            </div>
        </div>
        <div class="row main-about">
            <div class="col-sm-12 abt-cont">
                <div class="prod-headinghome">
                    <!-- <h1>About Discounted Wheel Warehouse, also see <a href="{{url('/contactus')}}" style="text-decoration: none;"> Contact Us </a></h1> -->
                    <p><b><a href="{{url('/packagedeal')}}">Package Deal</a></b> - This link has information about what comes with a wheel and tire package.</p>

                    <p><b><a href="">LOW or HIGH?</a></b> - This link is information on how to determine if you have a FWD offset or a RWD offset on your Vehicle.</p>

                    <p><b><a href="{{url('/lipsizes')}}">Lip Sizes</a></b> - Explains the difference in wheel lip sizes and what to expect when your wheel arrives.</p>

                    <p><b><a href="">Wheel Fitment</a></b> - This link explains Plus Sizing and how we are able to properly fit your wheels and tires for your vehicle.</p>

                    <p><b><a href="">Offset and Bolt Patterns</a></b> - Reference to help aid in determining Bolt patterns and offsets for all vehicles.</p>

                    <p><b><a href="">Contact Us</a></b> - Email Addresses and Store hours of operation.</p>

                    <p><b><a href="">About Us</a></b> - About Us </p>

                    <p><b><a href="">Order Status</a></b> - View information on the status of your order.</p>

                    <p><b><a href="">Return Policy</a></b> - View our Return Policy</p>

                    <p><b><a href="">Reading a Tire Sidewall Code</a></b> - A Tire Sidewall Code contains vital information about the tire's characteristics, including the tire's dimensions, load index. and speed rating. Reading a Tire Sidewall Code is key to identifying the best tire for your needs. This article breaks down the parts of a Tire Sidewall Code and explains what each part means.</p>

                    <p><b><a href="">Tire Mounting and Balancing</a></b> - This article describes how Tire Mounting and Balancing is done at Discounted Wheel Warehouse. All your Tire Mounting and Balancing News and Information.</p>

                    <p><b><a href="">Seasonal Tires</a></b> - Summer, winter, and all-season tires are specially designed to match the time of year they are made for driving in. This article explains the differences between the various Seasonal Tires available here at Discounted Wheel Warehouse. Find out whether summer tires, winter tires, or all-season tires are best for your needs.</p>

                    <p><b><a href="">Types of Tires</a></b> - Cars and trucks use different types of tires for different driving needs. This article describes the characteristics of common Types of Tires available here at Discounted Wheel Warehouse. Get your information on the differences between touring passenger tires, performance passenger tires, highway-terrain truck tires, and mud-terrain truck tires.</p>

                    <p><b><a href="">Aluminum Alloy Wheels</a></b> - Custom alloy wheels are ideal for driving performance, visual appeal, and corrosion resistance. Learn more about the advantages of aluminum alloy wheels at Discounted Wheel Warehouse, and discover why aluminum alloy wheels are preferable to steel or mag wheels.</p>

                    <p><b><a href="">Parts of a Tire</a></b> - Today's tires are intricate structures with multiple layers and materials. Learn here at Discounted Wheel Warehouse about the different parts of a tire and how each part helps to help the tire function.</p>

                    <p><b><a href="">Tire Load Ratings</a></b> - There are two Tire Load Ratings used to measure a tire's load-carrying capability. This page will explain how to interpret Tire Load Ratings, the relationship between load capacity and air pressure, the differences between a tire's Load Range and Load Index, and how to determine the right tires for your load-carrying needs.</p>

                    <p><b><a href="">Tire Rolling Resistance</a></b> - Tire Rolling Resistance can make a difference in your car's fuel economy. Learn how Tire Rolling Resistance affects fuel efficiency, and how you can reduce tire rolling resistance to get the most out of your gas tank. We at Discounted Wheel Warehouse stock Low Rolling Resistance and fuel-economy tires for all your tire fuel efficiency needs, all at affordable prices.</p>

                    <p><b><a href="">Tire Tread Elements</a></b> - A tire's tread pattern is a careful arrangement of ribs, blocks, grooves, notches, and sipes that defines the tire's handling and ride characteristics. Learn here at Discounted Wheel Warehouse about the differences between symmetrical, asymmetric, and directional tires, and how each type of tread pattern affects the tire's function.</p>

                    <p><b><a href="">Types of Wheel Finishes</a></b> - Custom wheels come in a variety of finishes and finishing methods today. Learn more about the differences between machined, painted, polished, and chromed aftermarket wheels available here at Discounted Wheel Warehouse.</p>

                    <p><b><a href="">Tire Rotation</a></b> - Tire Rotation is an important part of maintenance that encourages even tread wear and balanced handling. Learn how tires are rotated here at Discounted Wheel Warehouse and the various rotation patterns used for front-wheel drive, rear-wheel drive, directional tires, and staggered-fitment tires.</p>

                    <p><b><a href="">Centerbore and Hub-Centric Fitment</a></b> - Wheel centerbore plays a major role in vehicle fitment. Learn here at Discounted Wheel Warehouse about the difference between hub-centric fitment and lug-centric fitment, and why hub rings are important for aftermarket wheels.</p>

                    <p><b><a href="">Lifespan of a Tire</a></b> - A tire's lifespan is determined by treadwear and natural rubber aging. Learn here at Discounted Wheel Warehouse about some common factors that affect a tire's lifespan, and when your tires need replacing.</p>

                    <p><b><a href="">Parts of a Wheel</a></b> - A wheel consists of three basic areas: the hub, the spokes, and the rim. Learn at Discounted Wheel Warehouse about the parts of a wheel and the significance of each one.</p>

                    <p><b><a href="">Tire Inflation Pressure</a></b> - Tire air pressure affects a tire's handling response, road grip, load capacity, ride comfort, and rolling resistance. Learn here at Discounted Wheel Warehouse about the dangers of underinflated and overinflated tires, as well as some guidelines for checking and setting your tires.</p>

                    <p><b><a href="">Ride Quality</a></b> - This article describes several ways that your tires can affect ride quality. Learn here at Discounted Wheel Warehouse about the relationship between your tires and ride comfort.</p>

                    <p><b><a href="">UTQG Ratings</a></b> - Uniform Tire Quality Grade (UTQG) ratings help to inform you of a tire's treadwear, traction, and temperature characteristics. Learn here at Discounted Wheel Warehouse about the three parts of a UTQG rating and what each rating means for a tire.</p>

                    <p><b><a href="">Wheel Care</a></b> - Cleaning your tires and wheels regularly is key to keeping then in good condition. Learn some wheel care tips here at Discounted Wheel Warehouse for keeping your tires and custom wheels intact.</p>

                    <p><b><a href="">Tread Wear</a></b> - A tire's treadwear determines how long it can be used before needing to be replaced. Learn here at Discounted Wheel Warehouse about factors that can affect tire treadwear and how to identify these factors.</p>

                    <p><b><a href="">Wheel Construction</a></b> - The method used to create a wheel affects its weight and strength. Learn here at Discounted Wheel Warehouse about cast, flow-formed, and forged wheels, and determine which is the right one for you.</p>

                    <p><b><a href="">Tire Speed Rating</a></b> - Tire speed ratings are a common way to categorize tires today. Learn here at Discounted Wheel Warehouse how to interpret tire speed ratings and what it means for your tires.</p>

                    <p><b><a href="">Traction</a></b> - This guide covers some tire characteristics that affect dry, wet, snow, and mud traction. Learn what to look for in your next set of tires here at Discounted Wheel Warehouse.</p>
                </div>
            </div>
            <!--       <div class="col-sm-5 abt-img">
        <div class="prod-heading-bold">
            <img src="{{asset('image/About-Us.jpg')}}" alt="About Us Discounted Wheel Warehouse" style="max-width: 100%; height: auto;" width="421" height="270">
            <h1>Our hours are Mon-Fri 7:00AM - 6:00PM Pacific Standard Time</h1>
            <h2> Call Today - 1-800-901-6003</h2>
        </div>
      </div> -->
        </div>

        @endif
    </div>
</section>
<!-- About Section End -->


@endsection
@section('custom_scripts')
<!--  -->
@endsection