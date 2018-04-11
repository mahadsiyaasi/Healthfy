@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Patient Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Patient</a></li>
        <li><a href="#">Patient profile</a></li>
        </ol>
    </section>
    <input type="hidden" name="patient_id" value="{{$patient->id}}">
    @foreach($patient as $key => $val)
    <input type="hidden" name="{{$key}}" value="{{$val}}">
    @endforeach

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">{{$patient->patient_name}}</h3>

              <p class="text-muted text-center">Identity id : {{$patient->id}}</p>
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
                  <b>{{$patient->patient_tell}}</b> <a class="pull-right"><i class="fa fa-phone"></i></a>
                </li>
                <li class="list-group-item">
                  <b>{{$patient->country}}</b> <a class="pull-right"><i class="fa fa-home"></i></a>
                </li>
                <li class="list-group-item">
                  <b>{{$patient->state}}</b> <a class="pull-right"><i class="fa  fa-institution"></i></a>
                </li>
              <li class="list-group-item">
                  <b>{{$patient->district}}</b> <a class="pull-right"><i class="fa fa-map-o"></i></a>
                </li>
                <li class="list-group-item">
                  <b>{{$patient->address}}</b> <a class="pull-right"><i class="fa fa-bank"></i></a>
                </li>
                <li class="list-group-item">
                  <b>{{$patient->datebirth}}</b> <a class="pull-right"><i class="fa  fa-calendar"></i></a>
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
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" class="" data-toggle="tab"> New {{Request::get('new')}} to <strong>{{$patient->patient_name}}</strong></a></li>
              @if(Request::get('new'))
              <a  href="/patients/{{$patient->id}}" style="position: relative; display: inline-block;" class="btn pull-right w3-padding"><i class=" w3-text-red fa fa-home"></i></a>
               @endif
             </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="testnew_tab">
                @if(Request::get('new')=="test")
                <div class="pull-left" style="position: relative; display: inline-block; width: 60%">
                
                <select class="select form-control w3-select" name="doctor_id" style="display: inline-block; position: relative; width: 50%"> 
                  <option value="" disabled> select one...</option>
                  @foreach($doctors->all() as $value)
                  <option
                    value="{{$value->id}}"
                    >
                    {{$value->name}}
                  </option>
                    @endforeach

                </select>
                <button type="button" class="btn w3-blue " style="position: relative; display: inline-block;" onclick="submittest()">save</button>
              </div>
                <li class="dropdown pull-right list-group" style="list-style-type: none;" onclick=""><a  class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-cart-plus w3-text-blue w3-xlarge btn w3-hover-zoom" aria-hidden="true"><sup class=" budge w3-text-red" style="font-weight: bold;" id="cart_sub"></sup></i></a>
               

                <ul class="dropdown-menu pull-right w3-round-large" role="menu" aria-labelledby="menu1" style="width: 500px !important;max-height: 500px !important; overflow-y:auto; ">
                  <div class="panel-header w3-padding">
                    <a><strong>Cart Summery</strong></a> <p class="pull-right" onclick="$(this).parents('ul:first').dropdown('hide')"><i class="fa fa-times"></i></p>
                    </div>
                    <hr>
                    <div class="listopt">
                      
                    </div>
                    <hr>
                    <div class="footer foot w3-footer w3-padding">
                      <div class="panel-header">
                    <a><strong>Total:</strong></a><span class="pull-right">$</span><p class="pull-right total"  style="font-weight: bold;"></p>
                    </div>
                    </div>
                  </ul>



               </li>
               </ul>
              @include('patients.addcontent.testtable')
              <div class="w3-list list-group-item">
                
              </div>
              <div class="panel-group appendacc" id="accordionss">      
            </div>
           
          @elseif(Request::get('new')=="appointment")
          @include('patients.addcontent.newappoint')
          @elseif(Request::get('new')=="prescription")
          
          @include('patients.addcontent.prescription')
          @endif
            </div>

            </div>
              <!-- /.tab-pane -->
             
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


