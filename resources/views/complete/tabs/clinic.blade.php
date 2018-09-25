<?php 
use Healthfy\Http\Controllers\doctorsController; 
?>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
        <div style="position:relative,">
          <a data-toggle="collapse" data-parent="#accordion" href="#clicnic" style="position: relative;display:inline-block;"><h5 class="box-title">Clinic and Timing Setup</h5></a>
          <a onClick="addNewClinic()" class="w3-border pull-right btn" style="position: relative;display:inline-block;"><i class="fa fa-plus"> Add Clinic</i></a>
       </div>
        </h4>
      </div>
      <div id="educations" class="panel-collapse collapse in">
        <div class="panel-body">
        




   <form method="POST"  class="autovaliddate validate"  id="clinicfm" style="background: inherit; display: block;" enctype="multipart/form-data" action="/savelastupdate" >
                <div class="warner">
               
            </div>
            
         <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
                  
                <div class="row w3-padding">
                 <div class="col-sm-4">
                    <div class="form-group">
                     <label class="w3-text-gray w3-small">Clinic Name *</label>
                 <input class="w3-input w3-border" name="clinicName" type="text" placeholder="clinic name " value="{{ $updateData->name }}" required>
                    </div>
                  </div>

                    <div class="col-sm-4">  <div class="form-group">
                     <label class="w3-text-gray w3-small">Consultant Duration</label>
                       <input class="w3-input w3-border" name="duration" type="number" placeholder="consultant duration" value="{{ $updateData->duration }}" required>                         
                    </div>
                  </div>

                   <div class="col-sm-4">  <div class="form-group">
                     <label class="w3-text-gray w3-small">Consultant Fee *</label>
                       <input class="w3-input w3-border" name="clinicfee" type="number" placeholder="Clinic Fee" value="{{ $updateData->fee }}" required>
                    </div>
                  </div>
                <div class="row w3-padding">
                  <table class="table">
                    <tr>
                  <?php 
                    $days= ['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday'];
                   
                    for($i=0; $i<count($days); $i++){ ?>
                    <td>
                      <label class="w3-text-gray w3-small" style="display: inline-block;"><input type="checkbox" class="form-group checkbox check w3-checkbox" value="{{$days[$i]}}" style="display: inline-block;" name="days"> <span style="display: inline-block;"> {{$days[$i]}} </span></label>
                    </td>
                   <?php } ?>
                   </tr>
            </table>
          </div>

          <div class="row">
          <div class="col-sm-6"> 
            <legend class="w3-medium"> Session 1+</legend>
             <div class="col-sm-6">
                    <div class="form-group">
                     <label class="w3-text-gray w3-small">Start Time</label>
                 <input class="w3-input w3-border" name="1_start_time" type="text" placeholder="Session start time" value="" required >
                    </div>
              </div>
              <div class="col-sm-6">
                    <div class="form-group">
                     <label class="w3-text-gray w3-small">End Time</label>
                 <input class="w3-input w3-border" name="1_end_time" type="text" placeholder="Session end time" value="" required >
                    </div>
              </div>
            </div>
           <div class="col-sm-6"> 
            <legend class="w3-medium"> Session 2+</legend>
             <div class="col-sm-6">
                    <div class="form-group">
                     <label class="w3-text-gray w3-small">Start Time</label>
                 <input class="w3-input w3-border" name="2_start_time" type="text" placeholder="Session start time" value="" required >
                    </div>
              </div>
              <div class="col-sm-6">
                    <div class="form-group">
                     <label class="w3-text-gray w3-small">End Time</label>
                 <input class="w3-input w3-border" name="2_end_time" type="text" placeholder="Session end time" value="" required>
                    </div>
              </div>
            </div>




           </div>

        </div>
       </form>










    </div>
 </div>
 </div>
</div>


