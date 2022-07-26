<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="cache-control" content="no-cache" />
     <meta http-equiv="Pragma" content="no-cache" />
     <meta http-equiv="Expires" content="-1" />
    <!-- Title Page-->
    {{-- <title>@yield('Page_title')</title> --}}

    <!-- Fontfaces CSS-->
    <link href="{{asset('admin_assets/css/font-face.css')}}" rel="stylesheet" media="all">
   <link href="{{asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
   <link href="{{asset('admin_assets/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all"> 

    <!-- Main CSS-->
    <link href="{{asset('admin_assets/css/theme.css')}}" rel="stylesheet" media="all">
 <!-- Datatables CSS CDN -->
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
 {{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script> --}}
 <script src="{{asset('ckeditor/ckeditor.js')}}"></script>


</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{url('admin/dashboard')}}">
                            <img src="{{asset('admin_assets/images/icon/logo.png')}}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="@yield('dashboard_select')">
                            <a  href="{{url('/admin/dashboard')}}">
                                <i class="fas fa-tachometer-alt "></i>Dashboard</a>
                        </li>
                        <li class="@yield('category_select')">
                            <a href="{{url('/admin/category')}}">
                                <i class="fa fa-list"></i>Category</a>
                        </li>
                        <li class="@yield('coupon_select')">
                            <a href="{{url('/admin/coupon')}}">
                                <i class="fa fa-tags"></i>Coupons</a>
                        </li>
                        <li class="@yield('size_select')">
                            <a href="{{url('/admin/size')}}">
                                <i class="fa fa-object-group"></i>Size</a>
                        </li>
                        <li class="@yield('color_select')">
                            <a href="{{url('/admin/color')}}">
                                <i class="fa fa-paint-brush"></i>Colors</a>
                        </li>
                        <li class="@yield('brand_select')">
                            <a href="{{url('/admin/brand')}}">
                                 <i class="fa fa-building"></i>
                                  Brands</a>
                        </li>
                        <li class="@yield('year_select')">
                            <a href="{{url('/admin/year')}}">
                                 <i class="fa fa-calendar"></i>
                                  Model Year</a>
                        </li>
                        <li class="@yield('tax')">
                            <a href="{{url('/admin/tax')}}">
                                 <i class="fa fa-file-text"></i> 
                                  Tax</a>
                        </li>
                        <li class="@yield('product_select')">
                            <a href="{{url('/admin/product')}}">
                                <i class="fa fa-cart-plus"></i>
                                  Products</a>
                        </li>
                        <li class="@yield('product_edit')">
                            <a href="{{url('/admin/product/editproduct')}}">
                                 <i class="fa fa-pencil-square-o"></i> 
                                  Products Edit</a>
                        </li>
                        <li class="@yield('product_attr')">
                            <a href="{{url('/admin/product/p_attr')}}">
                                 <i class="fa fa-pencil-square-o"></i> 
                                  Products Attributes</a>
                        </li>
                        <li class="@yield('banner')">
                            <a href="{{url('/admin/banner')}}">
                                <i class="fa fa-camera" aria-hidden="true"></i> 
                                  Banner</a>
                        </li>
                        <li class="@yield('customer')">
                            <a href="{{url('/admin/customer')}}">
                                 <i class="fa fa-users"></i> 
                                  Customers</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->
        