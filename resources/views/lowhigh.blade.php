@extends('layouts.app')

@section('shop_by_vehicle_css')
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

        @if(Setting::get('lowhigh') != "")
            <?=Setting::get('lowhigh')?>
        @else

        <div class="about-page title-header">
            <div id="heading" class="title">
                <h1>FWD or RWD which do I have? - Discounted Wheel Warehouse</h1>
            </div>
        </div>
        <div class="row main-contact">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 cont-para">
                <div class="prod-headinghome">
                    <h4>High or Low? Which do I have?</h4>
                    <div class="contacttablecell"><img src="{{asset('/image/LowHighVehicles.jpg')}}" class="ri" style="width: 100% !important">
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
 
        <div class="row main-contact">
            <div class="col-sm-2"></div>
            <div class="col-sm-4 cont-img cont-details">
                <div class="prod-headinghome" style="text-align: left !important;">
                    <h4>High - Front Wheel Drive</h4>
                </div>
                <div class="contacttablecell">
                    <img src="{{asset('/image/FWD-Wheel.jpg')}}" class="ri">
                    <p>Examples of High Offset Wheels</p>
                </div>
            </div>
            <div class="col-sm-4 cont-img cont-details">
                <div class="prod-headinghome" style="text-align: left !important;">
                    <h4>Low - Rear Wheel Drive</h4>
                </div>
                <div class="contacttablecell">
                    <img src="{{asset('/image/RWD-Wheel.jpg')}}" class="ri">
                    <p>Examples of Low Offset Wheels</p>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="row main-contact">     
            <div class="col-sm-12">
                <h4>For Simplicity the Wheel Industry started High and Low</h4>
                <p>Now High and Low are one of the most confusing terms when buying a new set of Custom Wheels. All High(Front Wheel Drive) and Low(Rear Wheel Drive) is referring to is the OFFSET of the wheel. It does not matter which wheels propel the vehicle, or if the vehicle is Jet-Powered a vehicle still has an Offset, either High Offset or Low Offset. The reason they classified them as High or Low is because all Front Wheel Drive cars at the time had a +40 Offset, and the Low ones had the +0 to +20 Offsets. So it was very easy to say this is a Low or High Wheel. Today many cars have High Offsets yet are powered by the Rear Wheels, so that is where the confusion lies.</p>
            </div>
        </div>
        <div class="row main-contact">
            <div class="col-sm-6 cont-para" style="text-align: justify;">
                <h4>Why are you showing me High Wheels? My Car/Truck is Low!</h4>
                <p>As stated above High and Low are terms used for the OFFSET of the a wheel, it has nothing to do with which wheels propel the vehicle. Many Low vehicles have High OFFSET Wheels, its becoming more and more popular with the Vehicle Manufacturers.</p>

                <p>We are showing you High Wheels because your Vehicle has a High OFFSET, it does not matter if the Rear Wheels are the ones that propel the vehicle, you have High OFFSET Wheels, that is why we are showing them in the search results for your vehicle.</p>

                <p>What is High and Low High is a High Positive Offset Wheel typically +35 to +45 Offset Low is a Negative or Zero Offset Wheel typically +0 to +20 Offset</p>

                <p>Offset is a measurement for where the mounting of the wheel will be in reference to the outer or inner edge of the wheel. As see bellow in the diagram a High wheel is mounted at the outside of the wheel(Flush), where as a Low wheel is mounted in the center or all the way in, thus making the wheels stick out a bit.</p>
            </div>
            <div class="col-sm-6 cont-para">
                <div class="prod-headinghome">
                    <h4>Over simplified - but too the basics!</h4>
                    <div class="contacttablecell"><img src="{{asset('/image/Wheel-Diagram.jpg')}}" class="ri" style="width: 100% !important">
                    </div>
                </div>
            </div>
        </div>
        <div class="row main-contact">
            <div class="col-sm-6 cont-para" style="text-align: justify;">
                <p>Bellow is a High OFFSET Wheel, it can go on a vehicle that is propelled by the Front or Rear Wheels, this all depends on the vehicle manufacturer specifications. Again it does not matter if your car is Low if your vehicle requires a High OFFSET Wheel then that is why we are showing you a High OFFSET Wheel.</p>
                <div class="prod-headinghome">
                    <div class="contacttablecell" style="text-align: center;" ><img src="{{asset('/image/FWD-Wheel-Big.jpg')}}" class="ri" >
                    </div>
                </div>
            </div> 
            <div class="col-sm-6 cont-para" style="text-align: justify;">
                <p>Bellow is an extreme example of a Low OFFSET Wheel. Its mounting position is very deep inside the Wheel this is a example of how a Low OFFSET Wheel looks.<br></p>
                <div class="prod-headinghome">
                    <div class="contacttablecell" style="text-align: center;" ><img src="{{asset('/image/RWD-Wheel-Big.jpg')}}" class="ri" >
                    </div>
                </div>
            </div> 
        </div>

        <div class="row main-contact">
            <div class="col-sm-12 cont-para" style="text-align: justify;">
                <p>We determine fitment for you, there is no need to try and figure everything out, its very easy. All you need to do is input your Vehicle into our Vehicle Search and select a Wheel and Tire Package. We determine everything long before we would even consider charging your credit card.</p>

                <p>We ship out hundreds of sets of wheels a month, our highly trained staff will make sure 100% that these Custom Wheels will fit your vehicle 100%. We Guarantee Fitment, we can not risk sending out wheels that do not fit, because of the high charges involved with shipping. We need to get it right the first time, and we do. So input your vehicle information bellow and choose a style that you like and don't worry!</p>
 
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