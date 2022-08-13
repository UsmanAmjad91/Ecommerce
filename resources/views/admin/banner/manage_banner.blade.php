
@include('admin_component.header')
<title>{{ $title }}</title>
@section('banner','active')
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
                            <p>Add banner</p>         
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
                <a href="{{url('/admin/dashboard')}}"><span>Dashboard</span></a> <span> > </span> <a href="{{url('/admin/banner')}}"><span>banner List</span></a> <span> > </span> <a href="{{url('/admin/banner/add_banner')}}"><span>Add banner</span></a>
               
                <div class="row">
                    <div class="col-lg-2">
                        <button class="btn btn-success mt-3"><a href="{{url('/admin/banner')}}" style="color: white;">Back</a></button>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-header">Add Banner</div>
                            <div class="card-body">
                                <form class="add_banner" id="addbanner" name="addbanner" method="POST" action="javascript:void(0);" enctype="multipart/form-data>
                               
                               @csrf
                                    <h6 id="responsecheck"> </h6>
                                <div class="form-group">
                                    <label for="button_text" class="control-label mb-1">Button text</label>
                                        <input type="text" id="button_text" name="button_text" class="form-control">
                                    <h6 id="buttontextcheck"> </h6>
                                </div>
                                <div class="form-group">
                                    <label for="button_link" class="control-label mb-1">Button link</label>
                                        <input type="text" id="button_link" name="button_link" class="form-control">
                                    <h6 id="buttonlinkcheck"> </h6>
                                </div>
                                <div class="row col-lg-12">
                                <div class="form-group col-6 justify-content-start">
                                    <label for="banner_image1" class="control-label mb-1"><i
                                            class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                                    <input type="file" id="banner_image1" name="banner_image1" hidden>
                                    <h6 id="img1check"> </h6>
                                </div>                    
                                <div class="form-group col-6 justify-content-end">
                                    <label for="banner_image" class="control-label mb-1"><i
                                            class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                                    <input type="file" id="banner_image" name="banner_image" hidden>
                                    <h6 id="imgcheck"> </h6>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label for="coupon_status" class="control-label mb-1">banner Status</label>
                                      <select class="selectpicker form-control col-4" name="banner_status" id="banner_status">
                                        <option  value="" selected>Select</option>
                                        <option value="1">Status On</option>
                                        <option value="0">Status Off</option>
                                      </select>
                                      
                                    <h6 id="bannerstatuscheck"> </h6>
                                </div>
                                 {{-- <div class="row">
                                        <div class="form-group">
                                            <label for="is_home" class="control-label mb-1 ml-3">Is Home Show</label>
                                            <input type="checkbox" id="is_home" name="is_home" class="ml-3">
                                        </div>
                                     </div> --}}
                                <div class="form-group">
                                    <button type="submit" id="addbanner" name="addbanner" class="form-control btn btn-lg btn-info btn-block">Add banner</button>  
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
