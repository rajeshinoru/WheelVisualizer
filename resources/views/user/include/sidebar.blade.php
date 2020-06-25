    <!-- Start Left menu area -->
    
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="{{url('/')}}"><img class="main-logo" src="{{url(Setting::get('site_logo','/admin/img/logo/logo.png'))}}" alt="" /></a>
               </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li>
                            <a  href="{{url('/')}}" aria-expanded="false"><i class="fa fa-home "></i> Back To Home</a>
                        </li> 
                        @if(Auth::user())
                        <li>
                            <a  href="{{url('/dashboard')}}" aria-expanded="false"><i class="fa fa-user "></i> Dashboard  </a>
                        </li>
                        <li>
                            <a  href="{{url('/profile')}}" aria-expanded="false"><i class="fa fa-user "></i> My Profile  </a>
                        </li>
                        <li>
                            <a  href="{{url('/orders')}}" aria-expanded="false"><i class="fa fa-shopping-cart "></i> My Orders  </a>
                        </li>
                        @else
                        <li>
                            <a  href="{{url('/guest/orders')}}" aria-expanded="false"><i class="fa fa-shopping-cart "></i> Orders Status </a>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->