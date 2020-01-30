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
            background: #000 !important;
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
            color: #ccc !important;
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

        .more {
            padding: 10px 0px !important;
        }

        .more:hover a {
            color: red !important;
        }

        .dropdown-menu li>a:hover,
        .dropdown-menu li>a:focus {
            color: red !important;
        }

        .dropdown-tire:hover .dropdown-menu.multi-colum-nav {
            display: block !important;
        }
    </style>

    <style>
        .car-truck-head {
            margin: 15px 0px !important;
            font-size: 12px !important;
            color: #fff !important;
        }

        .col-sm-2.shop-vehicle-head h1 {
            font-size: 12px !important;
            color: #fff !important;
            margin: 11px 0px !important;
        }

        .vehicle-list {
            margin: 0px 0px !important;
        }

        .btn.vehicle {
            background: #fff !important;
            border-radius: 5px !important;
            color: #222 !important;
            font-size: 12px !important;
        }

        .btn.vehicle-go {
            background: #ccc !important;
            border-radius: 5px !important;
            color: #000 !important;
            font-size: 12px !important;
            padding: 5px 20px !important;
            height: 26px !important;
        }

        .col-sm-2.tire-menu ul {
            list-style-type: none !important;
        }

        .col-sm-2.tire-menu ul li {
            color: #fff !important;
            font-size: 12px !important;
            padding: 5px 0px !important;
            border-bottom: 1px solid #ffffff24 !important;
        }

        .col-sm-2.tire-menu li a:hover {
            color: red !important;
        }

        .car-truck-head i {
            font-size: 25px !important;
            padding: 0px 5px !important;
        }

        .dropdown-menu.multi-colum-nav {
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .btn.vehicle {
            padding: 7px 30px !important;
        }


        .col-sm-12.tire-menu-list {
            margin-bottom: 20px !important;
        }

        @media (max-width: 767px) {
            .car-truck-head {
                line-height: 30px !important;
            }

            .btn.vehicle {
                margin: 5px 0px !important;
                font-size: 10px !important;
            }
        }
    </style>




    <style>
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
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
                                        <!-- New Menu Today Start-->
                                        <div class="row tire-nav">
                                            <div class="col-sm-12">
                                                <h1 class="car-truck-head">Shop by Passenger car and Light Truck <i class="fa fa-car" aria-hidden="true"></i> <i class="fa fa-truck" aria-hidden="true"></i></h1>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-2 shop-vehicle-head">
                                                    <h1>Shop By Vehicle</h1>
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="vehicle-list">
                                                        <div class="dropdown">
                                                            <select class="browser-default custom-select  NavMake " name="make">
                                                                <option value ="">Select Make</option> 
                                                                @foreach(getMakeList() as $key => $make)
                                                                <option value="{{$make->make}}">{{$make->make}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="dropdown">
                                                            <select class="browser-default custom-select  NavYear ">
                                                                <option selected>YEAR</option>
                                                                @for($yr =date('Y');$yr>=1990;$yr-- )
                                                                <option value="{{$yr}}">{{$yr}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>


                                                        <div class="dropdown">
                                                            <select class="browser-default custom-select NavModel ">
                                                                <option selected>MODEL</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </div>

                                                        <div class="dropdown">
                                                            <select class="browser-default custom-select NavDriveBody ">
                                                                <option selected>TRIM</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </div>

                                                        <div class="dropdown">
                                                            <select class="browser-default custom-select">
                                                                <option selected>ZIP</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </div>


                                                        <button type="button" class="btn vehicle-go"><a href="{{url('/tires')}}">GO</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-2 shop-vehicle-head">
                                                    <h1>Shop By Vehicle Size</h1>
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="vehicle-list">

                                                        <div class="dropdown">
                                                            <select class="browser-default custom-select">
                                                                <option selected>220</option>
                                                                <option value="1">225</option>
                                                                <option value="2">100</option>
                                                                <option value="3">90</option>
                                                            </select>
                                                        </div>

                                                        <div class="dropdown">
                                                            <select class="browser-default custom-select">
                                                                <option selected>220</option>
                                                                <option value="1">225</option>
                                                                <option value="2">100</option>
                                                                <option value="3">90</option>
                                                            </select>
                                                        </div>

                                                        <div class="dropdown">
                                                            <select class="browser-default custom-select">
                                                                <option selected>220</option>
                                                                <option value="1">225</option>
                                                                <option value="2">100</option>
                                                                <option value="3">90</option>
                                                            </select>
                                                        </div>

                                                        <button type="button" class="btn vehicle-go"><a href="{{url('/tires')}}">GO</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-12 tire-menu-list">
                                                <div class="col-sm-2 shop-vehicle-head">
                                                    <h1>Shop By Brand</h1>
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="vehicle-list">
                                                        <div class="row">
                                                            <div class="col-sm-2 tire-menu">
                                                                <ul>
                                                                    @foreach(getTyreCategoryList() as $key => $tyre)
                                                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$tyre->category5}}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- New Menu Today End -->

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