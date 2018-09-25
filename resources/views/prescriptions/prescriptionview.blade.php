@extends('layouts.app')
 <?php 
use  Healthfy\Http\Controllers\companyController; 
?>
@section('content')
 @if (Auth::check())

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
      <div class="box">
        <div class="box-header with-border">
          <a class=""><i class="fa fa-plus w3-large" ></i> <h3 class="box-title"> Prescriptions</h3></a>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <section class="content">
  <!---a class="button btn" onclick="filterfn()"><i class="fa fa-filter"> filter</i></a---->
  @if(!empty($patientPrescriptions))
      <input type="search"  name="q-search" class="w3-input" placeholder="search" style="width: 20%; position: relative;display: inline-block;">
          <div class="box-tools pull-right">
            <!---a  href="/patients/{{$patient['id']}}/add?new=prescription" id='addstyle'   class='3-round-medium w3-text-bold' style='cursor:pointer;width:150px;' onClick=''>  <i class='fa fa-plus' aria-hidden='true'></i> add</a---->
           <a class="btn btn-box-tool" data-widget="print" data-toggle="tooltip" title="print">  <i class='fa fa-print' aria-hidden='true'></i> print</a>
          </div>
         <div class="box-body">
          <table  class="w3-table table table-stripped border  card">
            <thead>
             
              <tr>
              <th >Action</th>
              <th>Drug</th>
              <th>Frequency</th>
              <th  class="text-center">Duration </th>
              <th  class="text-center">Instruction </th>
              </tr>
            </thead>
              <tbody id="lbredefine">
                 <?php $last =""; 
                  $detail_id = 0;
                 ?>
                @foreach($patientPrescriptions as $vals)
                  @if($last != $vals->doctor_name)
                     <tr class="w3-light-gray active">
                        <td class="w3-light-gray active" colspan=""> Lab Dr : <span class="badge blue">  {{ $vals->doctor_name }} </span> </td>
                    <td class="w3-light-gray active" > PA name : <span class="badge green">  {{ $vals->patient_name }} </span> </td>
                    <td class="w3-light-gray active"> date : <span class="badge blue">  {{ $vals->date }} </span> </td>
                    <td colspan="2"> <div class='w3-padding'><!---a  href="/patients/{{$patient['id']}}/add?new=prescription&pres_master__id={{$vals->master_id}}" id='addstyle'   class='3-round-medium w3-text-bold' style='cursor:pointer;width:150px;' onClick=''>  <i class='fa fa-plus' aria-hidden='true'></i> add</a---->   |

                      <a  id='justprint'   class='w3-round-medium w3-text-bold' style='cursor:pointer;width:150px; cursor: pointer;' >  <i class='fa fa-print' aria-hidden='true'></i> print</a>


                       | <!--a class="w3-text-blue w3-text-bold" style="cursor: pointer;" data-toggle="modal" data-target="#modal-warn" forid="{{ $vals->master_id }}" tablename="PrescriptionList" onclick="docancels(this)" htmtable="Reload"> <i class="fa fa-trash w3-taxt-hover-red  w3-text-red" ></i> cancel</a----></div></td>
                @endif
                <?php $last = $vals->doctor_name; ?>
                <?php $detail_id = $vals->detail_id; ?>
                @foreach($patientPrescriptions as $val)
               @if($val->prescription_id == $vals->master_id && $detail_id == $val->detail_id )
                <tr class="parentgentd">                 
                  <td class="gentd text-center"><a href="/patients/{{$patient['id']}}/add?new=prescription&pres_detail__id={{$vals->detail_id}}" data-toggle="tooltip" title="Click to edit this medication" class="w3-text-blue btn button"> <i class="fa fa-edit w3-taxt-hover-red "></i> </a> <a  onmouseenter="datatitle(this,'this sample message')" class="w3-text-red btn button"> <i class="fa fa-trash w3-taxt-hover-red " data-toggle="modal" data-target="#modal-warn" forid="{{ $val->detail_id }}" tablename="PrescriptionDetail" onclick="docancels(this)" htmtable="Reload"></i></a></td>
                  <td onmouseenter="datatitle(this,'{{ $val->medical_name }}')"> {{ $val->medical_name }} </td>
                  <td> {{ $val->frequency_name }} </td>
                  <td> {{ $val->duration }} days</td>
                  <td> {{ $val->instruction }} </td>            
        </tr>
                @endif
                @endforeach
                </tr>
                @endforeach
              </tbody>
            </a>
          </td>
        </tr>
      </tr>
    </tbody>
 </table>
</div>
@else
<div class="w3-text w3-text-center w3-center ">
<h3>No record belonged to {{$patient['patient_name']}}  in  this system Keep start right now and click below button to track new record ! </h3><a href="/patients/{{$patient['id']}}/add?new=prescription" class=" btn w3-btn w3-green w3-xxlarge w3-round-medium"> <i class="fa fa-plus"></i> add new prescription</a>
</div>
@endif

</section>
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
    @elseif(Auth::guest())  
      @include('auth.innerlogin')


   @endif
  @endsection