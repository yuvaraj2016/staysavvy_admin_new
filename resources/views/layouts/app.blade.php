<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <title>StaySavvy Admin </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <style>
        /* start newmenu css written below on 03.02.2021 */

        .pcoded .pcoded-navbar .pcoded-item .pcoded-hasmenu[subitem-icon="style1"] .pcoded-submenu li>a .pcoded-mtext::before {
            content: none !important;
        }

        .pcoded .pcoded-navbar[navbar-theme="themelight1"] .pcoded-item>li.pcoded-trigger>a {
            background: none !important;
            color: #666;
        }


        .pcoded .pcoded-navbar[navbar-theme="themelight1"] .pcoded-item>li.pcoded-hasmenu>a::after,
        .pcoded .pcoded-navbar[navbar-theme="themelight1"] .pcoded-item>li.pcoded-hasmenu .pcoded-submenu li.pcoded-hasmenu>a::after {
            color: #fff !important;
        }


        .pcoded .pcoded-navbar[navbar-theme="themelight1"] .pcoded-item>li.active>a {
            background: none !important;
            color: #666 !important;
        }


        /* end newmenu css written below on 03.02.2021 */


        .fixed-top {
            position: absolute !important;
        }

        .nav-link,
        .navbar-brand {
            color: #fff !important;

            font-weight: bold !important;
            margin-right: 30px !important;

        }

        .nav-item {

            margin-right: 30px !important;


        }

        .navbar-toggler {
            color: #000 !important;

        }


        .table-striped tbody tr:nth-of-type(2n+1) {

            background-color: white !important;
        }

        body {
            font-family: Montserrat !important;
            font-size: 15px !important;
            font-weight: 400 !important;
        }

        .btn {


            font-size: 12px !important;

        }

        /* add button changes */
        button.dt-button,
        div.dt-button,
        a.dt-button,
        button.dt-button:focus:not(.disabled),
        div.dt-button:focus:not(.disabled),
        a.dt-button:focus:not(.disabled),
        button.dt-button:active:not(.disabled),
        button.dt-button.active:not(.disabled),
        div.dt-button:active:not(.disabled),
        div.dt-button.active:not(.disabled),
        a.dt-button:active:not(.disabled),
        a.dt-button.active:not(.disabled) {

            font-size: 12px !important;

        }

        /* fileexport button changes */
        button.dt-button,
        div.dt-button,
        a.dt-button,
        button.dt-button:focus:not(.disabled),
        div.dt-button:focus:not(.disabled),
        a.dt-button:focus:not(.disabled),
        button.dt-button:active:not(.disabled),
        button.dt-button.active:not(.disabled),
        div.dt-button:active:not(.disabled),
        div.dt-button.active:not(.disabled),
        a.dt-button:active:not(.disabled),
        a.dt-button.active:not(.disabled) {

            /* padding: 6px 20px 6px 20px !important; */
            /* border-radius: 15px !important;
margin-right: 12px !important; */

        }

        /* show page heading changed blow */

        /* .main-body .page-wrapper {

margin-top: -35px !important;
} */
        /* file export btn color changed blow */
        button.dt-button,
        div.dt-button,
        a.dt-button,
        button.dt-button:focus:not(.disabled),
        div.dt-button:focus:not(.disabled),
        a.dt-button:focus:not(.disabled),
        button.dt-button:active:not(.disabled),
        button.dt-button.active:not(.disabled),
        div.dt-button:active:not(.disabled),
        div.dt-button.active:not(.disabled),
        a.dt-button:active:not(.disabled),
        a.dt-button.active:not(.disabled) {


            background-color: #01a9ac !important;
            border-color: #01a9ac !important;
            padding-top: 5px !important;
            padding-bottom: 5px !important;

        }


        a.dt-button {
            background-color: #01a9ac !important;
            border-color: #01a9ac !important;
            padding-top: 0px !important;
            padding-bottom: 5px !important;
            width: 80px !important;
            height: 28px !important;

        }

        .dt-button span {

            position: relative;
            top: -3px;
            left: 10px;
            padding: 0px !important;
            margin: 0px !important;
        }

        .buttons-csv span {

            position: relative;
            top: -2px;
            padding: 0px !important;
            margin: 0px !important;
        }


        .main-body .page-wrapper .page-header-title h4 {
            font-size: 18px !important;
        }


        .border1 {
            border: none !important;
            padding: 1px !important;
            margin-left: -13px !important;
        }

        .font1 {
            font-size: 16px !important;

            /* background-color: #01a9ac !important; */
            /* display: block; */
            border: none !important;

            border-radius: 5px;

            /* border-radius: 25px; */

            padding: 7px;
            padding-top: 5px !important;
            /* padding-bottom:3px!important; */
            width: 15px;
            height: 15px;
            margin-right: 15px !important;
            /* width:30px!important; */

        }

        .font1 i.fa {
            font-size: 18px !important;
            /* margin-top:9px!important; */
            color: #01a9ac !important;

        }

        .job-delete i.fa {

            margin-top: -9px !important;
            background: none !important;

        }



        div.dataTables_wrapper div.dataTables_paginate ul.pagination {

            display: none !important;
        }

        /* pagination css */
        .btn-primary.disabled,
        .wizard>.actions a.disabled,
        .sweet-alert button.disabled.confirm {

            /* background-color: #6777ef !important;
                    border-color: #6777ef !important;
                    border-radius:30px !important; */
        }

        /* nav bar margin top changed css */
        /* .pcoded-main-container {
margin-top: 0px !important;
} */
        /* select 2 background color romove 29.07.2020 */
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            background-color: white !important;
            color: black !important;



        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: black transparent transparent transparent !important;
            margin-top: -7px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            padding: 2px 30px 2px 20px !important;

        }



        .btn-prmy,
        .btn-blue,
        .select2-selection__choice,
        .waves-effect,
        .dt-buttons .dt-button,
        .btn-primary,
        .btn-primary.disabled {
            /* box-shadow: 0 2px 6px #01A9AC!important; */
            box-shadow: none !important;
            background-color: #1B476B !important;
            /* border-color: #01A9AC!important; */
            border-color: none !important;
            border-radius: 25px !important;
            color: #fff !important;
            font-size: 13px !important;
            padding-top: 5px !important;
            padding-bottom: 5px !important;

        }

        .navbar i.fa {
            box-shadow: 0 2px 4px #01a9ac !important;
            background-color: #01a9ac !important;
            border-color: #01a9ac !important;
            border-radius: 50px !important;
            /* padding: px!important; */
            width: 30px !important;
            height: 30px !important;
            font-size: 12px !important;
            padding-top: 4px !important;
            color: #fff !important;
            /* margin-left: 6px!important; */
            text-align: center;

        }


        .navbar-nav .nav-item {

            border: 0px solid red;
            margin-right: 90px !important;
        }


        .bg-blue {
            box-shadow: 0 2px 6px white !important;
            background-color: white !important;
            border-color: white !important;

            color: black !important;

        }

        .nav-tabs .active {
            /* box-shadow: 0 2px 4px #01a9ac!important; */
            background-color: #01a9ac !important;
            border-color: #01a9ac !important;
            /* border-bottom-color: white!important; */
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important;
            color: #fff !important;
        }

        .active {
            /* box-shadow: 0 2px 6px #01a9ac!important;
   
    
    color:#fff!important; */

        }


        .tab-content .tab-pane .active .show {
            -moz-box-shadow: 0px 5px 200px #00C0FF !important;
            -webkit-box-shadow: 0px 5px 200px #00C0FF !important;
            box-shadow: 0px 5px 200px #00C0FF !important;
            border: 2px solid #01a9ac !important;
            color: black !important;
            /* border-color: #000!important; */

        }


        .active i.fa {
            background-color: #fff !important;
            color: #01a9ac !important;
            position: relative;
            top: 3px !important;

        }

        .active .nav-link {
            color: #fff !important;
        }

        .btn-blue:hover {
            color: #fff;

        }

        .btn-red {
            box-shadow: 0 2px 6px red;
            background-color: red;
            border-color: red;
            border-radius: 30px !important;
            color: #fff;

        }


        .btn-black {
            box-shadow: 0 2px 6px #6d6d6d !important;
            background-color: #6d6d6d !important;
            border-color: #6d6d6d !important;
            border-radius: 30px !important;
            color: #fff !important;

        }

        .btn-red:hover {
            color: #fff;

        }

        .alert-green {
            box-shadow: 0 2px 6px #009302;
            background-color: #009302;
            border-color: #009302;
            border-radius: 30px !important;
            font-weight: bold;
            color: #fff;

        }

        .alert-red {
            box-shadow: 0 2px 6px red;
            background-color: red;
            border-color: red;
            border-radius: 30px !important;
            ;
            color: #fff;

        }

        .pcoded #styleSelector {

            display: none !important;
        }

        a.nav-link,
        a.dropdown-item,
        .btn-primary {
            font-size: 13px !important;
            font-weight: bold !important;

        }

        .dropdown-divider,
        .dropdown-menu {
            padding: 0 !important;
            margin: 0 !important;
            /* font-size:16px!important; */

        }

        .dropdown-menu a {

            font-size: 13px !important;

        }

        .basic-btn {

            /* height: 150px!important; */
            /* overflow-y: scroll; */

        }



        .dataTable th,
        td,
        #basic-btn_filter label {
            font-size: 15px !important;

        }

        /* table td font size change */
        .dataTable th,
        td,
        #basic-btn_filter label {
            font-size: 13px !important;
            font-family: Montserrat !important;
        }


        /* navar on mobile view */
        .pcoded[theme-layout="horizontal"][pcoded-device-type="phone"] .pcoded-navbar {
            height: auto;
            padding: 10px 10px 0;
            padding-top: 10px;
            padding-bottom: 0px;
            position: absolute;
            opacity: 10 !important;
            visibility: unset !important;
            transform-origin: 50% 50%;
            transition: none !important;
            transform-style: preserve-3d;
            transform: none !important;
        }

        /*end navar on mobile view */


        /* view page changes */

        .form-control:disabled,
        .form-control[readonly] {
            background-color: white !important;
        }

        .form-control {
            border: 1px solid #1B476B !important;
        }


        /* form lable color */
        label {
            color: #212121 !important;
        }

        /* input field alignment */
        /* input.form-control {
    padding: 10px 10px 10px 1px !important;
} */
        /* end input field alignment */
        /* end view page changes */
        .jFiler-items {

            /* float:left!important;
    /* width:150px!important; */
            /* height:auto!important; */
            /* border:5px solid red!important;  */
        }

        .jFiler-input-dragDrop {
            /* float:left!important; */
            /* width:10%!important;
    height:auto!important;
    border:5px solid red!important; */

        }
    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'StaySavvy Admin') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" sizes="16x16 32x32 64x64" href="{{ asset('files/assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Google font-->
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- datatable -->

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="{{ asset('files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/pages/data-table/extensions/buttons/css/buttons.dataTables.min.css')}}">
    <!-- Select 2 css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files/bower_components/select2/css/select2.min.css') }}">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files/bower_components/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/icon/themify-icons/themify-icons.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/icon/material-design/css/material-design-iconic-font.min.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/icon/icofont/css/icofont.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/icon/feather/css/feather.css') }}">
    <!-- Syntax highlighter Prism css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/pages/prism/prism.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/css/pcoded-horizontal.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<!-- Menu horizontal fixed layout -->

<body class="horizontal-icon-fixed">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <div id="pcoded" class="pcoded">

        <div class="pcoded-container">
            <!-- Menu header start -->



            <!-- Menu header end -->



            <div class="pcoded-main-container" style="margin-top:0px !important;padding-top:0px!important;">


                {{-- Below Menu Code Reference -- https://bootsnipp.com/snippets/nNX3a --}}

                <nav class="pcoded-navbar">
                    <div class="row" style="padding-bottom:10px!important;margin-left:0px!important;background:white!important;">
                        <div style="margin-left:10px!important; width:15%!important;float:left; margin-top:10px;">
                            <a class="navbar-brand mt-2" href="#"><img src="{{  asset('files/assets/images/StaySavvy-Logo.png') }}" width="210px" height="auto" /></a>
                        </div>

                        <div style="margin-left:24px!important;border:0px solid red!important; width:77%!important;float:left;">
                            <div class="mt-3 col-md-12" style="background-color:#1BF0B7; border-radius:20px; height:65%!important;font-weight:bold;width:1014px;">
                                @if(collect(session('roles'))->contains('Administrator'))



                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-1 ">
                                        <!-- <a class="d-inline" href="#">
                                            <i class="fa fa-question-circle" style="margin-left:5px!important;font-size:40px!important;"></i>
                                          
                                        </a>
            
                                        <a class="d-inline ml-2" href="#">
                                            <i class="fa fa-user-circle-o" style="margin-left:5px!important;font-size:35px!important;margin-top:2px!important;"></i>
                                          
                                        </a> -->

                                    </div>
                                    <div class="col-sm-3 mt-3 ml-2 text-center">
                                        <!-- <a class="" href="#" style="font-weight: bold!important;"><b>TEWIN BERY FORM HOTEL</b></a><br>
                                        <a class="" href="#"><b>Stay Savvy Account</b></a> -->


                                    </div>
                                    <div class="col-sm-1 d-flex mt-3">
                                        <a class="d-inline" href="#">
                                            <i class="fa fa-question-circle" style="margin-left:5px!important;font-size:40px!important;"></i>

                                        </a>

                                        <!-- <a class="d-inline ml-2" href="#">
                                            <i class="fa fa-user-circle-o" style="margin-left:5px!important;font-size:35px!important;margin-top:2px!important;"></i>
                                          
                                        </a> -->
                                        <li class="nav-item dropdown" style="list-style: none;">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-user-circle-o" style="margin-left:5px!important;font-size:35px!important;margin-top:-7px!important;display: inline-block!important;color:rebeccapurple!important;">

                                                </i>
                                                {{ ucfirst(session('username')) }}
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                                <a class="dropdown-item {{ (request()->is('show_profiles')) ? 'active' : '' }}" href="{{ route('profile.index') }}">My Profile</a>

                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item {{ (request()->is('logout')) ? 'active' : '' }}" href="{{ route('logout') }}">Logout</a>


                                            </div>
                                        </li>
                                        <!-- <a class="" href="#"><img style="border-radius:20px!important;width:130px;height:80px;" class="p-2" src="{{  asset('files/assets/images/HeckField1.jpg') }}"/></a> -->
                                    </div>
                                </div>

                                @elseif(collect(session('roles'))->contains('Vendor'))


                                <div class="row pb-2">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-1 ">
                                        <!-- <a class="d-inline" href="#">
                                            <i class="fa fa-question-circle" style="margin-left:5px!important;font-size:40px!important;"></i>
                                          
                                        </a>
            
                                        <a class="d-inline ml-2" href="#">
                                            <i class="fa fa-user-circle-o" style="margin-left:5px!important;font-size:35px!important;margin-top:2px!important;"></i>
                                          
                                        </a> -->

                                    </div>
                                    <div class="col-sm-3 mt-2 ml-3 text-center">
                                        <!-- <p class="" style="font-weight: bold!important;margin-left:44px"><b>TEWIN BERY FORM HOTEL</b></p><br>
                                        <p class="" style="font-weight: bold!important;margin-left:44px;margin-top:-31px"><b>Stay Savvy Account</b></p> -->


                                    </div>
                                    <div class="col-sm-1 d-flex mt-2">
                                        <a class="d-inline" href="#">
                                            <i class="fa fa-question-circle" style="margin-left:5px!important;color:#1B476B!important;font-size:40px!important;"></i>

                                        </a>

                                        <!-- <a class="d-inline ml-2" href="#">
                                            <i class="fa fa-user-circle-o" style="margin-left:5px!important;font-size:35px!important;margin-top:2px!important;"></i>
                                          
                                        </a> -->
                                        <li class="nav-item dropdown" style="list-style: none;">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#1B476B!important;">
                                                <i class="fa fa-user-circle-o" style="margin-left:2px!important;font-size:35px!important;margin-top:-7px!important; color:#1B476B!important;">

                                                </i>
                                                {{ ucfirst(session('username')) }}
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                                <a class="dropdown-item {{ (request()->is('show_profiles')) ? 'active' : '' }}" href="{{ route('profile.index') }}">My Profile</a>

                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item {{ (request()->is('logout')) ? 'active' : '' }}" href="{{ route('logout') }}">Logout</a>


                                            </div>
                                        </li>
                                        <!-- <a class="" href="#"><img style="border-radius:20px!important;width:130px;height:80px;" class="p-2" src="{{  asset('files/assets/images/HeckField1.jpg') }}"/></a> -->
                                    </div>
                                </div>


                                @endif


                            </div>
                            <div style="margin-left:25px!important; width:15%!important;float:left;">

                            </div>
                        </div>

                    </div>

                    <div class="pcoded-inner-navbar" style="background:#1B476B;">
                        <ul class="pcoded-item pcoded-left-item col-md-12 " style="margin-left: 22.666667% !important;">
                            <li class="pcoded-hasmenu col-md-1" >
                            <!-- style="margin-right: 90px!important;" -->
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="fa fa-user text-white" style="margin-left: -19px;"></i></span>
                                    <span class="pcoded-mtext text-white "><b>Users</b></span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">

                                    <?php

                                    use Illuminate\Support\Collection;

                                    /**
                                     * List values from collection. Unlike $collection->lists('key'), this function allows using multiple keys.
                                     *
                                     * In newer Laravel versions things like that can be done with collection macros, but not in 5.0.
                                     *
                                     * @param Collection $collection
                                     * @param array|string $properties
                                     * @param string $id
                                     * @return array
                                     */



                                    function checkpermissionexist($permissionarray)
                                    {

                                        $result = 0;

                                        $coll = new collection(session('permissions'));

                                        // $permarr = ['List users','List roles','List permissions'];

                                        // retun $coll->contains('List users','List roles','List permissions');

                                        foreach ($coll as $item) {

                                            // echo $item;

                                            if (in_array($item, $permissionarray)) {

                                                $result++;
                                            }
                                        }

                                        return $result;
                                    }


                                    ?>
                                    @if(collect(session('roles'))->contains('Administrator'))
                                    @if(checkpermissionexist(['List users','List roles','List permissions']) > 0)


                                    <li class="">
                                        @if(collect(session('permissions'))->contains('List users'))
                                        <a class=" {{ (request()->is('user_list')) ? 'active' : '' }}" href="{{  route('user.index') }}"> <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span> <span class="pcoded-mtext" data-i18n="nav.navigate.main text-white">Users</span> <span class="pcoded-mcaret"></span> </a>
                                        @endif
                                    </li>
                                    <li class="">
                                        @if(collect(session('permissions'))->contains('List roles'))
                                        <a class=" {{ (request()->is('role_list')) ? 'active' : '' }}" href="{{ route('role.index') }}"> <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span> <span class="pcoded-mtext" data-i18n="nav.navigate.main">Roles</span> <span class="pcoded-mcaret"></span> </a>
                                        @endif
                                    </li>
                                    <li class="">
                                        @if(collect(session('permissions'))->contains('List permissions'))

                                        <a class="{{ (request()->is('permission_list')) ? 'active' : '' }}" href="{{ route('permission.index') }}"> <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span> <span class="pcoded-mtext" data-i18n="nav.navigate.main">Permissions</span> <span class="pcoded-mcaret"></span> </a>
                                        @endif
                                    </li>
                                    @endif
                                    @endif

                                </ul>
                            </li>


                            <li class="pcoded-hasmenu col-md-1" >
                            <!-- style="margin-right: 80px!important;" -->
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="fa fa-flag text-white"></i></span>
                                    <span class="pcoded-mtext text-white "><b>Property</b></span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        @if(collect(session('permissions'))->contains('List property'))
                                        <a class=" {{ (request()->is('properties_list')) ? 'active' : '' }}" href="{{ route('properties.index') }}"> <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span> <span class="pcoded-mtext" data-i18n="nav.navigate.main">Property</span> <span class="pcoded-mcaret"></span> </a>
                                        @endif
                                    </li>
                                    <li class="">
                                        @if(collect(session('permissions'))->contains('List room'))
                                        <a class=" {{ (request()->is('rooms_list')) ? 'active' : '' }}" href="{{ route('rooms.index') }}"> <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span> <span class="pcoded-mtext" data-i18n="nav.navigate.main">Room</span> <span class="pcoded-mcaret"></span> </a>
                                        @endif
                                    </li>
                                    <li class="">
                                        @if(collect(session('permissions'))->contains('List policy'))
                                        <a class=" {{ (request()->is('property_policies_list')) ? 'active' : '' }}" href="{{ route('property_policies_list') }}"> <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span> <span class="pcoded-mtext" data-i18n="nav.navigate.main">Policy</span> <span class="pcoded-mcaret"></span> </a>
                                        @endif
                                    </li>


                                </ul>
                            </li>


                            <li class="{{ (request()->is('stock_master_list')) ? 'active' : '' }} col-md-1" >
                            <!-- style="margin-right: 80px!important;" -->

                                @if(collect(session('permissions'))->contains('List booking'))
                                <a href="{{ route('adminbookings.index') }}"> <span class="pcoded-micon"><i class="fa fa-cubes text-white"></i><b>N</b></span> <span class="pcoded-mtext text-white " data-i18n="nav.navigate.main"><b>Booking</b></span> <span class="pcoded-mcaret"></span> </a>
                                @endif

                            </li>

                            <li class=" col-md-1" >
                            <!-- style="margin-right: 80px!important;" -->

                                <a href=""> <span class="pcoded-micon"><i class="fa fa-line-chart text-white"></i><b>N</b></span> <span class="pcoded-mtext text-white " data-i18n="nav.navigate.main"><b>Analytics</b></span> <span class="pcoded-mcaret"></span> </a>

                            </li>




                            <li class="pcoded-hasmenu col-md-1" >
                            <!-- style="margin-right: 80px!important;" -->
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="fa fa-heart text-white"></i></span>
                                    <span class="pcoded-mtext text-white offset-3"><b>Eco</b></span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <!-- <ul class="pcoded-submenu">
                                    <li class="">
                                        @if(collect(session('permissions'))->contains('List eco summary'))

                                        <a href="{{ route('ecoarea.index') }}" style="background: none !important;"> <span class="pcoded-micon"><i class="fa fa-heart text-white"></i><b>N</b></span> <span class="pcoded-mtext text-white" data-i18n="nav.navigate.main"><b>Eco Area</b></span> <span class="pcoded-mcaret"></span> </a>
                                        @endif
                                    </li>



                                </ul> -->
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        @if(collect(session('permissions'))->contains('List eco summary'))
                                        <a class=" {{ (request()->is('ecoarea_list')) ? 'active' : '' }}" href="{{ route('ecoarea.index') }}"> <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span> <span class="pcoded-mtext" data-i18n="nav.navigate.main">Eco Impact</span> <span class="pcoded-mcaret"></span> </a>
                                        @endif
                                    </li>
                                    <li class="">
                                        <!-- @if(collect(session('permissions'))->contains('List room')) -->
                                        <a class=" {{ (request()->is('eco_reward_list')) ? 'active' : '' }}" href="{{ route('ecoreward.index') }}"> <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span> <span class="pcoded-mtext" data-i18n="nav.navigate.main">Eco Reward</span> <span class="pcoded-mcaret"></span> </a>
                                        <!-- @endif -->
                                    </li>
                                 


                                </ul>
                            </li>


                            @if(collect(session('roles'))->contains('Administrator'))
                            <li class="pcoded-hasmenu col-md-1">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="fa fa-cog text-white"></i></span>
                                    <span class="pcoded-mtext text-white offset-2"><b>Config</b></span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)" data-i18n="nav.authentication.main">
                                            <span class="pcoded-micon"><i class="ti-id-badge"></i></span>
                                            <span class="pcoded-mtext">Booking</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                @if(collect(session('permissions'))->contains('List config booking status'))

                                                <a class="{{ (request()->is('booking_status_list')) ? 'active' : '' }}" href="{{ route('booksts.index') }}" data-i18n="nav.authentication.login-bg-image">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Booking Status</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                @endif
                                            </li>
                                            <li class="">
                                                @if(collect(session('permissions'))->contains('List config commission'))

                                                <a class=" {{ (request()->is('commission_list')) ? 'active' : '' }}" href="{{ route('commission.index') }}" data-i18n="nav.authentication.login-soc-icon">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Booking Commission</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                @endif
                                            </li>
                                            <li class="">
                                                @if(collect(session('permissions'))->contains('List room type'))



                                                <a class="{{ (request()->is('booking_room_list')) ? 'active' : '' }}" href="{{ route('roomtype.index') }}" data-i18n="nav.authentication.login-soc-h-f">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Room Type</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                @endif
                                            </li>




                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)" data-i18n="nav.maintenance.main">
                                            <span class="pcoded-micon"><i class="ti-settings"></i></span>
                                            <span class="pcoded-mtext">Property</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                @if(collect(session('permissions'))->contains('List property type'))


                                                <a class="{{ (request()->is('property_list')) ? 'active' : '' }}" href="{{ route('property.index') }}" data-i18n="nav.maintenance.error">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Property Type</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                @endif
                                            </li>
                                            <li class="">
                                                @if(collect(session('permissions'))->contains('List policy'))



                                                <a class="{{ (request()->is('property_policies_list')) ? 'active' : '' }}" href="{{ route('property_policies_list') }}" data-i18n="nav.maintenance.comming-soon">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Policy</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                @endif
                                            </li>
                                            <li class="">
                                                @if(collect(session('permissions'))->contains('List property mgmt system'))



                                                <a class="{{ (request()->is('property_management_list')) ? 'active' : '' }}" href="{{ route('property_management.index') }}" data-i18n="nav.maintenance.offline-ui">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Property Management</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                @endif
                                            </li>


                                            <li class="">
                                                @if(collect(session('permissions'))->contains('List central res system'))



                                                <a class="{{ (request()->is('central_system_list')) ? 'active' : '' }}" href="{{ route('centralsystem.index') }}" data-i18n="nav.maintenance.offline-ui">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Central System</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                @endif
                                            </li>








                                            <li class="">
                                                @if(collect(session('permissions'))->contains('List host type'))



                                                <a class="{{ (request()->is('host_list')) ? 'active' : '' }}" href="{{ route('host.index') }}" data-i18n="nav.maintenance.offline-ui">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Host Type</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                @endif
                                            </li>


                                            <li class="">


                                                @if(collect(session('permissions'))->contains('List tax'))



                                                <a class="{{ (request()->is('tax_list')) ? 'active' : '' }}" href="{{ route('tax.index') }}" data-i18n="nav.maintenance.offline-ui">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Tax</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                @endif
                                            </li>

                                            <li class="">


                                                @if(collect(session('permissions'))->contains('List amenity'))



                                                <a class="{{ (request()->is('amenity_list')) ? 'active' : '' }}" href="{{ route('amenity.index') }}" data-i18n="nav.maintenance.offline-ui">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Amenity</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                @endif
                                            </li>
                                            <li class="">



                                                @if(collect(session('permissions'))->contains('List coolthing'))



                                                <a class="{{ (request()->is('coolthing_list')) ? 'active' : '' }}" href="{{ route('coolthing.index') }}" data-i18n="nav.maintenance.offline-ui">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Coolthing</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                @endif
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu ">

                                        <a href="javascript:void(0)" data-i18n="nav.user-profile.main">
                                            <span class="pcoded-micon"><i class="ti-user"></i></span>
                                            <span class="pcoded-mtext">Review</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                @if(collect(session('permissions'))->contains('List config review'))


                                                <a class=" {{ (request()->is('review_list')) ? 'active' : '' }}" href="{{ route('review.index') }}" data-i18n="nav.user-profile.timeline">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Review</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                @endif
                                            </li>


                                        </ul>
                                    </li>

                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)" data-i18n="nav.e-commerce.main">
                                            <span class="pcoded-micon"><i class="ti-shopping-cart"></i></span>
                                            <span class="pcoded-mtext">Eco</span>

                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a class="{{ (request()->is('highlight_list')) ? 'active' : '' }}" href="{{ route('highlight.index') }}" data-i18n="nav.e-commerce.product">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Eco Area</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class="">
                                                @if(collect(session('permissions'))->contains('List config charity'))
                                                <a class="{{ (request()->is('charity_list')) ? 'active' : '' }}" href="{{ route('charity.index') }}" data-i18n="nav.e-commerce.product">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"> Charity</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                @endif
                                            </li>


                                        </ul>
                                    </li>


                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)" data-i18n="nav.email.main">
                                            <span class="pcoded-micon"><i class="ti-email"></i></span>
                                            <span class="pcoded-mtext">Status</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                @if(collect(session('permissions'))->contains('List config status'))


                                                <a class=" {{ (request()->is('status_list')) ? 'active' : '' }}" href="{{ route('status.index') }}" data-i18n="nav.email.compose-mail">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Status</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                @endif
                                            </li>
                                            <li class="">
                                                @if(collect(session('permissions'))->contains('List config payment status'))

                                                <a class=" {{ (request()->is('payment_list')) ? 'active' : '' }}" href="{{ route('payment.index') }}" data-i18n="nav.email.inbox">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Payment Status</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                @endif
                                            </li>

                                            <li class="">
                                                @if(collect(session('permissions'))->contains('List config reward status'))

                                                <a class=" {{ (request()->is('reward_list')) ? 'active' : '' }}" href="{{ route('reward.index') }}" data-i18n="nav.email.inbox">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Reward Status</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                @endif
                                            </li>


                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            @endif
                        </ul>
                    </div>
                </nav>





                <!-- Sidebar chat start -->
                <div id="sidebar" class="users p-chat-user showChat">
                    <div class="had-container">
                        <div class="card card_main p-fixed users-main">
                            <div class="user-box">
                                <div class="chat-inner-header">
                                    <div class="back_chatBox">
                                        <div class="right-icon-control">
                                            <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                                            <div class="form-icon">
                                                <i class="icofont icofont-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-friend-list">
                                    <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                                        <a class="media-left" href="#!">
                                            <img class="media-object img-radius img-radius" src="{{ asset('files/assets/images/avatar-3.jpg') }}" alt="Generic placeholder image ">
                                            <div class="live-status bg-success"></div>
                                        </a>
                                        <div class="media-body">
                                            <div class="f-13 chat-header">Josephin Doe</div>
                                        </div>
                                    </div>
                                    <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="Lary Doe">
                                        <a class="media-left" href="#!">
                                            <img class="media-object img-radius" src="{{ asset('files/assets/images/avatar-2.jpg') }}" alt="Generic placeholder image">
                                            <div class="live-status bg-success"></div>
                                        </a>
                                        <div class="media-body">
                                            <div class="f-13 chat-header">Lary Doe</div>
                                        </div>
                                    </div>
                                    <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                                        <a class="media-left" href="#!">
                                            <img class="media-object img-radius" src="{{ asset('files/assets/images/avatar-4.jpg') }}" alt="Generic placeholder image">
                                            <div class="live-status bg-success"></div>
                                        </a>
                                        <div class="media-body">
                                            <div class="f-13 chat-header">Alice</div>
                                        </div>
                                    </div>
                                    <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">
                                        <a class="media-left" href="#!">
                                            <img class="media-object img-radius" src="{{ asset('files/assets/images/avatar-3.jpg') }}" alt="Generic placeholder image">
                                            <div class="live-status bg-success"></div>
                                        </a>
                                        <div class="media-body">
                                            <div class="f-13 chat-header">Alia</div>
                                        </div>
                                    </div>
                                    <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="Suzen">
                                        <a class="media-left" href="#!">
                                            <img class="media-object img-radius" src="{{ asset('files/assets/images/avatar-2.jpg') }}" alt="Generic placeholder image">
                                            <div class="live-status bg-success"></div>
                                        </a>
                                        <div class="media-body">
                                            <div class="f-13 chat-header">Suzen</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar inner chat start-->
                <div class="showChat_inner">
                    <div class="media chat-inner-header">
                        <a class="back_chatBox">
                            <i class="feather icon-chevron-left"></i> Josephin Doe
                        </a>
                    </div>
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!">
                            <img class="media-object img-radius img-radius m-t-5" src="{{ asset('files/assets/images/avatar-3.jpg') }}" alt="Generic placeholder image">
                        </a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                                <p class="chat-time">8:20 a.m.</p>
                            </div>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <div class="media-body chat-menu-reply">
                            <div class="">
                                <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                                <p class="chat-time">8:20 a.m.</p>
                            </div>
                        </div>
                        <div class="media-right photo-table">
                            <a href="#!">
                                <img class="media-object img-radius img-radius m-t-5" src="{{ asset('files/assets/images/avatar-4.jpg') }}" alt="Generic placeholder image">
                            </a>
                        </div>
                    </div>
                    <div class="chat-reply-box p-b-20">
                        <div class="right-icon-control">
                            <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                            <div class="form-icon">
                                <i class="feather icon-navigation"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar inner chat end-->
                <div class="pcoded-wrapper">
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <!-- Main-body start -->
                            <div class="main-body" style="padding-top:70px!important;">

                                @yield('content')


                            </div>
                            <!-- Main-body end -->
                            <div id="styleSelector">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
        to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->





    <script type="text/javascript" src="{{ asset('files/bower_components/jquery/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files/bower_components/popper.js/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('files/bower_components/modernizr/js/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files/bower_components/modernizr/js/css-scrollbars.js') }}"></script>


    <!-- Chart js -->
    <script type="text/javascript" src="{{ asset('files/bower_components/chart.js/js/Chart.js')}}"></script>

    <!-- amchart js -->
    <script src="{{ asset('files\assets\pages\widget\amchart\amcharts.js')}}"></script>
    <script src="{{ asset('files\assets\pages\widget\amchart\serial.js')}}"></script>
    <script src="{{ asset('files\assets\pages\widget\amchart\light.js')}}"></script>
    <script src="{{ asset('files\assets\js\jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- <script type="{{ asset('text/javascript" src="..\files\assets\js\SmoothScroll.js')}}"></script>
    <script src="{{ asset('files\assets\js\pcoded.min.js')}}"></script> -->
    <script type="text/javascript" src="{{ asset('files\assets\pages\dashboard\custom-dashboard.js')}}"></script>


    <link href="{{ asset('files/assets/pages/jquery.filer/css/jquery.filer.css')}}" type="text/css" rel="stylesheet">
    <link href="{{ asset('files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css')}}" type="text/css" rel="stylesheet">
    <!-- jquery file upload js -->
    <script src="{{ asset('files/assets/pages/jquery.filer/js/jquery.filer.min.js')}}"></script>
    <script src="{{ asset('files/assets/pages/filer/custom-filer.js" type="text/javascript')}}"></script>
    <script src="{{ asset('files/assets/pages/filer/jquery.fileuploads.init.js')}}" type="text/javascript"></script>






    <!--  datatable -->

    <!-- fonts -->

    {{-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

<link href="https://innostudio.de/fileuploader/css/font-fileuploader.css" rel="stylesheet">

<!-- styles -->
<link href="{{ asset('dist/jquery.fileuploader.min.css')}}" media="all" rel="stylesheet">

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('dist/jquery.fileuploader.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('dist/fileuploader.js')}}" type="text/javascript"></script> --}}
    {{-- <script src="./js/custom.js" type="text/javascript"></script> --}}




    <script type="text/javascript" src="{{asset('files/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('files/assets/pages/data-table/js/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('files/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('files/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
    <script type="text/javascript" src="{{asset('files/assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('files/assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('files/assets/pages/data-table/extensions/buttons/js/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('files/assets/pages/data-table/extensions/buttons/js/vfs_fonts.js')}}"></script>
    <script type="text/javascript" src="{{asset('files/assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('files/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('files/assets/pages/data-table/extensions/buttons/js/extension-btns-custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('files/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>


    <script type="text/javascript" src="{{ asset('files/bower_components/select2/js/select2.full.min.js') }}"></script>
    <!-- Syntax highlighter prism js -->
    <script type="text/javascript" src="{{ asset('files/assets/pages/prism/custom-prism.js') }}"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{ asset('files/bower_components/i18next/js/i18next.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files/bower_components/jquery-i18next/js/jquery-i18next.min.js') }}"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('files/assets/pages/advance-elements/select2-custom.js') }}"></script>
    <script src="{{ asset('files/assets/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('files/assets/js/menu/menu-hori-fixed.js') }}"></script>
    <script src="{{ asset('files/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files/assets/js/script.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');


        //   $(document).ready(function() {

        // 	// enable fileuploader plugin
        // 	$('input[name="files"]').fileuploader({
        //         limit: 20,
        // 		maxSize: 50,

        // 		addMore: true
        //     });

        // });
    </script>

    <script>
        $(document).ready(function() {
            $('._delete_data').click(function(e) {
                var data_id = $(this).attr('data-id');
                // alert(data_id);
                Swal.fire({
                    title: 'Are you sure to Delete?',
                    // text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    if (result.value) {
                        $(document).find('#delete_from_' + data_id).submit();
                        Swal.fire(
                            'Deleted!',
                            'Your  Record has been deleted.',
                            'success'
                        )
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            'Cancelled',
                            'Your  Record is safe',
                            'error'
                        )
                    }
                })
            });
        });
    </script>


    <script>
        // $('.edit-confirmation').on('click', function (event) {
        //     event.preventDefault();
        //     const url = $(this).attr('href');
        //     swal({
        //         title: "Are you sure to edit?",

        // type: "warning",
        // showCancelButton: true,
        // confirmButtonColor: '#DD6B55',
        // confirmButtonText: 'Yes, I am sure!',
        // cancelButtonText: "No, cancel it!"
        //     }).then(function(value) {
        //         if (value) {
        //             window.location.href = url;
        //         }
        //     });
        // });
        $('.edit-confirmation').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: "Are you sure to edit?",

                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!"
            }).then((result) => {

                if (result.value) {
                    window.location.href = url;

                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Cancelled',
                        'You  Cancelled',
                        'error'
                    )
                }
            })
        });



        // view script
        $('.view-confirmation').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: "Are you sure to View?",

                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!"
            }).then((result) => {

                if (result.value) {
                    window.location.href = url;

                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Cancelled',
                        'You  Cancelled',
                        'error'
                    )
                }
            })
        });
    </script>


    <script>
        $(".errorWrap").each(function() {
            swal("Error", "'" + $(this).text() + "'", 'warning');
            $(this).hide();
        });
    </script>
    <script>
        $(".succWrap").each(function() {

            //         swal(
            //                {
            //                    title: 'Successfully Created!',
            //                    text: 'You clicked the button!',
            //                    type: 'success',
            //                    confirmButtonClass: 'btn btn-confirm mt-2'
            //                }
            //            );
            swal("Success ", "" + $(this).text() + "", 'success');
            $(this).hide();
        });
    </script>
</body>

</html>