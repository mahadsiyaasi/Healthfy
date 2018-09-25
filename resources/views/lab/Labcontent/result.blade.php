@extends('layouts.app')

@section('content')
<?php 
    use  Healthfy\http\Controllers\labController;
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
      
         Editor

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" onclick="location.href='/lab'" data-toggle="tooltip" title="Remove" >
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="table-responsive" style="">
          <div class="errorController">
            <div class="warner">
              
            </div>
          @if(Request::get('type')=='OrderMaster')
            <table id="resultentrytable"  class="table  table-hover table-bordered table-striped">
         
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
                  <td style="display: none;"> <input type="hidden" name="detail_id[]" value="{{ $val['id'] }}"></td>
                  <td style="display: none;"> <input type="hidden" name="master_id[]" value="{{ $val['test_order_id'] }}"></td>
                  <td><input type="text" class="form-control" name="resultinput[]" placeholder="Entry result"> </td>
                  <td> <select class="form-control" name="range[]">@foreach($unitAndRange->ranges as $range)<option value="{{$range->min}} - {{$range->max}}">{{$range->min}} - {{$range->max}}</option>@endforeach</select></td>
                  <td> <select class="form-control" name="units[]">@foreach($unitAndRange->units as $unit)<option value="{{$unit->unit}}">{{$unit->unit}}</option>@endforeach</select></td>                 
                </tr>
                @endif                
                 @endforeach
                 @endforeach
              </tbody>
             <tfoot class="main-footer">
              <tr>
                <td colspan="3">
           
               <textarea class="w3-input w3-text-blue w3-border" name="noteResult" placeholder="extra info" style="resize: none;"></textarea>
            
           </td>
           <td class="=text-center  w3-text-white">
             <button class=" btn button text-center w3-green" type="button" id="saveresult" style="width: 100%; background: inherit; height: 100%; margin-bottom: -30px" onclick="saveresult(this)">Save result</button>
           </td>
   </tr>
  </tfoot>
  </table>
  @elseif(Request::get('type')=='SeeResult')
     <table id="resultentrytable"  class="table  table-hover">
         
            <tbody class="" style="position: relative;width: 100%">
                 <?php $last =0; 
                  $detail_id = 0;
                  $patient_check = 0;
                 ?>
                @foreach($Result as $vals)
                  @if($last != $vals['master_id'])
                     <tr class="allback">
                      
                        <td class="w3-text-white" colspan="3"> Patient : <span class="badge w3-red">{{ $vals['patient_name'] }}</span> <a class="btn"></a> </td>
                       
                        <td class="w3-text-white text-right">Done due to date  <span class="badge w3-black w3-text-white">{{ $vals['date'] }} </span></td>
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
                  <td>{{ $val['result'] }}</td>
                  <td>{{ $val['ranges'] }}</td>  
                  <td class="text-center">{{ $val['units'] }}</td>                
                </tr>
                @endif                
                 @endforeach
                 @endforeach
              </tbody>
             <tfoot class="main-footer">
              <tr class="allback">
                <td colspan="3">
                      <p class="w3-text-white">{{$Result[0]->note}}</p>
              
            
           </td>
           <td class="= text-right  w3-text-white">
             <span class="w3-text-white pull-right"><p>Priscriped By  <strong> {{$Result[0]->doctor_name}}</strong></p></span>
           </td>
   </tr>
  </tfoot>
  </table>

  @endif
  </div>
</div>
  </div>
 </div>
</section>

</div>

@endsection






