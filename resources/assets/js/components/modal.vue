
<template>
    <div>
        <div class="modal  modal-fullscreen w3-arround-large "    id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:block">
              <div class="modal-dialog w3-border w3-arround-large w3-animate-zoom" v-bind:class="array.fade" v-bind:style="{ width: array.width }"  role="document">
              <div class="modal-content" v-bind:class="array.color">
              <div class="modal-header" style="border: none;">
              <button type="button"  class="destroyer close" v-bind:style="{ display: array.cancelbtn }" data-dismiss="modal" @click="close" aria-label="Close">
              <span aria-hidden="true">&times;</span></button><h4 class="modal-title w3-text-gray">{{array.title}}</h4></div>    
            
            <div class="modal-body" id="modalBody">
               <slot>

               </slot>

            </div>
            
            
            
            <div class="modal-footer" style="border: none;">
            <button type="button" class="btn w3-text-red dismism destroyer" data-dismiss="modal"   @click="close" style="background:inherit">Close</button>
            <button type="button" class="btn  w3-text-blue" @click="submitfm" style="background:inherit" v-bind:class="[array.buttoneventclass,array.buttoncolor]" data-loading-text="'+wait+' Wait">{{array.buttontext}}</button>
            </div></div></div>
            </div> 
       
    
    </div>
</template>
    <script>
    import { bus } from '../Hub.js';
  export default {
    data(){
        return{
            form :{},
               array:{
                title:"No Title",
                width:"50%",
                color:"w3-white",
                fade:"w3-animate-zoom",
                buttontext:"Save",
                buttoneventclass:"savelabpaymentbtn",
                buttoncolor:"w3-white",
                cancelbtn:'block',
            }
        }
    },
    methods: {
      close() {
        this.$emit('close');
      },
      submitfm(){
          this.$emit('submitfm');
      }
    },
    created() {
   
    
    },
    mounted(){
    bus.$on('modalDesign', obj => {
        this.array.width = obj.width?obj.width:this.array.width;
        this.array.title = obj.title?obj.title:this.array.title;
        this.array.fade = obj.fade?obj.fade:this.array.fade;
        this.array.buttontext = obj.buttontext?obj.buttontext:this.array.buttontext;
        this.array.cancelbtn = obj.cancelbtn?obj.cancelbtn:this.array.cancelbtn;        
        $("#myModal").modal('show')
    });
    }
  };
</script>

