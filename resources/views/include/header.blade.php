
<style>
.row.new-nav {
    background:#000 !important;
}
.navbar-brand { position: relative; z-index: 2; }
.navbar{margin-bottom: 0px !important;}
.navbar-nav.navbar-right .btn { position: relative; z-index: 2; padding: 4px 20px; margin: 10px auto; }
.navbar .navbar-collapse { position: relative; }
.navbar .navbar-collapse .navbar-right > li:last-child { padding-left: 22px; }
.navbar-toggle .icon-bar
{
  background: #000 !important;
}
.navbar-toggle
{
  background-color: #fff !important;
  margin-right:25px !important;
}
.navbar-toggle
{
  border-radius:3px !important;
}
.btn.btn-inverse.btn-block.btn-lg
{
  padding:15px 15px !important;
}
.fa-shopping-cart::before
{
  font-size: 18px !important;
  padding-left: 10px !important;
}
.nav > li > a:focus, .nav > li > a:hover {
    text-decoration: none;
    background-color: #333 !important;
    color:#fff !important;
    transition: 1s all;
}
.navbar .nav-collapse { position: absolute; z-index: 1; top: 0; left: 0; right: 0; bottom: 0; margin: 0; padding-right: 120px; padding-left: 80px; width: 100%; }
.navbar.navbar-default .nav-collapse { background-color: #f8f8f8; }
.navbar.navbar-inverse .nav-collapse { background-color: #222; }
.navbar .nav-collapse .navbar-form { border-width: 0; box-shadow: none; }
.nav-collapse>li { float: right; }
.navbar-nav > li > a{color:#fff !important;}
.col-sm-8.nav-bar {
    padding: 0px 0px !important;
}
@media screen and (max-width: 767px) {
    .navbar .navbar-collapse .navbar-right > li:last-child { padding-left: 15px; padding-right: 15px; }

    .navbar .nav-collapse { margin: 7.5px auto; padding: 0; }
    .navbar .nav-collapse .navbar-form { margin: 0; }
    .nav-collapse>li { float: none; }
    .btn.btn-inverse.btn-block.btn-lg
    {
        display: none !important;
    }
}

</style>

<header>
    <nav id="top">
        <div class="container">
            <div class="header-top">
                <div class="header-left-cms">
                    <aside id="header-left">
                        <div class="html-content">
                            <div id="top-links" class="nav pull-left">
                                <ul class="list-inline">
                                    <li class="header-phone pull-left"><a href=""><i class="fa fa-phone"></i><span>123456789</span></a></li>
                                </ul>
                            </div>
                        </div>

                    </aside>

                </div>

            </div>

            <div class="header-tops">
                <div id="top-links" class="nav pull-right">
                    <ul class="list-inline">
                        <li class="header-phone pull-left">
                            <form action="{{ url('/logout') }}" method="POST">
                                {{csrf_field()}}
                                <button type="submit"><i class="fa fa-sign-out"></i> Sign out</button>
                            </form>
                        </li>
                        <li class="header-phone pull-left"><a href=""><i class="fa fa-heart"></i><span>Wishlist</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="full-header">
        <div class="container">

        <div class="col-sm-6 logo">
          <div class="header">
              <div id="logo">
                  <a href="{{url('/')}}"><img src="image/logo.png" title="Your Store" alt="Your Store" class="img-responsive" /></a>
              </div>
          </div>
        </div>

        <div class="col-sm-6 search-bar">
          <div class="search">
              <div id="header-search" class="input-group">
                  <input type="text" name="search" value="{{json_decode(base64_decode(@Request::get('search')))}}" id="header-search-input" placeholder="Search" class="form-control input-lg" />
                  <span class="input-group-btn"><button type="button" class="btn btn-default btn-lg header-search-btn"><i class="fa fa-search"></i>Search</button></span>
              </div>
<!--               <select class="form-control chosen-select Make" name="make">
                  <option disabled selected>Select Make</option>
              </select> -->
          </div>
        </div>
        </div>
    </div>



    <nav id="top" class="new-navbar">
        <div class="container">
          <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="row new-nav">
            <div class="col-sm-8 nav-bar">
              <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar">
                  <li class="dropdown-nav"><a title="WHEELS" href="{{route('forms')}}" class="dropdown-toggle" data-toggle="dropdown">WHEELS <span class="caret"></span></a>
                    <ul class="dropdown-menu nav-dropdown">
                      <li><a title="ALL" href="{{route('wheels')}}">ALL</a></li> 
                      @forelse(wheelbrands() as $brand)
                      <li><a title="{{$brand->brand}}" href="{{route('wheels')}}?brand={{base64_encode(json_encode(array($brand->brand)))}}">{{$brand->brand}}</a></li>
                      @empty 
                      @endforelse
                    </ul>
                  </li>
                  <li class=""><a href="">TIRES</a></li>
                  <li class=""><a href="">SUSPENSION</a></li>
                  <li class=""><a href="">ACCESSORIES</a></li>
                  <li class=""><a href="">PERFORMANCE</a></li>
                  <li class=""><a href="">SERVICES</a></li>
                  <li class=""><a href="">GALLERY</a></li>
                  <li class=""><a href="">BUILDERS</a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4">
                      <button type="button"  class="btn btn-inverse btn-block btn-lg"><i class="fa fa-shopping-cart"></i>
                          <span class="cart-heading">Cart</span>
                          <span id="cart-total">0</span>
                      </button></div>
          </div>
        </div>
        </div>
    </nav>

</header>

