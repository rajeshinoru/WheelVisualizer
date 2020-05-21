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
    .hometabled{display: table;text-align: center; width: 100%;background: #fff;box-shadow: 0 2px 3px 0 rgba(180, 180, 180, .6) !important;border: 1px solid #d8d7d7;margin-bottom: 15px;padding: .5%;border-radius: 2px;-moz-border-radius: 2px;-webkit-border-radius: 2px;}
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
    .prod-heading-bold{font-family: open sans, Arial, sans-serif;color: #121214;}
    b{font-weight: bold;}
    .h1-nl{font-size: 20px;}
    hr{border: 0.5px solid #ccc !important;}
    #produst,#special-product,footer,#bott,.container.brand-logo{display: none !important;}
    .container-fluid.home-page{padding: 0px 0px !important;background: #f1f1f1 !important;}
    .prod-heading-bold a{color: #337ab7 !important;}
    #contact-form label{float: left;color: #121214;line-height: 30px !important;font-family: poppins !important;font-size: 12px !important;}
    #contact-form .form-control{border-radius: 2px;}
    #contact-us{padding: 20px 0px !important;}
    .contact-head h1{font-family: Montserrat !important;font-size: 18px !important;font-weight: 700 !important;margin: 20px 0px;}
    .contact-head h2{font-family: Montserrat !important;font-size: 15px !important;font-weight: 700 !important;margin: 20px 0px;color: #0e1661 !important;}
    .contact-head h3{font-family: Montserrat !important;font-size: 14px !important;font-weight: 700 !important;margin: 20px 0px;color: #0e1661 !important;}
    .contact-head h4{font-family: Montserrat !important;font-size: 15px !important;line-height:30px;font-weight: 700 !important;margin: 20px 0px;color: #0e1661 !important;}
    .contact-head p{color: #121214;line-height: 30px !important;font-family: poppins !important;font-size: 12px !important;margin: 0px !important;}
    .cont-details{text-align: center;}
    .main-contact-2{margin:50px 0px;}
    .btn.btn-success.checkout-btn.btn-send{background: #0e1661 !important;color: #fff !important;border: none !important;}
    .cont-form{border: 1px solid #ccc;box-shadow: 0 0 4px 0 rgba(0,0,0,0.2);border-radius: 5px;}
    .cont-form .form-group{margin-bottom: 0px !important;}
    .col-sm-4.cont-img{padding: 50px 0px !important;text-align: center;}
</style>

<br>

@include('include.sizelinks')

<!-- Contact Us Section Start -->
<section id="contact-us" class="contact-page">
  <div class="container">

    <div class="about-page title-header">
      <div id="heading" class="title">
        <h1>Discounted Wheel Warehouse Contact Us</h1>
      </div>
    </div>
    <div class="row main-contact">
      <div class="col-sm-4 cont-details">
        <div class="contact-head">
          <h1>Contact Details</h1>
          <h2>Discounted Wheel Warehouse</h2>
          <p><b>Address</b> : 4085 Spencer Street B34 Las Vegas, NV 89119</p>
          <p><b>Telephone</b> : +800-901-6003</p>
          <p>International Calls, Call : +714-868-0104</p>
          <p><b>FAX</b> : +714-778-9255</p>
        </div>
      </div>

      <div class="col-sm-4 cont-para">
        <div class="prod-headinghome" >
            <p>Please call us with any questions that you might have. Our highly trained staff at Discounted Wheel Warehouse will be glad to assist you in your purchase of a new set of wheels and tires. At Discounted Wheel Warehouse we understand that this is a large investment. We would like to make our customers' decision making process an easy one by assisting you with all your questions about size and correct fitment.</p>
            <p>Please feel free to email us or contact us by telephone at: 1-800-901-6003 . For all questions regarding sizing or pricing, please use the email addresses found bellow. Discounted Wheel Warehouse makes customer service our highest priority. Please give us a call, and our sales staff will be happy to assist you with your purchase of custom wheels and tires.</p>
        </div>
      </div>

      <div class="col-sm-4 cont-img">
          <div class="contacttablecell"><img src="{{asset('/image/Contact-2.jpg')}}" class="ri" width="367" height="229"></div>
      </div>

    </div>

    <div class="row main-contact-2">
      <div class="col-sm-4 cont-details">
          <div class="contact-head">
            <h1>Hours of Operation</h1>
            <h2>Discounted Wheel Warehouse Pacific Standard Time</h2>
            <p><b>Monday</b> : 8:00am to 5:00pm</p>
            <p><b>Tuesday</b> : 8:00am to 5:00pm</p>
            <p><b>Wednesday</b> : 8:00am to 5:00pm</p>
            <p><b>Thursday</b> : 8:00am to 5:00pm</p>
            <p><b>Friday</b> : 8:00am to 5:00pm</p>
            <p><b>Saturday</b> : 8:00am to 3:00pm</p>
            <h4>Our hours of operation have been changed temporarily, due to recent events</h4>
          </div>
      </div>

      <div class="col-sm-8 cont-form">
        <div id="heading" class="title">
          <h1>Contact Form</h1>
        </div>
        <form id="contact-form" action="{{url('/enquiry')}}" method="post">
            {{@csrf_field()}}
            <div class="messages"></div>
            <div class="controls col-md-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="form_name">E-Mail Request to *</label>
                            <select class="form-control " name="request_to" required="">
                                <option value="">Select one...</option>
                                @foreach(enquiries_list() as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="form_name">Name *</label>
                            <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your fullname *" required="required" data-error="Name is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="form_email">Email *</label>
                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="form_message">Message *</label>
                    <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
                <input type="submit" class="btn btn-success checkout-btn btn-send" value="Send message">
            </div>
        </form>
      </div>

    </div>

  </div>
</section>
<!-- Contact Us Section End -->



@endsection
@section('custom_scripts')
<script src="{{ asset('js/ajax/jquery.min.js') }}"></script>
<script src="{{ asset('js/contact-form-validator.js') }}"></script>
<script type="text/javascript">
    $(function() {

        // window.verifyRecaptchaCallback = function (response) {
        //     $('input[data-recaptcha]').val(response).trigger('change');
        // }

        // window.expiredRecaptchaCallback = function () {
        //     $('input[data-recaptcha]').val("").trigger('change');
        // }

        $('#contact-form').validator();

        // $('#contact-form').on('submit', function (e) {
        //     if (!e.isDefaultPrevented()) {
        //         var url = "https://www.htmlhints.com/recaptcha/contact";

        //         $.ajax({
        //             type: "POST",
        //             url: url,
        //             data: $(this).serialize(),
        //             success: function (data) {
        //                 var messageAlert = 'alert-' + data.type;
        //                 var messageText = data.message;

        //                 var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
        //                 if (messageAlert && messageText) {
        //                     $('#contact-form').find('.messages').html(alertBox);
        //                     $('#contact-form')[0].reset();
        //                     grecaptcha.reset();
        //                 }
        //             }
        //         });
        //         return false;
        //     }
        // })
    });
</script>
@endsection
