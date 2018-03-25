@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        patients
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> patients</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @if(Request::get('new'))

  @include("patients.newpatient")
  @else
@include("patients.boxviewpatient")
@endif


    
  <!-- /.content-wrapper -->



  
</section>
    <!-- /.content -->
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
   
  </footer>
  @endsection
