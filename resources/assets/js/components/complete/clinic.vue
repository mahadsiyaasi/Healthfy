<template>
<div>
    <form method="POST"  class="autovaliddate validate"  id="clinicfm" style="background: inherit; display: block;" enctype="multipart/form-data" action="/savelastupdate" >
                <div class="warner">
               
            </div>
            
       
                  
                <div class="row w3-padding">
                 <div class="col-sm-4">
                    <div class="form-group">
                     <label class="w3-text-gray w3-small">Clinic Name *</label>
                 <input class="w3-input w3-border" name="clinicName" type="text" placeholder="clinic name "  required>
                    </div>
                  </div>

                    <div class="col-sm-4">  <div class="form-group">
                     <label class="w3-text-gray w3-small">Consultant Duration</label>
                       <input class="w3-input w3-border" name="duration" type="number" placeholder="consultant duration"  required>                         
                    </div>
                  </div>

                   <div class="col-sm-4">  <div class="form-group">
                     <label class="w3-text-gray w3-small">Consultant Fee *</label>
                       <input class="w3-input w3-border" name="clinicfee" type="number" placeholder="Clinic Fee"  required>
                    </div>
                  </div>
                <div class="row w3-padding">
                 
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
</template>
<script>
import modal from '../../Markaps.js'
export default {
    data(){
        return {
        mdfunction : modal,           
            forma:{
            title:' Approval Appointment',
            width:"50%",
            color:"w3-white",
            fade:"w3-animate-zoom",
            buttontext:"Procced",
            buttoneventclass:"OK",
            buttoncolor:"w3-blue",
            body:"<h1>Are you sure to approve this Appointment ?</h1><p class='badge w3-blue'><td><strong>Note</strong> This will procced to payment  . . .</td></p>",
            savebtn:true,
            cancelbtn:true,
            submitData: function(){
            var data  = modal.ajaxtoserv({_token:_token,"_id":$(datas).attr("_id"),"status_id":1},"not form","appointmentStatusChange",null);
                if (data.success) {
                doctors_appoints.ajax.reload();
                return true;
                }

            }
            }

        }
    },
    methods:{
        testAlert(){
            modal.DeteilView(this.forma);
        }
    },
     created() {
        //modal.DeteilView(this.forma);
    }
}
</script>
