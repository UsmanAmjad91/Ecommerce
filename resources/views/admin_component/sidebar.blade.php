<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{asset('admin_assets/images/icon/logo.png')}}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="@yield('dashboard_select')">
                    <a class="nav_link" href="{{url('/admin/dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>    
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
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->