@extends('layouts.app')

@section('content')
<div class="container w3-light-gray" style="width: 100%">

<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Healthso</b>.so</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body w3-form w3-border w3-card-8 w3-around-large w3-padding">
    <p class="login-box-msg">Less Time And Efficeient Work</p>

    <form class="form w3-form" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="control-label">E-Mail Address</label>
      <div class="form-group has-feedback">
        <input id="email" type="email" class="form-control" name="email" >
         <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
       
          @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
     
      </div> 
      </div>

      <div class="form-group has-feedback">
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>

        <input id="password" type="password" class="form-control" name="password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        
         @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
      </div> </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   
    <!-- /.social-auth-links -->

    <a href="password/reset">I forgot my password</a><br>
    <a href="register" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
</div>

@endsection

