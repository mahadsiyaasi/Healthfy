var pateient_editor;
var doctor_editor;
var columns=[];
$(document).ready(function(){

    var tableid = $('.tabledata').attr("id");
  if (tableid=="MedicationList") {
   mtable(tableid)
  }else if (tableid=="PaymentMethod"){
  mpayment(tableid); 
  }
  else if (tableid=="Staff" || tableid=="Doctor"  ){
    var columns = [
     {title:"Action", data: 'user_id', name: 'user_id', width:10},
            { title:"Name",data: 'name', name: 'name' },
            {title:"Tell", data: 'tell', name: 'tell' },
            {title:"E-mail", data: 'email', name: 'email' },
            { title:"Nationality",data: 'nationality', name: 'nationality' },
            { title:"Address",data: 'address', name: 'address' },
            {title:"Speciality", data: 'specialization', name: 'specialization' },
            {title:"Access", data: 'specialization', name: 'specialization'},
            {title:"Speciality", data: 'id', name: 'id', visible: false},
            
            ];
  alleditdata(tableid,"loaddoctors",columns,"updatedoctor","delldoctor"); 
  }else if (tableid=="Patient") {
    columns = [
             { title:"Action", data: 'action ', name: 'action' },
            {title:"Patient", data: 'id', name: 'id' },
            { title:"Patient",data: 'patient_name', name: 'patient_name' },
            {title:"Tell", data: 'patient_tell', name: 'patient_tell' },
            {title:"Country", data: 'country', name: 'country' },
            { title:"State",data: 'state', name: 'state' },
            { title:"District",data: 'district', name: 'district' },
            {title:"Gender", data: 'gender', name: 'gender' }
        ],
         alleditdata(tableid,"sendgriddata",columns,"updatepat","dellpat"); 
  }
});
function alleditdata(tableid,url,columns,updateid,delid){
 if(tableid=="Patient"){
  pateient_editor =  $("#"+tableid).DataTable({
            paging: true,
            searching: { "regex": true },
            lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
            pageLength: 10,
            "bProcessing": true,
             "bPaginate":true,           
          "sPaginationType":"full_numbers",
            ajax:{
            url: url, // Change this URL to where your json data comes from
            type: "POST", // This is the default value, could also be POST, or anything you want.
            data: function(d) {
                d._token  = _token,
                d.filter=tableid;
            },

    },
                   //"sAjaxSource":'?='++'&_token='+$('meta[name=csrf-token]').attr('content'),
        'columnDefs': [{
         'targets': 0,
         'searchable': false,
         'orderable': false,
         'width': '1',
         "bJQueryUI": true,     
         "bAutoWidth": false,
         'className': 'dt-body-center',
         "render": function ( data, type, row ) {
          return '' + 
             '<a data-toggle="modal" data-target="#modal-warn" forid="'+row.id+'" tablename="Patient" onclick="docancels(this)" htmtable="pateient_editor"><i id="'+delid+'" class="fa fa-trash-o w3-large w3-hover-w3-pale-blue w3-panel-8 w3-hover-opacity w3-animate-zoom warn" style="cursor:pointer" data-title="Goto twitter?" aria-hidden="true"></i></a>';
         },

      },{
     
                "render": function ( data, type, row ) {
                  if (row.id) {
                    return '<a  class="w3-padding" href="?patient=' + row.id+'">'+row.patient_name+'  <i class=" w3-hover-w3-pale-blue w3-panel-8 w3-hover-opacity w3-animate-zoom fa fa-pencil-square-o" aria-hidden="true" style="cursor:pointer"></i></a>';
                  }
                },
                "targets": 2
            },
            { "visible": false,  "targets": [ 1 ] }],
                   columns: columns
      
   });
 
}else {
  doctor_editor =  $("#"+tableid).DataTable({
            paging: true,
            searching: { "regex": true },
            lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
            pageLength: 10,
            "bProcessing": true,
             "bPaginate":true,           
          "sPaginationType":"full_numbers",
            ajax:{
            url: url, // Change this URL to where your json data comes from
            type: "POST", // This is the default value, could also be POST, or anything you want.
            data: function(d) {
                d._token  = $('meta[name="csrf-token"]').attr('content'),
                d.filter=tableid;
            },

    },
                   //"sAjaxSource":'?='++'&_token='+$('meta[name=csrf-token]').attr('content'),
           'columnDefs': [{
         'targets': 0,
         'searchable': false,
         'orderable': false,
         'width': '0.3%',
         "bJQueryUI": true,     
         "bAutoWidth": false,
         'className': 'dt-body-center',
         "render": function ( data, type, row ) {
           return '' + 
             '<a data-toggle="modal" data-target="#modal-warn" forid="'+row.id+'" tablename="Staff" onclick="docancels(this)" htmtable="doctor_editor"><i id="'+delid+'" class="fa fa-trash-o w3-large w3-hover-w3-pale-blue w3-panel-8 w3-hover-opacity w3-animate-zoom warn" style="cursor:pointer" data-title="Goto twitter?" aria-hidden="true"></i></a>';
         },

      },
      {
     
                "render": function ( data, type, row ) {
                  if (row.id) {
                    return '<a  class="w3-padding" href="?doctor=' + row.id+'">'+row.name+'  <i class=" w3-hover-w3-pale-blue w3-panel-8 w3-hover-opacity w3-animate-zoom fa fa-pencil-square-o" aria-hidden="true" style="cursor:pointer"></i></a>';
                  }
                },
                "targets": 1
            },

            {
     
                "render": function ( data, type, row ) {
                  if (row.id) {
                   return ' <div class="dropdown " style="display:inline-block;"><button type="button" onclick="paymentpopup(this)" tagid="'+row.id+'"  tagpatient_id="'+row.id+'"  class=" w3-green w3-border w3-border-white " style="border:none">Active</button><button type="button" class="btn w3-border-white w3-border" dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>'
                      +'<ul class="dropdown-menu w3-border" style=" z-index; 11111111111">'
                        +' <li class=""><a class="" onclick="proccedtoUnApprove(this)" _id="'+row.id+'" ><i class="fa fa-check"></i> Decline</a></li>'
                         +' <li class=""><a class="" onclick="paymentpopup(this)" tagid="'+row.id+'" ><i class="fa fa-file"></i>History & Files</a></li>'
                         +' <li class=""><a class="" data-toggle="modal" data-target="#modal-warn"  tablename="OrderMaster" onclick="if(docancels(this)){datadtab.reload()}"  ><i class="fa fa-trash"></i> Cancel</a></li>'
                       +' </ul>'+
                    '</div>'
                  }
                },
                "targets": 7
            },

            ],
                   columns: columns
      
   });
 
}
   
}

