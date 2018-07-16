@extends('layouts.app')

@section('content')
  <style type="text/css">
    .backimage {
       background-image: url("{{ asset('loginV1/images/bg-01.jpg') }}") 
      
    }
  </style>


 <div class="limiter">
 	<div id="progress"></div>
    <div class="container-login100 backimage" id="con">
      <div class=" p-l-55 p-r-55 p-t-65 p-b-54" id="main" style="width: 60%">
                        <span class="login100-form-title p-b-49">
                       <small class="focus-input10"></small> <strong style="color:white">Health .</strong><small class="focus-input10">so</small>
                       <br>
                       <small style="color: pink; font-size: 20px"> <i class="fa fa-plus border badge red"></i></small>
                      </span>


                <div id="register" style="width: 100%" style="border-radius: 2px">
                      <span class="help-block danger-alert" style="color: red" id="error">
                      </span>
      					    <i id="progressButton" class="fa fa-angle-right next"></i>

      					    <div id="inputContainer"style="width:97%">
      					    
      					      <input id="inputField" required  autofocus style="display: none" />
      					       <label id="inputLabel"></label>					      
      					        <select id="selectField" class="form-control from-group" style="border: none;display: none" required autofocus></select>
      					     <div id="inputProgress"></div>
      					    </div>	
                     
                                          
              </div>				          
         <div class="txt1 text-center p-t-54 p-b-20">
                        <span style="color: white">
                          Or Sign Up Using
                        </span>
                      </div>

                      <div class="flex-c-m">
                        <a href="#" class="login100-social-item bg1">
                          <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="login100-social-item bg2">
                          <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="login100-social-item bg3">
                          <i class="fa fa-google"></i>
                        </a>
                      </div>

                      <div class="flex-col-c p-t-155">
                        <span class="txt1 p-b-17" style="color: white">
                          allready I have an account?
                        </span>

                        <a href="{{ url('/login') }}?_token={{ csrf_token() }}" class="txt2">
                          Sign in
                        </a>
                      </div>
                  
      
      </div>
    </div>
  </div>

@endsection