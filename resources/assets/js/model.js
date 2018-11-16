let arrayfile = {
modalstart(array){
	var wait = '<i class=a fa-circle-o-notch fa-spin></i>'
	var modal = '<div class="modal  w3-card-8 w3-border w3-round-medium" id="oncreate" >'
          		+'<div class="modal-dialog   w3-round-medium w3-card-8 w3-card w3-panel-8 w3-border " style="width:'+array.width+'">'
            	+'<div class="modal-content '+array.color+'">'
              	+'<div class="modal-header" style="border: none;">'
                +'<button type="button" class="close" data-dismiss="modal" aria-label="Close">'
                +'<span aria-hidden="true">&times;</span></button><h4 class="modal-title">'+array.title+'</h4></div>'
              	+'<div class="modal-body">'
              	+array.body+
                '</div><div class="modal-footer" style="border: none;">'
                +'<button type="button" onclick= "removebesmodal()" class="btn w3-text-red dismism" data-dismiss="modal" style="background:inherit">Close</button>'
                +'<button type="button" class="btn  '+array.buttoneventclass+' w3-text-blue" style="background:inherit" data-loading-text="'+wait+' Wait">'+array.buttontext+'</button></div></div></div></div>';
                removebesmodal()
 	 			$(".specialmodal").html(modal);
        if (array.backdrop==false) {             
        $(".specialmodal").find("#oncreate").modal({backdrop: 'static', keyboard: false}) 
         }
        $(".specialmodal").find("#oncreate").modal("show");
}
}
export default arrayfile;
