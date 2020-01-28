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
                        @if(@Auth::user()=='')
                        <li class="header-phone pull-left"><a href="{{url('/login')}}"><i class="fa fa-user-plus"></i><span>Sign Up</span></a></li>
                        <li class="header-phone pull-left"><a href="{{url('/login')}}"><i class="fa fa-sign-in"></i><span>Sign In</span></a></li>
                        @else
                        <li class="header-phone pull-left">
                            <form action="{{ url('/logout') }}" method="POST">
                                {{csrf_field()}}
                                <button type="submit"><i class="fa fa-sign-out"></i> Sign out</button>
                            </form>
                        </li>
                        @endif
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
                        <a href="{{url('/')}}"><img src="image/Logo/Logo-Demo-5.png" title="Your Store" alt="Your Store" class="img-responsive" /></a>
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



<style>
.dropdown-menu.multi-colum-nav {
    width: 1200px !important;
    background:#000 !important;
    border: none !important;
}
.row.tire-nav {
    padding: 0px 0px !important;
    margin: 0px 0px !important;
}
.dropdown-menu.multi-colum-nav li a {
    font-size: 12px !important;
}
.col-sm-3.one-nav ul {
    list-style-type: none !important;
}
.col-sm-3.one-nav ul li {
    padding: 5px 0px !important;
    border-bottom: 1px solid #ffffff24 !important;
}
.col-sm-3.one-nav h5 {
    color:#ccc !important;
    font-weight: 600;
    font-size: 15px !important;
    text-transform: uppercase;
}
.col-sm-3.see-more {
    text-align: center !important;
}
.more a {
    color: #fff !important;
    font-size: 12px !important;
}
.more
{
    padding:10px 0px !important;
}
.more:hover a {
    color: red !important;
}
.dropdown-menu li > a:hover, .dropdown-menu li > a:focus
{
    color: red !important;
}
.dropdown-tire:hover .dropdown-menu.multi-colum-nav {
    display: block !important;
}
</style>


    <nav id="myHeader" class="new-navbar">
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
                    <div class="col-sm-9 nav-bar">
                        <div class="collapse navbar-collapse" id="navbar-collapse-1">
                            <ul class="nav navbar-nav navbar">
                                <li class="dropdown-nav"><a title="WHEELS" href="{{route('forms')}}" class="dropdown-toggle" data-toggle="dropdown">DISCOUNT WHEELS <span class="caret"></span></a>
                                    <ul class="dropdown-menu nav-dropdown">
                                        <li><a title="ALL" href="{{route('wheels')}}">ALL</a></li>
                                        @forelse(wheelbrands() as $brand)
                                        <li><a title="{{$brand->brand}}" href="{{route('wheels')}}?brand={{base64_encode(json_encode(array($brand->brand)))}}">{{$brand->brand}}</a></li>
                                        @empty @endforelse
                                    </ul>
                                </li>

                                <!-- New Nav Start -->
                                <li class="dropdown-tire"><a class="dropdown-toggle" data-toggle="dropdown" href="#">DISCOUNT TIRES <span class="caret"></span></a>
                                    <ul class="dropdown-menu multi-colum-nav">
                                        <div class="row tire-nav">
                                            <div class="col-sm-3 one-nav">
                                                <ul class="item">
                                                    <li><h5>Shop</h5></li>
                                                    <li><a href="">By Vehicle</a></li>
                                                    <li><a href="">By Size</a></li>
                                                    <li><a href="">By Wheel Diameter</a></li>
                                                    <li><a href="">Tire & Wheel Packages</a></li>
                                                </ul>

                                                <ul class="item">
                                                <li><h5>Winter / Snow</h5></li>
                                                <li><a href="" target="_self">Winter / Snow Tire </a></li>
                                                <li><a href="" target="_self">Winter / Snow Tires </a></li>
                                                </ul>

                                            </div>
                                            <div class="col-sm-3 one-nav">
                                                <ul class="item">
                                                    <li><h5>Find</h5></li>
                                                    <li><a href="" target="_self">By Brand</a></li>
                                                    <li><a href="" target="_self">By Brand Winter / Snow</a></li>
                                                    <li><a href="" target="_self">By Tire Category</a></li>
                                                    <li><a href="" target="_self">Michelin Track Connect</a></li>
                                                </ul>

                                                <ul class="item">
                                                <li class="hideSubmenu">
                                                    <h5>Maintain</h5></li>
                                                    <li class="hideSubmenu"><a href="" target="_self">Tire Rack Garage App</a></li>
                                                    <li class="hideSubmenu"><a href="" target="_self">Tire &amp; Wheel Owner's Manual</a></li>
                                                </ul>

                                            </div>
                                            <div class="col-sm-3 one-nav">
                                                <ul class="item"><li>
                                                <h5>Learn</h5></li>
                                                    <li><a href="" target="_self">Test Results</a></li>
                                                    <li><a href="" target="_self">Tire Ratings Charts &amp; Reviews</a></li>
                                                    <li><a href="" target="_self">Tire Road Hazard Protection</a></li>
                                                    <li><a href="" target="_self">Tire Tech</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3 see-more">
                                                <img src="image/product.png">
                                                <p class="more"><a href="">See More >></a></p>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <!-- New Nav End -->

                                <li class=""><a href="">INFORMATION</a></li>
                                <li class=""><a href="">RIMS FINANCING</a></li>
                                <li class=""><a href="">WHEEL VISUALIZER</a></li>
                                <li class=""><a href="">ABOUT</a></li>
                                <li class=""><a href="">CONTACT</a></li>
                                <li class=""><a href="">ENQUIRY</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <button type="button" class="btn btn-inverse btn-block btn-lg"><i class="fa fa-shopping-cart"></i>
                            <span class="cart-heading">Cart</span>
                            <span id="cart-total">0</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

</header>

<!-- New Fixed Nav Start -->

<script>
    window.onscroll = function() {
        myFunction()
    };
    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>
<!-- New Fixed Nav End -->