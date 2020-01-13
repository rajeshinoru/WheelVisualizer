<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard | Wheel Visualiser</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="/admin/css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="/admin/css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="/admin/css/owl.carousel.css">
    <link rel="stylesheet" href="/admin/css/owl.theme.css">
    <link rel="stylesheet" href="/admin/css/owl.transitions.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="/admin/css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="/admin/css/normalize.css">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="/admin/css/meanmenu.min.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="/admin/css/main.css">
    <!-- educate icon CSS
        ============================================ -->
    <link rel="stylesheet" href="/admin/css/educate-custon-icon.css">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="/admin/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="/admin/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="/admin/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="/admin/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="/admin/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="/admin/css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="/admin/css/style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="/admin/css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="/admin/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    @include('admin.include.sidebar')
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href=""><img class="main-logo" src="/admin/img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.include.header')

                @yield('content')

        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2020. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- jquery
        ============================================ -->
    <script src="/admin/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="/admin/js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="/admin/js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="/admin/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="/admin/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="/admin/js/owl.carousel.min.js"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="/admin/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="/admin/js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="/admin/js/counterup/jquery.counterup.min.js"></script>
    <script src="/admin/js/counterup/waypoints.min.js"></script>
    <script src="/admin/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="/admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/admin/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="/admin/js/metisMenu/metisMenu.min.js"></script>
    <script src="/admin/js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="/admin/js/morrisjs/raphael-min.js"></script>
    <script src="/admin/js/morrisjs/morris.js"></script>
    <script src="/admin/js/morrisjs/home3-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="/admin/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="/admin/js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="/admin/js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="/admin/js/calendar/moment.min.js"></script>
    <script src="/admin/js/calendar/fullcalendar.min.js"></script>
    <script src="/admin/js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="/admin/js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="/admin/js/main.js"></script>
    <!-- tawk chat JS
        ============================================ -->
    <!-- <script src="/admin/js/tawk-chat.js"></script> -->
</body>

</html>