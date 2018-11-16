<template>
    <div>
        '<div class="modal fade modal-fullscreen w3-arround-large"  tabindex="-1" role="dialog" aria-labelledby="modalLabel" id="vuemodal">'
              <div class="modal-dialog w3-border w3-arround-large" style="width:'+array.width+'">
              <div class="modal-content '+array.color+'">
              <div class="modal-header" style="border: none;">
              <button type="button"  class="destroyer close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button><h4 class="modal-title w3-text-gray">{{array.title}}</h4></div>'
            <div class="modal-body" id="modalBody"></div><div class="modal-footer" style="border: none;">
            <button type="button" class="btn w3-text-red dismism destroyer" data-dismiss="modal" style="background:inherit">Close</button>
            <button onclick="" type="button" class="btn  '+array.buttoneventclass+' w3-text-blue" style="background:inherit" data-loading-text="'+wait+' Wait">{{array.buttontext}}</button>
            </div></div></div>
            </div> 
    
    </div>
</template>
    
<script>
export default {
data () {
      return {
        array: {
            title:"this modal Title",
            buttontext:"save",
            
        }
      }
    },
    methods: {
      
    },
    ready () {
        
    }
}
</script>

<style>

</style>

