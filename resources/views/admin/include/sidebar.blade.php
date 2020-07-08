    <!-- Start Left menu area -->
    
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="{{url('/admin/home')}}"><img class="main-logo" src="{{url(Setting::get('site_logo','/admin/img/logo/logo.png'))}}" alt="" /></a>
               </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
{{--                    <li class="">
                            <a class="has-arrow" href="{{url('/admin/home')}}">
                                   <span class="educate-icon educate-home icon-wrap"></span>
                                   <span class="mini-click-non">Home</span>
                                </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard" href="{{url('/admin/home')}}"><span class="mini-sub-pro">Dashboard</span></a></li>

                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Users</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="{{url('admin/user')}}"><span class="mini-sub-pro">All Users</span></a></li>
                                <!-- <li><a title="Add Professor" href="#"><span class="mini-sub-pro">Add User</span></a></li> -->
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><span class="educate-icon educate-star icon-wrap"></span> <span class="mini-click-non">Wheels</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Wheels List" href="{{url('admin/wheel')}}"><span class="mini-sub-pro">Wheels List</span></a></li> 
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><span class="educate-icon educate-menu icon-wrap"></span> <span class="mini-click-non">Cars</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Cars" href="{{url('admin/car')}}"><span class="mini-sub-pro">Cars List</span></a></li> 
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><span class="educate-icon educate-menu icon-wrap"></span> <span class="mini-click-non">Brands</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Cars" href="{{url('admin/brands')}}"><span class="mini-sub-pro">Brands List</span></a></li> 
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><span class="educate-icon educate-star icon-wrap"></span> <span class="mini-click-non">Wheel Product</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Wheel Product List" href="{{url('admin/wheelproduct')}}"><span class="mini-sub-pro">Wheel Product List</span></a></li> 
                            </ul>
                        </li>

                        <li>
                            <a title="Landing Page" href="{{url('admin/setting')}}" aria-expanded="false"><span class="educate-icon educate-settings icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Settings</span></a>
                        </li>
--}}

                        <li>
                            <a  href="{{url('admin/home')}}" aria-expanded="false"><i class="fa fa-home "></i> Home   </a>
                        </li>
                        <li>
                            <a  href="{{url('admin/user')}}" aria-expanded="false"><i class="fa fa-user "></i> Users  </a>
                        </li>

                        <li>
                            <a  href="{{url('admin/orders')}}" aria-expanded="false"><i class="fa fa-shopping-cart "></i> Orders  </a>
                        </li>

                        <li>
                            <a  href="{{url('admin/enquiry')}}" aria-expanded="false"><i class="fa fa-envelope "></i> Enquiries  </a>
                        </li>

                        <li>
                            <a  href="{{url('admin/feedback')}}" aria-expanded="false"><i class="fa fa-comments-o "></i> Feedbacks  </a>
                        </li>


                        <li>
                            <a  href="{{url('admin/post')}}" aria-expanded="false"><i class="fa fa-sticky-note-o"></i> Posts  </a>
                        </li>

                        <li>
                            <a  href="{{url('admin/car')}}" aria-expanded="false"><i class="fa fa-car "></i> Cars   </a>
                        </li>

                        <li>
                            <a  href="{{url('admin/wheel')}}" aria-expanded="false"><i class="fa fa-cogs "></i> Wheels  </a>
                        </li>
                        <li>
                            <a  href="{{url('admin/wheelproduct')}}" aria-expanded="false"><i class="fa fa-list "></i> Wheel Products  </a>
                        </li>



                        <li>
                            <a  href="{{url('admin/tire')}}" aria-expanded="false"><i class="fa fa-list "></i> Tires  </a>
                        </li>

                        <li>
                            <a  href="{{url('admin/brands')}}" aria-expanded="false"><i class="fa fa-list "></i> Tire Brands  </a>
                        </li>

                        <li>
                            <a  href="{{url('admin/vehicle')}}" aria-expanded="false"><i class="fa fa-list "></i> Vehicles  </a>
                        </li>

                        <li>
                            <a  href="{{url('admin/ticket')}}" aria-expanded="false"><i class="fa fa-list "></i> Tickets  </a>
                        </li>

                        <li>
                            <a  href="{{url('admin/review')}}" aria-expanded="false"><i class="fa fa-list "></i> Reviews / Ratings  </a>
                        </li>

                        <li>
                            <a  href="{{url('admin/metakeywords')}}" aria-expanded="false"><i class="fa fa-tag "></i>  Meta Keywords   </a>
                        </li> 
                        <li>
                            <a  href="{{url('admin/slider')}}" aria-expanded="false"><i class="fa fa-list "></i> Sliders  </a>
                        </li>
                        <li>
                            <a  href="{{url('admin/dropshipper')}}" aria-expanded="false"><i class="fa fa-list "></i> Dropshippers  </a>
                        </li>
<!--                         <li>
                            <a  href="{{url('admin/setting')}}" aria-expanded="false"><i class="fa fa-cog "></i> Settings  </a>
                        </li> -->
                        <li>
                            <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-file "></i> CMS Pages</a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Header Page" href="{{url('admin/cms/setting')}}"> <i class="fa fa-cog"></i>  Application Setting </a></li> 
                                <li><a title="Home Page" href="{{url('admin/cms/home')}}"> <i class="fa fa-home"></i>  Home Page Setting</a></li> 
                                <!-- <li><a title="Information Page" href="{{url('admin/cms/information')}}"> <i class="fa fa-info-circle" aria-hidden="true"></i>  Information Tab Setting</a></li>  -->
                                <li><a title="All Pages" href="{{url('admin/cmspage')}}"> <i class="fa fa-info-circle" aria-hidden="true"></i>  All Pages</a></li> 
                            </ul>
                        </li>




                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->