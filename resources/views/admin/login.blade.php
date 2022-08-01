<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('admin_assets/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="{{asset('admin_assets/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">                          
                            
                            <a href="{{url('admin')}}">
                                {{config('constants.name')}}
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                          @if (session()->has('logout'))
                          <p class="ml-3 text-sm font-bold text-green-600" id="catmsg">{{ session()->get('logout') }}</p>
                          @endif
                          <h6 id="responseeditcheck"></h6>
                            </div>
                          </div>
                        <div class="login-form">
                            <form class="login" id="login" method="POST" action="javascript:void(0);">
                                @csrf
                                <h6 id="rescheck"></h6>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" id="email" name="email" placeholder="Email">
                                    <h6 id="emailcheck"></h6>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" id="password" name="password" placeholder="Password">
                                    <h6 id="passwordcheck"></h6>
                                </div>
                                <div class="form-group">     
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" id="submit" name="submit" type="submit">sign in</button>
                                
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
   
    <script src="{{asset('admin_assets/js/jquery.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/animsition/animsition.min.js')}}"></script>
    {{-- <script src="{{asset('admin_assets/vendor/jquery-3.2.1.min.js')}}"></script> --}}
    <!-- Bootstrap JS-->
     <script src="{{asset('admin_assets/vendor/bootstrap-4.1/popper.min.js')}}"></script> 
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin_assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Vendor JS       -->

    <!-- Main JS-->
    <script src="{{asset('admin_assets/js/main.js')}}"></script>
    <script src="{{asset('admin_assets/jquery/custom.js')}}"></script>
</body>

</html>
<!-- end document-->