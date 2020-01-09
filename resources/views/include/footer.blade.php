<section id="bott">
    <div class="container">



<div class="row">
  <div class="col-sm-8">
    <div class="col-sm-4">
    <h1 class="text-right">Enquiry</h1>
    </div>
    <div class="col-sm-8">
      <div class="search footer-search">
          <div id="header-search" class="input-group">

            <form action="{{route('newsletter')}}" method="get">
              <input type="email" name="email" value="" placeholder="Enter email" class="form-control input-lg">
              <span class="input-group-btn"><button type="submit" class="btn btn-default btn-lg header-search-btn"><i class="fa fa-search"></i>Submit</button></span>
              </form>
          </div>
      </div>
    </div>

  </div>
  <div class="col-sm-4">
    <div class="header-top-right">
        <div class="follow-us">
            <h5>Follow us</h5>
            <ul class="list-unstyled">
                <li class="facebook">
                    <a target="_blank" class="_blank" href="#" title="Facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li class="twitter">
                    <a target="_blank" class="_blank" href="#" title="Twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li class="rss">
                    <a target="_blank" class="_blank" href="#" title="RSS">
                        <i class="fa fa-rss"></i>
                    </a>
                </li>
                <li class="google-plus">
                    <a target="_blank" class="_blank" href="#" rel="publisher" title="Google Plus">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </li>
                <li class="pinterest">
                    <a target="_blank" class="_blank" href="#" rel="publisher" title="pinterest">
                        <i aria-hidden="true" class="fa fa-pinterest-p"></i>
                    </a>
                </li>
                <li class="instagram">
                    <a target="_blank" class="_blank" href="#" rel="publisher" title="instagram">
                        <i aria-hidden="true" class="fa fa-instagram"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
  </div>
</div>



    </div>
</section>
<footer>
    <div class="footer-container">
        <div class="container">
            <div class="row">
                <div class="footer-column footer-left-cms col-sm-4">
                    <aside id="footer-left">
                        <div class="html-content">
                            <div class="box-content">
                                <div id="footer">
                                    <h3>Wheel</h3>
                                    <div class="footer">
                                        <div class="footer">
                                            <p class="footer-para">Claritas processus dynamicus sequitu consut, consut ryethm sirter smreted oeureots. Claritas processus dynamicus sequitu consut, consut ryethm sirter smreted oeureots.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </aside>

                </div>

                <div class="col-sm-4 footer-column footer-extras">
                    <h5>Wheels Brand</h5>
                    @foreach(wheelbrands($splitarray=5) as $brandnames)
                    <div class="col-sm-6">
                        <ul class="list-unstyled foot-left">
                            @foreach($brandnames as $name)
                            <li><a href="{{route('wheels')}}?brand={{base64_encode(json_encode(array($name['brand'])))}}">{{$name['style']}}</a></li> 
                            @endforeach
                        </ul>
                    </div>
                    @endforeach 

                </div>

                <div class="footer-column footer-right-cms col-sm-4">
                    <aside id="footer-right">
                        <div class="html-content">
                            <div class="box-content">
                                <div class="contact-us">
                                    <h5 class="">Contact Us</h5>
                                    <ul class="list-unstyled" style="display: block;">
                                        <li class="contact-detail">
                                            <div class="data address">
                                                <i class="fa fa-map-marker"></i>
                                                <div class="contact-address">No : 101, North Street,</div>
                                            </div>
                                        </li>
                                        <li class="contact-detail">
                                            <div class="data address">
                                                <i class="fa fa-map-marker"></i>
                                                <div class="contact-address">Demo Store, United States.</div>
                                            </div>
                                        </li>
                                        <li class="email">
                                            <div class="data email">
                                                <i class="fa fa-envelope"></i>
                                                <span class="email-address"><a href="">info@wheel.com</a></span>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="data contact">
                                                <i class="fa fa-phone"></i>
                                                <span class="phone"><a href="#">0123456789</a></span></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </aside>

                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-link col-sm-12 text-center">
                <p>© 2019 wheel. All Rights Reserved.</p>
            </div>

        </div>
    </div>
</footer>
