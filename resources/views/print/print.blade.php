@extends('layouts.app')
@section('content')
<?php 
    use App\http\Controllers\labController;
 ?>
<div class="content-wrapper">
    <section class="content">
      <div class="box w3-white" style="padding: 0px 0px 0px 0px; background:inherit;">
        <div class="box-header with-border">
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
           
  </div>
</div>
  </div>
 </div>
</section>

</div>

@endsection






