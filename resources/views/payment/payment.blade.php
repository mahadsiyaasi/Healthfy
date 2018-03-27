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
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          @if(Request::get("new"))



          @endif
         <table  class="w3-table table table-stripped border  card" id="">
            <thead>
             
              <tr>
              <th  class="text-center">Action</th>
              <th >Name</th>
              <th>Provider</th>
              <th>Description</th>
              
              </tr>
            </thead>
              <tbody>
                 <?php $last =0;; 
                  $detail_id = 0;
                 ?>
                @foreach($payment as $vals)
                  @if($vals['parent_id']==null)
                     <tr>
                      <td class="text-center w3-light-gray active"> action <span class="badge w3-blue"> <i class="fa fa-edit"></i> </span></td>
                        <td class="w3-light-gray active"> name : <span class="badge blue">  {{ $vals['name'] }} </span> </td>
                        <td class="w3-light-gray active"> provider : <span class="badge w3-blue">{{ $vals['provider_name'] }}</span> </td>
                        <td class="w3-light-gray active">description :  <span class="badge w3-green">$ {{ $vals['description'] }} </span></td>
                        
                    </tr>
                  @endif
                <?php $last = $vals['id']; ?>
                <?php $detail_id = $vals['parent_id']; ?>
                @foreach($payment as $val)
                @if($val['parent_id'] == $vals['id'] && $detail_id== $val['id'] )
                <tr>
                 <td><a><i class="fa fa-edit"></i></a></td>
                  <td> {{ $val['name'] }}</td>
                  <td> {{ $val['provider_name'] }} </td>
                  <td> ${{ $val['description'] }} </td>
                  
                 
                </tr>

                @endif
                
                 @endforeach
                 @endforeach
              </tbody>
            
          </table>
        </div>
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