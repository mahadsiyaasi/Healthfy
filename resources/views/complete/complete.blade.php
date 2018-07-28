@extends('layouts.app')
@section('content')
   <?php 
use App\Http\Controllers\doctorsController; 
use App\Http\Controllers\customerController; 
$updateData  =doctorsController::getdoctor(Request::get('doctor_id'));
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{Route::currentRouteName()}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Complete</a></li>
        <li><a href="#">Complete Profile</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="nav-tabs-custom w3-padding">
              <table class="table">
                <tr>
                  <td style="width: 35%" class="w3-border-right">
                    <h3> <b>{{$updateData->title}} {{$updateData->name}}</b></h3> 
                    <span class="badge w3-red">Not Live</span> <span> Mandtaroty fileds missing </span>
                  </td>
                   <td style="width: 35%" class="w3-border-right">
                    <h3> <b>30%<small> Profile Complete </small></b></h3> 
                   <div class="progress">
  <div class="progress-bar w3-red" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
</div>
                  </td>
                   <td style="width: 35%" class="">
                     <h3><i class="fa fa-exclamation-triangle w3-text-red" aria-hidden="true"></i> <b> 1 </b>  Pending Mandatory field </h3> 
                    <span class="badge w3-red">Not Live</span> <span> Complete these fields to go your profile live </span>
                  </td>
                </tr>
              </table>
          </div>





        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Complete Your Profile</h3>
            </div>
           <div class="box-body">
            <ul class="list-group">
              </li>
                <li class="list-group-item active"><a href="#personal" class="w3-text-black active" data-toggle="tab">Personal Contact Detail</a><i class="fa fa-check-circle-o pull-right w3-text-green" aria-hidden="true"></i></li>
                <li class="list-group-item"><a href="#education" class="w3-text-black" data-toggle="tab">Education & Specialization <a class="pull-right" ><i class="fa fa-check-circle-o w3-text-green" aria-hidden="true"></i></a></a></li>
                <li class="list-group-item"><a href="#documents" data-toggle="tab" class="w3-text-black">Registration & Documents</a> <a class="pull-right" ><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                </li>
              <li class="list-group-item">
                   <a href="#clinic" data-toggle="tab" class="w3-text-black">Clinic fee & Timing</a><a class="pull-right" ><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                </li>
                <li class="list-group-item">
                    <a href="#services" data-toggle="tab" class="w3-text-black">Services & Experience</a> <a class="pull-right"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                </li>
                <li class="list-group-item" data-toggle="tab">
                 <a href="#award" class="w3-text-black">Award & Membership</a><a class="pull-right"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                </li>
               </ul>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
          <div class="tab-content card w3-card w3-border">
             <div class="tab-pane active w3-padding" id="personal">
                @include('complete.tabs.personal')
              </div>
             <div class="tab-pane" id="education">
                @include('complete.tabs.personal')
              </div>
              <div class="tab-pane" id="documents">
                 @include('complete.tabs.education')
              </div>
              <div class="tab-pane" id="clinic">
              </div>
              <div class="tab-pane" id="services">
              </div>
              <div class="tab-pane" id="award">
              </div>
            
            
            
            
            
            </div>
         
          </div>
        
        </div>
    
      </div>
       </section>
    </div>
  
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
   
  </footer>
  @endsection
