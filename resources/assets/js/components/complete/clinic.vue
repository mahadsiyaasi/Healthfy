<template>
<div>
    <div class="panel-group" id="accordion">
    <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
        <div style="position:relative,">
          <a data-toggle="collapse" data-parent="#accordion" href="#clicnic" style="position: relative;display:inline-block;"><h5 class="box-title">Clinic and Timing Setup</h5></a>
          <a @click="openModal" class="w3-border pull-right btn" style="position: relative;display:inline-block;"><i class="fa fa-plus"> Add Clinic</i></a>
       </div>
        </h4>
      </div>
      <div id="educations" class="panel-collapse collapse in">
        <div class="panel-body">

           </div>
 </div>
 </div>
</div>
<app-modal
     v-show="showModal"
      @close="closeMd"
      @submitfm="onSubmit($event)">
                <form method="POST"  class="autovaliddate validate" @submit="onSubmit"  id="clinicfm" style="background: inherit; display: block;">
                            <div class="warner"> </div> 
                    <div class="row w3-padding">
                        <div class="col-sm-4">
                            <div class="form-group">
                              <label class="w3-text-gray w3-small">Clinic Name *</label>
                            <input class="w3-input w3-border" v-model="form.clinic_name"  type="text" placeholder="clinic name "  required>
                            {{form.consultant_free}}
                             </div>
                             </div>

                             <div class="col-sm-4">  <div class="form-group">
                            <label class="w3-text-gray w3-small">Consultant Duration</label>
                            <input class="w3-input w3-border" v-model="form.consultant_duration" type="number" placeholder="consultant duration"  required>                      
                             </div>
                            </div>

                            <div class="col-sm-4">  <div class="form-group">
                            <label class="w3-text-gray w3-small">Consultant Fee *</label>
                            <input class="w3-input w3-border" v-model="form.consultant_free" type="number" placeholder="Clinic Fee"  required>
                         </div>
                        </div>
                    </div>
                    
                    </form>
    </app-modal>
</div>
</template>
<script>
// import modal from '../../modal.js'
import { bus } from '../../Hub.js';
import modal from '../modal.vue';
export default {
 components:{"app-modal":modal},
    data(){
        return {
        showModal: false ,
        md:app-modal,        
                form: new form({
                    clinic_name:"",
                    address:"",
                    consultant_duration:"",
                    consultant_free:"",
                    country:"",
                    city:"",
                    msg:""                                
                    }), 
                    countries:['Somalia'],
                    cities:["Warta nabad"],
                    country:null,
                    city:null,  
                     array:{
                        width:"50%",  
                        title:'Clinic Registration',
                        color:"w3-white",
                        fade:"w3-animate-zoom",
                        buttontext:"Procced",
                        buttoneventclass:"OK",
                        buttoncolor:"w3-white",
                        body:``,
                        savebtn:true,
                        cancelbtn:true,
                        submitData: function(){
                            alert('happen');
                        }
                        }
        }
    
    },
    methods:{
         openModal() {                  
            bus.$emit('modalDesign', this.array);
             this.showModal=true;  
        } ,         
        closeMd(){
        this.showModal=false;
        }, 
        
     onSubmit (evt) {
      //evt.preventDefault();
      this.form.post('/clinicsaving',{headers: {
                        'X-CSRF-TOKEN': $('meta[name=_token]').attr('content')
                    }}).then(res=>{
          this.fetch();
          this.showModal=false;          
      }).catch(err=>{
                console.log(err);
            });
    },
    onReset (evt) {
      evt.preventDefault();
      this.form.email = '';
      this.form.name = '';
      this.form.phone = "";
      this.form.country = null;
      this.form.city =null;
      this.form.address="";
      this.form.password="",
      evt.target.reset();
      this.$nextTick(() => { this.show = true });
    }  
    },
     created() {
       
    },
    mounted(){
        this.$nextTick(function () {
        //this.$emit('openModal');
        }.bind(this));
    }
}
</script>
