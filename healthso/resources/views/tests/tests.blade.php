@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Test Orders
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tests</a></li>
        <li><a href="#"></a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-4">

 
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tests Groups </h3>
              <a class="pull-right w3-right new_group" style="cursor: pointer;"><i class="fa fa-plus"> Group</i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="list-group listholder w3-small " >
                
                </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#test_tab" role="tablist" class="" data-toggle="tab" data-options="deep_linking: true">Test Items</a></li>
              <li><a href="#new_test"  class="" data-toggle="tab">New Test</a></li>
              <li><a href="#ranges" class="" data-toggle="tab">References & Units</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="test_tab">
              <table class="table table-stripped" id="Tests">
                
              </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="new_test">
              @include("tests.tabs.newtest")
              </div>
              <div class="tab-pane" id="ranges">
              @include("tests.tabs.reference")
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="ranges">
               
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
