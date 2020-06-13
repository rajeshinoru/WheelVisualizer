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
    <link rel="shortcut icon" type="image/x-icon" href="img/fav.png">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('/user/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
        ============================================ -->
    <!-- <link rel="stylesheet" href="{{ asset('/user/css/font-awesome.min.css') }}"> -->
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('/user/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/user/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('/user/css/owl.transitions.css') }}">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('/user/css/animate.css') }}">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('/user/css/normalize.css') }}">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('/user/css/meanmenu.min.css') }}">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('/user/css/main.css') }}">
    <!-- educate icon CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('/user/css/educate-custon-icon.css') }}">

    <!-- dropzone CSS
        ============================================ -->
    <!-- <link rel="stylesheet" href="{{ asset('/user/css/dropzone/dropzone.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('/user/css/custom-dropzone.css') }}"> -->
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('/user/css/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('/user/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('/user/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/user/css/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('/user/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/user/css/calendar/fullcalendar.print.min.css') }}">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('/user/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('/user/css/select2.min.css') }}">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('/user/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('/user/css/dropify.min.css') }}">

    <!-- summernote CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('/user/css/summernote/summernote.css') }}">

    <link rel="stylesheet" href="{{ asset('/js/font-awesome/css/font-awesome.min.css') }}">
    <!-- DataTable CSS -->


    <link rel="stylesheet" type="text/css" href="{{ asset('/user/DataTables/datatables.min.css') }}" />

    <style type="text/css">
        .select2-container .select2-selection--single {
            height: 34px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #ccc !important;
            border-radius: 0px !important;
        }

        .select2.select2-container.select2-container--default {
            margin: 10px 0px !important;
            width: 100% !important;
        }

        .select2-selection__arrow {
            display: none !important;
        }

        .select2-dropdown.select2-dropdown--below {
            margin: 0px 10px !important;
            width: 340px !important;
        }

        .panel-heading {
            background: #000;
            color: #fff !important;
            cursor: pointer;
            font: 500 14px/25px "Poppins", Helvetica, sans-serif;
            margin: 0;
            padding: 11px 15px;
            position: relative;
            text-transform: uppercase;
            text-align: left;
            border-radius: 0px;
        }

        .menu-category {
            background: #ccc !important;
        }

        .select2 {
            padding: 0px 10px !important;
        }

        @media (max-width: 767px) {
            .select2-dropdown.select2-dropdown--below {
                margin: 0px 10px !important;
                width: 480px !important;
            }
        }
    </style>

    <!-- modernizr JS
        ============================================ -->
    <script src="{{asset('/user/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    {{csrf_field()}}
    @include('user.include.sidebar')
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href=""><img class="main-logo" src="{{asset('/user/img/logo/logo.png')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>

        @include('user.include.header')
        @include('common.notify')

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
    <script src="{{asset('/user/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="{{asset('/user/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
        ============================================ -->
    <script src="{{asset('/user/js/wow.min.js')}}"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="{{asset('/user/js/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="{{asset('/user/js/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="{{asset('/user/js/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="{{asset('/user/js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="{{asset('/user/js/jquery.scrollUp.min.js')}}"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="{{asset('/user/js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('/user/js/counterup/waypoints.min.js')}}"></script>
    <script src="{{asset('/user/js/counterup/counterup-active.js')}}"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="{{asset('/user/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('/user/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="{{asset('/user/js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('/user/js/metisMenu/metisMenu-active.js')}}"></script>

    <!-- dropzone JS
        ============================================ -->
    <!-- <script src="{{asset('/user/js/dropzone/dropzone.js')}}"></script>  -->
    <!-- <script src="{{asset('/user/js/custom-dropzone.js')}}"></script>  -->

    <!-- morrisjs JS
        ============================================ -->
    <script src="{{asset('/user/js/morrisjs/raphael-min.js')}}"></script>
    <script src="{{asset('/user/js/morrisjs/morris.js')}}"></script>
    <script src="{{asset('/user/js/morrisjs/home3-active.js')}}"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="{{asset('/user/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('/user/js/sparkline/jquery.charts-sparkline.js')}}"></script>
    <script src="{{asset('/user/js/sparkline/sparkline-active.js')}}"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="{{asset('/user/js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('/user/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('/user/js/calendar/fullcalendar-active.js')}}"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="{{asset('/user/js/plugins.js')}}"></script>
    <!-- main JS
        ============================================ -->
    <script src="{{asset('/user/js/main.js')}}"></script>


    <script src="{{ asset('js/popImg.js') }}"></script>

    <!-- DataTable JS -->
    <script type="text/javascript" src="{{asset('/user/DataTables/datatables.min.js')}}"></script>
    <!-- summernote JS
        ============================================ -->
    <script src="{{ asset('/user/js/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('/user/js/summernote/summernote-active.js') }}"></script>
    <!-- tawk chat JS
        ============================================ -->
    <!-- <script src="{{asset('/user/js/tawk-chat.js">')}}</script> -->

    <script src="{{ asset('js/common_search.js') }}"></script>
    <script src="{{asset('/user/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/user/js/dropify.min.js')}}"></script>
    <script type="text/javascript">
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    </script>



    @yield('custom_scripts')

    <script type="text/javascript">
        $(document).ready(function() {

            $('.select2').select2();

            var table = $('table').DataTable({
                dom: 't' // This shows just the table
            });

            $('#data-table-search').on('keyup change', function() {
                table.search($('#data-table-search').val()).draw();
            });


            /** add active class and stay opened when selected */
            var url = window.location;
            // for sidebar menu entirely but not cover treeview
            var list = $('.metismenu li a').filter(function() {
                 return this.href == url;
            }).parents().closest('.metismenu li');
            $(list).find('a').click();
            $(list).addClass('active');
        });




        $('.logout-btn').click(function(){  
            $('#userLogout').submit();
        });
    </script>
</body>

</html>