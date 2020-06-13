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

        @if(Setting::get('tiremounting') != "")
            <?=Setting::get('tiremounting')?>
        @else

        <div class="about-page title-header">
            <div id="heading" class="title">
                <h1>Tire Mounting and Balancing</h1>
            </div>
        </div>
        <div class="row main-contact">

            <div class="col-sm-6 cont-img">
                <div class="contacttablecell"><img src="{{asset('/image/Mounting_and_Balancing.png')}}" class="ri"  ></div>
            </div>

            <div class="col-sm-6 cont-para">
                <div class="prod-headinghome">
                    <p>When a shop installs tires or wheels on your car, the installer technician takes certain precautions to make sure that that your tires are mounted and balanced safely. Mounting refers to the act of fitting a tire onto a wheel, while balancing refers to the equal distribution of the tire and wheel's rotational mass.</p>

                    <p>A tire is correctly mounted and balanced when the tire is seated securely on a same-sized rim to form an airtight seal, such the wheel and tire assembly's mass is evenly distributed around the axis of rotation—in other words, the car axle.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="row main-contact">

            <div class="col-sm-6 cont-para">
                <div class="prod-headinghome">
                    <h4>How Tires are Mounted and Balanced</h4>
                    <p>A professional installer uses specialized equipment to mount and balance your tires. A tire changer machine clamps a rim in place and rotates it while a technician pries an old tire off or guides a new tire onto the barrel. The tire changer also lightly inflates the tire in order to seat the tire beads securely on the bead seats, bringing them flush with the rim flanges to form an airtight seal.</p>

                    <p>During installation, the technician first lubricates the tire beads and the rim bead seats to help slide the tire over the rim's edge. The technician should also clean the machine's clamps and the rim barrel before mounting to prevent excess lubricant, dirt, moisture, or grime from getting trapped in the tire cavity or the wheel's center bore. When inflating the tire to seat the tire beads, the technician should avoid inflating the tire to a pressure greater than 40 psi. Once mounted, the tire can be inflated to its recommended air pressure.</p>
                </div>
            </div>

            <div class="col-sm-6 cont-img">
                <div class="contacttablecell"><img src="{{asset('/image/Mounting_and_Balancing-2.png')}}" class="ri"  ></div>
            </div>

        </div>
        <div class="row main-contact">

            <div class="col-sm-6 cont-img">
                <div class="contacttablecell"><img src="{{asset('/image/Mounting_and_Balancing-3.png')}}" class="ri"  ></div>
            </div>
            <div class="col-sm-6 cont-para">
                <div class="prod-headinghome"> 
                    <p>After a tire is mounted and inflated, the technician mounts the wheel-and-tire assembly on a tire balancer. This machine spins the wheel and tire at high speeds to test for weight imbalances in the tire or wheel. Once the machine locates the tire's heavy spot, the technician attaches weights to the opposite side of the wheel to compensate for the difference in weight, balancing the wheel and tire.</p>

                    <p>Some tire balance machines, called Road Force balancers, also press a roller against the tire as it spins to simulate the road's pressure on the tire during driving. This allows a Road Force balancer to locate places where the tire or wheel is not perfectly round. Once the machine locates high and low spots, the technican matches the tire's high spot to the wheel's low spot. This often allows the tire to be balanced using less weight than with a typical tire balancer.</p>
                </div>
            </div>
        </div>
        <div class="row main-contact">
            <div class="col-sm-12 cont-para">
                <div class="prod-headinghome" > 
                    <h4 class="center">Dangers of Improper Mounting and Balancing</h4>
                    <p>If not balanced, a tire can have a severe impact on ride quality and treadlife. When one part of a tire weighs more than another, the imbalanced weight may interfere with the tire's rolling motion during driving. The tire's heavy spot can create vibrations throughout the vehicle, typically starting at speeds of 40-45 mph and gradually intensifying with increasing speeds. This shaking can put excessive stress on the tires, wheel bearings, shocks, and suspensions, wearing out the treads faster and increasing the risk of sidewall bubbling, tearing, or blowouts. Conversely, tire balancing helps to minimize steering wheel shaking and extend the life of your tires.</p>

                    <p>A tire may become imbalanced if it was mounted improperly. If the tire beads are not seated securely on the bead seats, the tire may slip and rotate during driving, shifting the point of imbalance away from the correction weight and unbalancing the tire. If a technician applied too much lubricant when mounting the tire, inflated the tire with insufficient pressure, or did not adequately clean any leftover lubricant off the rim before mounting, moisture may get trapped in the tire cavity and cause the tire beads to slip. Tire slippage may also result from hard braking or accelerating on recently mounted tires, before the lubricant has enough time to dry.</p>

                    <p>Improper mounting can be especially dangerous if excessive pressure is put on the tire during mounting. A tire may burst if it is inflated beyond the recommended air pressure, potentially causing injury or death. If a tire is mounted onto a wheel of the wrong size, the tire may require too much pressure to seat the tire beads, causing the tire bead to explode lethally. The larger, heavier wheel also exerts more pressure on the tire beads than the tire was designed to handle, causing the tire to rapidly wear out and eventually fail. A tire should only be mounted on a wheel of the same rim size, and inflated to the appropriate air pressure level.</p>

                    <p>Proper tire mounting and balancing is crucial to driving safely and keeping your tires in good condition. A correctly mounted and balanced tire rides more smoothly, lasts longer, and is far less susceptible to accidents caused by tire failure. Here at Discounted Wheel Warehouse, our technicians are well-trained in safe tire mounting and balancing procedures. All wheel and tire packages come already mounted and balanced, shipped right to your door.</p>
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