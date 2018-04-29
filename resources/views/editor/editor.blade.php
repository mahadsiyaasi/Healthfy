@extends('layouts.app')

@section('content')
<?php 
use App\Http\Controllers\doctorsController; 
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{Route::currentRouteName()}}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Editor</a></li>
        
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

                
@if(Request::get('table')=='Test')
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{Request::get('table')}}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="test-grid" data-filter="#filter">
                                <thead>
                                    <tr>
                                      <th class="w3-small">test id</th>
                                        <th class="w3-small">test name</th>
                                        <th class="w3-small">substance tested</th>
                                        <th class="w3-small">type</th>
                                        <th class="w3-small">sub of</th>

                                    </tr>
                                </thead>
                                
                            </table>
                       
                     
  </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>

@elseif(Request::get('patient'))
@include("patients.newpatient")
@elseif(Request::get('doctor'))
@include("doctors.newdoctor")
@else
                 
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{Request::get('table')}}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table class="tabledata table table-striped table-bordered table-hover" id="{{Request::get('table')}}">
            
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->


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
