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
      <div class="box w3-white" style="padding: 0px 0px 0px 0px; background:inherit;">
        <div class="box-header with-border">
          <div class="dropdown" style="display:inline-block; cursor: pointer;">
          <a class="btndropdown-toggle"  data-toggle="dropdown"><i class="fa fa-bars w3-large"></i> <h3 class="box-title"> List of labs</h3></a>
            <ul class="dropdown-menu w3-card-8 btn-info" >
    <li class="w3-text-white" onclick="filterbody('2')"><a class="w3-text-white"><i class="fa fa-circle"></i>Awaiting Payment</a></li>
  <li class="w3-text-white" onclick="filterbody('3')"><a class="w3-text-white"><i class="fa fa-circle"></i>Lab Queue</a></li>
  <li class="w3-text-white" onclick="filterbody('4')" ><a class="w3-text-white"><i class="fa fa-circle"></i></i>Awaiting Result</a></li>
  <li class="w3-text-white" onclick="filterbody('5')"><a class="w3-text-white"><i class="fa fa-circle"></i></i>Completed</a></li>
    </ul>
</div>
          <a  class="button btn" onclick="filterfn()"><i class="fa fa-filter"> filter</i></a>
          <input type="search" onkeyup="searchtable($(this).attr('id'),'labtable')" id="searchtablein"  name="q-search" class="w3-input" placeholder="search" style="width: 20%; position: relative;display: inline-block;">

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="table-responsive">
<table id="labtable"  class="table table-condensed table-hover table-bordered table-striped" style="width: 100%; height: 100%; display: none; overflow-y: auto">
            <tr class="border w3-border w3-table-bordered">             
              
              <th class="border w3-border  w3-table-bordered">Doctor </th>
              <th class="border w3-border w3-table-bordered">patient</th>
              <th class="border w3-border w3-table-bordered">Amount</th>
              <th  class="text-center">Action & Status </th>
              </tr>
            <tbody id="lbredefine" class="w3-text-black w3-text-bold" style="">
                 <?php $last =0; 
                  $detail_id = 0;
                  $patient_check = 0;
                 ?>
                @foreach($ordertest as $vals)
                  @if($last != $vals['master_id'])
                     <tr>
                        <td class="w3-light-gray active"> Lab Dr : <span class="badge blue">  {{ $vals['doctor_name'] }} </span><a class="btn"><i class="fa fa-eye"></i> Detail</a></td>
                        <td class="w3-light-gray active"> Patient : <span class="badge w3-blue">{{ $vals['patient_name'] }}</span> <a class="btn"><i class="fa fa-eye"></i> Detail</a> </td>
                        <td class="w3-light-gray active">Total :  <span class="badge w3-green">$ {{ $vals['total_amount'] }} </span></td>
                        <td class="text-center w3-light-gray active maintrgentd" tagid="{{$vals['master_id']}}"   status_id="{{$vals['master_status_id']}}" status_name="{{$vals['master_status']}}" tagpaient_id="{{$vals['patient_id']}}"></td>
                    </tr>
                 
                <?php $last = $vals['master_id']; 
                  $patient_check = $vals['patient_id']
                ?>
                 @endif
                <?php $detail_id = $vals['id']; ?>
                @foreach($ordertest as $val)
                @if($val['test_order_id'] == $vals['master_id'] && $detail_id == $val['id'] )
                <tr>
                 
                  <td> {{ $val['testname'] }}</td>
                  <td><a href="/patients/{{$val['patient_id']}}"> {{ $val['patient_name'] }}</a> </td>
                  <td> ${{ $val['amount'] }} </td>
                  <td class="gentd text-center" tagid="{{$val['id']}}"   status_id="{{$val['detail_status_id']}}" status_name="{{$val['detail_status']}}" tagpaient_id="{{$val['patient_id']}}"> 

                    
                    

                  </td>
                 
                </tr>

                @endif
                
                 @endforeach
                 @endforeach
              </tbody>

             <tfoot class="main-footer">
              <tr>
       <td colspan="3">
        <ul class="pagination pagination-lg pager pull-left" id="pagetablepage" style="display: inline-block;top: -25px; position: relative;"></ul>
       
       <td>
        <div  style="display: inline-block;" class="pull-right">
        <p id="tablepagecounter">Showing 1 of  <?php echo count($ordertest); ?> rows </p>
        </div>
         </td>  
        </tr>    
        </tfoot>
       </table>
        <table class="table w3-table-bordered" id="testtab"></table>  
      </div>
      </div>  



     
    </section>
  </div>
  </section>
</div>

  @endsection