
<style>

</style>
<section id="footer-down">
    <div class="container-fluid">
        <div class="footerWrapper">
            <div class="BottomSliderHome" align="center">
                <a href=""><img src="{{url('image/foot-img.png')}}" class="lazy ri" alt="Wheel Visualizer" width="100%" height="auto"></a>
            </div>
        </div>
    </div>
</section>

<section id="footer">

    <div class="container">

    @if(Setting::get('footer_content'))
    <?=Setting::get('footer_content','')?>
    @else
        <div class="row social-nl">

          <div class="col-sm-12">
            <ul class="foot-icon">
              <li><img class="lazy" src="{{url('image/social-1.png')}}" style="display: inline;" width="125" height="auto"></li>
              <li><img class="lazy" src="{{url('image/social-2.png')}}" style="display: inline;" width="125" height="auto"></li>
              <li><img class="lazy" src="{{url('image/social-3.png')}}" style="display: inline;" width="125" height="auto"></li>
              <li><img class="lazy" src="{{url('image/social-4.png')}}" style="display: inline;" width="125" height="auto"></li>
              <li><img class="lazy" src="{{url('image/social-5.png')}}" style="display: inline;" width="125" height="auto"></li>
            </ul>
          </div>
        </div>

        <div class="container">
            <div align="center">
                <div class="footer-phone">Discounted Wheel Warehouse 1-800-901-6003</div>
                <div class="main">Contact Us <a href="">{{Setting::get('site_email','sales@discountedwheelwarehouse.com')}}</a></div>
            </div>
            <div class="footercustom-menu" align="center">
                <div class="zfooterMenu">
                    <ul>
                        <li><a href="{{url('/wheelproducts')}}">Custom Wheels</a></li>
                        <li><a href="{{url('/tirelist')}}">Discount Tires</a></li>
                        <li><a href="{{url('/informations')}}">Information Links</a></li>
                        <li><a href="{{url('/rimfinancing')}}">Rims Financing</a></li>
                        <li><a href="{{url('/contactus')}}">Contact Us</a></li>
                        <li><a href="{{url('/aboutus')}}">About Us</a></li>
                        <li><a href="{{url('/wheels')}}">Vehicle Search</a></li>
                        <li><a href="{{url('/')}}">Home</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-ratings" align="center">
                <h1><a href="">DiscountedWheelWarehouse.com has a ResellerRatings of 4.505/5 based on 8203 Reviews</a></h1>
            </div>
            <div class="copywright" align="center">copyright © 2020 Discounted Wheel Warehouse</div>
        </div>
    @endif
    </div>
</section>


<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>

@section('footer_scripts')
<script>
$(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

        // $('#back-to-top').tooltip('show');

});
</script>
@endsection

@section('custom_scripts')

@endsection
