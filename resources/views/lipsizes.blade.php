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

        <div class="about-page title-header">
            <div id="heading" class="title">
                <h1>Custom Wheel Lip Sizes and differences</h1>
            </div>
        </div>
        <div class="row main-contact">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 cont-para">
                <div class="prod-headinghome">
                    <h4>Lip Size for wheels and how they look and the difference</h4>
                    <p>Pictures from manufacturers are "Stock Photos" and often reflect the best looking aspect of a wheel design. If a wheel comes in 24x10 inch all the way to a 17x7 inch the Stock Photo will be of the best "look" of the wheel which is naturally the 24x10 inch wheel with the 3.5 inch lip. This page explains how a smaller wheel will look of the pictured wheel on the website.</p>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>

        <div class="row main-contact">

            <div class="col-sm-4"></div>
            <div class="col-sm-4 ">
                <div class="prod-headinghome">
                    <h4>Average Lip Sizes for Wheels</h4>
                    <table class="table table-striped table-xs cont-form" style="width: 50%;text-align: center;">
                        <tr>
                            <th style="text-align: center;">SIZES</th>
                            <th style="text-align: center;">LIP DEPTH</th>
                        </tr>
                        <tr>
                            <td>17x8.0</td>
                            <td>1"</td>
                        </tr>
                        <tr>
                            <td>18x8.0</td>
                            <td>1"</td>
                        </tr>
                        <tr>
                            <td>18x9.5</td>
                            <td>2.75"</td>
                        </tr>
                        <tr>
                            <td>19x8.0</td>
                            <td>1"</td>
                        </tr>
                        <tr>
                            <td>19x9.5</td>
                            <td>2.75"</td>
                        </tr>
                        <tr>
                            <td>20x8.5</td>
                            <td>1.5"</td>
                        </tr>
                        <tr>
                            <td>20x10.0</td>
                            <td>3.5"</td>
                        </tr>
                        <tr>
                            <td>22x9.0</td>
                            <td>2"</td>
                        </tr>
                        <tr>
                            <td>22x10.5</td>
                            <td>3.75"</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row main-contact">
            <div class="col-sm-2"></div>
            <div class="col-sm-4 cont-img cont-details">
                <div class="prod-headinghome" style="text-align: left !important;">
                    <h4>Below is a Picture from Manufacturer of the best look, its a 24x10 wheel.</h4>
                    <p>The spokes are long the hub looks small and the lip is huge!</p>
                </div>
                <div class="contacttablecell"><img src="{{asset('/image/example-offset-4.jpg')}}" class="ri" width="367" height="229"></div>
            </div>
            <div class="col-sm-4 cont-img cont-details">
                <div class="prod-headinghome" style="text-align: left !important;">
                    <h4>Below is a 17x7 wheel.</h4>
                    <p>The spokes shrink and the hub looks bigger and the lip goes to 1 inch. This is typical of a high offset 17 inch wheel.</p>
                </div>
                <div class="contacttablecell"><img src="{{asset('/image/example-offset-3.jpg')}}" class="ri" width="367" height="229"></div>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="row main-contact">            
            <div class="col-sm-2"></div>
            <div class="col-sm-4 cont-img ">
            <h4>Other Example of Lip Size</h4>
                <div class="contacttablecell"><img src="{{asset('/image/example-offset-1.jpg')}}" class="ri" width="367" height="229"></div>
            </div>
            <div class="col-sm-4 cont-img">
            <h4>Other Example of Lip Size</h4>
                <div class="contacttablecell"><img src="{{asset('/image/example-offset-2.jpg')}}" class="ri" width="367" height="229"></div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>

    </div>
</section>
<!-- Contact Us Section End -->



@endsection
@section('custom_scripts')
@endsection