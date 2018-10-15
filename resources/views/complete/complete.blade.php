<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="{{ url('webicon/cropped.png') }}" type="image/gif" sizes="16x16">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <title>Complete profile</title>
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/all.css') }}" rel="stylesheet">   
</head>
  <?php 
    use Healthfy\Http\Controllers\doctorsController; 
    use Healthfy\Http\Controllers\customerController; 
    $updateData  = doctorsController::getdoctor();
    use Healthfy\Http\Controllers\authController;
    $percent =authController::getPercentage("staff");
    $gentype = ($updateData->gender=="Female"?0:1);
  ?>
<style type="text/css">
  .allback {
              background: linear-gradient( 135deg, rgba(60, 8, 118, 0.8) 0%, rgba(250, 0, 118, 0.8) 100%);
            }
          .mafont {
            color: linear-gradient( 135deg, rgba(60, 8, 118, 0.8) 0%, rgba(250, 0, 118, 0.8) 100%);
</style>
<body class="sidebar-mini" style="height: auto; min-height: 100%;">
    <div id="app">
        <div class="wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header allback w3-text-white w3-padding">
       <a class="w3-padding" style="display: inline-block;" class="btn w3-red" href="{{url('/')}}"> <i class="fa fa-arrow-left"></i></a>
      <h1 style="display: inline-block;">
        {{Route::currentRouteName()}}
      </h1>
      <h1 style="display:  inline-block; width: 40%" class="w3-text-center w3-center" > @if($updateData->status_id==6)<span class="badge w3-red"> Not Approved</span> <span> <title> to be alligable approvement complete your profile </title></span>@else <span class="badge w3-green w3-text-white"><i class="fa fa-check-circle-o w3-text-white"> approved</i>  <title> to be alligable approvement complete your profile </title></span>@endif
      </h1>

      <ol class="breadcrumb w3-text-white w3-padding" style="display: inline-block; position: relative; top: -10px">
        <li><a href="#/" class=" w3-text-white"><i class="fa fa-dashboard"></i> Complete</a></li>
        <li><a href="#/" class=" w3-text-white">Complete Profile</a></li>
       <li><a class="btn w3-border w3-text-white" href="{{url('logout')}}">logout</a></li>
      </ol>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="  w3-padding">
              <table class="table">
                <tr>
                  <td style="width: 35%" class="w3-border-right">
                    <h3> <b>{{$updateData->title}} {{$updateData->name}}</b></h3> 
                    <span class="badge w3-red">Not Live</span> <span> Mandtaroty fileds missing </span>
                  </td>
                   <td style="width: 35%" class="w3-border-right">
                    <h3> <b>   {{ $percent}}%<small> Profile Complete </small></b></h3> 
                   <div class="progress">
                  <div class="progress-bar w3-red w3-round-xlarge" role="progressbar" style="width: {{$percent}}%; font-weight: bold;" aria-valuenow="{{$percent}}" aria-valuemin="0" aria-valuemax="100">{{$percent}}%</div>
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
                <li class="list-group-item active"><a href="#/personal" data-target="#personal" class="w3-text-black active" data-toggle="tab">Personal Contact Detail</a>               
                  @if(($percent) <=50)
                  <span class="pull-right badge w3-red">{{$percent}}%</span>
                  @else
                   <span class="pull-right badge w3-green">{{$percent}}%</span>
                  @endif
                </li>
                <li class="list-group-item"><a href="#/education" data-target="#education"  class="w3-text-black" data-toggle="tab">Education & Specialization</a> <a class="pull-right" >
                   @if((authController::getPercentage("qualification")) <=50)
                  <span class="pull-right badge w3-red">{{authController::getPercentage("qualification")}}%</span>
                  @else
                   <span class="pull-right badge w3-green">{{authController::getPercentage("qualification")}}%</span>
                  @endif </a></li>       
                           
                  <li class="list-group-item"><a href="#/clinic" data-target="#clinic"  class="w3-text-black" data-toggle="tab">Clinic fee & Timing</a><a class="pull-right" ><i class="fa fa-check-circle-o" aria-hidden="true"></i></a></li>
               
                <li class="list-group-item">
                    <a href="#/services" data-toggle="tab" class="w3-text-black">Services & Experience</a> <a class="pull-right"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                </li>
                <li class="list-group-item" >
                 <a href="#/award" data-toggle="tab" class="w3-text-black">Award & Membership</a><a class="pull-right"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                </li>
               </ul>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
          <div class="col-md-9">
          <div class=" ">
          <div class="tab-content">
             <div class="tab-pane active w3-padding" id="personal">
           @include('complete.tabs.personal')
         </div>
          <div class="tab-pane w3-padding" id="education">
             @include('complete.tabs.education')
          </div>
          <div class="tab-pane w3-padding" id="clinic">
              @include('complete.tabs.clinic')
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
  </div>
  <div id="modalparser" class="specialmodal">
    
  </div>


  @include("confirm.confirm")
    <script src="{{ asset('js/app.js') }}"></script>         
              <script src="{{ asset('js/all.js') }}"></script>   
              <script type="text/javascript">
              if (location.hash) {
        window.location = location.href;
      }
                $(document).ready(function(){
                  if ($("#countryhidden").length != 0) {
                   populateCountries("countryhidden+1", "cityupdate+1");
                   populateCountries("countryhidden", "cityupdate");
                   }
                    $("#countryhidden").find("option").each(function(){
                    if (this.value=="{{$updateData->nationality}}") {
                    $(this).attr("selected",true)
                     $(this).parent().trigger('change');
                  }
                 })
          $("#cityupdate").find("option").each(function(){
                  if (this.value=="{{$updateData->city}}") {
                    $(this).attr("selected",true)
                     $(this).parent().trigger('change');
                  }
                 })
                })



                function imgError(image,type) {
                  try{
                       image.onerror = "";
                          image.src =(type==1?"{{ asset('avatars/man.png')}}":"{{ asset('avatars/woman.png')}}")
                          return true;
                    }catch(ex){
                     console.log(ex)
                    }
                  }
            /*$(function() {
                      var hash = document.location.hash;
                       if (hash) {
                       console.log(hash);
                      $('.nav-tabs a[href='+hash+']').tab('show');
                      }

                // Change hash for page-reload
                $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
                  window.location.hash = e.target.hash;
                 });
          });*/
          function imageUser(){
            var query = {};
            query = {
              pic : '{{Auth::user()->getFirstMediaUrl('image')}}',
              gender:'{{$gentype}}'

            }
            return query;
          }
          jsUserDetail = function(){
            var query = {
              country : "{{$updateData->nationality}}",
              city : "{{$updateData->city}}",
            }
            return query;
          }
    </script>
  </body>
  </html>
