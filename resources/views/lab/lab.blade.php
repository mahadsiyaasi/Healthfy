@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home
        
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
          <input type="search"  name="q-search" class="w3-input" placeholder="search" style="width: 20%; position: relative;display: inline-block;">

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table  class="w3-table table table-stripped border  card">
            <thead>
             
              <tr>
              <th >Doctor</th>
              <th>patient</th>
              <th>Amount</th>
              <th  class="text-center">Action & Status </th>
              </tr>
            </thead>
              <tbody id="lbredefine">
                 <?php $last =""; 
                  $detail_id = 0;
                 ?>
                @foreach($ordertest as $vals)
                  @if($last != $vals['doctor_name'])
                     <tr>
                        <td class="w3-light-gray active"> Lab Dr : <span class="badge blue">  {{ $vals['doctor_name'] }} </span> </td>
                        <td class="w3-light-gray active"> Patient : <span class="badge w3-blue">{{ $vals['patient_name'] }}</span> </td>
                        <td class="w3-light-gray active">Total :  <span class="badge w3-green">$ {{ $vals['total_amount'] }} </span></td>
                        <td class="text-center w3-light-gray active"> Status <span class="badge w3-blue"> {{ $vals['status_name'] }}  </span></td>
                    </tr>
                  @endif
                <?php $last = $vals['doctor_name']; ?>
                <?php $detail_id = $vals['id']; ?>
                @foreach($ordertest as $val)
                @if($val['test_order_id'] == $vals['master_id'] && $detail_id== $val['id'] )
                <tr class="parentgentd" tagid="{{$val['id']}}" tagpatient_id="{{$val['patient_id']}}" tagamount="{{$val['amount']}}" tagdoctor_id="{{$val['doctor_id']}}" tagpatient_name="{{$val['patient_name']}}">
                 
                  <td> {{ $val['testname'] }}</td>
                  <td> {{ $val['patient_name'] }} </td>
                  <td> ${{ $val['amount'] }} </td>
                  <td class="gentd text-center" tagid="{{$val['id']}}" tagpaient_id="{{$val['patient_id']}}"  status_id="{{$val['status_id']}}" status_name="{{$val['status_name']}}"> 

                    
                    

                  </td>
                 
                </tr>

                @endif
                
                 @endforeach
                 @endforeach
              </tbody>
            
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         /
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
  @endsection