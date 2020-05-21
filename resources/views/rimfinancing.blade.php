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
        text-align: center;
        margin: 10px 0px;
        color: #121214;
        line-height: 30px;
        font-family: poppins !important;
        font-size: 12px !important;
    }

    .finance-detail p {
        text-align: justify;
        margin: 10px 0px;
        color: #121214;
        line-height: 30px;
        font-family: poppins !important;
        font-size: 12px !important;
    }

    p>a {
        color: blue;
    }

    p>a:hover {
        color: black;
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

    .col-sm-6.cont-img,.col-sm-4.cont-img ,.col-sm-12.cont-img {
        padding: 50px !important;
        text-align: center;
    }

    .deal-img {
        padding: 5px !important;
    }
    .list-payment{
        text-align: left!important;
    }
    .left-content{
        text-align: left !important;
    }
    .right-content{
        text-align: right !important;
        margin: 10px 0px;
        color: #121214;
        line-height: 30px;
        font-family: poppins !important;
        font-size: 12px !important;
    }

    hr{
        margin: 20px;
    }
</style>

<br>

@include('include.sizelinks')

<!-- Contact Us Section Start -->
<section id="contact-us" class="contact-page">
    <div class="container">

        <div class="about-page title-header">
            <div id="heading" class="title">
                <h1>Rims Financing - Wheel and Tire Financing</h1>
            </div>
        </div>
        <div class="row main-contact">
            <div class="col-sm-6 cont-img">

                    <div class="about-page title-header">
                        <div id="heading" class="title">
                            <h4>Finance your Wheels and Rims</h4>
                        </div>

                    </div>
                    <div class="finance-detail">
                        <p>Fast and Easy, Get Approved Right Away!</p>
                        <p>Use your line of Credit to Purchase your Wheel and Tire Package,
                            online or over the phone using your approval code.</p>
                        <p>Good Credit? Bad Credit? No Credit? Easy Financing!</p>

                        <p>Not available in WI, MN, VT, NJ, WY.</p>
                    </div>
            </div>
 
            <div class="col-sm-6 cont-img">
                    <div class="about-page title-header">
                        <div id="heading" class="title">
                            <h4>Financing Requirements</h4>
                        </div>

                    </div>
                    <div class="finance-detail">
                         <p>Minimum income of $1000 monthly. At least 180 days minimum with your current employer.</p>
                        <p>A checking account that has been open for no less than 90 days with no over drafts.</p>
                        <p>$50 application fee paid at time of purchase.</p>

                        <p><a href="{{asset('/pdf/FINANCE QUALIFICATIONS.pdf')}}" target="_blank">Click HERE for Financing FAQ's </a></p>
                    </div>
                
            </div> 

        </div>

<hr>


        <div class="row main-contact">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 cont-img">
                <div class="about-page title-header">
                    <div id="heading" class="title">
                        <h1>Low Easy Monthly Payments for Wheels and Rims</h1>
                    </div>
                </div>
                <div class="contacttablecell">
                    <a href="https://portal.acimacredit.com/customer/contract_applications/new?merchant_id=ADE80C" target="_blank">
                        <img src="{{asset('/image/Rims-Financing-Wheels.jpg')}}" class="deal-img">
                    </a>
                </div>
                <hr>
            </div>

            <div class="col-sm-3"></div>
        </div>

        <div class="row main-contact">

            <div class="col-sm-3"></div>
            <div class="col-sm-6 cont-img">
                <div class="about-page title-header">
                    <div id="heading" class="title">
                        <h4>Example Below</h4>
                    </div>
                </div>
                <div class="contacttablecell">
                    <img src="{{asset('/image/Finance-Approval-Thumb.jpg')}}" class="deal-img">
                </div> 
                <!-- <hr> -->
            </div>

            <div class="col-sm-3"></div>
<!-- 

            
            <div class="col-sm-12 cont-img ">
                <div class="about-page title-header">
                    <div id="heading" class="title">
                        <h4>Example Below</h4>
                    </div>
                </div>
                <div class="contacttablecell">
                    <img src="{{asset('/image/Finance-Approval-Thumb.jpg')}}" class="deal-img">
                </div> 
            </div> -->
        </div>



        <div class="row main-contact ">
            <div class="col-sm-4 cont-img "> 
                <div class="about-page title-header">
                    <div id="heading" class="title">
                        <h4>3 Payment Options</h4>
                    </div>
                </div>
                <div class="finance-detail list-payment ">
                    <ol>
                        <li><p>90 Day Payment Option</p></li>
                        <li><p>50-65% early buy out option of remaining lease after 90 days with minimum payment required.</p></li>
                        <li><p>Full term 12 months to pay</p></li>
                    </ol> 
                </div>
            </div>
            <div class="col-sm-4 cont-img cont-form">
                <div class="about-page title-header">
                    <div id="heading" class="title">
                        <h4>Get Approved Today and Buy Today!</h4>
                    </div>
                </div>

                <div class="finance-detail">
                    <p>Discounted Wheel Warehouse is proud to bring our customers Financing for their Wheels, Rims and Wheel and Tire Packages.</p>
                    <p>Fast and Easy Wheels Financing for our Valued Customers is a High Priority for Discounted Wheel Warehouse.</p>
                    <p>Fast Shipping, Rims Financing, Great Selection and Unbeatable Prices makes Discounted Wheel Warehouse your One Stop destination for Wheels and Tires.</p>
                    <p>Best of all we offer Easy Credit Wheels Financing. Finance your Wheels and Tires at low monthly payments. That's an excellent value for our valued customers to use with the purchase of a new Wheel and Tire Package.</p>
                </div>
            </div>
            <div class="col-sm-4 cont-img ">
                <div class="about-page title-header">
                    <div id="heading" class="title">
                        <h4>Bad Credit or No Credit?</h4>
                    </div>
                </div>

                <div class="finance-detail">
                    <p>Discounted Wheel Warehouse offers Fast Credit Opportunities for its valued customers. If you have Bad Credit or No Credit please use the following Credit Application to get Approved Fast with No Credit Check.</p>
                </div>
            </div>
        </div>

<!--         <div class="row main-contact ">
            <hr> 
            <div class="col-sm-3"></div>
            <div class="col-sm-6 cont-img cont-form">
                <div class="about-page title-header">
                    <div id="heading" class="title">
                        <h4>Get Approved Today and Buy Today!</h4>
                    </div>
                </div>

                <div class="finance-detail">
                    <p>Discounted Wheel Warehouse is proud to bring our customers Financing for their Wheels, Rims and Wheel and Tire Packages.</p>
                    <p>Fast and Easy Wheels Financing for our Valued Customers is a High Priority for Discounted Wheel Warehouse.</p>
                    <p>Fast Shipping, Rims Financing, Great Selection and Unbeatable Prices makes Discounted Wheel Warehouse your One Stop destination for Wheels and Tires.</p>
                    <p>Best of all we offer Easy Credit Wheels Financing. Finance your Wheels and Tires at low monthly payments. That's an excellent value for our valued customers to use with the purchase of a new Wheel and Tire Package.</p>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div> -->


    </div>
</section>
<!-- Contact Us Section End -->



@endsection
@section('custom_scripts')
@endsection