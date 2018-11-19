
let arrayfile = {
  DeteilView(array){
    //console.log(array)
    var BS = {
        BSMDestroy:function(){
              $('body').find("#DeteilView").modal('hide');
              $('body').find("#DeteilView").on('hidden.bs.modal', function () {
              $(this).data('bs.modal', null);
            })
        
      },
      fm:function(){     
         return $("#DeteilView").find("form");   
      }
    }
    var wait = '<i class=a fa-circle-o-notch fa-spin></i>'
    var modal = '<div class="modal fade modal-fullscreen w3-arround-large"  tabindex="-1" role="dialog" aria-labelledby="modalLabel" id="DeteilView">'
                +'<div class="modal-dialog w3-border w3-arround-large" style="width:'+array.width+'">'
                +'<div class="modal-content '+array.color+'">'
                +'<div class="modal-header" style="border: none;">'
                +'<button type="button"  class="destroyer close" data-dismiss="modal" aria-label="Close">'
                +'<span aria-hidden="true">&times;</span></button><h4 class="modal-title w3-text-gray">'+array.title+'</h4></div>'
                +'<div class="modal-body" id="modalBody"></div><div class="modal-footer" style="border: none;">';
                    if (array.cancelbtn) {
                      modal +='<button type="button" class="btn w3-text-red dismism destroyer" data-dismiss="modal" style="background:inherit">Close</button>'
                    }
                    if (array.savebtn) {
                      modal +='<button onclick="" type="button" class="btn  '+array.buttoneventclass+' w3-text-blue" style="background:inherit" data-loading-text="'+wait+' Wait">'+array.buttontext+'</button>';
                    }                
                    modal +='</div></div></div></div>'                
                  $(".specialmodal").html(modal);
                  if (array.loading) {
                     $(".specialmodal #modalBody").html("<h1>loading</h1>")
                   }               
                  setTimeout(function() {
                     $(".specialmodal #modalBody").html(array.body);
                     array.bodyJsParser(BS.fm());
                     }, 1000);
                  if (array.backdrop==false) {
                  $(".specialmodal").find("#DeteilView").modal({backdrop: 'static', keyboard: false})
                  }
                  $(".specialmodal").find("#DeteilView").modal("show");              
                        $("."+array.buttoneventclass).click(function(){
                         if (array.submitData(BS.fm())){
                          BS.BSMDestroy();
                          $(".specialmodal").data(null)
                         }})
                        $(".specialmodal .destroyer").click(function(){
                         BS.BSMDestroy();
                          $(".specialmodal").data(null)
                         })
                        
                        
                  return BS;
                 
  },
  modalmakeup(array){
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
          format:'y-m-d',
          });
           });
  }
  function ajaxtoserv(data,type,url,btn){
   //var btn = $.fn.button.noConflict() // reverts $.fn.button to jqueryui btn
    //$.fn.btnBootstrap = btn;
    var bools = false;
    if (type=="form") {
     commonvalidator(data);
    var datsend = $(data).serialize();
    if ($(data).valid()) { 
      //$(btn).btnBootstrap('loading');
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
          if (data !="#formUpdateDoctora") {
        $(data).trigger("reset")
      }
        }
        bools =  res;
         //$(btn).btnBootstrap('reset');
        },
        error: function(xhr){ 
        warner(data,xhr.responseJSON.message,11)
         //$(btn).btnBootstrap('reset');
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
            warner(res.errprplace,res.messages,tybol)
           // $(btn).btnBootstrap('reset');
            
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
        removeColorizeErrors(modal,i)
          customColorizeErrors(modal,item,i)
            $(modal).find(".warner").html('<div class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> <i class="fa fa-warning"></i>    </strong>'+item+'.</div>');
            setTimeout(function() {
            $(modal).find(".warner").html("")
             $(modal).find("input[name="+i+"]").change(function(){
              removeColorizeErrors(modal,i)
             })
             $(modal).find("input[textarea="+i+"]").change(function(){
              removeColorizeErrors(modal,i)
             })
             $(modal).find("select[name="+i+"]").change(function(){
              removeColorizeErrors(modal,i)
             })
              
           
  
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
  function customColorizeErrors(modal,item,i){
   $(modal).find("input[name="+i+"]").addClass("w3-border-red")
    $(modal).find("select[name="+i+"]").addClass("w3-red")
    $(modal).find("textarea[name="+i+"]").addClass("w3-red")
    $(modal).find("input[name="+i+"]").parent().append("<label  style='position:relative; left:-15px; top:-15px' class=' alert  flash w3-small w3-text-red'>"+item+"</label>")
    $(modal).find("textarea[name="+i+"]").parent().append("<label  style='position:relative; left:-15px; top:-15px' class=' alert  flash w3-small w3-text-red'>"+item+"</label>")
    $(modal).find("select[name="+i+"]").parent().append("<label  style='position:relative; left:-15px; top:-15px' class=' alert  flash w3-small w3-text-red'>"+item+"</label>")
  }
  function removeColorizeErrors(modal,i){
   $(modal).find("input[name="+i+"]").removeClass("w3-border-red")
    $(modal).find("select[name="+i+"]").removeClass("w3-red")
    $(modal).find("textarea[name="+i+"]").removeClass("w3-red")
    $(modal).find("input[name="+i+"]").parents("div:first").find("label").remove()
    $(modal).find("select[name="+i+"]").parents("div:first").find("label").remove()
    $(modal).find("textarea[name="+i+"]").parents("div:first").find("label").remove()
  }
  function _dateStyl(date) {
    var monthNames = [
      "January", "February", "March",
      "April", "May", "June", "July",
      "August", "September", "October",
      "November", "December"
    ];
  
    var day = date.getDate();
    var monthIndex = date.getMonth();
    var year = date.getFullYear();
  
    return day + ' ' + monthNames[monthIndex] + ' ' + year;
  }
  function _timeStyl(date) {
    date = new Date(date);
    let diff = new Date() - date; // the difference in milliseconds
    if (diff < 1000 && diff>0) { // less than 1 second
      return 'right now';
    }
    if (diff < 0) { // less than 1 second
      let d = date;
    d = [
      '0' + d.getDate(),
      '0' + (d.getMonth() + 1),
      '' + d.getFullYear(),
      '0' + d.getHours(),
      '0' + d.getMinutes()
    ].map(component => component.slice(-2));
  
    // join the components into date
    return _dateStyl(date)+ ' ' + d.slice(3).join(':');
    }
  
    let sec = Math.floor(diff / 1000); // convert diff to seconds
  
    if (sec < 60) {
      return sec + ' sec. ago';
    }
  
    let min = Math.floor(diff / 60000); // convert diff to minutes
    if (min < 60) {
      return min + ' min. ago';
    }
  
    // format the date
    // add leading zeroes to single-digit day/month/hours/minutes
   let d = date;
    d = [
      '0' + d.getDate(),
      '0' + (d.getMonth() + 1),
      '' + d.getFullYear(),
      '0' + d.getHours(),
      '0' + d.getMinutes()
    ].map(component => component.slice(-2));
  
    // join the components into date
    return _dateStyl(date)+ ' ' + d.slice(3).join(':');
  }
  export default arrayfile
