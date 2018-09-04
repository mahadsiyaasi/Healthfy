@extends('layouts.app')
 <?php 
use Healthfy\Http\Controllers\companyController; 
$parent_li = companyController::listside()->parents;
$child_li = companyController::listside()->child;
use Healthfy\Http\Controllers\authController; 
$isDocument = authController::isDocument();
$doctorAuth = authController::authDoctor();

?>
@section('content')
 @if (Auth::check())

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{Route::currentRouteName()}}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">welcome</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
       
        <h1>
          Your Welcome {{$doctor->name}} glad to see you in this greate system
        </h1>
        @if($doctor->visit_amount==null || Auth::user()->city==null || Auth::user()->address==null || $doctor->status_id==6)
        <script type="text/javascript">
          location.href = "/complete?user_id={{Auth::user()->id}}&&doctor_id={{$doctor->id}}"
        </script>
       @endif
       
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
   
  </footer>
    @elseif(Auth::guest())  
      @include('auth.innerlogin')


   @endif
  @endsection