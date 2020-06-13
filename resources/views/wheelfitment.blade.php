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

    .col-sm-4.cont-img {
        padding: 50px 0px !important;
        text-align: center;
    }
</style>

<br>

@include('include.sizelinks')

<!-- Contact Us Section Start -->
<section id="contact-us" class="contact-page row">
    <div class="container">

        @if(Setting::get('lipsizes') != "")
            <?=Setting::get('lipsizes')?>
        @else

        <div class="about-page title-header">
            <div id="heading" class="title">
                <h1>Wheel Fitment Guide - Discounted Wheel Warehouse</h1>
            </div>
        </div>
        <div class="row main-contact">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 cont-para">
                <div class="prod-headinghome"> 
                    <div class="contacttablecell"><img src="{{asset('/image/LowHighVehicles.jpg')}}" class="ri" style="width: 100% !important">
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
 
        <div class="row main-contact"> 
            <div class="col-sm-12 cont-img cont-details">
                <div class="prod-headinghome" style="text-align: left !important;"> 
                    <p>Correct fitment of your new Wheel and Tire Package is the highest priority at Discounted Wheel Warehouse. Our highly trained staff has over 20 years of combined experience in making sure your Wheel and Tire package meets the requirements of your vehicle. We take every measure and precaution in choosing the right application to meet your vehicle's specifications.</p>

                    <p>When you submit your order, we will call you if additional information is required. We will provide an exact fit for your vehicle, just one of the ways in which we thank you for choosing Discounted Wheel Warehouse. If you have any questions, please feel free to contact our staff at: 1-800-901-6003</p>

                    <p>Wheel Fitment Guide, Wheel Fitment Page, Discounted Wheel Warehouse, Custom Wheels, Wheels, Rims, Truck Wheels, Car Rims, Car Wheels, Spinning Rim... the list goes on!</p>
                </div>
            </div>
        </div>
        <div class="row main-contact">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 cont-para">
                <div class="prod-headinghome"> 
                    <div class="contacttablecell" style="text-align: center"><img src="{{asset('/image/Plus-sizing.jpg')}}" class="ri">
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="row main-contact"> 
            <div class="col-sm-12 cont-img cont-details">
                <div class="prod-headinghome" style="text-align: left !important;"> 
                    <h4>Plus Sizing</h4>
                    <p>One of the easiest ways to improve the performance of your vehicle is with Plus Sizing wheels and tires. Plus Sizing refers to tires that are wider and have a shorter sidewall. The result is a larger contact patch and a sportier look.</p>
 
                </div>
            </div>
        </div>        
        <div class="row main-contact"> 
            <div class="col-sm-12 cont-img cont-details">
                <div class="prod-headinghome" style="text-align: left !important;"> 
                    <h4>What's "Inch Up"?</h4>
                    <p>"Inch Up" is the process of mounting a lower aspect ratio tire and larger diameter wheel on your car. This effect creates a larger contact patch and a shorter sidewall.</p>
 
                </div>
            </div>
        </div>

        <div class="row main-contact">      
            <div class="col-sm-3 prod-headinghome" style="text-align: left !important;">  
                <h4>Drivers choose Plus Sizing to improve:</h4>
                <div class="contacttablecell" style="margin-left: 30px;color:#121214 !important;">
                    <ul>
                        <li>Steering response</li>
                        <li>Handling</li>
                        <li>Cornering ability</li>
                        <li>The look of your vehicle</li>
                    </ul>
                </div>
            </div> 
            <div class="col-sm-3 prod-headinghome" style="text-align: left !important;">  
                <h4>Why "Inch Up"?</h4>
                <p>"Inch Up" to improve your vehicle's performance and appearance.</p>
                <div class="contacttablecell" style="margin-left: 30px;color:#121214 !important;">
                    <ul>
                        <li>Increased steering response</li>
                        <li>Improved dry handling</li>
                        <li>Enhanced cornering ability</li>
                        <li>Aggressive good looks</li>
                    </ul>
                </div>
            </div>             
            <div class="col-sm-3 prod-headinghome" style="text-align: left !important;">  
                <h4>How Can You "Inch Up"?</h4>
                <p>"Inch Up" with the experts in plus sizing.</p>
                <div class="contacttablecell" style="margin-left: 30px;color:#121214 !important;">
                    <ul>
                        <li>Innovative technology</li>
                        <li>Precision fit</li>
                        <li>Wide size selection</li>
                        <li>Proven performance</li>
                    </ul>
                </div>
            </div> 
            <div class="col-sm-3 cont-img "> 
                <div class="contacttablecell"><img src="{{asset('/image/Plus-sizing-2.jpg')}}" class="ri"  ></div>
            </div> 
        </div>

        <div class="row main-contact">      
            <div class="col-sm-4 cont-para ">
                <h4>1. Plus Zero</h4>
                <div class="prod-headinghome">
                     <p>This method utilizes the same wheel diameter as Original Equipment (OE) but incorporates a tire with a larger than OE section width and smaller than OE aspect ratio. For example, replacing an OE 175/70R14 tire (on a 5.5-inch wheel) with a 195/60R14 tire would be a proper Plus Zero fitment. Note that this practice may require a replacement wheel in order to maintain proper rim width for the new tire.</p>
                </div>
            </div> 
            <div class="col-sm-4 cont-para ">
                <h4>2. Plus One</h4> 
                <div class="prod-headinghome">
                     <p>This method utilizes a one-inch larger diameter wheel in conjunction with a tire of a one-step lower aspect ratio. An example of an appropriate Plus One fitment is to replace an OE 175/70R13 tire (23-inch overall diameter) with a 185/60R14 tire (22.9-inch overall diameter). Note that this method always requires a replacement wheel.</p>
                </div>
            </div>          
            <div class="col-sm-4 cont-para ">
                <h4>3. Plus Two</h4> 
                <div class="prod-headinghome">
                     <p>This method utilizes a two-inch larger diameter wheel in conjunction with a tire of a two-step lower aspect ratio. An example of an appropriate Plus Two fitment is to replace an OE 175/70R13 tire (23-inch overall diameter) with a 195/50R15 tire (22.8-inch overall diameter).</p>
                </div>
            </div> 
        </div>
        <div class="row main-contact"> 
            <div class="col-sm-12 cont-img" style="text-align: center;"> 
                <div class="contacttablecell"><img src="{{asset('/image/Wheel-Diagram.jpg')}}" class="ri"  ></div>
            </div> 
        </div>
        <div class="row main-contact"> 
            <div class="col-sm-12 cont-img cont-details">
                <div class="prod-headinghome" style="text-align: left !important;"> 
                    <h4>Offset</h4>
                    <p>The offset of a wheel is the distance from its hub mounting surface to the centerline of the wheel. The offset can be one of three types.</p>
                </div>
            </div>
        </div>
        <div class="row main-contact"> 
            <div class="col-sm-12 cont-img cont-details">
                <div class="prod-headinghome" style="text-align: left !important;"> 
                    <h4>Zero Offset</h4>
                    <p>The offset of a wheel is the distance from its hub mounting surface to the centerline of the wheel. The offset can be one of three types.</p>
                </div>
            </div>
        </div>
        <div class="row main-contact"> 
            <div class="col-sm-12 cont-img cont-details">
                <div class="prod-headinghome" style="text-align: left !important;"> 
                    <h4>Positive</h4>
                    <p>The hub mounting surface is toward the front--or, wheel side--of the wheel. Positive offset wheels are generally found on front wheel drive cars and newer rear drive cars.</p>
                </div>
            </div>
        </div>
        <div class="row main-contact"> 
            <div class="col-sm-12 cont-img cont-details">
                <div class="prod-headinghome" style="text-align: left !important;"> 
                    <h4>Negative</h4>
                    <p>The hub mounting surface is toward the back or brake side of the wheels' centerline. "Deep dish" wheels are typically a negative offset.</p>
                    <p>If the offset of the wheel is not correct for the car, the handling can be adversely affected. When the width of the wheel changes, the offset also changes numerically. If the offset were to stay the same while you added width, the additional width would be split evenly between the inside and outside. For most cars, this won't work correctly. We have test-fitted thousands of different vehicles for proper fitment. Our extensive database allows our sales staff to offer you the perfect fit for your vehicle.</p>
                </div>
            </div>
        </div>
    </div>
    @endif
    </div>
</section>
<!-- Contact Us Section End -->



@endsection
@section('custom_scripts')
@endsection