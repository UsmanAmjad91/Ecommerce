
@include('admin_component.header')
<title>{{ $title }}</title>
@section('brand_select','active')
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
                            <p>Add brand</p>         
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
                <a href="{{url('/admin/dashboard')}}"><span>Dashboard</span></a> <span> > </span> <a href="{{url('/admin/brand')}}"><span>brand List</span></a> <span> > </span> <a href="{{url('/admin/brand/add_brand')}}"><span>Add brand</span></a>
               
                <div class="row">
                    <div class="col-lg-2">
                        <button class="btn btn-success mt-3"><a href="{{url('/admin/brand')}}" style="color: white;">Back</a></button>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-header">Add Brand</div>
                            <div class="card-body">
                                <form class="addbrand" id="addbrand" name="addbrand" method="POST" action="javascript:void(0);"  enctype="multipart/form-data">
                                    @csrf
                                    <h6 id="responsecheck"> </h6>
                                                           
                                    <div class="form-group">
                                        <label for="brand" class="control-label mb-1">Brand</label>
                                            <input type="text" id="brand" name="brand" class="form-control">
                                        <h6 id="brandcheck"> </h6>
                                    </div>
                                    
                                    <div class="form-group col-1 justify-content-end">
                                        <label for="brand_image" class="control-label mb-1"><i
                                                class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                                        <input type="file" id="brand_image" name="brand_image" hidden>
                                        <h6 id="imgcheck"> </h6>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="coupon_status" class="control-label mb-1">Brand Status</label>
                                          <select class="selectpicker form-control col-4" name="brand_status" id="brand_status">
                                            <option  value="" selected>Select</option>
                                            <option value="1">Status On</option>
                                            <option value="0">Status Off</option>
                                          </select>
                                          
                                        <h6 id="brandstatuscheck"> </h6>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="addbrand" name="addbrand" class="form-control btn btn-lg btn-info btn-block">Add Brand</button>  
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
