<?php 
use App\Http\Controllers\medicationController; 
?>
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">new medication</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <a href="/patients" class="btn btn-box-tool"  data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-body">


    

<div class="w3-container w3-padding " style="position:  relative; margin-top: 29px"> 
<div class="x_panel" style="position: relative;width: 100%">
                  <div class="x_title" style="position: relative">
                                    

                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" style="position: relative">
          

<form method="POST" class="w3-container w3-white" id="medicationfm" style="background: inherit; display: block;" action="save">
<div class="warner">
       
        </div>


    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    

@if(Request::get('update'))
  <?php 
    $var = medicationController::finddrug(Request::get('update'));

   ?>
   <input type="hidden" name="id" value="{{$var->id}}">

               <div class="w3-row w3-section">
            <div class="w3-col" style="width: 100px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Name</label>
            </div>
              <div class="w3-rest">
                <input class="w3-input w3-border" name="name" type="text" placeholder="drug name" value="{{ $var->name }}" required>
              </div>
          </div>
  <div class="w3-row w3-section">
            <div class="w3-col" style="width: 100px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Effect</label>
            </div>
              <div class="w3-rest">
                <textarea class="w3-input w3-border" name="effect" type="text" placeholder="side effect(optional)" value="" required>{{ $var->effect }}</textarea>
              </div>
          </div>
          <div class="w3-row-padding" style="margin-top: -20px; width: 100%;right: -15px; position: relative;">
            <div class="w3-half" style="">

          <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Strenght</label>
            </div>
              <div class="w3-rest">
               <input class="w3-input w3-border" name="strenght" type="number" placeholder="strenght" value="{{ $var->strenght }}" required> 
             
              </div>
          </div>
             <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Dosage</label>
                  </div>
                    <div class="w3-rest">
                    <select class="w3-select w3-border" name="dosage[]"   multiple="multiple" required>
                @foreach(medicationController::getdata("dosage_unit_list") as $val)
                <option value="{{$val->dul_id }}" selected="false">{{$val->dosage_unit_name }}</option>
                @endforeach
               
              </select>
                   
                    </div>
                </div>
           </div>


           <div class="w3-half" style="">
           <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -20px">Unit</label>
            </div>
              <div class="w3-rest">
               <select class="w3-select w3-border" name="unit"  required>
                <option value="" disabled selected>Choose unit..</option>
               @foreach(medicationController::getdata("units") as $val)
                <option value="{{$val->id }}">{{$val->unit }}</option>
                @endforeach
              </select>
              </div>
          </div>  
            
                 <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">route</label>
                  </div>
                <div class="w3-rest">
                <select class="w3-select w3-border" name="route[]"  multiple="multiple" required>
               @foreach(medicationController::getdata("route_list") as $val)
                <option value="{{$val->rl_id }}">{{$val->name }}</option>
                @endforeach
              </select>
                   
                    </div>
                </div>
               


               

                  
            </div>
</div>


@else


               <div class="w3-row w3-section">
            <div class="w3-col" style="width: 100px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Name</label>
            </div>
              <div class="w3-rest">
                <input class="w3-input w3-border" name="name" type="text" placeholder="drug name" value="{{ old('patientname') }}" required>
              </div>
          </div>
  <div class="w3-row w3-section">
            <div class="w3-col" style="width: 100px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Effect</label>
            </div>
              <div class="w3-rest">
                <textarea class="w3-input w3-border" name="effect" type="text" placeholder="side effect(optional)" value="{{ old('patientname') }}" required></textarea>
              </div>
          </div>
          <div class="w3-row-padding" style="margin-top: -20px; width: 100%;right: -15px; position: relative;">
            <div class="w3-half" style="">

          <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Strenght</label>
            </div>
              <div class="w3-rest">
               <input class="w3-input w3-border" name="strenght" type="number" placeholder="strenght" value="{{ old('phone') }}" required> 
             
              </div>
          </div>
             <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Dosage</label>
                  </div>
                    <div class="w3-rest">
                    <select class="w3-select w3-border" name="dosage[]"   multiple="multiple" required>
                @foreach(medicationController::getdata("dosage_unit_list") as $val)
                <option value="{{$val->dul_id }}">{{$val->dosage_unit_name }}</option>
                @endforeach
               
              </select>
                   
                    </div>
                </div>
           </div>


           <div class="w3-half" style="">
           <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -20px">Unit</label>
            </div>
              <div class="w3-rest">
               <select class="w3-select w3-border" name="unit"  required>
                <option value="" disabled selected>Choose unit..</option>
               @foreach(medicationController::getdata("units") as $val)
                <option value="{{$val->id }}">{{$val->unit }}</option>
                @endforeach
              </select>
              </div>
          </div>  
            
                 <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">route</label>
                  </div>
                <div class="w3-rest">
                <select class="w3-select w3-border" name="route[]"  multiple="multiple" required>
               @foreach(medicationController::getdata("route_list") as $val)
                <option value="{{$val->rl_id }}">{{$val->name }}</option>
                @endforeach
              </select>
                   
                    </div>
                </div>
               


               

                  
            </div>
</div>
@endif

           
      
</form>
                      </div>
                        <div class="x_title">
                                    
                    
                   
                  </div>
                  <div class="w3-white w3-padding" style="width: 100%; position: relative;">


                      <div class="navbar-right w3-padding">
                        <button type="button" class="btn btn-danger" style="display: inline-block; position: relative;" onclick="location.href='medication'">cancel</button>
                          <button type="button" class="btn btn-info" onclick='var $this= $(this);  if(ajaxtoserv("#medicationfm","form","savemedication?_token="+_token,this).success){setTimeout(function() {location.href="/medication";$this.button("reset");}, 1000);};' data-loading-text="<i class='fa fa-circle-o-notch fa fa-spin'></i> Wait">save</button>

                      </div> 
                       

                    </div>
      
</div>

</div>
</div>
</div>