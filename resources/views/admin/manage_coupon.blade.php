
@include('admin_component.header')
<title>{{ $title }}</title>
@include('admin_component.sidebar')


<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">
                        {{-- <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                        <button class="au-btn--submit" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button> --}}
                    </form>
                    <div class="header-button">
                        <div class="noti-wrap">  
                            <p>Manage Coupon</p>         
                        </div>
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                               
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{Session('username')}}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="{{url('/admin/logout')}}">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER DESKTOP-->

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <a href="{{url('/admin/dashboard')}}"><span>Dashboard</span></a> <span> > </span> <a href="{{url('/admin/coupon')}}"><span>Coupon List</span></a> <span> > </span> <a href="{{url('/admin/coupon/add_coupon')}}"><span>Manage Coupon</span></a>
               
                <div class="row">
                    <div class="col-lg-2">
                        <button class="btn btn-success mt-3"><a href="{{url('/admin/coupon')}}" style="color: white;">Back</a></button>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-header">Add Coupon</div>
                            <div class="card-body">
                                <form class="addcoupon" id="addcoupon" name="addcoupon" method="POST" action="javascript:void(0);">
                                    @csrf
                                    <h6 id="responsecheck"> </h6>
                                                           
                                    <div class="form-group">
                                        <label for="coupon_name" class="control-label mb-1">Coupon Name</label>
                                        <input type="text" id="coupon_name" name="coupon_name"  class="au-input au-input--full">
                                        <h6 id="couponnamecheck"> </h6>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="coupon_code" class="control-label mb-1">Coupon Code</label>
                                        <input type="text" id="coupon_code" name="coupon_code" type="text" class="au-input au-input--full">
                                        <h6 id="coupon_codecheck"> </h6>
                                    </div>
                                    <div class="form-group">
                                        <label for="coupon_value" class="control-label mb-1">Coupon Value</label>
                                        <input type="text" id="coupon_value" name="coupon_value" type="text" class="au-input au-input--full">
                                        <h6 id="coupon_valuecheck"> </h6>
                                    </div>
                                    <div class="form-group">
                                        <label for="coupon_status" class="control-label mb-1">Coupon Status</label>
                                        {{-- <input type="text" id="coupon_code" name="coupon_code" type="text" class="au-input au-input--full"> --}}
                                        <select class="selectpicker form-control col-4" name="coupon_status" id="coupon_status">
                                            <option  value="" selected>Select</option>
                                            <option value="1">Status On</option>
                                            <option value="0">Status Off</option>
                                          </select>
                                          
                                        <h6 id="couponstatuscheck"> </h6>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="addcoupon" name="addcoupon" class="form-control btn btn-lg btn-info btn-block">Add Coupon</button>  
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
             
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>

@include('admin_component.footer')
