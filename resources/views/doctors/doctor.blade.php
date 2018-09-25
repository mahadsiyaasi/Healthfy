@extends('layouts.app')

@section('content')
<?php 
use  Healthfy\Http\Controllers\doctorsController; 
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         {{Route::currentRouteName()}}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> doctors</a></li>
        
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

@if(Request::get('new'))
@include("doctors.newdoctor")
@else
@include("doctors.boxviewdoctors")
@endif
   </section>
    <!-- /.content -->
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
   
  </footer>
  @endsection
