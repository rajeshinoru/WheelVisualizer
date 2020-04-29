@extends('layouts.app') @section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}"> @endsection @section('content')

<style>
    .ban-ser{border: 1px solid #ddd9d9 !important;}
    .wheel-list{column-width: 15em;padding: 10px 15px !important;}
    .wheel-list li a{color: #474646;display: block;font-size: 12px !important;text-align: center;font-family: Montserrat !important;}
    .wheel-list ul{margin: 0;padding: 0;list-style-type: none;}
    .wheel-list li{padding: 3px;margin: 3px;margin-top: 3px;margin-top: 3px;border: 1px solid #ccc;box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, .05);background-color: #fff;border-radius: 2px !important;}
    .wheel-list ul li:first-child{margin-top: 0;}
    #heading h1{font-family: Montserrat;color: #121214;font-size: 18px !important;text-align: center;font-weight: 700 !important;margin:20px 0px;}
    .col-sm-3.payments3-card img{width: 100% !important;}
    .col-sm-3.payments-card{text-align: center !important;}
    .prod-headinghome p{text-align: justify;margin: 10px 0px;color: #121214;line-height: 30px;font-family: poppins !important;font-size: 12px !important;}
    .col-sm-4.wheel-img{text-align: center !important;}
    /* pro Start */
    .hometabled{display: table;text-align: center;width: 100%;background: #fff;box-shadow: 0 2px 3px 0 rgba(180, 180, 180, .6) !important;border: 1px solid #d8d7d7;margin-bottom: 15px;padding: .5%;border-radius: 2px;-moz-border-radius: 2px;-webkit-border-radius: 2px;}
    .pTopBar{display: table;width: 100%;padding: .5% 1%;margin-bottom: 1%;border-radius: 2px;-moz-border-radius: 2px;-webkit-border-radius: 2px;background: #0e1661 !important;}
    .pTopCell{display: table-cell;width: 50%;color: #fff;text-shadow: 0 1px 1px rgba(0, 0, 0, .75);font-size: 12px;font-family: Montserrat !important;}
    .pTopCell.Phone a{color: #fff;text-decoration: none;}
    .asItems{border: 0px;}
    .asItems{padding: 0;padding-top: 0px;width: 100%;padding-top: 5px;text-align: center;margin: 0 auto 10px;background: #fff;border: 1px solid #cecece;border-radius: 2px;-moz-border-radius: 2px;-webkit-border-radius: 2px;box-shadow: 0 0 3px rgba(0, 0, 0, .125);font-family: open sans, Arial, sans-serif;}
    .asItems{text-align: center;font-family: open sans, Arial, sans-serif;}
    .gridList{margin: 0 auto;padding: 0;width: auto;display: table;}
    .gridItem{display: inline-block;width: 210px;text-align: center;padding: 5px;}
    .homecelld b{color: #222 !important;font-size: 12px !important;font-family: Montserrat !important;}
    .hometabled{margin: 25px 0px !important;}
    .gridList.wheels.suggested .gridItem homeapge1{height: 180px;}
    .asItems{border: 0px;}
    .prod-headinghome h2{color: #0e1661 !important;text-align: center;font-family: Montserrat !important;font-size: 18px !important;font-weight: 700 !important;}
    .prod-heading p{color: rgb(18, 18, 20) !important;font-family: Montserrat !important;font-size: 12px !important;}
    .prod-heading-center{text-align: center;}
    .prod-headinghome h3{width: 100%;font-size: medium;font-family: open sans, Arial, sans-serif;color: #000 !important;font-weight: 600 !important;text-align: center;}
    .prod-heading-center p{color: #0e1661 !important;font-size: 15px;line-height: 30px !important;font-family: Montserrat !important;font-weight: 700 !important;}
    .prod-heading-bold{font-family: open sans,Arial,sans-serif;color: #121214;}
    b{font-weight: bold;}
    .h1-nl{font-size: 20px;}
    hr{border: 0.5px solid #ccc !important;}
    #produst,#special-product,footer,#bott,.container.brand-logo{display: none !important;}
    .container-fluid.home-page{padding: 0px 0px !important;background: #f1f1f1 !important;}
    .prod-heading-bold a{color: #337ab7 !important;}
    .prod-headinghome h1{font-family: Montserrat !important;font-size: 18px !important;font-weight: 700 !important;margin:20px 0px;}
    .prod-headinghome a{color: #0e1661;}
    .abt-img{text-align: center;}
    .abt-img .prod-heading-bold h1{font-family: Montserrat !important;font-size: 12px !important;font-weight: 700 !important;}
    .abt-img .prod-heading-bold h2{font-family: Montserrat !important;font-size: 12px !important;font-weight: 700 !important;}
    .prod-heading-bold{padding:94px 0px !important;}
    #about-us{padding: 20px 0px !important;}
</style>
<br>

<div class="banner-search">
    <div class="container">
        <div class="wheel-list ban-ser">
            <ul>
                <li><a href="">17 inch Specials</a></li>
                <li><a href="">18 inch Specials</a></li>
                <li><a href="">20 inch Specials</a></li>
                <li><a href="">22 inch Specials</a></li>
                <li><a href="">24 inch Specials</a></li>
                <li><a href="">26 inch Specials</a></li>
                <li><a href="">Black Wheels</a></li>
                <li><a href="">Tuner Wheels</a></li>
                <li><a href="">3-Piece Wheels</a></li>
                <li><a href="">Off Road Wheels</a></li>
                <li><a href="">8-Lug Wheels</a></li>
                <li><a href="">Dually Wheels</a></li>
                <li><a href="">Classic Wheels</a></li>
                <li><a href="">Vehicle Gallery</a></li>
                <li><a href="">Videos</a></li>
                <li><a href="">Reviews</a></li>
                <li><a href="">Bolt Patterns</a></li>
                <li><a href="">Canada Shipping</a></li>
                <li><a href="">Feedback</a></li>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Return Policy</a></li>
                <li><a href="">Shipping Info</a></li>
                <li><a href="">Order Status</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container" style="display:none;">
    <div align="center">
        <div class="h2-layout">
            <div id="h2-div1" class="h2-cell">
                <h1 class="h1-nl">
                    Discounted Wheel Warehouse, About Us, Customer Service
                </h1>
            </div>
        </div>
        <hr>
        <div class="prod-heading-bold">
            <p><img src="{{asset('image/About-Us.jpg')}}" alt="About Us Discounted Wheel Warehouse" style="max-width: 100%; height: auto;" width="421" height="270"></p>
            <p><b>Our hours are Mon-Fri 7:00AM - 6:00PM Pacific Standard Time</b></p>
            <p><b> Call Today - 1-800-901-6003</b></p>
            <p><b>About Discounted Wheel Warehouse, also see <a href="{{url('/contactus')}}" style="text-decoration: none;">Contact Us</a></b></p>
        </div>
        <div class="prod-headinghome" >
            <p>Discounted Wheel Warehouse is located in the greater Las Vegas area. Discounted Wheel Warehouse has 20 years of combined experience in the custom wheels industry.</p>
            <p>Discounted Wheel Warehouse leads the industry by offering the following commitments to our valued customers.</p>
            <p><b>Low Prices</b> - We have succeeded in bringing very low prices to our valued customers. Our prices are hundreds lower than MSRP. The savings get even better in the 22 inch and 24 inch categories. Visit our competitors for the same product we offer to verify that Discounted Wheel Warehouse truly has the lowest price.</p>
            <p><b>Fast Shipping</b> - Discounted Wheel Warehouse provides fast shipping on all Wheel and Tire Package orders in the continental United States.</p>
            <p><b>Warranty Services</b> - Our custom wheels typically carry a 2 year manufacturer warranty against defects. Our brand name tires carry a 30,000 mile warranty or better.</p>
            <p><b>Customer Service</b> - We strive to make your buying experience as painless and smooth as possible. We have one price, and that price is all you will pay for your wheel and tire package delivered to your door.</p>
            <p><b>Low Prices</b> - Did we say low prices already? Discounted Wheel Warehouse needs to make revenue; however, we also need to build a large client base that keeps growing. You, the satisfied customer, are our best marketing agent. By bringing you low prices and stellar customer service, we perpetuate our growth through customer referrals.</p>
        </div>
    </div>
</div>



<!-- About Section Start -->
<section id="about-us" class="about-page">
  <div class="container">
    <div class="about-page title-header">
      <div id="heading" class="title">
        <h1>Discounted Wheel Warehouse, About Us, Customer Service</h1>
      </div>
    </div>
    <div class="row main-about">
      <div class="col-sm-7 abt-cont">
        <div class="prod-headinghome">
            <h1>About Discounted Wheel Warehouse, also see <a href="{{url('/contactus')}}" style="text-decoration: none;"> Contact Us </a></h1>
            <p>Discounted Wheel Warehouse is located in the greater Las Vegas area. Discounted Wheel Warehouse has 20 years of combined experience in the custom wheels industry.</p>
            <p>Discounted Wheel Warehouse leads the industry by offering the following commitments to our valued customers.</p>
            <p><b>Low Prices</b> - We have succeeded in bringing very low prices to our valued customers. Our prices are hundreds lower than MSRP. The savings get even better in the 22 inch and 24 inch categories. Visit our competitors for the same product we offer to verify that Discounted Wheel Warehouse truly has the lowest price.</p>
            <p><b>Fast Shipping</b> - Discounted Wheel Warehouse provides fast shipping on all Wheel and Tire Package orders in the continental United States.</p>
            <p><b>Warranty Services</b> - Our custom wheels typically carry a 2 year manufacturer warranty against defects. Our brand name tires carry a 30,000 mile warranty or better.</p>
            <p><b>Customer Service</b> - We strive to make your buying experience as painless and smooth as possible. We have one price, and that price is all you will pay for your wheel and tire package delivered to your door.</p>
            <p><b>Low Prices</b> - Did we say low prices already? Discounted Wheel Warehouse needs to make revenue; however, we also need to build a large client base that keeps growing. You, the satisfied customer, are our best marketing agent. By bringing you low prices and stellar customer service, we perpetuate our growth through customer referrals.</p>
        </div>
      </div>
      <div class="col-sm-5 abt-img">
        <div class="prod-heading-bold">
            <img src="{{asset('image/About-Us.jpg')}}" alt="About Us Discounted Wheel Warehouse" style="max-width: 100%; height: auto;" width="421" height="270">
            <h1>Our hours are Mon-Fri 7:00AM - 6:00PM Pacific Standard Time</h1>
            <h2> Call Today - 1-800-901-6003</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- About Section End -->


@endsection
@section('custom_scripts')
<!--  -->
@endsection
