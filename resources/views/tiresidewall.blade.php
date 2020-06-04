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

        @if(Setting::get('tiresidewall') != "")
            <?=Setting::get('tiresidewall')?>
        @else

        <div class="about-page title-header">
            <div id="heading" class="title">
                <h1>Reading a Tire Sidewall Code</h1>
            </div>
        </div>
        <div class="row main-contact">


            <div class="col-sm-4 cont-details">
                <div class="prod-headinghome">
                    <p>Every tire is marked with an alphanumerical code on its sidewall that contains many of the tire's key characteristics. A tire sidewall code consists of two sections: the tire size, which includes the tire's dimensions and construction; and the service description, which includes the load index and speed rating. This page will explain how to read each part of a tire's sidewall code.</p>
                </div>
            </div>

            <div class="col-sm-8 cont-img">
                <div class="contacttablecell" style="text-align: center;"><img src="{{asset('/image/Tire_Sidewall_Code.png')}}" class="ri" width="580px" ></div>
            </div>
        </div> 
        <div class="row main-contact">

            <div class="col-sm-6 cont-img">
                <div class="contacttablecell" style="text-align: center;"><img src="{{asset('/image/Tire_Sidewall_Code-2.png')}}" class="ri"  ></div>
            </div>

            <div class="col-sm-6 cont-para">
                <div class="prod-headinghome">
                    <h4>Tire Type</h4>
                    <p>A tire size may start with a "P", "LT", "ST", or no letters at all. These letters refer to one of several tire categories, based on the tire's intended purpose and sidewall construction:</p>
                    <ul>
                        <li>A tire size starting with "P" is a P-metric tire designed for use on passenger cars. They have relatively flexible sidewalls, but lower load capacities than LT or ST tires.</li>
                        <li>A tire size starting with "LT" is a Light Truck tire designed for use on large pickups, vans, and SUVs. They are larger than P-metric tires, and have thicker sidewalls for higher load capacity.</li>
                        <li>A tire size starting with "ST" is a Special Trailer tire designed for use only on towed trailers. They are even larger than Light Truck tires, and have even thicker sidewalls for a very high load capacity, but should not be used on passenger cars or light trucks.</li>
                        <li>A tire size that does not start with any letters is a Euro-metric tire designed for passenger vehicles. They tend to fall in the same size range as P-metric tires, but often have higher load capacities than P-metric tires of the same size. Most tires today are P-metric or Euro-metric.</li>
                    </ul>

                </div>
            </div>

        </div> 
        <div class="row main-contact">

            <div class="col-sm-6 cont-para">
                <div class="prod-headinghome">
                    <h4>Section Width</h4>
                    <p>The first number in a tire size (before the slash) is the Section Width. This indicates the tire's cross-section width, measured as the distance from the widest point of the tire's outer sidewall to the widest point of its inner sidewall. A tire's section width is given in millimeters.</p>
                </div>
            </div>

            <div class="col-sm-6 cont-para">
                <div class="prod-headinghome">
                    <h4>Aspect Ratio</h4>
                    <p>The second number in a tire size (after the slash) is the Sidewall Aspect Ratio, also referred to as the tire's profile. This is the ratio between the tire's sidewall height and its section width. A higher aspect ratio indicates a higher sidewall, while a lower aspect ratio indicates a lower sidewall. A higher sidewall profiles tends to provide greater ride comfort, while a lower sidewall profile offers more responsive handling.</p>
                </div>
            </div>
        </div>
        <div class="row main-contact">
            <div class="col-sm-6 cont-para">
                <div class="prod-headinghome">
                    <h4>Internal Construction</h4>
                    <p>The letter after the aspect ratio refers to the tire's internal construction. Passenger and light truck tires have an "R" to indicate radial ply construction, where the ply cords run up the sidewalls and directly across the tire from side to side, "radiating" from the tire's center. Very old tires may feature a "D" to indicate bias ply or diagonal construction, where the ply cords crisscross diagonally across the tire. Even older tires may have a "B" to indicate bias-belted construction, where the ply cords run diagonally over the tire and are reinforced with steel belts. The vast majority of tires today use radial ply construction.</p>

                    <p>Some high-performance tires may include a "Z" before the "R" to indicate that the tire is rated for sustaining speeds greater than 149 mph. This dates back to older tire standards that placed the speed rating symbol next to the construction symbol. Aside from the Z speed rating, today's tires indicate the speed rating in their service description instead.

                    </p>
                </div>
            </div>

            <div class="col-sm-6 cont-para">
                <div class="prod-headinghome">
                    <h4>Rim Diameter</h4>
                    <p>The third number in a tire size (after the construction symbol) refers to the inside diameter of the tire for the purpose of wheel fitment. This number indicates which size of wheel the tire is compatible with, based on the wheel's diameter from bead seat to bead seat, measured in inches. A tire is designed solely to fit on a wheel that has a matching rim diameter, so a 16-inch tire may only be safely mounted on a 16-inch wheel.</p>
                </div>
            </div>
        </div>
        <div class="row main-contact">

            <div class="col-sm-6 cont-para">
                <div class="prod-headinghome">
                    <h4>Section Width</h4>
                    <p>The first number in a tire size (before the slash) is the Section Width. This indicates the tire's cross-section width, measured as the distance from the widest point of the tire's outer sidewall to the widest point of its inner sidewall. A tire's section width is given in millimeters.</p>
                </div>
            </div>

            <div class="col-sm-6 cont-para">
                <div class="prod-headinghome">
                    <h4>Aspect Ratio</h4>
                    <p>The second number in a tire size (after the slash) is the Sidewall Aspect Ratio, also referred to as the tire's profile. This is the ratio between the tire's sidewall height and its section width. A higher aspect ratio indicates a higher sidewall, while a lower aspect ratio indicates a lower sidewall. A higher sidewall profiles tends to provide greater ride comfort, while a lower sidewall profile offers more responsive handling.</p>
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