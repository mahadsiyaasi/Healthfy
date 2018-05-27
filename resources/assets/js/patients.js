var _token =$('meta[name="csrf-token"]').attr('content');
var _id =  $("input[name=patient_id]").val();
$("#togglemenu").trigger("click");
var patient_table;
$(document).ready(function(){
datereuse("#dateofbirth");
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

savepatient =  function(th){
  commonvalidator("#patientfm")
  if ($("#patientfm").valid()) {
    if (ajaxtoserv("#patientfm","form","savepatient",th).success){
       setTimeout(function(){ 
        location.href="patients"
      },1000)
    }

  }

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