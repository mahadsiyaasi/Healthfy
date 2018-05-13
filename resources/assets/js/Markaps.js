$.fn.DeteilView = function(array){
  var wait = '<i class=a fa-circle-o-notch fa-spin></i>'
  var modal = '<div class="modal  w3-card-8 w3-border w3-round-medium" id="DeteilView">'
              +'<div class="modal-dialog   w3-round-medium w3-card-8 w3-card w3-panel-8 w3-border " style="width:'+array.width+'">'
              +'<div class="modal-content '+array.color+'">'
                +'<div class="modal-header" style="border: none;">'
                +'<button type="button" onclick= "BSMRemover()" class="close" data-dismiss="modal" aria-label="Close">'
                +'<span aria-hidden="true">&times;</span></button><h4 class="modal-title">'+array.title+'</h4></div>'
                +'<div class="modal-body">'
                +array.body+
                '</div><div class="modal-footer" style="border: none;">';
                  if (array.savebtn) {
                    modal +='<button type="button" class="btn  '+array.buttoneventclass+' w3-text-blue" style="background:inherit" data-loading-text="'+wait+' Wait">'+array.buttontext+'</button>';
                  }
                  if (array.cancelbtn) {
                    modal +='<button type="button" onclick= "BSMRemover()" class="btn w3-text-red dismism" data-dismiss="modal" style="background:inherit">Close</button>'
                  }
                  modal +='</div></div></div></div>' 
               
                $(".specialmodal").html(modal);
                $(".specialmodal").find("#DeteilView").modal("show");
                if (array.submitData) {
                      array.submitData();
                      setTimeout(function() {
                      BSMRemover();
                      }, 500);
                }
               
}
function BSMRemover(){
$('body').find("#DeteilView").modal('hide');
  $('body').find("#DeteilView").on('hidden.bs.modal', function () {
      $(this).data('bs.modal', null);
})
}
function modalmakeup(array){
	var wait = '<i class=a fa-circle-o-notch fa-spin></i>'
	var modal = '<div class="modal  w3-card-8 w3-border w3-round-medium" id="oncreate">'
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
        $(".specialmodal").find("#oncreate").modal("show");
}
function commonvalidator(form){
  $.validator.messages.required = '';

var validator = $(form).validate({
           messages: {},
        highlight: function (element) {
            $(element).addClass("w3-border-red")
            },
        unhighlight: function (element) {
             $(element).removeClass("w3-border-red")
             
        },
 });
 $(form).validate({
  rules: {
    field: {
      required: true,
      url: true
    }
  }
});
}
function timereuse(control){
   $(function () {
        $(control).datetimepicker({
        datepicker:false,
        format:'H:i',
        step:5
      });
         });
}
function datereuse(control){
   $(function () {
        $(control).datetimepicker({
        timepicker:false,
        //format:'y-m-d',
        });
         });
}
function ajaxtoserv(data,type,url,btn){
  var bools;
  if (type=="form") {
   commonvalidator(data);
  var datsend = $(data).serialize();
  if ($(data).valid()) { 
    $(btn).button('loading');
    $.ajax({
      url:url,
      data:datsend,
      type:"POST",
      async: false,
      datatype:"json",
      success:function(res){
      var tybol = res.success?1:0;      
      warner(data,res,tybol)
      if (res.success) {
      $(data).trigger("reset")
      }
      bools =  res;
       $(btn).button("reset")
      },
      error: function(xhr){ 
      warner(data,xhr.responseJSON.message,05454)
       $(btn).button("reset")
      bools = "error";
      }
    })
  }
}


else{
  $.ajax({
      url:url,
      data:data,
      type:"POST",
      async: false,
      datatype:"json",
      success:function(res){
          
            if (url=="saveorder") {
             return location.href = "/patients/"+_id;
            }
            bools =  res;
          var tybol = res.success?1:0;      
          warner(data,res,tybol)
          $(btn).button('reset');
          
        }
        });
}
return bools;
}
function warner(modal,message,type){
    if (type==1) {
    $(modal).find(".warner").html('<div class="alert alert-success alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> Success ! </strong>'+message.success+'.</div>');
    setTimeout(function() {
    $(modal).find(".warner").html("")
        }, 5000);
    }else if (type==0) {
    $.each(eval(message), function(i, item) {
             
          $(modal).find(".warner").html('<div class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> <i class="fa fa-warning"></i>    </strong>'+item+'.</div>');
     setTimeout(function() {
          $(modal).find(".warner").html("")
        }, 5000);
    });
       
     
        
         
      
     
    }else{
      var msg =  message==""||message==null?"Eror exists server side. contact with developer or visit  go ..":message;
      $(modal).find(".warner").html('<div class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> <i class="fa fa-warning"></i>   </strong>'+msg+'<a href="/feedback">Feedback</a>.</div>');
        setTimeout(function() {
          $(modal).find(".warner").html("")
        }, 5000);
    }
}
function warnerremover(modal){
    $(modal).find(".warner").html("");
}  
function removebesmodal(){

  $('body').find("#oncreate").modal('hide');
  $('body').find("#oncreate").on('hidden.bs.modal', function () {
      $(this).data('bs.modal', null);
});
}