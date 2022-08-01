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
                <i class="fa fa-user-circle"></i>Size</a>
                </li>
                <li class="@yield('color_select')">
                    <a href="{{url('/admin/color')}}">
                        <i class="fa fa-paint-brush"></i>Colors</a>
                </li>
                <li class="@yield('brand_select')">
                    <a href="{{url('/admin/brand')}}">
                         <i class="fa fa-pause-circle"></i>
                          Brands</a>
                </li>
                <li class="@yield('year_select')">
                    <a href="{{url('/admin/year')}}">
                         <i class="fa fa-pause-circle"></i>
                          Model Year</a>
                </li>
                <li class="@yield('product_select')">
                    <a href="{{url('/admin/product')}}">
                         <i class="fa fa-pause-circle"></i>
                          Products</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Pages</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="register.html">Register</a>
                        </li>
                        <li>
                            <a href="forget-pass.html">Forget Password</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>UI Elements</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="button.html">Button</a>
                        </li>
                        <li>
                            <a href="badge.html">Badges</a>
                        </li>
                        <li>
                            <a href="tab.html">Tabs</a>
                        </li>
                        <li>
                            <a href="card.html">Cards</a>
                        </li>
                        <li>
                            <a href="alert.html">Alerts</a>
                        </li>
                        <li>
                            <a href="progress-bar.html">Progress Bars</a>
                        </li>
                        <li>
                            <a href="modal.html">Modals</a>
                        </li>
                        <li>
                            <a href="switch.html">Switchs</a>
                        </li>
                        <li>
                            <a href="grid.html">Grids</a>
                        </li>
                        <li>
                            <a href="fontawesome.html">Fontawesome Icon</a>
                        </li>
                        <li>
                            <a href="typo.html">Typography</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->