
@include('admin_component.header')
<title>{{ $title }}</title>
@section('year_select','active')
@include('admin_component.sidebar')


<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">
                        
                    </form>
                    <div class="header-button">
                        <div class="noti-wrap">  
                            <p>Add year</p>         
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
                <a href="{{url('/admin/dashboard')}}"><span>Dashboard</span></a> <span> > </span> <a href="{{url('/admin/year')}}"><span>year List</span></a> <span> > </span> <a href="{{url('/admin/year/add_year')}}"><span>Add year</span></a>
               
                <div class="row">
                    <div class="col-lg-2">
                        <button class="btn btn-success mt-3"><a href="{{url('/admin/year')}}" style="color: white;">Back</a></button>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-header">Add year</div>
                            <div class="card-body">
                                <form class="addyear" id="addyear" name="addyear" method="POST" action="javascript:void(0);">
                                    @csrf
                                    <h6 id="responsecheck"> </h6>
                                                           
                                    <div class="form-group">
                                        <label for="year" class="control-label mb-1">year</label>
                                            <input type="text" id="year" name="year" class="form-control">
                                        <h6 id="yearcheck"> </h6>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="coupon_status" class="control-label mb-1">Year Status</label>
                                          <select class="selectpicker form-control col-4" name="year_status" id="year_status">
                                            <option  value="" selected>Select</option>
                                            <option value="1">Status On</option>
                                            <option value="0">Status Off</option>
                                          </select>
                                          
                                        <h6 id="yearstatuscheck"> </h6>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="addyear" name="addyear" class="form-control btn btn-lg btn-info btn-block">Add year</button>  
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
