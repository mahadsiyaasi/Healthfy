$(document).ready(function(){
	test_view= $('.test_view').DataTable({
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
    url: "/loadptest", // Change this URL to where your json data comes from
    type: "POST", // This is the default value, could also be POST, or anything you want.
    data: function(d) {
    d.patient_id = $("input[name=patient_id]").val(),
    d._token  = _token
    },
    },
   //"sAjaxSource":'?_token='+$('meta[name="csrf-token"]').attr('content')       
    columns: [             
            {title:"Tests", data: 'testname', name: 'testname', width: 80},
            {title:"Description", data: 'description', name: 'description', visible:false},          
            { title:"Amount",data: 'amount', name: 'amount', width: 40},
            { title:"Test Date",data: 'date', name: 'date', width: 80},
            { title:"Total",data: 'total_amount', name: 'total_amount', visible:false},
            {title:"Patient", data: 'patient_name', name: 'patient_name', visible:false},
            { title:"Doctor",data: 'doctor_name', name: 'doctor_name' , visible:false},
            { title:"id",data: 'id', name: 'id', visible:false},
            { title:"order",data: 'test_order_id', name: 'test_order_id', visible:false},
            { title:"status_name",data: 'status_name', name: 'status_name', visible:false},
            ],
        "columnDefs": [
       {
        "render": function ( data, type, row ) {
          return '<strong class="testname">'+row.testname+'</strong><br><small>'+row.description+'</small>';
         },
        "targets": 0
      },
      {
          "render": function ( data, type, row ) {
          return '$'+row.amount;
         },
"targets": 2
      },
       {
          "render": function ( data, type, row ) {
          return '<a class="badge-blue"><span class="badge w3-blue">'+row.status_name+'</span></a>';
         },
"targets": 3
      }          
        ],
        "order": [[ 7, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(8, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
              var emptyraw;//='<tr class=""><td  class="" style="height:10px" colspan="2"> </td></tr>';
               var data =  test_view.row(i).data();
           var htmsddd= "<div class='w3-padding'><a  href='"+_id+"/add?new=test' id='addstyle'   class=' w3-text-white  w3-round-medium w3-text-bold' style='cursor:pointer;width:150px;' onClick=''>  <i class='fa fa-plus' aria-hidden='true'></i> Add</a>   <a  id='justprint'   class=' w3-text-white  w3-round-medium w3-text-bold' style='cursor:pointer;width:150px;' onClick=''> | <i class='fa fa-print' aria-hidden='true'></i> print</a></div>";
                grouphtm = emptyraw+'<tr class="w3-text-white w3-light-blue w3-medium" style="padding:0px 0px 0px"><td><div class="w3-row"><div class="w3-half"> <p class="w3-large" style="position:relative;top:-4px">  <span class="w3-text-black">Dr.</span> '+data.doctor_name+' </p> <p class="w3-small" style="position:relative; margin-bottom:-18px;top:-15px">'+data.patient_name+'(order id(# <strong class="w3-text-black">'+data.test_order_id+'</strong>)) </p></div> <div class="w3-half ">Tested from  <strong>'+data.date+'</strong></div></div></td><td> Total $'+data.total_amount+'</td><td id='+data.doctor_name+'> '+htmsddd+'</td></tr>';
               
               $(rows).eq( i ).before(

                     grouphtm
                    

                    );

                    last = group;
                }
            } );
        }
    });

})

