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
    
    .col-sm-6.cont-img {
        padding: 50px !important;
        text-align: center;
    }


    .image{
        width: 200px;
        height: 200px;
    }

    .title-center{
        text-align: center;
    }
    .disclaimer p{

        text-align: justify;
    }

</style>

<br>

@include('include.sizelinks')

<!-- Contact Us Section Start -->
<section id="contact-us" class="contact-page">
    <div class="container">



        @if(Setting::get('returnpolicy') != "")
            <?=Setting::get('returnpolicy')?>
        @else


        <div class="about-page title-header">
            <div id="heading" class="title">
                <h1>Return Policy - Discounted Wheel Warehouse</h1>
            </div>
        </div>



    <div class="row main-about">
      <div class="col-sm-12 abt-cont">
        <div class="prod-headinghome">
           
            <h4>Return Policy - Discounted Wheel Warehouse ( 1-800-901-6003 )</h4>
            
            <p>The purchase price at time of sale is final.</p>

            <p>All cancellations prior to shipment are subject to a 20% (of total invoiced order) cancellation fee. We don't make money on restocking fees. Even with the fee we still have some loss on the overall order. The fee is simply to help us recover a portion of the expenses incurred for original packaging, as well as the inspection, repacking, and restocking the returned products to the manufacturer.</p>

            <p>It's the customers’ responsibility to report any damages/shortages within 5 days of receiving the product. No claims will be accepted after 48 hours.</p>

            <p>No returns will be accepted without authorization from Discounted Wheel Warehouse. Once authorization is approved, the customer will be issued a Return Merchandise Authorization number or RMA number. The Return Merchandise Authorization or RMA is valid for 30 days ONLY. After the 30 day time limit, the RMA becomes invalid.</p>

            <p>The customer is liable for all shipping costs when returning or exchanging an item to Discounted Wheel Warehouse unless the product has been damaged during shipping. This policy also applies to warranty returns.</p>

            <p>Any shipment received in conditions other than brand new will be charged 50% restocking fee of the total amount.</p>

            <p>There are absolutely NO returns (once a tire is mounted) for customers who solely purchase wheels.</p>

            <p>On Custom Fitted Wheels to your vehicle specifically there is a 50% restocking fee. We don't make money on restocking fees. Even with the fee we still have some loss on the overall order. The fee is simply to help us recover a portion of the expenses incurred for original packaging, as well as the inspection, due to the fact we cannot return to the manufacturer.</p>

            <p>On Refused Shipments Customer is responsible for shipping charges incurred to and from the customers delivery address, in addition a 20% restocking fee. We don't make money on restocking fees. Even with the fee we still have some loss on the overall order. The fee is simply to help us recover a portion of the expenses incurred for original packaging, as well as the inspection, repacking, and restocking the returned products to the manufacturer.</p>

            <p>Absolutely no refund or credit will be issued for defective or damaged merchandise until merchandise is returned and inspected to 1301 Burton Street, Fullerton, CA 92831. Customer is responsible for sending the merchandise back to the above address.</p>

            <p>Merchandise returned for refund will be charged a $60 handing fee and 20% restocking fee in addition all shipping charges incurred.</p>

            <p>We do not accept any new or used merchandise any later than 30 days after the Customer has received the merchandise.</p>

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

    <div class="row main-about">
      <div class="col-sm-12 abt-cont">
        <div class="prod-headinghome disclaimer title-center">
           
            <h4>Disclaimer</h4>
            
            <p>All Warranties on the products sold hereby are those made by the manufacturer. The seller (above named company) hereby expressly disclaims all warranties, either express or implied, including any implied warranty or merchantability or fitness for a purpose, and neither assumes nor authorizes any other person to assume for it any liability in connection with the sale of said products. Buyer shall not be entitled to recover from the seller any consequential damages for property , damage for loss of time, loss of profit or income, or any other incidental damages. Aftermarket Wheels being wider will transfer more Road vibration then OEM Wheels. Prior to sell of said merchandise the buyer has been forewarned and this is not a condition for return of merchandise.</p>

            <h4>If you have a return please EMAIL or CALL at 1-800-901-6003</h4>
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