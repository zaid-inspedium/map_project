<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuesax admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuesax admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <?php $settings = DB::select(DB::raw("select * from system_settings")); ?>
    <title>Error 403 | {{ $settings[0]->setting_option }}</title>
    <link rel="apple-touch-icon" href="{{ asset('public/system_logo/'.$settings[5]->setting_option.'')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/system_logo/'.$settings[5]->setting_option.'')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/pages/error.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- error 404 -->
                <section class="row flexbox-container">
                    <div class="col-xl-7 col-md-8 col-12 d-flex justify-content-center">
                        <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
                            <div class="card-content">
                                <div class="card-body text-center">
                                    <img src="public/app-assets/images/pages/404.png" class="img-fluid align-self-center" alt="branding logo">
                                    <h1 class="font-large-2 my-1">OOPS!</h1>
                                    <p class="p-2">
                                        {{$msg}}
                                    </p>
                                    <a class="btn btn-primary btn-lg mt-2" href="{{ route('forced') }}">Back to Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- error 404 end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('public/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('public/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('public/app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('public/app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>