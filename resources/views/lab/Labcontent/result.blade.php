@extends('layouts.app')

@section('content')
<?php 
    use App\http\Controllers\labController;
 ?>
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
        <div class="table-responsive" style="overflow-x: hidden;">
            <table id="labtable"  class="table  table-hover table-bordered table-striped">
         
            <tbody class="" style="position: relative;width: 100%">
                 <?php $last =0; 
                  $detail_id = 0;
                  $patient_check = 0;
                 ?>
                @foreach($Result as $vals)
                  @if($last != $vals['master_id'])
                     <tr>
                        <td class="w3-light-gray active"> Lab Dr : <span class="badge blue">  {{ $vals['doctor_name'] }} </span><a class="btn"><i class="fa fa-eye"></i> Detail</a></td>
                        <td class="w3-light-gray active"> Patient : <span class="badge w3-blue">{{ $vals['patient_name'] }}</span> <a class="btn"><i class="fa fa-eye"></i> Detail</a> </td>
                        <td class="w3-light-gray active">Due to date :  <span class="badge w3-green"> {{ $vals['date'] }} </span></td>
                        <td> Order # ID <span class="badge w3-black w3-text-white"> {{ $vals['master_id'] }} </span></td>
                    </tr>
                 
                <?php $last = $vals['master_id']; 
                  $patient_check = $vals['patient_id']
                ?>
                 @endif
                <?php $detail_id = $vals['id']; ?>
                @foreach($Result as $val)
                @if($val['test_order_id'] == $vals['master_id'] && $detail_id == $val['id'] )
                <?php $unitAndRange = labController::getRangeAndUnit($val['test_id']) ?>
                  <tr>                 
                  <td> {{ $val['testname'] }}</td>
                  <td><input type="text" class="form-control" name="result" placeholder="Entry result"> </td>
                  <td> <select class="form-control">@foreach($unitAndRange->ranges as $range)<option value="{{$range->min}} - {{$range->max}}">{{$range->min}} - {{$range->max}}</option>@endforeach</select></td>
                  <td> <select class="form-control">@foreach($unitAndRange->units as $unit)<option value="{{$unit->unit}}">{{$unit->unit}}</option>@endforeach</select></td>                 
                </tr>
                @endif                
                 @endforeach
                 @endforeach
              </tbody>
             <tfoot class="main-footer">
              <tr>
                <td colspan="3">
           
               <textarea class="form-control w3-input w3-text-blue w3-border" name="note" placeholder="extra info" style="resize: none;"></textarea>
            
           </td>
           <td class="=text-center  w3-text-white">
             <button class=" btn button text-center w3-green" type="button" id="saveresult" style="width: 100%; background: inherit; height: 100%; margin-bottom: -30px">Save result</button>
           </td>
   </tr>
  </tfoot>
  </table>
  </div>
  </div>
  </div>
  </section>
</div>
@endsection






