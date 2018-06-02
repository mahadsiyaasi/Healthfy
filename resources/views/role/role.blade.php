@extends('layouts.app')

@section('content')
<?php 
    use App\http\Controllers\roleController;
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{Route::currentRouteName()}}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Lab > Editor</a></li>
       </ol>
    </section>

    <!-- Main content -->

    
    <section class="content">

      <!-- Default box -->
      <div class="box w3-white" style="padding: 0px 0px 0px 0px; background:inherit;">
        <div class="box-header with-border">
      
        <a  class="button btn" href="/role"><strong>Roles</strong></a>
        <a  class="button btn" href="/role?type=new_role"><i class="fa fa-plus"> add</i></a>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" ><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" onclick="location.href='/'" data-toggle="tooltip">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="table-responsive" style="">
          <div class="errorController">
            @if(Request::get("type"))
            <div class="warner">
              @include('role.content.addrole')
            </div>
            
            @else
            <table id="role_table"></table>

            @endif
          
  </div>
</div>
  </div>
 </div>
</section>

</div>

@endsection






