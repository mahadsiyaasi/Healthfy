<?php 
use App\Http\Controllers\doctorsController; 
use App\Http\Controllers\customerController; 
?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">new doctor</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <a href="/doctors" class="btn btn-box-tool"  data-toggle="tooltip" title="Remove">
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
              


<form method="POST" class="formwork w3-container w3-white" id="doctorfm" style="background: inherit; display: block;" action="save">
        <div class="warner">
       
    </div>
 <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        @if(doctorsController::getdDC(Request::get('doctor')))
        <input type="hidden" name="hiddenid" value="{{ doctorsController::getdDC(Request::get('doctor'))->id }}" />
           <div class="w3-row w3-section">
            <div class="w3-col" style="width: 100px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Doctor Name</label>
            </div>
              <div class="w3-rest">
                <input class="w3-input w3-border-bottom" name="doctorname" type="text" placeholder="Fullname" value="{{ doctorsController::getdDC(Request::get('doctor'))->name }}" required>
              </div>
          </div>

          <div class="w3-row-padding" style="margin-top: -20px; width: 100%;right: -15px; position: relative;">
            <div class="w3-half" style="">
               <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 100px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -20px">Specialization</label>
            </div>
              <div class="w3-rest">
              <select class="w3-select w3-border-bottom" name="specialist" id="doctorsp" required>
                @foreach(doctorsController::loadspeciality() as $val)
                <option value="{{$val->status_name}}">{{$val->status_name}}</option>
                @endforeach
              </select> 
             
              </div>
          </div>            
           </div>
            <div class="w3-half" style="width: 50%;">
                 

                 <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 30px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Tell</label>
                  </div>
                    <div class="w3-rest">
                       <input class="w3-input w3-border-bottom" name="doctortell" type="text" placeholder="Phone +2526" value="{{ doctorsController::getdDC(Request::get('doctor'))->tell }}" required>
                   
                    </div>
                </div>
               
            </div>




          </div>
           <div class="w3-row-padding" style="top: -20px; position: relative; right: -15px;">
            <div class="w3-third" style="position: relative;right: -10px">
              <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Nationality</label>
            </div>
              <div class="w3-rest">
                <select class="w3-select w3-border-bottom" name="nationality"  id="nationality" required>
                <option value="" disabled selected>Chose Nationality..</option>
               
              </select> 
             
              </div>
          </div>

               <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">birth date</label>
                  </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border-bottom" name="birthdate" id="birthdates" type="text" placeholder="birth date" value="{{ doctorsController::getdDC(Request::get('doctor'))->datebirth }}" required>
                   
                    </div>
                </div>
            </div>
            <div class="w3-third">
               <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">City</label>
                  </div>
                    <div class="w3-rest">
                        <select class="w3-select w3-border-bottom" name="city"  id="city" required>
                <option value="" disabled selected>Chose City..</option>
               
              </select> 
                   
                    </div>
                </div>
                <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Salary</label>
                  </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border-bottom" name="salary" type="text" placeholder="salary $" value="{{ doctorsController::getdDC(Request::get('doctor'))->salary }}" required>
                   
                    </div>
                </div>
            </div>
            <div class="w3-third" style=" position: relative;">
               <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Address</label>
                  </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border-bottom" name="address" type="text" placeholder="Address" value="{{ doctorsController::getdDC(Request::get('doctor'))->address }}" required>
                   
                    </div>
                </div>
                <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; top: -2px; text-align: right; margin-left: -13px">Visit Amount</label>
                  </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border-bottom" name="vamount" type="text" placeholder=" amount $" value="{{ doctorsController::getdDC(Request::get('doctor'))->visit_amount }}" required>
                   
                    </div>
                </div>
            </div>
          </div> 
          @else
                     <div class="w3-row w3-section">
            <div class="w3-col" style="width: 100px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Doctor Name</label>
            </div>
              <div class="w3-rest">
                <input class="w3-input w3-border-bottom" name="doctorname" type="text" placeholder="Fullname" value="{{ old('doctorname') }}" required>
              </div>
          </div>

          <div class="w3-row-padding" style="margin-top: -20px; width: 100%;right: -15px; position: relative;">
            <div class="w3-half" style="">
               <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 100px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -20px">Specialization</label>
            </div>
              <div class="w3-rest">
              <select class="w3-select w3-border-bottom" name="specialist" id="doctorsp" required>
                @foreach(doctorsController::loadspeciality() as $val)
                <option value="{{$val->status_name}}">{{$val->status_name}}</option>
                @endforeach
              </select> 
             
              </div>
          </div>            
           </div>
            <div class="w3-half" style="width: 50%;">
                 

                 <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 30px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Tell</label>
                  </div>
                    <div class="w3-rest">
                       <input class="w3-input w3-border-bottom" name="doctortell" type="text" placeholder="Phone +2526" value="{{ old('doctortell') }}" required>
                   
                    </div>
                </div>
               
            </div>




          </div>
           <div class="w3-row-padding" style="top: -20px; position: relative; right: -15px;">
            <div class="w3-third" style="position: relative;right: -10px">
              <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Nationality</label>
            </div>
              <div class="w3-rest">
                <select class="w3-select w3-border-bottom" name="nationality"  id="nationality" required>
                <option value="" disabled selected>Chose Nationality..</option>
               
              </select> 
             
              </div>
          </div>

               <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">birth date</label>
                  </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border-bottom" name="birthdate" id="birthdates" type="text" placeholder="birth date" value="" required>
                   
                    </div>
                </div>
            </div>
            <div class="w3-third">
               <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">City</label>
                  </div>
                    <div class="w3-rest">
                        <select class="w3-select w3-border-bottom" name="city"  id="city" required>
                <option value="" disabled selected>Chose City..</option>
               
              </select> 
                   
                    </div>
                </div>
                <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Salary</label>
                  </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border-bottom" name="salary" type="text" placeholder="salary $" value="{{ old('doctortell') }}" required>
                   
                    </div>
                </div>
            </div>
            <div class="w3-third" style=" position: relative;">
               <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Address</label>
                  </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border-bottom" name="address" type="text" placeholder="Address" value="{{ old('doctortell') }}" required>
                   
                    </div>
                </div>
                <div class="w3-row w3-section">
                  <div class="w3-col" style="width: 60px">
                    <label class="w3-col w3-small" style="bottom: -10px;position: relative; top: -2px; text-align: right; margin-left: -13px">Visit Amount</label>
                  </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border-bottom" name="vamount" type="text" placeholder=" amount $" value="{{ old('doctortell') }}" required>
                   
                    </div>
                </div>
            </div>
          </div> 



          @endif
          </form>



                      </div>
                        <div class="x_title">
                                    
                    
                   
                  </div>
                  <div class="w3-padding">
                    
                  </div>
                  </div>
      
</div>
<div class="w3-white w3-padding" style="width: 100%; position: relative;margin-left: -16px">


                      <div class="navbar-right w3-padding">
                        <button class="w3-button w3-border w3-text-blue w3-hover" style="display: inline-block; position: relative;bottom: -2.5px" onclick="location.href='doctors'">cancell</button>
                        <button class="w3-button w3-teal w3-text-white w3-hover" style="display: inline-block; position: relative; right: -5px; bottom: -2.5px" id="doctorbtn">Save</button>

                      </div> 
                       

                    </div>
</div>

</div>