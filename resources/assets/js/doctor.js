var doctors_table;
$(document).ready(function(){
	datereuse("#birthdates");
	$("#doctorbtn").click(function(){
  commonvalidator("#doctorfm")
  if ($("#doctorfm").valid()) {
   if (ajaxtoserv("#doctorfm","form","savedoctor",this).success){
    setTimeout(function(){ 
     location.href="doctors"
    },1000)
}
  }
})

	doctors_table = $('#doctors_table').DataTable({
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
        url: "loaddoctors", // Change this URL to where your json data comes from
        type: "POST", // This is the default value, could also be POST, or anything you want.
        data: function(d) {
            //d.patient_ids = $("input[name=patient_ids]").val(),
            //d.status = 4,
            d._token  = $('meta[name="csrf-token"]').attr('content')
            },

    },
           //"sAjaxSource":'?_token='+$('meta[name="csrf-token"]').attr('content'),
           
          columns: [
          	//{ title:"Action", data: 'action ', name: 'action' },
            {title:"#ID", data: 'user_id', name: 'user_id' },
            { title:"Name",data: 'name', name: 'name' },
            {title:"Tell", data: 'tell', name: 'tell' },
            {title:"E-mail", data: 'email', name: 'email' },
            { title:"Nationality",data: 'nationality', name: 'nationality' },
            { title:"Address",data: 'address', name: 'address' },
            {title:"Speciality", data: 'specialization', name: 'specialization' }
            
        ],
        "columnDefs": [
        /*{
         'targets': 0,
         'searchable': false,
         'orderable': false,
         'width': '10%',
         "bJQueryUI": true,     
          "bAutoWidth": true,
         'className': 'dt-body-center',
         'render': function (data, type, full, meta){
             return '<a class="w3-padding" ><i id="updatepat" class=" w3-large w3-hover-w3-pale-blue w3-panel-8 w3-hover-opacity w3-animate-zoom fa fa-pencil-square-o" aria-hidden="true" style="cursor:pointer"></i></a>' + 
             '<a><i id="dellpat" class="fa fa-trash-o w3-large w3-hover-w3-pale-blue w3-panel-8 w3-hover-opacity w3-animate-zoom warn" style="cursor:pointer" data-title="Goto twitter?" aria-hidden="true"></i></a>';
         }
      },*/
            {
                "render": function ( data, type, row ) {
                    return "<a href='doctors/" + row.id+"'>"+row.name+"</a>";
                },
                "targets": 1
            },
            { "visible": false,  "targets": [ 0 ] }
        ]
    });
  
	})