    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="{{url('/admin/home')}}"><img class="main-logo" src="/admin/img/logo/logo.png" alt="" /></a>
                <!-- <strong><a href="index.html"><img src="/admin/img/logo/logo.png" alt="" /></a></strong> -->
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="has-arrow" href="index.html">
                                   <span class="educate-icon educate-home icon-wrap"></span>
                                   <span class="mini-click-non">Home</span>
                                </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard" href=""><span class="mini-sub-pro">Dashboard</span></a></li>

                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Users</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="{{url('admin/user')}}"><span class="mini-sub-pro">All Users</span></a></li>
                                <li><a title="Add Professor" href="{{url('admin/home')}}"><span class="mini-sub-pro">Add User</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a title="Landing Page" href="{{url('admin/setting')}}" aria-expanded="false"><span class="educate-icon educate-settings icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Settings</span></a>
                        </li>

                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->