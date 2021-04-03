<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chatbot admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Chatbot admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <?php $settings = DB::select(DB::raw("select * from system_settings")); ?>
    <title>{{ $settings[0]->setting_option }}</title>
    <link rel="apple-touch-icon" href="{{ asset('public/system_logo/'.$settings[5]->setting_option.'')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/system_logo/'.$settings[5]->setting_option.'')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/vendors/css/charts/apexcharts.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')}}">
    <!-- END: Vendor CSS-->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{ asset('public/package/dist/js/select2.min.js')}}"></script>
<link href="{{ asset('public/package/dist/css/select2.css')}}" rel="stylesheet" />


    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/pages/card-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/plugins/file-uploaders/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/pages/data-list-view.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand">
                        <!-- <div class="brand-logo"></div> -->
                        <img src="{{ asset('public/system_logo/'.$settings[5]->setting_option.'')}}" width="50" height="50" alt="System Logo">
                        <h2 class="brand-text mb-0">{{ $settings[0]->setting_option }}</h2>
                    </a></li>

            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <li class=" nav-item"><a href="{{ route('dashboard.index') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
<?php $modules = DB::table('modules')->where('status','=','Active')->get(); ?>

@foreach($modules as $mods)
@if(Auth::user()->role_id == 1)


@if( $mods->id > 6 && $mods->id != 9 && $mods->id != 10 && $mods->id != 11 && $mods->id != 12 && $mods->id != 13 && $mods->id == 17)


                <li class=" nav-item"><a href="{{ URL::to('/') }}/{{$mods->route_name}}"><i class="feather icon-square"></i><span class="menu-title" data-i18n="{{ $mods->module_title }}">{{ $mods->module_title }}</span></a>
                </li>
@endif
@else


@if($mods->id > 5 && $mods->id == 6 || $mods->id == 9 || $mods->id == 10 || $mods->id == 11 || $mods->id == 12 || $mods->id == 13 && $mods->id != 14)


                <li class=" nav-item"><a href="{{ URL::to('/') }}/{{$mods->route_name}}"><i class="feather icon-circle"></i><span class="menu-title" data-i18n="{{ $mods->module_title }}">{{ $mods->module_title }}</span></a>
                </li>
@endif
@endif
@endforeach

            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">

        <!-- BEGIN: Header-->
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
            <div class="navbar-wrapper">
                <div class="navbar-container content">
                    <div class="navbar-collapse" id="navbar-mobile">
                        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                            <ul class="nav navbar-nav">
                                <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                            </ul>
                            <ul class="nav navbar-nav bookmark-icons">
                                <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                                <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                                <!--     i.ficon.feather.icon-menu-->
                                <!-- <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon feather icon-check-square"></i></a></li>
                                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon feather icon-message-square"></i></a></li>
                                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon feather icon-mail"></i></a></li>
                                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calender.html" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon feather icon-calendar"></i></a></li> -->
                            </ul>
                            <ul class="nav navbar-nav">
                              <!--   <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather icon-star warning"></i></a>
                                    <div class="bookmark-input search-input">
                                        <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                        <input class="form-control input" type="text" placeholder="Explore Vuesax..." tabindex="0" data-search="template-list" />
                                        <ul class="search-list"></ul>
                                    </div>
              
                                </li> -->
                            </ul>
                        </div>
                        <ul class="nav navbar-nav float-right">
                            <!-- <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item" href="#" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></div>
                            </li> -->
                            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                          <!--   <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather icon-search"></i></a>
                                <div class="search-input">
                                    <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                    <input class="input" type="text" placeholder="Explore Vuesax..." tabindex="-1" data-search="template-list" />
                                    <div class="search-input-close"><i class="feather icon-x"></i></div>
                                    <ul class="search-list"></ul>
                                </div>
                            </li> -->
                            <!-- <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">5</span></a>
                                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                    <li class="dropdown-menu-header">
                                        <div class="dropdown-header m-0 p-2">
                                            <h3 class="white">5 New</h3><span class="notification-title">App Notifications</span>
                                        </div>
                                    </li>
                                    <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                                <div class="media-body">
                                                    <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me tonight?</small>
                                                </div><small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                            </div>
                                        </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                                <div class="media-body">
                                                    <h6 class="success media-heading red darken-1">99% Server load</h6><small class="notification-text">You got new order of goods.</small>
                                                </div><small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                                            </div>
                                        </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i class="feather icon-alert-triangle font-medium-5 danger"></i></div>
                                                <div class="media-body">
                                                    <h6 class="danger media-heading yellow darken-3">Warning notifixation</h6><small class="notification-text">Server have 99% CPU usage.</small>
                                                </div><small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                            </div>
                                        </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i class="feather icon-check-circle font-medium-5 info"></i></div>
                                                <div class="media-body">
                                                    <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>
                                                </div><small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                                            </div>
                                        </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>
                                                <div class="media-body">
                                                    <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>
                                                </div><small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                                            </div>
                                        </a></li>
                                    <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>
                                </ul>
                            </li> -->
                            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                    <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{Auth::user()->name}}</span>
                                        <!-- <span class="user-status">Available</span> -->
                                    </div><span><img class="round" src="{{ asset('public/user_images/'.Auth::user()->profile_photo_path.'')}}" alt="avatar" height="40" width="40" /></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                <form action="{{ route('log-out') }}" method="POST">
                                @csrf    
                                    <div class="dropdown-divider"></div>

                                    <button class="dropdown-item"><i class="feather icon-power"></i> Logout</button>

                                </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- END: Header-->



@yield('content')



</div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0">
            <span class="float-md-left d-block d-md-inline-block mt-25">
                COPYRIGHT &copy; 2021
                <a class="text-bold-800 grey darken-2" href="{{route('dashboard.index')}}" target="_blank">
                Chatbot,
                </a>
                All rights Reserved
            </span>
            <span class="float-md-right d-none d-md-block">
                Hand-crafted & Made with
                <i class="feather icon-heart pink"></i>
            </span>
            <button class="btn btn-primary btn-icon scroll-top" type="button">
                <i class="feather icon-arrow-up"></i>
            </button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('public/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('public/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('public/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
    <script src="{{ asset('public/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{ asset('public/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{ asset('public/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('public/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('public/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('public/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('public/app-assets/js/core/app.js')}}"></script>
    <script src="{{ asset('public/app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('public/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    <script src="{{ asset('public/app-assets/js/scripts/ui/data-list-view.js')}}"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>