   <?php 
use App\Http\Controllers\doctorsController; 
use App\Http\Controllers\customerController; 
$updateData  =doctorsController::getdoctor(Request::get('doctor_id'));
?>
 <div class="box-header with-border">
                    <h3 class="box-title">Complete Education Specialization</h3>
                  </div>
<form method="POST"  class=""  id="educationfm" style="background: inherit; display: block;" action="/educationDoctor" >
        <div class="warner">
       
    </div>
 <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <div class="row w3-padding">
               <div class="col-sm-4">
            <div class="form-group">
             <label class="w3-text-gray w3-small">Qualification *</label>
               <select class="w3-select w3-border" name="qualification" id="Title" required >
                <option value="" disabled selected>select qualification</option>
                @foreach(doctorsController::loaddegrees() as $val)
                 <option value="{{$val->id}}">{{$val->name}}</option>
                @endforeach  
              </select> 
            </div>
          </div>

            <div class="col-sm-4">  <div class="form-group">
             <label class="w3-text-gray w3-small">College *</label>
             <?php use App\Models\EnumListing;
              $Universites = EnumListing::where("group_key","University")->where("type_key","MedicineUniversity")->get();
              ?>
               <select class="w3-select w3-border" name="college"  required onended="getselectedOption(this,'{{$updateData->city}}')">
                @foreach($Universites as $uni)

               <option value="{{$uni->status_id}}">{{$uni->status_name}}</option>

               @endforeach
               
              </select> 
            </div>
          </div>
          <?php $range = range(1970, date("Y")) ?>
            <div class="col-sm-4"><div class="form-group">
            <label class="w3-text-gray w3-small">Complete year *</label>
           <select class="w3-select w3-border" name="city" id="cityupdate" required>
             <option value="" disabled selected>select year</option>
               @foreach($range as $year)

                <option value="{{$year}}">{{$year}}</option>

               @endforeach
              </select> 
          </div>
        </div> 



           
</div>
<div class="w3-padding w3-border-top" style="width: 100%; position: relative;margin-left: -16px ">
  <p  style="display: inline-block;">    
    Changes made here requires varification, if its not reflected back in 48 hours please contact with the assistance <a href="/feedback"> Here</a>
  </p>

                      <div class="navbar-right w3-padding" style="display: inline-block;">
                        <button class="w3-button w3-teal w3-text-white w3-hover" style="display: inline-block; position: relative; right: -5px; bottom: -2.5px"  id="formfieldsubmit" type="submit">Save</button>

                      </div> 
                       

                    </div>
</form>
