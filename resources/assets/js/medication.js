var medication_list;
$(document).ready(function(){
loadmedications();
})
function loadmedications(){
	medication_list = $("#medication_table").DataTable({
            paging: true,
            searching: { "regex": true },
            lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
            pageLength: 10,
            "bProcessing": true,
             "bPaginate":true,           
          "sPaginationType":"full_numbers",
            ajax:{
            url: "loadmedication", // Change this URL to where your json data comes from
            type: "POST", // This is the default value, could also be POST, or anything you want.
            data: function(d) {
            d._token  = _token
            },

    },
                   //"sAjaxSource":'?='++'&_token='+$('meta[name=csrf-token]').attr('content'),
           'columnDefs': [{
         'targets': 1,
         'searchable': false,
         'orderable': false,
         'width': '1%',
         "bJQueryUI": true,     
         "bAutoWidth": false,
         'className': 'dt-body-center',
         "render": function ( data, type, row ) {
          return '<a class="w3-padding"  href="?update='+row.id+'"><i id="updatem"  class=" w3-large w3-hover-w3-pale-blue w3-panel-8 w3-hover-opacity w3-animate-zoom fa fa-pencil-square-o" aria-hidden="true" style="cursor:pointer"></i></a>' + 
             '<a data-toggle="modal" data-target="#modal-warn" forid="'+row.id+'" tablename="MedicationList" onclick="docancels(this)" htmtable="medication_list"><i id="dellm" class="fa fa-trash-o w3-large w3-hover-w3-pale-blue w3-panel-8 w3-hover-opacity w3-animate-zoom warn" style="cursor:pointer" data-title="Goto twitter?" aria-hidden="true"></i></a>';
         }
      },
      {
                "render": function ( data, type, row ) {
                   return row.strenght+"/"+row.unit;   
                      
                                      
                },
                "targets": 3,
           }],
                   columns: [
                   { title:"id",  data: 'id',"width": "10%",  "visible": false, name: 'id'},
                   { title:"action", data: 'icon',"width": "10%", name: 'icon'},                   
                   { title:"name",  data: 'name', name: 'name' },
                    { title:"strenght", data: 'strenght', name: 'strenght' },
                    { title:"Route ", data: 'route_name', name: 'route_name' },
                    { title:"Dosage", data: 'dosage_unit_name', name: 'dosage_unit_name' },
                   
                    
                ]
                });
}