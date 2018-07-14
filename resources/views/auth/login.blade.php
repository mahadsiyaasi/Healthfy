@extends('layouts.app')
<title>@yield('title', 'Login | Health')</title>
@section('content')
@if(Auth::guest())  
      @include('auth.innerlogin')
   @endif

@endsection

