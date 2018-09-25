<?php 
use Healthfy\Http\Controllers\customerController; 
?>

      <div class="box" style="background: inherit;">
        <div class="box-header with-border">
          <h3 class="box-title">new patient</h3>

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
          

<form method="POST" class="w3-container" id="patientfm" style="background: inherit; display: block;" action="save">
<div class="warner">
       
        </div>


    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
       @if(customerController::getcustomer(Request::get('patient')))
       <input type="hidden" name="hidden_id" value="{{customerController::getcustomer(Request::get('patient'))->id}}">
           <div class="w3-row w3-section">
            <div class="w3-col" style="width: 100px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Patient Name</label>
            </div>
              <div class="w3-rest">
                <input class="w3-input w3-border-bottom" name="patientname" type="text" placeholder="Fullname" value="{{ customerController::getcustomer(Request::get('patient'))->patient_name }}" required>
              </div>
          </div>

          <div class="w3-row-padding" style="margin-top: -20px; width: 100%;right: -15px; position: relative;">
            <div class="w3-half" style="">

          <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Tell</label>
            </div>
              <div class="w3-rest">
               <input class="w3-input w3-border-bottom" name="phone" type="text" placeholder="Phone" value="{{ customerController::getcustomer(Request::get('patient'))->patient_tell}}" required> 
             
              </div>
          </div><div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -20px">Country</label>
            </div>
              <div class="w3-rest">
               <select class="w3-select w3-border-bottom" name="countrys"  id="nationality" required {{customerController::getcustomer(Request::get('patient'))->patient_name}}>
                <option value="" disabled selected>Choose country..</option>
               
              </select>
              </div>
          </div>  
           </div>
            <div class="w3-half" style="width: 50%;">
                 <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 50px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Gender</label>
                  </div>
                <div class="w3-rest">
                <select class="w3-select w3-border-bottom" name="Gender"  id="Gender" required>
                <option value="" disabled selected>Chose sex..</option>
                <option value="male">Male</option>
                <option value="female">female</option>
                <option value="unknown">unknown</option>
              </select>
                   
                    </div>
                </div>
                  <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">State</label>
                  </div>
                    <div class="w3-rest">
                       <select class="w3-select w3-border-bottom" name="state"  id="city" required>
                <option value="" disabled selected>Choose state..</option>
               
              </select>
                   
                    </div>
                </div>


               

                  
            </div>



          </div>
           <div class="w3-row-padding" style="top: -20px; position: relative; right: -15px;">
            <div class="w3-third" style="position: relative;right: -10px">
               <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Distruct</label>
                  </div>
                    <div class="w3-rest">
                       <input type="tex" name="district" class="w3-input w3-border-bottom" placeholder="district" value="{{customerController::getcustomer(Request::get('patient'))->district}}" required>
                   
                    </div>
                </div>
            </div>
            <div class="w3-third">
                <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Address</label>
                  </div>
                    <div class="w3-rest">
                        <input type="tex" name="Address" class="w3-input w3-border-bottom" placeholder="address"  value="{{customerController::getcustomer(Request::get('patient'))->address}}" required>
                   
                    </div>
                </div>
            </div>
            <div class="w3-third" style=" position: relative;">
                <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; top: -2px; text-align: right; margin-left: -13px" >Date of Birth</label>
                  </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border-bottom" name="dateofbirth" id="dateofbirth" type="text" placeholder="birth date" value="{{customerController::getcustomer(Request::get('patient'))->datebirth}}" required>
                    </div>
                </div>
            </div>
          </div>
          @else
               <div class="w3-row w3-section">
            <div class="w3-col" style="width: 100px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Patient Name</label>
            </div>
              <div class="w3-rest">
                <input class="w3-input w3-border-bottom" name="patientname" type="text" placeholder="Fullname" value="{{ old('patientname') }}" required>
              </div>
          </div>

          <div class="w3-row-padding" style="margin-top: -20px; width: 100%;right: -15px; position: relative;">
            <div class="w3-half" style="">

          <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Tell</label>
            </div>
              <div class="w3-rest">
               <input class="w3-input w3-border-bottom" name="phone" type="text" placeholder="Phone" value="{{ old('phone') }}" required> 
             
              </div>
          </div><div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -20px">Country</label>
            </div>
              <div class="w3-rest">
               <select class="w3-select w3-border-bottom" name="countrys"  id="nationality" required>
                <option value="" disabled selected>Choose country..</option>
               
              </select>
              </div>
          </div>  
           </div>
            <div class="w3-half" style="width: 50%;">
                 <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 50px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Gender</label>
                  </div>
                <div class="w3-rest">
                <select class="w3-select w3-border-bottom" name="Gender"  id="Gender" required>
                <option value="" disabled selected>Chose sex..</option>
                <option value="male">Male</option>
                <option value="female">female</option>
                <option value="unknown">unknown</option>
              </select>
                   
                    </div>
                </div>
                  <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">State</label>
                  </div>
                    <div class="w3-rest">
                       <select class="w3-select w3-border-bottom" name="state"  id="city" required>
                <option value="" disabled selected>Choose state..</option>
               
              </select>
                   
                    </div>
                </div>


               

                  
            </div>



          </div>
           <div class="w3-row-padding" style="top: -20px; position: relative; right: -15px;">
            <div class="w3-third" style="position: relative;right: -10px">
               <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">District</label>
                  </div>
                    <div class="w3-rest">
                       <input type="tex" name="district" class="w3-input w3-border-bottom" placeholder="district" required>
                   
                    </div>
                </div>
            </div>
            <div class="w3-third">
                <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Address</label>
                  </div>
                    <div class="w3-rest">
                        <input type="tex" name="Address" class="w3-input w3-border-bottom" placeholder="address" required>
                   
                    </div>
                </div>
            </div>
            <div class="w3-third" style=" position: relative;">
                <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; top: -2px; text-align: right; margin-left: -13px">Date of Birth</label>
                  </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border-bottom" name="dateofbirth" id="dateofbirth" type="text" placeholder="birth date" value="{{ old('date') }}" required>
                    </div>
                </div>
            </div>
          </div>
          @endif
</form>
                      </div>
                        <div class="x_title">
                                    
                    
                   
                  </div>
                  <div class=" w3-padding" style="width: 100%; position: relative;">
                      <div class="navbar-right w3-padding">
                        <button class="w3-button w3-border w3-text-blue w3-hover" style="display: inline-block; position: relative;bottom: -2.5px" onclick="location.href='patients'">Cancel</button>
                        <button class="w3-button w3-teal w3-text-white w3-hover" style="display: inline-block; position: relative; right: -5px; bottom: -2.5px" onclick="savepatient(this)"data-loading-text="<i class='fa fa-circle-o-notch fa fa-spin'></i> Wait">save</button>
                      </div> 
                       

                    </div>
      
</div>

</div>
</div>
</div>