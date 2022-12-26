<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="PersiaTC Dashboard">
    <meta name="keywords" content="PersiaTC Dashboard">
    <meta name="author" content="AliRahmani">
    <title>@yield('title', 'داشبورد مدیریت شرکت ارتباطات پرشیا')</title>
    <link rel="apple-touch-icon" href="images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="/css-rtl/vendors.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/icofont.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/vendors/css/charts/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="/vendors/css/extensions/unslider.css">
    <link rel="stylesheet" type="text/css" href="/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="/vendors/css/extensions/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/core/colors/palette-callout.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/plugins/animate/animate.css">

    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->

    <script src="/js/scripts/highcharts/highcharts.js"></script>
    <script src="/js/scripts/highcharts/highcharts-more.js"></script>
    <script src="/js/scripts/highcharts/series-label.js"></script>
    <script src="/js/scripts/highcharts/exporting.js"></script>
    <script src="/js/scripts/highcharts/export-data.js"></script>
    <script src="/js/scripts/highcharts/variable-pie.js"></script>

    <link rel="stylesheet" type="text/css" href="/css-rtl/app.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="/css-rtl/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/plugins/calendars/clndr.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/core/colors/palette-climacon.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/pages/users.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/plugins/extensions/toastr.css">
    <style media="screen">
        @font-face {
            font-family: 'BBardiya';
            src: url('/css-rtl/fontsFA/BBardiya.eot');
            src: url('/css-rtl/fontsFA/BBardiya.eot') format('embedded-opentype'), url('/css-rtl/fontsFA/BBardiya.woff') format('woff'), url('/css-rtl/fontsFA/BBardiya.ttf') format('truetype'), url('/css-rtl/fontsFA/BBardiya.svg') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'BKoodakBold';
            src: url('/css-rtl/fontsFA/BKoodakBold.eot');
            src: url('/css-rtl/fontsFA/BKoodakBold.eot') format('embedded-opentype'), url('/css-rtl/fontsFA/BKoodakBold.woff') format('woff'), url('/css-rtl/fontsFA/BKoodakBold.ttf') format('truetype'), url('/css-rtl/fontsFA/BKoodakBold.svg') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'BYekan';
            src: url('/css-rtl/fontsFA/BYekan.eot');
            src: url('/css-rtl/fontsFA/BYekan.eot') format('embedded-opentype'), url('/css-rtl/fontsFA/BYekan.eot') format('woff'), url('/css-rtl/fontsFA/BYekan.eot') format('truetype'), url('/css-rtl/fontsFA/BYekan.eot') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Rezvan';
            src: url('/css-rtl/fontsFA/Rezvan.eot');
            src: url('/css-rtl/fontsFA/Rezvan.eot') format('embedded-opentype'), url('/css-rtl/fontsFA/Rezvan.woff') format('woff'), url('/css-rtl/fontsFA/Rezvan.ttf') format('truetype'), url('/css-rtl/fontsFA/Rezvan.svg') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        .amcharts-legend-value {
            font-size: 20px !important;
            font-weight: bold !important;
        }

        .amcharts-legend-label {
            font-weight: bold !important;
        }

        #monthly {
            width: 100%;
            height: 500px;
        }

        .swal-title {
            font-family: Byekan !important;
        }

        .swal-text {
            font-family: Byekan !important;
        }

        a, span, p, h1, h2, h3, h4, h5, h6, label, input, button {
            font-family: Byekan !important;
        }

        .dataTables_info {
            font-family: Byekan !important;
        }

        .dow {
            font-family: Byekan !important;
        }

        .pdp-header {
            font-family: Byekan !important;
            height: 25px !important;
        }

        .days {
            font-family: Byekan !important;
        }

        .c-search > .form-control {
            border-radius: 0px;
            border-width: 0px;
            border-bottom-width: 1px;
            font-size: 1.3em;
            padding: 12px 12px;
            height: 44px;
            outline: none !important;
        }

        .c-search > .form-control:focus {
            outline: 0px !important;
            -webkit-appearance: none;
            box-shadow: none;
        }

        .c-search > .input-group-btn .btn {
            border-radius: 0px;
            border-width: 0px;
            border-left-width: 1px;
            border-bottom-width: 1px;
            height: 44px;
        }


        .c-list {
            padding: 0px;
            min-height: 44px;
        }

        .title {
            display: inline-block;
            font-size: 1.7em;
            font-weight: bold;
            padding: 5px 15px;
        }

        ul.c-controls {
            list-style: none;
            margin: 0px;
            min-height: 44px;
        }

        ul.c-controls li {
            margin-top: 8px;
            float: left;
        }

        ul.c-controls li a {
            font-size: 1.7em;
            padding: 11px 10px 6px;
        }

        ul.c-controls li a i {
            min-width: 24px;
            text-align: center;
        }

        ul.c-controls li a:hover {
            background-color: rgba(51, 51, 51, 0.2);
        }

        .c-toggle {
            font-size: 1.7em;
        }

        .name {
            font-size: 1.7em;
            font-weight: 700;
        }

        .c-info {
            padding: 5px 10px;
            font-size: 1.25em;
        }
    </style>
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/css-rtl/style.css">


    <script src="vendors/js/charts/amcharts/amcharts.js"></script>
    <script src="vendors/js/charts/amcharts/serial.js"></script>
    <script src="vendors/js/charts/amcharts/gauge.js"></script>
    <script src="vendors/js/charts/amcharts/pie.js"></script>
    <script src="vendors/js/charts/amcharts/export.min.js"></script>
    <link rel="stylesheet" href="vendors/js/charts/amcharts/export.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="vendors/js/charts/amcharts/amcharts.css" type="text/css" media="all"/>
    <script src="vendors/js/charts/amcharts/light.js"></script>


    <link rel="stylesheet" href="/vendors/datepicker/css/persianDatepicker-default.css"/>
    <link rel="stylesheet" href="/vendors/datepicker/css/persianDatepicker-dark.css"/>
    <link rel="stylesheet" href="/vendors/datepicker/css/persianDatepicker-latoja.css"/>
    <link rel="stylesheet" href="/vendors/datepicker/css/persianDatepicker-melon.css"/>
    <link rel="stylesheet" href="/vendors/datepicker/css/persianDatepicker-lightorang.css"/>
    <script src="/vendors/datepicker/js/prism.js"></script>

@yield('headerscripts')
<!-- END Custom CSS-->

</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
      data-menu="vertical-menu" data-col="2-columns">

<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item"><a class="navbar-brand" href="/dashboard"><img style="display:inline"
                                                                                    class="brand-logo" alt="PersiaTC"
                                                                                    src="/images/logo/logo-light-sm.png">
                        <h3 style="font-family:Byekan" class="brand-text">سیما</h3></a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                                                  data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"> </i></a></li>

                    <h3 style="margin: auto">شرکت ارتباطات پرشیا</h3>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li style="Display:none;" class="dropdown dropdown-language nav-item">

                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="/dahsboard/en"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="flag-icon flag-icon-gb"></i><span>English</span><span
                                    class="selected-language"></span></a>


                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">

                        </div>

                    </li>


                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                                                                           data-toggle="dropdown"><i
                                    class="ficon ft-phone"></i></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0"><span class="grey darken-2">دفترچه تلفن</span></h6>
                                <br><br>
                            </li>
                            <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">


                                    <ul class="list-group" id="contact-list">

                                        <li class="list-group-item">
                                            <div class="col-xs-12">
                                            </div>
                                            <div class="col-xs-12 col-sm-9">
                                                <span class="name">رضا رضایی</span><br/><br/>
                                                <span class="ft-user"> <span
                                                            class="text-muted"><b> مسوول اداری </b> </span><br/><br/></span>
                                                <span class="ft-phone"> <span style="font-size:20px"
                                                                              class="">40440000</span><br/></span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </li>


                                    </ul>


                            </li>
                        </ul>
                    </li>


                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                   href="#" data-toggle="dropdown"><span
                                    class="avatar avatar-online"><img
                                        src="{{ \Auth::user()->avatar ? \Auth::user()->avatar : '/images/logo/logo.png'}}"
                                        alt="avatar"><i></i></span><span
                                    class="user-name"> {{ \Auth::user()->name . " " . \Auth::user()->family }} </span></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/profile"><i class="ft-user"></i> تنظیمات حساب کاربری</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout"><i class="ft-power"></i> خروج از سامانه</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- ////////////////////////////////////////////////////////////////////////////-->


<div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span data-i18n="nav.category.layouts">ماژول های سامانه</span><i
                        class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right"
                        data-original-title="داشبورد"></i>
            </li>

            <li class=" {{{ (Request::is('dashboard') ? 'active' : '') }}} nav-item"><a href="/dashboard"><i
                            class="icofont icofont-dashboard-web"></i><span class="menu-title"
                                                                            data-i18n="nav.dash.main">کارتابل من</span></a>
            </li>
            <li class=" {{{ (Request::is('timesheet') ? 'active' : '') }}} nav-item"><a href="/timesheet"><i
                            class="ft-clipboard"></i><span class="menu-title"
                                                           data-i18n="nav.dash.main">تایم شیت من</span></a></li>



            <li class="{{{ (Request::is('*tenders*') ? 'active' : '') }}}  nav-item"><a href="/tenders"><i class="icon-list"></i><span class="menu-title" data-i18n="nav.dash.main">کار پذیری</span></a>
            <li class="{{{ (Request::is('') ? 'active' : '') }}}  nav-item"><a href="/avl"><i class="icon-list"></i><span class="menu-title" data-i18n="nav.dash.main">تامین کنندگان کالا و خدمات</span></a>

            </li>


            <li class="{{{ (Request::is('') ? 'active' : '') }}}  nav-item"><a href="/contracts"><i
                            class="icon-docs"></i><span class="menu-title" data-i18n="nav.dash.main">قرارداد با کارفرمایان</span></a>
            </li>
            <li class="{{{ (Request::is('') ? 'active' : '') }}}  nav-item"><a href="SellersContracts"><i
                            class="icon-docs"></i><span class="menu-title" data-i18n="nav.dash.main">قرارداد با پیمانکاران</span></a>
            </li>
            <li class="{{{ (Request::is('') ? 'active' : '') }}}  nav-item"><a href="/"><i class="icon-speech"></i><span
                            class="menu-title" data-i18n="nav.dash.main">آیین نامه ها و دستور العملها</span></a></li>
            <li style="" class="{{{ (Request::is('') ? 'active' : '') }}}  nav-item"><a href="Proceedings"><i
                            class="icon-equalizer"></i><span class="menu-title" data-i18n="nav.dash.main">صورتجلسات</span></a>
            </li>
            <li class="{{{ (Request::is('') ? 'active' : '') }}}  nav-item"><a href="Certificates"><i
                            class="icon-badge"></i><span class="menu-title" data-i18n="nav.dash.main">رتبه ها و گواهینامه ها</span></a>
            </li>

            <li class="{{{ (Request::is('') ? 'active' : '') }}}  nav-item"><a href="Certificates"><i
                            class="icon-phone"></i><span class="menu-title" data-i18n="nav.dash.main">دفترچه تلفن</span></a>
            </li>


            <li style="" class="{{{ (Request::is('') ? 'active' : '') }}}  nav-item"><a href="/Suggestions"><i
                            class="icon-equalizer"></i><span class="menu-title" data-i18n="nav.dash.main">نظام پیشنهادات و انتقادات</span></a>
            </li>


            @can('administrator')
                <li class="{{{ (Request::is('settings') ? 'active' : '') }}}   nav-item has-sub"><a href="#"><i
                                class="ft-settings"></i><span class="menu-title" data-i18n="nav.templates.main">تنظیمات سیستم</span></a>
                    <ul class="menu-content" style="">
                        <li style="" class="{{{ (Request::is('timesheet/admin') ? 'active' : '') }}}  nav-item"><a
                                    class="menu-item" href="users" data-i18n="nav.templates.vert.classic_menu">مدیریت
                                کاربران</a></li>
                        <li style="" class="{{{ (Request::is('timesheet/admin') ? 'active' : '') }}}  nav-item"><a
                                    class="menu-item" href="" data-i18n="nav.templates.vert.classic_menu">مدیریت تایم
                                شیت کارکنان</a></li>


                    </ul>
                </li>
            @endcan


        </ul>
    </div>
</div>


@yield('content')


<footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
                class="float-md-left d-block d-md-inline-block">تمامی حقوق سامانه برای شرکت ارتباطات پرشیا محفوظ میباشد.</span><span
                class="float-md-right d-block d-md-inline-blockd-none d-lg-block"></span></p>
</footer>


<!-- BEGIN VENDOR JS-->
<script src="/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<script src="/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
<script src="/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>


<!-- BEGIN ROBUST JS-->
<script src="/js/core/app-menu.js" type="text/javascript"></script>
<script src="/js/core/app.js" type="text/javascript"></script>
<script src="/js/scripts/customizer.js" type="text/javascript"></script>
<script src="/vendors/js/extensions/toastr.min.js" type="text/javascript"></script>


<script src="/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>


<script src="/js/scripts/pages/dashboard-project.js" type="text/javascript"></script>
<script src="/vendors/datepicker/js/persianDatepicker.js"></script>
<script type="text/javascript">
    $(function () {
        $("#input1, #span1").persianDatepicker();
    });

    $(function () {
        $(".date").persianDatepicker();
    });

</script>

<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
@include('layouts.partials')
@yield('footerscripts')
<!-- END PAGE LEVEL JS-->


</body>

</html>
