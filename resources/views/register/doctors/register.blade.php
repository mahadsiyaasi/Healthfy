@extends('layouts.app')
@section('content')
<?php 
use App\Http\Controllers\doctorsController; 
?>
@section('content')
  <style type="text/css">
    .backimage {
       background-image: url("{{ asset('loginV1/images/bg-01.jpg') }}") 
      
    }
  </style>


 <div class="limiter">
 	<div id="progress"></div>
    <div class="container-login100 backimage" id="con">
      <div class=" p-l-55 p-r-55 p-t-65 p-b-54" id="main" style="width: 40%">
                        <span class="login100-form-title p-b-49">
                       <small class="focus-input10"></small> <strong style="color:white">Health .</strong><small class="focus-input10">so</small>
                       <br>
                       <small style="color: pink; font-size: 20px"> <i class="fa fa-plus border badge red"></i></small>
                      </span>


                <div id="register" style="width: 100%" style="border-radius: 2px">
                           <form class="login100-form validate-form" role="form"  method="POST" action="{{ url('/saveOutDoctor') }}">
                      {{ csrf_field() }}
                      @if(Request::get("user_id"))
                      <input type="hidden" name="user_id" value="{{Request::get('user_id')}}">
                      <input type="hidden" name="doctor_id" value="{{Request::get('doctor_id')}}">
                      @endif
                      
                     <h1 style="color: black">Register now and save with your experiance</h1>
                     
                        @if(Request::get("_token"))
                              <div class="wrap-input100 validate-input m-b-23 {{ $errors->has('fullname') ? ' has-error' : '' }}" data-validate = "full name is reauired">
                             
                                <input class="input100" value="{{ old('fullname') }}" type="text" name="fullname" placeholder="Type your fullname">
                                <span class="focus-input100 large" data-symbol="&#xf206;"></span>
                                 
                              </div>
                               @if ($errors->has('fullname'))
                                                        <span class="help-block danger-alert" style="color: red">
                                                           {{ $errors->first('fullname') }}
                                                        </span>
                                                    @endif







                               <div class="wrap-input100 validate-input m-b-23 {{ $errors->has('phone') ? ' has-error' : '' }}" data-validate = "phone name is reauired">
                              
                                <input class="input100" type="text" value="{{ old('phone') }}" name="phone" placeholder="Type your phone">
                                <span class="focus-input100 large glyphicon glyphicon-phone " data-symbol="&#9742;"></span>
                                 
                              </div>
                              @if ($errors->has('phone'))
                                                        <span class="help-block danger-alert" style="color: red">
                                                           {{ $errors->first('phone') }}
                                                        </span>
                                                    @endif



                                
                              <div class="wrap-input100 validate-input {{ $errors->has('email') ? ' has-error' : '' }}" data-validate="email is required">
                                
                                <input class="input100" type="email" value="{{ old('email') }}" name="email" placeholder="Type your email">
                                <span class="focus-input100" data-symbol="&#x2709;"></span>
                               
                              
                              </div>
                                @if ($errors->has('email'))
                                                      <span class="help-block danger-alert" style="color: red">
                                                           {{ $errors->first('email') }}
                                                        </span>
                                                    @endif
                            

                              <div class="text-right p-t-8 p-b-31">
                                <a href="#">
                               
                                </a>
                              </div>
                               @elseif(Request::get("email") && Request::get("email"))





                                <div class="wrap-input100 validate-input m-b-23 {{ $errors->has('speiality') ? ' has-error' : '' }}" data-validate = "speiality name is reauired">
                            
                                <select class="input100" type="text"  name="speciality" style="border: none;" {{ old('speiality') }}>
                                  <option value="-1" selected disabled> Select Speciality</option>
                                   @foreach(doctorsController::loadspeciality() as $val)
                                  <option value="{{$val->status_name}}">{{$val->status_name}}</option>
                                  @endforeach                                  
                                </select>                         
                                 
                              </div>
                                @if ($errors->has('speiality'))
                                                        <span class="help-block danger-alert" style="color: red">
                                                           {{ $errors->first('speiality') }}
                                                        </span>
                                                    @endif



                               <div class="wrap-input100 validate-input m-b-23 {{ $errors->has('degree') ? ' has-error' : '' }}" data-validate = "degree name is reauired">
                             
                                                    
                                <select class="input100" type="text" name="degree" style="border: none;" value="{{ old('degree') }}" {{ old('degree') }}>
                                  <option value="-1" selected disabled> Select Degree . . </option>
                                   @foreach(doctorsController::loaddegrees() as $val)
                                  <option value="{{$val->name}}">{{$val->name}}</option>
                                  @endforeach                                  
                                </select>
                                
                                 
                              </div> @if ($errors->has('degree'))
                                                        <span class="help-block danger-alert" style="color: red">
                                                           {{ $errors->first('degree') }}
                                                        </span>
                             @endif




                                
                              <div class="wrap-input100 validate-input {{ $errors->has('gender') ? ' has-error' : '' }}" data-validate="gender is required">
                                @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            {{ $errors->first('gender') }}
                                                        </span>
                                                    @endif
                                <select class="input100" type="text" name="gender" style="border: none;" value="{{ old('gender') }}">
                                  <option value="-1" selected disabled> Select Gender</option>
                                  
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                                 
                              </div>
                              
                              <div class="text-right p-t-8 p-b-31">
                                <a href="#">
                               
                                </a>
                              </div>
                               @elseif(Request::get("country"))
                      <div class="wrap-input100 validate-input {{ $errors->has('password') ? ' has-error' : '' }}"  data-validate="Password is required" required>                  
                        <input class="input100" type="password" name="password" value="{{ old('password') }}" placeholder="Type your password" required >
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                         
                      </div>@if ($errors->has('password'))
                                                <span class="help-block">
                                                    {{ $errors->first('password') }}
                                                </span>
                                            @endif    



                     

                      <div class="wrap-input100 validate-input {{ $errors->has('cpassword') ? ' has-error' : '' }}" data-validate=" confirm Password is required">
                        <input class="input100" type="password" name="cpassword" value="{{ old('cpassword') }}" placeholder="Type your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                         
                      </div>
                        @if ($errors->has('password'))
                                                <span class="help-block">
                                                    {{ $errors->first('password') }}
                                                </span>
                                            @endif
                      

                           
                                             <div class="text-right p-t-8 p-b-31">
                                <a href="#">
                               
                                </a>
                              </div>
                               @elseif(Request::get("speciality"))
                      <div class="wrap-input100 validate-input {{ $errors->has('country') ? ' has-error' : '' }}"  data-validate="country is required" required>                  
                        <select class="input100" type="password" id="country" name="country" value="{{ old('password') }}" placeholder="Type your country" required pattern="[a-z0-9]{8,}" style="border: none"></select>
                      
                         
                      </div>@if ($errors->has('country'))
                                                 <span class="help-block danger-alert" style="color: red">
                                                    {{ $errors->first('country') }}
                                                </span>
                                            @endif    



                     

                      <div class="wrap-input100 validate-input {{ $errors->has('city') ? ' has-error' : '' }}" data-validate=" confirm city is required">
                        <select class="input100" type="text" id="city" name="city" value="{{ old('city') }}" placeholder="Type your city" pattern="[a-z0-9]{8,}" style="border: none"></select>
                      
                         
                      </div>
                        @if ($errors->has('city'))
                                                <span class="help-block">
                                                    {{ $errors->first('city') }}
                                                </span>
                                            @endif




                                             <div class="wrap-input100 validate-input {{ $errors->has('address') ? ' has-error' : '' }}" data-validate=" confirm address is required">
                        <input  class="input100" type="text" name="address" value="{{ old('city') }}" placeholder="Type your address">                     
                         
                      </div>
                        @if ($errors->has('address'))
                                                <span class="help-block">
                                                    {{ $errors->first('address') }}
                                                </span>
                                            @endif
                      

                                             <div class="text-right p-t-8 p-b-31">
                                <a href="#">
                               
                                </a>
                              </div>

                   @endif
                              <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                  <div class="login100-form-bgbtn"></div>
                                  <button class="login100-form-btn" type="submit">
                                    signup
                                  </button>
                                </div>
                              </div>

                  

                      
                    
        </form>
                     
                                          
              </div>				          
         <div class="txt1 text-center p-t-54 p-b-20">
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