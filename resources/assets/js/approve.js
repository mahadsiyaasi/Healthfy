
var approvedTable;
$(document).ready(function(){
	  approvedTable= $('#unapproved').DataTable({
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
    url:"/loaddoctors", // Change this URL to where your json data comes from
    type: "POST", // This is the default value, could also be POST, or anything you want.
    data: function(d) {
    d._token  = _token;
    d.unapproved= "unapproved";
    
    },
    },
   //"sAjaxSource":'?_token='+$('meta[name="csrf-token"]').attr('content')       
    columns: [             
            { title:"Name",data: 'name', name: 'name' },
            {title:"Tell", data: 'tell', name: 'tell' },
            {title:"E-mail", data: 'email', name: 'email' },
            { title:"Nationality",data: 'nationality', name: 'nationality' },
            { title:"Address",data: 'city', name: 'city' },
            { title:"Address",data: 'address', name: 'address' },
            {title:"Speciality", data: 'specialization', name: 'specialization' },
            {title:"Degree", data: 'degree', name: 'degree' },
            {title:"Experience", data: 'experience', name: 'experience'},
            {title:"Action", data: 'experience', name: 'experience'},
            { title:"Name",data: 'id', name: 'id' , visible:false},
            ],
        "columnDefs": [{
         'targets': 9,
     
         "render": function ( data, type, row ) {
            if (row.degree || row.experience) {
          return ' <div class="dropdown " style="display:inline-block;"><button type="button"  tagid="'+row.id+'"  tagpatient_id="'+row.id+'"  class="w3-border w3-border-white w3-red" style="border:none">Waiting Approval</button><button type="button" class="btn w3-border-white w3-border" dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>'
                      +'<ul class="dropdown-menu w3-border" style=" z-index; 11111111111">'
                        +' <li class=""><a class="" onclick="proccedtoApprove(this)" _id="'+row.id+'" ><i class="fa fa-check"></i> Approve</a></li>'
                         +' <li class=""><a class="" onclick="paymentpopup(this)" tagid="'+row.id+'" ><i class="fa fa-file"></i>History & Files</a></li>'
                         +' <li class=""><a class="" data-toggle="modal" data-target="#modal-warn"  tablename="OrderMaster" onclick="if(docancels(this)){datadtab.reload()}"  ><i class="fa fa-trash"></i> Cancel</a></li>'
                       +' </ul>'+
                    '</div>'
                }else{
                    return "<span class='badge w3-blue'>No Document Apploaded</span>"
                }
         },

      }
    ]
       /* "order": [[ 0, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(0, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
              var emptyraw;//='<tr class=""><td  class="" style="height:10px" colspan="2"> </td></tr>';
               var data =  appoin_table.row(i).data();
           var htmsddd= "<div class='w3-padding'><a  href='"+_id+"/add?new=test' id='addstyle'   class=' w3-text-white  w3-round-medium w3-text-bold' style='cursor:pointer;width:150px;' onClick=''>  <i class='fa fa-plus' aria-hidden='true'></i> Add</a>   <a  id='justprint'   class=' w3-text-white  w3-round-medium w3-text-bold' style='cursor:pointer;width:150px;' onClick=''> | <i class='fa fa-print' aria-hidden='true'></i> print</a></div>";
                grouphtm = emptyraw+'<tr class="w3-text-white w3-light-blue w3-medium" style="padding:0px 0px 0px">'+
                '<td colspan="6"><div class="w3-row"><div class="w3-half"> <p class="w3-large" style="position:relative;top:-4px">  <span class="w3-text-black">Dr.</span> '+data.patient_name+' </p> <p class="w3-small" style="position:relative; margin-bottom:-18px;top:-15px">'+data.patient_name+'(order id(# <strong class="w3-text-black">'+data.id+'</strong>)) </p></div> <div class="w3-half ">Tested from  <strong>'+data.date+'</strong></div></div></td><td colspan="6"> Total $'+data.amount+
                '</td><td id='+data.patient_name+'> '+htmsddd+'</td></tr>';
               
               $(rows).eq( i ).before(

                     grouphtm
                    

                    );

                    last = group;
                }
            } );
        }*/
    });






	
})

function proccedtoApprove(datas){
  var dism = $("body").DeteilView({
     title:' Confirm Approval',
    width:"50%",
    color:"w3-white",
    fade:"w3-animate-zoom",
    buttontext:"Procced",
    buttoneventclass:"OK",
    buttoncolor:"w3-blue",
    body:"<h1>Are sure to approve this doctor with a complete doccuments ?</h1><p class='badge w3-red'><td>warning <strong>do not approve this person untill complete neccesery fields</strong></td></p>",
    savebtn:true,
    cancelbtn:true,
    submitData: function(){
      var data  = ajaxtoserv({_token:_token,"_id":$(datas).attr("_id")},"not form","loaddoctors",null);
        if (data.success) {
          approvedTable.ajax.reload();
          return true;
          }

    }
  })

}

function proccedtoUnApprove(datas){
  var dism = $("body").DeteilView({
     title:' Confirm Decline',
    width:"50%",
    color:"w3-white",
    fade:"w3-animate-zoom",
    buttontext:"Procced",
    buttoneventclass:"OK",
    buttoncolor:"w3-blue",
    body:"<h1>Are sure to Decline this doctor ?</h1><p class='badge w3-red'><td><strong>warning</strong> this doctor will completely stop working all system features untill re-approved</td></p>",
    savebtn:true,
    cancelbtn:true,
    submitData: function(){
      var data  = ajaxtoserv({_token:_token,"decline_id":$(datas).attr("_id")},"not form","loaddoctors",null);
        if (data.success) {
          doctor_editor.ajax.reload();
          return true;
          }

    }
  })

}