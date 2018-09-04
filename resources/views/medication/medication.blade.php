@extends('layouts.app')

@section('content')
<?php 
use Healthfy\Http\Controllers\doctorsController; 
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{Route::currentRouteName()}}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Medication</a></li>
        
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

                
@if(Request::get('new')=="true")
@include("medication.content.newmedication")
@elseif(Request::get('update'))
@include("medication.content.newmedication")
@else
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Medication Lists</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="medication_table" data-filter="#filter">
                            
                                
          </table>
                       
                     
  </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>


        

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
