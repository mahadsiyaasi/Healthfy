
<template>
    <div>
        <div class="modal  modal-fullscreen w3-arround-large "    id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:block">
              <div class="modal-dialog w3-border w3-arround-large w3-animate-zoom" style="width:${array.width}"  role="document">
              <div class="modal-content '+array.color+'">
              <div class="modal-header" style="border: none;">
              <button type="button"  class="destroyer close" data-dismiss="modal" @click="close" aria-label="Close">
              <span aria-hidden="true">&times;</span></button><h4 class="modal-title w3-text-gray">{{array.title}}</h4></div>'
            
            
            <div class="modal-body" id="modalBody">
                 <section>
                <!-- <component :is="component" :data="data"></component> -->
                </section>

            </div>
            
            
            
            <div class="modal-footer" style="border: none;">
            <button type="button" class="btn w3-text-red dismism destroyer" data-dismiss="modal"   @click="close" style="background:inherit">Close</button>
            <button type="button" class="btn  '+array.buttoneventclass+' w3-text-blue" style="background:inherit" data-loading-text="'+wait+' Wait">{{array.buttontext}}</button>
            </div></div></div>
            </div> 
       
    
    </div>
</template>
    <script>
  export default {
      props:['width'],
    name: 'modal',
    data(){
        return{
            array:{
                title:"payment form",
                width:this.width,
                color:"w3-white",
                fade:"w3-animate-zoom",
                buttontext:"Save",
                buttoneventclass:"savelabpaymentbtn",
                buttoncolor:"w3-blue",
            }
        }
    },
    methods: {
      close() {
        this.$emit('close');
      },
    },
  };
</script>

