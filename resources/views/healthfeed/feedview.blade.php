@extends('layouts.app')

@section('content')
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
      <div class="box" style="padding: 0px 0px 0px 0px; background:inherit;">

        <div class="box-body">
        <div class="table-responsive" style="overflow-x: hidden;">
          @if(Request::get("new")==true)


          @include('healthfeed.newfeed')





          @else



        <table class="table w3-table-bordered" id="testtab"></table>  

        @endif
      </div>
      </div>  
  </section>
  </div>
  </section>
  
</div>

  @endsection



