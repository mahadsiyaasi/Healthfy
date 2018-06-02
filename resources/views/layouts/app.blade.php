<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('webicon/cropped.png') }}" type="image/gif" sizes="16x16">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(Auth::check()) @yield('title', Route::currentRouteName())  @endif</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">   
    <style type="text/css">
      html {
    overflow-x: hidden;
}
@font-face {
         font-family: 'ChunkFiveRegular';
         src: url('Chunkfive-webfont.eot');
         src: url('Chunkfive-webfont.eot?#iefix') format('embedded-opentype'),
         url('Chunkfive-webfont.woff') format('woff'),
         url('Chunkfive-webfont.ttf') format('truetype'),
         url('Chunkfive-webfont.svg#ChunkFiveRegular') format('svg');
         font-weight: normal;
         font-style: normal;
}
.allback {
    background: #910a76 !important;
}
.mafont {
  color: #910a76 !important;
}
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div id="app">
        <div class="wrapper">
   
     @if (Auth::guest())  
      
    @elseif (Auth::check())
  <header class="main-header">

    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Healthso</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" id="togglemenu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    
   
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
                    <!-- Notifications: style can be found in dropdown.less -->
                    <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('dist/img/avatar.png')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
      <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>

    </nav>

  </header>

 @include("aside.aside")
 @include("confirm.confirm")
 <div  class="specialmodal">
   
 </div>
  @endif


  @yield('content')
  </div>
</div>
 <script src="{{ asset('js/app.js') }}"></script>
   @push('scripts')   
    <script src="{{ asset('js/all.js') }}"></script>   
   <script>
  $(document).ready(function () {
      populateCountries("nationality", "city");     
      $('.sidebar-menu').tree();
      $('.selectpicker').selectpicker();
     })
    
</script>

@endpush
 @if (Auth::check())
@stack('scripts')
@endif
<script type="text/javascript">
  //$(".wrapper").css("background","#B03060")
  //$(".skin-blue .main-header .logo").css("background","#B03060")
  //$(".main-header .logo").css("background","#B03060")
 // $(".logo").css("background","#B03060")
  //$(".navbar").css("background","#B03060")
  
  
</script>
</body>
</html>



