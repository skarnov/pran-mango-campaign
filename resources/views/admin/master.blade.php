<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{$title}}</title>
        <!-- Bootstrap -->
        <link href="{{ URL('/assets/private/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ URL::to('/assets/private/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{ URL::to('/assets/private/nprogress/nprogress.css') }}" rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link href="{{ URL::to('/assets/private/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
        <link href="{{ URL::to('/assets/private/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="{{ URL::to('/assets/private/build/css/custom.css') }}" rel="stylesheet">   
        <style>
            /* Contents */
            /* 001. File Upload */
            .file {
                visibility: hidden;
                position: absolute;
            }
            /*End of File Upload*/
        </style>
    </head>

    <body class="nav-md">
        <script>
            var jQ = new Array();
        </script>
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="{{ URL::to('/admin') }}" class="site_title"><i class="fa fa-play"></i> <span>{{$config->app_name}}</span></a>
                        </div>
                        <div class="clearfix"></div>
                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="{{ URL::to('/') }}/assets/private/images/img.jpg" alt="{{$config->app_name}}" class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2>{{ Auth::user()->name }}</h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->
                        <br />
                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <ul class="nav side-menu">
                                    <li><a href="{{ URL::to('/admin') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                                    <li><a id="contents"><i class="fa fa-edit"></i> Contents <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li id="pages"><a href="{{ URL::to('/content') }}">Pages</a></li>
                                            <!--
                                            <li id="sliders"><a href="{{ URL::to('/content/manage_sliders') }}">Sliders</a></li>
                                            <li id="offers"><a href="{{ URL::to('/content/manage_offers') }}">Offers</a></li>-->
                                            <li id="images"><a href="{{ URL::to('/content/manage_image_galleries') }}">Image Galleries</a></li>
<!--                                            <li id="videos"><a href="{{ URL::to('/content/manage_video_galleries') }}">Video Galleries</a></li>-->
                                        </ul>
                                    </li>
                                    <!--  
                                    <li>
                                                                            <a id="stocks"><i class="fa fa-desktop"></i> Stocks <span class="fa fa-chevron-down"></span></a>
                                                                            <ul class="nav child_menu">
                                                                                <li id="products"><a href="{{ URL::to('/inventory/manage_products') }}">Products</a></li>
                                                                                <li id="categories"><a href="{{ URL::to('/inventory/manage_categories') }}">Categories</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li><a id="stores" href="{{ URL::to('/admin/manage_stores') }}"><i class="fa fa-table"></i> Stores</a></li>-->
                                    <li><a id="problems" href="{{ URL::to('/content/manage_problems') }}"><i class="fa fa-anchor"></i> Problems</a></li>
                                    <li><a id="users" href="{{ URL::to('/admin/manage_users') }}"><i class="fa fa-smile-o"></i> Users</a></li>
                                    <li><a id="volunteers" href="{{ URL::to('/admin/manage_volunteers') }}"><i class="fa fa-table"></i> Volunteers</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /sidebar menu -->
                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a href="{{ URL::to('/') }}" data-toggle="tooltip" target="_blank" data-placement="top" title="Website">
                                <span class="glyphicon glyphicon-road" aria-hidden="true"></span>
                            </a>
                            <a href="{{ URL::to('/admin/manage_admins') }}" data-toggle="tooltip" data-placement="top" title="Admins">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </a>
                            <a href="{{ URL::to('/settings') }}" data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a href="{{ URL::to('/content/manage_problems') }}" data-toggle="tooltip" data-placement="top" title="Problems">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <nav class="nav navbar-nav">
                            <ul class=" navbar-right">
                                <li class="nav-item dropdown open" style="padding-left: 15px;">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ URL::to('/') }}/assets/private/images/img.jpg" alt="">{{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="edit_admin/{{ Auth::user()->id }}"> Profile</a>
                                        <a class="dropdown-item" href="{{ URL::to('/settings') }}">
                                            <span>Settings</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            {{ csrf_field() }}
                                            <button class="dropdown-item" type="submit"><i class="fa fa-sign-out pull-right"></i> Logout</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <?= $home; ?>
                <!-- /page content -->
            </div>

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    {{$config->copyright_info}}
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
        <!-- jQuery -->
        <script src="{{ URL::to('/assets/private/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ URL::to('/assets/private/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ URL::to('/assets/private/fastclick/lib/fastclick.js') }}"></script>
        <!-- NProgress -->
        <script src="{{ URL::to('/assets/private/nprogress/nprogress.js') }}"></script>
        <!-- Chart.js -->
        <script src="{{ URL::to('/assets/private/Chart.js/dist/Chart.min.js') }}"></script>
        <!-- jQuery Sparklines -->
        <script src="{{ URL::to('/assets/private/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
        <!-- morris.js -->
        <script src="{{ URL::to('/assets/private/raphael/raphael.min.js') }}"></script>
        <script src="{{ URL::to('/assets/private/morris.js/morris.min.js') }}"></script>
        <!-- gauge.js -->
        <script src="{{ URL::to('/assets/private/gauge.js/dist/gauge.min.js') }}"></script>
        <!-- bootstrap-progressbar -->
        <script src="{{ URL::to('/assets/private/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
        <!-- Skycons -->
        <script src="{{ URL::to('/assets/private/skycons/skycons.js') }}"></script>
        <!-- Flot -->
        <script src="{{ URL::to('/assets/private/Flot/jquery.flot.js') }}"></script>
        <script src="{{ URL::to('/assets/private/Flot/jquery.flot.pie.js') }}"></script>
        <script src="{{ URL::to('/assets/private/Flot/jquery.flot.time.js') }}"></script>
        <script src="{{ URL::to('/assets/private/Flot/jquery.flot.stack.js') }}"></script>
        <script src="{{ URL::to('/assets/private/Flot/jquery.flot.resize.js') }}"></script>
        <!-- Flot plugins -->
        <script src="{{ URL::to('/assets/private/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
        <script src="{{ URL::to('/assets/private/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
        <script src="{{ URL::to('/assets/private/flot.curvedlines/curvedLines.js') }}"></script>
        <!-- DateJS -->
        <script src="{{ URL::to('/assets/private/DateJS/build/date.js') }}"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="{{ URL::to('/assets/private/moment/min/moment.min.js') }}"></script>
        <script src="{{ URL::to('/assets/private/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <!-- TinyMCE -->
        <script src="{{ URL::to('/assets/private/TinyMCE/tinymce.js') }}"></script>        
        <!-- validator -->
        <script src="{{ URL::to('/assets/private/validator/validator.js') }}"></script>
        <!-- bootbox code -->
        <script src="{{ URL::to('/assets/private/bootbox/bootbox.min.js') }}"></script>
        <!-- Custom Theme Scripts -->
        <script src="{{ URL::to('/assets/private/build/js/custom.min.js') }}"></script>
        <script>
            for (var i in jQ) {
                jQ[i]();
            }
        </script>
    </body>
</html>