@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{Route::currentRouteName()}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Patient</a></li>
        <li><a href="#">Patient profile</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<input type="hidden" name="patient_id" value="{{$patient['id']}}">
      <div class="row">
        <div class="col-md-3">
          
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">{{$patient['patient_name']}}</h3>

              <p class="text-muted text-center">Identity id : {{$patient['id']}}</p>
              </div>
              <div class="w3-padding">
                 <a href="{{$patient['id']}}/add?new=test" class="w3-green badge"><i class="fa fa-plus"> new test </i></a>
                  <a href="{{$patient['id']}}/add?new=appointment" class="w3-blue badge"><i class="fa fa-plus"> Appointment </i></a>
                  <a href="{{$patient['id']}}/add?new=prescription" class="w3-yellow badge"><i class="fa fa-plus"> Prescription </i></a>
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              </li>
                <li class="list-group-item">
                  <b>{{$patient['patient_tell']}}</b> <a class="pull-right"><i class="fa fa-phone"></i></a>
                </li>
                <li class="list-group-item">
                  <b>{{$patient['country']}}</b> <a class="pull-right"><i class="fa fa-home"></i></a>
                </li>
                <li class="list-group-item">
                  <b>{{$patient['state']}}</b> <a class="pull-right"><i class="fa  fa-institution"></i></a>
                </li>
              <li class="list-group-item">
                  <b>{{$patient['district']}}</b> <a class="pull-right"><i class="fa fa-map-o"></i></a>
                </li>
                <li class="list-group-item">
                  <b>{{$patient['address']}}</b> <a class="pull-right"><i class="fa fa-bank"></i></a>
                </li>
                <li class="list-group-item">
                  <b>{{$patient['datebirth']}}</b> <a class="pull-right"><i class="fa  fa-calendar"></i></a>
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
            <ul class="nav nav-tabs card w3-card w3-border">
              <li class="active"><a href="#labtab" class="" data-toggle="tab">Lab</a></li>
              <li><a href="#appointtab" class="" data-toggle="tab">Appointment</a></li>
              <li><a href="#settings"  class="" data-toggle="tab">Condition</a></li>
              <li><a href="#presc" class="" data-toggle="tab">Prescription</a></li>
              <li><a href="#settings" class="" data-toggle="tab">Measurement</a></li>
            </ul>
            <div class="tab-content card w3-card w3-border">
              <div class="active tab-pane" id="labtab">
              @include('patients.tab.lab')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="appointtab">
              @include('patients.tab.appointtab')
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="presc">
               @include('patients.tab.prescriptionview')
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
   
  </footer>
  @endsection
