var _token =$('meta[name="csrf-token"]').attr('content');
var _id =  $("input[name=patient_id]").val();
$("#togglemenu").trigger("click");
var patient_table;
$(document).ready(function(){

datereuse("#dateofbirth");
$("#savepatient").click(function(){
  commonvalidator("#patientfm")
  if ($("#patientfm").valid()) {
    if (ajaxtoserv("#patientfm","form","savepatient",this).success){


       setTimeout(function(){ 
           
              location.href="patients"
            
          },1000)
    }

  }
})
  patient_table = $('#patientgrid').DataTable({
        "initComplete": function( settings, json ) {
    $('div.loading').remove();
         },
    paging: true,
    searching: { "regex": true },
    lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
    pageLength: 10,
     "bProcessing": true,
     "bPaginate":true,
          "sPaginationType":"full_numbers",
             ajax:{
        url: "sendgriddata", // Change this URL to where your json data comes from
        type: "POST", // This is the default value, could also be POST, or anything you want.
        data: function(d) {
            //d.patient_ids = $("input[name=patient_ids]").val(),
            //d.status = 4,
            d._token  = _token
            },

    },
           //"sAjaxSource":'?_token='+$('meta[name="csrf-token"]').attr('content'),
           
          columns: [
            {title:"Patient", data: 'id', name: 'id' },
            { title:"Patient",data: 'patient_name', name: 'patient_name' },
            {title:"Tell", data: 'patient_tell', name: 'patient_tell' },
            {title:"Country", data: 'country', name: 'country' },
            { title:"State",data: 'state', name: 'state' },
            { title:"District",data: 'district', name: 'district' },
            {title:"Gender", data: 'gender', name: 'gender' }
        ],
        "columnDefs": [
             {
                "render": function ( data, type, row ) {
                    return "<a href='/patients/"+row.id+"'>"+row.patient_name+"</a>";
                },
                "targets": 1
            },
            { "visible": false,  "targets": [ 0 ] }
        ]
    });


});



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




/* $(form).trigger("reset");
          setTimeout(function(){ 
            if (form=="#patientfm") {
              location.href="patients"
            }else if (form=="#doctorfm") {
              location.href="doctors";

            }else if (form == "#appointmentfm") {
              removebesmodal()
              $("body").find("#oncreate").modal("hide");
              $(button).button('reset');
          calendar();
          removebesmodal();
        
            }
            else if (url =="savetestorder") {
               viewonedit.ajax.reload();
                removebesmodal();
            }
         // $(modal).hide();
          $this.button('reset');
                     }, 1500); */