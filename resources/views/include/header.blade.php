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
                    <div class="col-sm-8 nav-bar">
                        <div class="collapse navbar-collapse" id="navbar-collapse-1">
                            <ul class="nav navbar-nav navbar">
                                <li class="dropdown-nav"><a title="WHEELS" href="{{route('forms')}}" class="dropdown-toggle" data-toggle="dropdown">WHEELS <span class="caret"></span></a>
                                    <ul class="dropdown-menu nav-dropdown">
                                        <li><a title="ALL" href="{{route('wheels')}}">ALL</a></li>
                                        @forelse(wheelbrands() as $brand)
                                        <li><a title="{{$brand->brand}}" href="{{route('wheels')}}?brand={{base64_encode(json_encode(array($brand->brand)))}}">{{$brand->brand}}</a></li>
                                        @empty @endforelse
                                    </ul>
                                </li>
                                <li class=""><a href="">TIRES</a></li>
                                <li class=""><a href="">SUSPENSION</a></li>
                                <li class=""><a href="">ACCESSORIES</a></li>
                                <li class=""><a href="">PERFORMANCE</a></li>
                                <li class=""><a href="">SERVICES</a></li>
                                <li class=""><a href="">GALLERY</a></li>
                                <li class=""><a href="">BUILDERS</a></li>
                                <li class=""><a href="">ENQUIRY</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
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