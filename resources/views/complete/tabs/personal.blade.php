   <?php 
use App\Http\Controllers\doctorsController; 
use App\Http\Controllers\customerController; 
$updateData  =doctorsController::getdoctor(Request::get('doctor_id'));
?>
 <div class="box-header with-border">
                    <h3 class="box-title">Complete Your Profile</h3>
                  </div>
<form method="POST"  class="autovaliddate validate"  id="formUpdateDoctora" style="background: inherit; display: block;" enctype="multipart/form-data" action="/savelastupdate" >
        <div class="warner">
       
    </div>
     <select class="w3-select w3-border"  id="countryhidden" required style="display: none;" onchange="getselectedOption(this,'{{$updateData->nationality}}')" ></select> 
        <div class=""><div class="form-group">
          
          <div class="text-center">
            <div class="">
         
          <div class="">
            <div class="w3-display-container w3-hover-opacity">
            <img src="{{ Auth::user()->getFirstMediaUrl('image', 'thumb') }}" alt="..." id="doctorimage" class="user-image img image image-cirle w3-border w3-image-circle w3-circle  circle img-thumbnail w3-hover-opacity" style="width:10%" onclick="$('#imagedoctor').trigger('click')">
            <div class="w3-display-middle w3-display-hover">
              <button   type="button" onclick="$('#imagedoctor').trigger('click')" class="w3-button w3-red">Change picture</button>
            </div>
          </div>
          <input type="file" onchange="return fileValidationView('imagedoctor','doctorimage')"  name="image" id="imagedoctor" style="display: none;" class="user-image img image image-cirle w3-border">
           @if ($errors->has('image'))
            <span class="help-block danger-alert" style="color: red">
                 {{ $errors->first('image') }}
             </span>
           @endif
          </div>
          </div>
        </div> 
</div>
</div>
 <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


        <input type="hidden" name="user_id" value="{{ Request::get('user_id') }}" />
        <input type="hidden" name="doctor_id" value="{{ Request::get('doctor_id') }}" />
        <div class="row w3-padding">
            <div class="col-sm-4">
               <div class="form-group">
            <label class="w3-text-gray w3-small">Title *</label>
               <select class="w3-select w3-border" name="title"  id="Title" required>
                <option value="" disabled selected>Chose title..</option>
               <option value="Mrs">Mrs</option>
               <option value="Drs">Drs</option>
               <option value="Dr">Dr</option>
               <option value="Prof">Prof</option>
                <option value="Sir">Sir</option>
                <option value="Ms">Ms</option>
                <option value="Mis">Mis</option>
              </select> 
            </div>
            </div>


            <div class="col-sm-8"> 
           <div class="form-group">
            <label class="w3-text-gray w3-small">Name *</label>
           <input class="w3-input w3-border" name="doctorname" type="text" placeholder="Fullname" value="{{ $updateData->name }}" required>
          </div>
          </div>


            <div class="col-sm-4">
            <div class="form-group">
             <label class="w3-text-gray w3-small">Gender *</label>
               <select class="w3-select w3-border" name="gender" id="Title" required >
                <option value="{{$updateData->gender}}" disabled selected>{{$updateData->gender}}</option>
               <option value="Male">Male</option>
               <option value="Female">Female</option>
              </select> 
            </div>
          </div>

            <div class="col-sm-4">  <div class="form-group">
             <label class="w3-text-gray w3-small">City *</label>
               <select class="w3-select w3-border" name="city" id="cityupdate" required onended="getselectedOption(this,'{{$updateData->city}}')">
               
              </select> 
            </div>
          </div>

            <div class="col-sm-4"><div class="form-group">
            <label class="w3-text-gray w3-small">Years Of Experience *</label>
           <input class="w3-input w3-border" name="experience" type="number" placeholder="years of your experience" value="{{ $updateData->experience }}" required>
          </div>
        </div> 



            <div class="col-sm-6">
            <div class="form-group">
             <label class="w3-text-gray w3-small">Phone *</label>
               <input class="w3-input w3-border" name="doctortell" type="text" placeholder="Phone +2526" value="{{ $updateData->tell }}" required>
            </div>
          </div>

            <div class="col-sm-6">  <div class="form-group">
             <label class="w3-text-gray w3-small">Date of Birth *</label>
             <input class="w3-input w3-border" name="birthdate" id="birthdates" type="text" placeholder="birth date" value="{{ $updateData->datebirth }}" required>
            </div>
          </div>

            <div class="col-sm-6"><div class="form-group">
            <label class="w3-text-gray w3-small">Address *</label>
           <input class="w3-input w3-border" name="address" type="text" placeholder="Address" value="{{ $updateData->address }}" required>
          </div></div>
           <div class="col-sm-6"><div class="form-group">
            <label class="w3-text-gray w3-small">Visit Ammount*</label>
           <input class="w3-input w3-border" name="visit_amount" type="number" placeholder="visit amount" value="{{ $updateData->visit_amount }}" required>
          </div>
        </div> 






         <div class="col-sm-12"><div class="form-group">
            <label class="w3-text-gray w3-small">About You *</label>
           <textarea class="w3-input w3-border" name="about" type="text" placeholder="your bio" value="{{ $updateData->About }}" required>{{ $updateData->about }}</textarea>
          </div></div>
           
</div>
<div class="w3-padding w3-border-top" style="width: 100%; position: relative;margin-left: -16px ">
  <p  style="display: inline-block;">    
    Changes made here requires varification, if its not reflected back in 48 hours please contact with the assistance <a href="/feedback"> Here</a>
  </p>

                      <div class="navbar-right w3-padding" style="display: inline-block;">
                        <button class="w3-button w3-teal w3-text-white w3-hover" style="display: inline-block; position: relative; right: -5px; bottom: -2.5px"  id="formfieldsubmit" type="button">Save</button>

                      </div> 
                       

                    </div>
</form>
