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
          <a class="btn" ><i class="fa fa-bars w3-large"></i> <h3 class="box-title"> List of labs</h3></a>
          
          <a  class="button btn" ><i class="fa fa-filter"> filter</i></a>
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
              <th>Doctor</th>
              <th>patient</th>
              <th>Amount</th>
              <th>Action & Status </th>
              </tr>
            </thead>
              <tbody>
                 <?php $last = 0; 
                  $detail_id = 0;
                 ?>
                @foreach($ordertest as $vals)
                  @if($last != $vals['master_id'])
                     <tr>
                        <td class="w3-light-gray active"> Lab Dr : <span class="badge blue">  {{ $vals['doctor_name'] }} </span> </td>
                        <td class="w3-light-gray active"> Patient : <span class="badge w3-blue">{{ $vals['patient_name'] }}</span> </td>
                        <td class="w3-light-gray active">Total :  <span class="badge w3-green">$ {{ $vals['total_amount'] }} </span></td>
                        <td class="w3-light-gray active"> Status <span class="badge w3-blue"> {{ $vals['status_name'] }}  </span></td>
                    </tr>
                  @endif
                <?php $last = $vals['master_id']; ?>
                <?php $detail_id = $vals['id']; ?>
                @foreach($ordertest as $val)
                @if($val['test_order_id'] == $vals['master_id'] && $detail_id== $val['id'] )
                <tr>
                 
                  <td> {{ $val['testname'] }}</td>
                  <td> {{ $val['patient_name'] }} </td>
                  <td> ${{ $val['amount'] }} </td>
                  <td>  @if($val['status_id']==1)
                    <span class="badge w3-red"> {{  $val['status_name'] }}  </span>
                    @elseif($val['status_id']==2)
                    <span class="badge w3-blue"> {{  $val['status_name'] }}</span> | <a  class=" w3-small w3-btn w3-blue w3-round-large" ><i class="fa fa-dollar"> Pay</i></a> |  <a  class=" w3-small w3-btn w3-red w3-round-large" ><i class="fa fa-trash"> Cancel</i></a>
                    @elseif($val['status_id']==2)
                    <span class="badge w3-yellow"> {{  $val['status_name'] }}</span>
                    @elseif($val['status_id']==2)
                    <span class="badge w3-green"> {{  $val['status_name'] }}</span>
                    @elseif($val['status_id']==2)
                    <span class="badge w3-teal"> {{  $val['status_name'] }}</span>
                    @endif

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
          Footer
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