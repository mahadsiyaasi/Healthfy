var appoint_doctor=[];
var appoin_table  ;
$(document).ready(function(){


profileviewappointent();

		$("body").on("change","select[name=disease]",function(){
			var th =$(this).find('option:selected').attr('tagcheckid');
			$.each(eval(appoint_doctor),function(i,item){
				if (th==item.id) {
				$("body").find("input[name=amount]").val(item.visit_amount);
				$("body").find("input[name=doctor]").val(item.name);
                $("body").find("input[name=doctor]").attr('doctortag',item.id);
                $("body").find("input[name=amount]").attr('readonly', true);
				$("body").find("input[name=doctor]").attr('readonly', true);
			}
			})
			
		})
$("body").on("click","#appoinmoreview", function(){
  var tr = $(this).closest('tr');
            var row = appoin_table.row(tr);
            viewappoint(row.data());
})

  

})

loadappoint('loadappoint');
function loadappoint(url){
     $.ajax({
            url:url,
            type:"POST",
            data:{_token:_token,id:"h"},
            datatype:"json",
            success:function(data){  
                appoint_doctor=data;
                if (url=="/loadappoint") {
           $.each(eval(data),function(i,item){
        $("body").find("select[name=disease]").append("<option value='"+item.specialization+"' tagcheckid='"+item.id+"'>"+item.specialization+"</option>");
        })

                }            
            }
        });
}
calendar();
function calendar(){
         
    $("#calender").fullCalendar({
     eventSources: [

        // your event source
        {
           url:"loadevent",
            data:{_token:_token,id:$("input[name=patient_id]").val()},
            datatype:"json",
            error: function() {
                alert('there was an error while fetching events!');
            },
            //color: 'yellow',   // a non-ajax option
            //textColor: 'black' // a non-ajax option
        },
        ],
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,listMonth'
    },
    theme: true,    
        themeSystem:'bootstrap4',        
        editable: true, 
        displayEventTime: true,    
        selectable: true,
        eventRender: function(event, element) {
            element.attr('title', event.tip);
        },
        select: function (start, end, jsEvent, view) {
        	        //var abc = prompt('Enter Title');
                    var allDay = !start.hasTime && !end.hasTime;
                    var newEvent = new Object();
                    newEvent.title = "appointment";
                    newEvent.start = moment(start).format();
                    newEvent.allDay = false;
                    modalpopup(moment(start).format('YYYY/MM/DD'),moment(end).format('YYYY/MM/DD'))
                    $('#calendar').fullCalendar('renderEvent', newEvent);
                    

                },    
    eventClick:  function(event, jsEvent, view) {
        viewappoint(event)
        }

}).fullCalendar( 'refetchEvents' );
   //
}
function modalpopup(start,end){
	var times = moment(end).format('hh:mm');
	modalmakeup({
	title:$("input[name=patient_name]").val()+"`s new appointment",
	width:"60%",
	color:"w3-white",
	fade:"w3-animate-zoom",
	buttontext:"save",
	buttoneventclass:"saveappoint",
	buttoncolor:"w3-blue",
	buttons: {
                saveg: function() {
                    alert("this paresed")
                    
                },
                "Cancel": function() {
                    $(this).dialog("close");
                }
            },
	body :'<form method="post" action="" id="appointmentfm"><div class="warner"></div>'
  +'<div class="w3-row-padding">'
  +'<div class="form-group"><label for="inputName" class=" control-label">Disease</label><div class=""><select type="text"  name="disease" class="form-control" id="inputName" placeholder="Unit eg : mg "></select></div></div>'+
  '<div class="w3-half"><div class="form-group"><label for="inputName" class=" control-label">doctor</label><div class=""><input type="text" name="doctor" class="form-control" id="inputName" placeholder="doctor" required readonly="true"></div></div>'
  +'<div class="form-group"><label for="inputName" class=" control-label">start date</label><div class=""><input type="text" name="start_date" class="form-control" id="inputName" value="'+start+'" placeholder="date from" required ></div></div>'
  +'<div class="form-group"><label for="inputName" class=" control-label">start time</label><div class=""><input type="text" name="start_time" value="'+times+'" class="form-control" id="inputName" placeholder="time from" required ></div></div></div>'
  +'<div class="w3-half"><div class="form-group"><label for="inputName" class=" control-label">amount</label><div class=""><input type="number" name="amount" class="form-control" id="inputName" placeholder="amount" required readonly="true"></div></div>'
  +'<div class="form-group"><label for="inputName" class=" control-label">end date</label><div class=""><input type="text" value="'+end+'" name="end_date" class="form-control" id="inputName" value="'+end+'" placeholder="end date"></div></div>'
  +'<div class="form-group"><label for="inputName" class=" control-label">end time</label><div class=""><input type="text" name="end_time" value="'+times+'" class="form-control" id="inputName" placeholder="end time" required></div></div></div><div><div class="form-group"><label for="inputName" class=" control-label">description</label><div class=""><textarea type="text"  name="description" class="form-control" id="inputName" placeholder="reasone about this appointment" required></textarea></div></div>'
  +'</div></div><div></form>'
	});
		timereuse($("body").find("input[name=end_time]"))
		timereuse($("body").find("input[name=start_time]"))
		datereuse($("body").find("input[name=start_date]"))
		datereuse($("body").find("input[name=end_date]"))
		$.each(eval(appoint_doctor),function(i,item){
		$("body").find("select[name=disease]").append("<option value='"+item.specialization+"' tagcheckid='"+item.id+"'>"+item.specialization+"</option>");
		})
		$("body").on("click",".saveappoint",function(){
        if (ajaxtoserv($("body").find("#appointmentfm"),"form","newappoint?_token="+_token+"&patient_id="+$("input[name=patient_id]").val()+"&doctor_id="+$("body").find("#appointmentfm input[name=doctor]").attr('doctortag'),this).success) {
        setTimeout(function() {
             $("#calender").fullCalendar( 'refresh' )
             $('#calender').fullCalendar( 'refetchEvents' );
             calendar();
              removebesmodal();
              }, 1000);
        }
			
		
        })
		
}
function viewappoint(event){
    modalmakeup({
    title:'appointment view',
    width:"50%",
    color:"w3-white",
    fade:"w3-animate-zoom",
    buttontext:"print",
    buttoneventclass:"saveappoint",
    buttoncolor:"w3-blue",
    body:'<div class="w3-row">'
   +'<table class="w3-table table table-stripped table-bordered">'
    +'<tr><td><p class="w3-text-blue">patient</p><h4>'+(event.patient?event.patient:event.patient_name)+'</h4><small>'+'Registered date('+moment(event.date).format("YYYY/MM/DD")+')'+'</small></td></tr>'
   +'<tr><td><p class="w3-text-blue">doctor</p><h4>'+(event.title?event.title:event.name)+'</h4></td><td><p class="w3-text-blue">amount</h3><h4>'+event.amount+'$</h4></td></tr>'
   +'<tr><td><p class="w3-text-blue">start date</p><h4>'+(event.start?moment(event.start).format("YYYY/MM/DD"):event.start_date)+'</h4></td><td><p class="w3-text-blue">end date</p><h4>'+(event.end?moment(event.end).format("YYYY/MM/DD"):event.end_date)+'</h4></td></tr>'
   +'<tr><td><p class="w3-text-blue">start time</p><h4>'+event.start_time+'</h4></td><td><p class="w3-text-blue">end time</h3><h4>'+event.end_time+'</h4></td></tr>'
   +'<tr><td colspan="2"><p class="w3-text-blue">description</p><h4>'+(event.desc?event.desc:event.note)+'</h4></td></tr>'
   +'</table>'
  +'</div>'
    });
}
function profileviewappointent(){
    appoin_table= $('#appoin_table').DataTable({
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
    url:"/mainappoint", // Change this URL to where your json data comes from
    type: "POST", // This is the default value, could also be POST, or anything you want.
    data: function(d) {
    d._token  = _token,
    d.patient_id = $("input[name=patient_id]").val()
    
    },
    },
   //"sAjaxSource":'?_token='+$('meta[name="csrf-token"]').attr('content')       
    columns: [             
            {title:"Action", data: 'id', name: 'id',width: 20},
            {title:"Doctor,Patient,Date and Amount", data: 'name', name: 'name',width: 20},          
            { title:"Appointment date",data: 'amount', name: 'amount',width: 20},
            { title:"Reason",data: 'date', name: 'date', width: 20},
            { title:"Status",data: 'start_date', name: 'start_date'},
            {title:"Patient", data: 'patient_name', name: 'patient_name', visible:false},
            { title:"end date",data: 'end_date', name: 'end_date', visible:false},
            { title:"start time",data: 'start_time', name: 'start_time', visible:false},
            { title:"end time",data: 'end_time', name: 'end_time', visible:false},
            { title:"status", data: 'status_name', name: 'status_name', visible:false},
            { title:"status", data: 'patient_id', name: 'patient_id', visible:false},
            { title:"status", data: 'doctor_id', name: 'doctor_id', visible:false},

            ],"columnDefs": [{
         'targets': 0,
     
         "render": function ( data, type, row ) {
          return '<a class="w3-padding" onclick="editappoint(this)"><i id=""  class=" w3-large w3-hover-w3-pale-blue w3-panel-8 w3-hover-opacity w3-animate-zoom fa fa-pencil-square-o" aria-hidden="true" style="cursor:pointer"></i></a>' + 
             '<a data-toggle="modal" data-target="#modal-warn" onclick="maindel(this)"  forid="'+row.id+'" tablename="Appointment"><i  class="fa fa-trash-o w3-large w3-hover-w3-pale-blue w3-panel-8 w3-hover-opacity w3-animate-zoom warn" style="cursor:pointer" data-title="Goto twitter?" aria-hidden="true"></i></a>';
         },

      },
             {
                'width': 20,
                "render": function ( data, type, row ) {
                    return '<tr class="w3-text-white w3-light-blue w3-medium" style="padding:0px 0px 0px"><tr colspan="5"> <a href="/tess/?update='+row.id+'">'+row.name+'</a></td><td colspan="2"></td><tr>';
                },
                "targets": 0
            },
             {
                'width': 20,
                "render": function ( row, type, data ) {
                    return '<div class="w3-row"><div class=""> <p class="" style="position:relative;top:-4px"><span class="w3-text-gray">Dr : </span><span class="w3-text-black" style="">'+data.name+' </span></p> <p class="w3-small" style="position:relative; margin-bottom:-18px;top:-15px"><span class="w3-text-gray">PA : </span><span class="w3-text-black">'+data.patient_name+'</span>(<span class="w3-text-gray">AP-id : </span>(# <strong class="w3-text-black">'+data.id+'</strong>)) </p><p class="w3-small w3-text-gray" style="position: relative;display:inline-block">AM:<span class="w3-text-black"> $' + data.amount + ' </span></p><p class="w3-small w3-text-gray" style="position: relative;display:inline-block"> date: <span class="w3-text-black">'+data.date+'</span></p></div> </div>';
                }, 
                "targets": 1
            },
            {
                'width': 20,
                "render": function ( row, type, data ) {
                    return '<div class="w3-row"><div class=""> <p class="" style="position:relative;top:-4px"><span class="w3-text-gray">start date : </span><span class="w3-text-black" style="">'+data.start_date+' (<small>'+data.start_time+'</small>)</span></p></div> <div class=" " style="text-align: right"><p class="" style="position:relative;top:-4px"><span class="w3-text-gray">end date : </span><span class="w3-text-black" style="">'+data.end_date+' (<small>'+data.end_time+'</small>)</span></p></div></div></td>';
                },
                "targets": 2
            },
            {
                'width': 20,
                "render": function ( row, type, data ) {
                    return '<div class="w3-row">'+data.disease+' <a class="badge w3-blue" id="appoinmoreview"><i class="fa fa-plus"></i></a></div>';
                },
                "targets": 3
            },
            {
                'width': 20,
                "render": function ( data, type, row ) {
                   if (row.status_id==2) {
          return ' <div class="dropdown " style="display:inline-block;"><button type="button"  tagid="'+row.id+'"  tagpatient_id="'+row.id+'"  class="w3-border w3-border-white w3-red" style="border:none">Waiting payment</button><button type="button" class="btn w3-border-white w3-border" dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>'
                      +'<ul class="dropdown-menu w3-border" style=" z-index; 11111111111">'
                        +' <li class=""><a class="" onclick="PaymentAppoint(this)" tagid="'+row.id+'"  appoint_id="'+row.id+'"  patient_id="'+row.patient_id+'"  doctor_id="'+row.doctor_id+'"  total="'+row.amount+'"  tagtype="appoint"  ><i class="fa fa-dollar"></i> pay now </a></li>'
            
                       +' </ul>'+
                    '</div>'
                }else if (row.status_id==165){
                    return "<span class='badge w3-red'> "+row.status_name+" </span>"
                }else if(row.status_id==166){
                   return "<span class='badge w3-blue'> "+row.status_name+" </span>"
                }
                else{
                    return '<span class="badge w3-blue"> '+row.status_name+" "+_timeStyl(row.end_date+" "+row.end_time)+' </span>'
                }
              },
                "targets": 4
            },

        ],
    
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
}
var doctors_appoints;
var pays_table;
$(document).ready(function(){
  
  doctors_appoints= $('#appoin_table_doctor').DataTable({
    "initComplete": function( settings, json ) {
    $('div.loading').remove();
    },
    autoWidth:true,
    paging: true,
    searching: { "regex": true },
    lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
    pageLength: 10,
    "bProcessing": true,
    "bPaginate":true,
    "sPaginationType":"full_numbers",
    ajax:{
    url:"/doctors/appointview", // Change this URL to where your json data comes from
    type: "POST", // This is the default value, could also be POST, or anything you want.
    data: function(d) {
    d._token  = _token;
    },
    },
   //"sAjaxSource":'?_token='+$('meta[name="csrf-token"]').attr('content')       
    columns: [             
          
            {title:"Details About Patient And Doctor", data: 'name', name: 'name'},          
            { title:"Appointment date",data: 'amount', name: 'amount'},
            { title:"Reason",data: 'date', name: 'date'},
            { title:"Status & Action",data: 'start_date', name: 'start_date'},          
            { title:"Status Co", data: 'status_name', name: 'status_name', visible:false},
               {title:"Action", data: 'id', name: 'id',width: 20, visible:false},
              { title:"status s", data: 'status_id', name: 'status_id', visible:false},
                {title:"Patient", data: 'patient_name', name: 'patient_name', visible:false},
            { title:"end date",data: 'end_date', name: 'end_date', visible:false},
            { title:"start time",data: 'start_time', name: 'start_time', visible:false},
            { title:"end time",data: 'end_time', name: 'end_time', visible:false},
            { title:"title",data: 'title', name: 'title', visible:false},
       { title:"title",data: 'patient_id', name: 'patient_id', visible:false},

            ],"columnDefs": [
                          {
                               "render": function ( row, type, data ) {
                    return '<div class="w3-row"><div class=""> <p class="" style="position:relative;top:-4px"><a href="/doctors/'+data.id+'"><span class="w3-text-gray">'+data.title+' </span><span class="w3-text-black" style="">'+data.name+
                    ' (you) </span></a></p> <p class="w3-small" style="position:relative; margin-bottom:-18px;top:-15px">'+
                    '<table class="w3-table"><tr><td><span class="w3-text-gray">PA : <a href="/patients/'+data.patient_id+'"></span><span class="w3-text-black">'+data.patient_name+
                    '</span></a></p></td><td><p class="w3-small w3-text-gray" style="position: relative;display:inline-block">Amount:<span class="w3-text-white badge w3-blue"> $' + data.amount + 
                    ' </span></p></td><td><p class="w3-small w3-text-gray" style="position: relative;display:inline-block"> Created At: <span class="w3-text-black">'+_timeStyl(data.date)+
                    '</span></p></td></tr></table></div> </div>';
                }, 
                "targets": 0
            },
            {
               
                "render": function ( row, type, data ) {
                    return '<div class="w3-row"><div class=""> <p class="" style="position:relative;top:-4px"><span class="w3-text-gray"></span><span class="w3-text-black" style=""><small><span class="badge w3-blue">'+_timeStyl(data.start_date+" "+data.start_time)+'</span></small></span></p></div><div class=" " style="t"><p class="" style="position:relative;top:-4px"><span class="w3-text-gray"> </span><span class="w3-text-black" style=""> <small><span class="badge w3-green">'+_timeStyl(data.end_date+" "+data.end_time)+'</span></small></span></p></div></div></td>';
                },
                "targets": 1
            },
            {
                
                "render": function ( row, type, data ) {
                    return '<div class="w3-row">'+data.disease+' <a class="badge w3-blue" id="appoinmoreview"><i class="fa fa-plus"></i></a></div>';
                },
                "targets": 2
            },
            
            {
         'targets': 3,
     
         "render": function ( data, type, row ) {
          //alert(row.status_id)
            if (row.status_id==1) {
          return ' <div class="dropdown " style="display:inline-block;"><button type="button"  tagid="'+row.id+'"  tagpatient_id="'+row.id+'"  class="w3-border w3-border-white w3-red" style="border:none">Waiting Approval</button><button type="button" class="btn w3-border-white w3-border" dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>'
                      +'<ul class="dropdown-menu w3-border" style=" z-index; 11111111111">'
                        +' <li class=""><a class="" onclick="ApproveAppointToPayment(this)" _id="'+row.id+'" ><i class="fa fa-check"></i> Confirm </a></li>'
                        
                         +' <li class=""><a class="" data-toggle="modal" data-target="#modal-warn" type="Appoint" forid="'+row.id+'"  tablename="Appointment"  htmtable="doctors_appoints" onclick="if(docancels(this)){datadtab.reload()}"  ><i class="fa fa-trash"></i> Reject</a></li>'
                       +' </ul>'+
                    '</div>'
                }else   if (row.status_id==166) {
              return ' <div class="dropdown " style="display:inline-block;"><button type="button"  tagid="'+row.id+'"  tagpatient_id="'+row.id+'"  class="w3-border w3-border-white w3-red" style="border:none">'+row.status_name+'</button><button type="button" class="btn w3-border-white w3-border" dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>'
                      +'<ul class="dropdown-menu w3-borderdropdown-menu col-xs-12 w3-border w3-border-all " role="menu" aria-labelledby="dLabel  w-100" style=" z-index; 11111111111">'
                        +' <li class=""><a class="" onclick="PaymentAproveForDoctor(this)" _id="'+row.id+'" tagdate="'+row.end_date+" "+row.end_time+'" tagname="'+row.patient_name+'"><i class="fa fa-check"></i> Approve Payment </a></li>'
                            +' <li class=""><a class="" data-toggle="modal" data-target="#modal-warn" type="Appoint" forid="'+row.id+'"  tablename="Appointment"  htmtable="doctors_appoints" onclick="if(docancels(this)){datadtab.reload()}"  ><i class="fa fa-exclamation"></i> Missed Payment</a></li>'
                        
                       +' </ul>'+
                    '</div>'
                }else if (row.status_id==167){
                   return ' <div class="dropdown " style="display:inline-block;"><button type="button"  tagid="'+row.id+'"  tagpatient_id="'+row.id+'"  class="w3-border w3-border-white w3-red" style="border:none">'+row.status_name+" "+_timeStyl(row.end_date+" "+row.end_time)+'</button><button type="button" class="btn w3-border-white w3-border" dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>'
                      +'<ul class="dropdown-menu w3-borderdropdown-menu col-xs-12 w3-border w3-border-all " role="menu" aria-labelledby="dLabel  w-100" style=" z-index; 11111111111">'
                        +' <li class=""><a class="" onclick="PaymentAproveForDoctor(this)" _id="'+row.id+'" tagdate="'+row.end_date+" "+row.end_time+'" tagname="'+row.patient_name+'"><i class="fa fa-print"></i> print </a></li>'
                            +' <li class=""><a class="" data-toggle="modal" data-target="#modal-warn" type="Appoint" forid="'+row.id+'"  tablename="Appointment"  htmtable="doctors_appoints" onclick="if(docancels(this)){datadtab.reload()}"  ><i class="fa fa-exclamation"></i> Missed Payment</a></li>'
                        
                       +' </ul>'+
                    '</div>'
                //return "<span class='badge w3-blue'> "+row.status_name+" </span>"
                }else{
                  return  ' <a class="" tagdate="'+row.end_date+" "+row.end_time+'" tagname="'+row.patient_name+'"><span class="badge w3-red">'+row.status_name+'</span> </a>';
                }
         },

      }

        ],
    
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




 pays_table= $('#patient_pays').DataTable({
    "initComplete": function( settings, json ) {
    $('div.loading').remove();
    },
    autoWidth:true,
    paging: true,
    searching: { "regex": true },
    lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
    pageLength: 10,
    "bProcessing": true,
    "bPaginate":true,
    "sPaginationType":"full_numbers",
    ajax:{
    url:"/mypaysPatient", // Change this URL to where your json data comes from
    type: "POST", // This is the default value, could also be POST, or anything you want.
    data: function(d) {
    d._token  = _token;
    },
    },
   //"sAjaxSource":'?_token='+$('meta[name="csrf-token"]').attr('content')       
    columns: [             
          
            {title:"Tran #id", data: 'payment_id', name: 'payment_id'},          
            { title:"Appoint name",data: 'disease', name: 'disease'},
            { title:"Account",data: 'account', name: 'account'},
            { title:"Amount",data: 'balance', name: 'balance'},          
            { title:"Status", data: 'status_name', name: 'status_name'},
               
       

            ],"columnDefs": [
                          
            {
         'targets': 1,
     
         "render": function ( data, type, row ) {
          
          return 
                    return "<span class='badge w3-blue'> "+row.status_name+" </span>"
              
         },

      }

        ],
    
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

function ApproveAppointToPayment(datas){
  var dism = $("body").DeteilView({
     title:' Approval Appointment',
    width:"50%",
    color:"w3-white",
    fade:"w3-animate-zoom",
    buttontext:"Procced",
    buttoneventclass:"OK",
    buttoncolor:"w3-blue",
    body:"<h1>Are you sure to approve this Appointment ?</h1><p class='badge w3-blue'><td><strong>Note</strong> This will procced to payment  . . .</td></p>",
    savebtn:true,
    cancelbtn:true,
    submitData: function(){
      var data  = ajaxtoserv({_token:_token,"_id":$(datas).attr("_id"),"status_id":1},"not form","appointmentStatusChange",null);
        if (data.success) {
          doctors_appoints.ajax.reload();
          return true;
          }

    }
  })

}


////////////////////////////////////////
function PaymentAppoint(datas){
var data  = ajaxtoserv({'_token':_token,doctor_id:$(datas).attr("doctor_id")},"not form","listjsonPayment",this);
var selectincde;
var total =$(datas).attr("total") ;
var patient_id = $(datas).attr("patient_id");
var appoint_id = $(datas).attr("appoint_id");
var doctor_id = $(datas).attr("doctor_id");
   $.each(eval(data.payment),function(ins,itemdata){
    
    selectincde +='<option class="w3-text-light-black" value="'+itemdata.account+'">'+itemdata.account+'</option>'
  
   })
   
var htmls = '<form method="post" class="w3-padding" id="labpayment"><div class="warner"></div><input type="hidden" value="'+patient_id+'" name="patient_id"><input type="hidden" value="'+appoint_id+'" name="appoint_id"><input type="hidden" value="'+patient_id+'" name="patient_id"><input type="hidden" value="'+doctor_id+'" name="doctor_id">'+
'<div class="w3-row-padding"><div class="w3-third"><label>Total Amount</label><input type="text"  name="total_amount" value="'+total+'"  readonly="readonly" class="w3-input " style="background: inherit;border: none;"></div><div class="w3-third"><label>Discount</label><input type="text"  onchange="discounts()" name="discount" value="no discount allowed" readonly="readonly" placeholder="discount" class="w3-input"></div><div class="w3-third"><label>Balance</label><input type="text"  name="curency" placeholder="Amount" value="'+total+'" readonly="readonly" class="w3-input" style="background: inherit;border: none;"></div></div>'+
'<div class="w3-container"><label class="w3-label">Account</label><select  class="form-control" data-width="100%" id="liststrenght"  data-title="choose..." name="accountpay">'+selectincde+'</select></div><div class="w3-padding"><input type="hidden" name="actiontype"><label>Remark</label><textarea class="w3-input w3 w3-border-bottom" name="remark" placeholder="Note text as remark" style="resize: none;"></textarea></div></form>'


if (data) {
modalmakeup({
  title:"payment form",
  width:"50%",
  color:"w3-white",
  fade:"w3-animate-zoom",
  buttontext:"Save",
  buttoneventclass:"savelabpaymentbtn",
  buttoncolor:"w3-blue",
  buttons: {
                saveg: function() {
                    alert("this paresed")
                    
                },
                "Cancel": function() {
                    $(this).dialog("close");
                }
            },
  body :htmls
  });
$('body').find("#oncreate").on("click",".savelabpaymentbtn",function(e){
 if (ajaxtoserv($('body').find("#oncreate #labpayment"),"form","appointpayment?_token="+_token+"&tagtype=appoint",this).success){
      setTimeout(function(){ 
          removebesmodal()
           doctors_appoints.ajax.reload();
            //$("#tablepagecounter").text(getcountofrows("lbredefine"));
     },1000)
    }


})
}
}


////approvePayment for doctor

function PaymentAproveForDoctor(datas){
 var dism = $("body").DeteilView({
     title:' Approval Payment & Processing',
    width:"50%",
    color:"w3-white",
    fade:"w3-animate-zoom",
    buttontext:"Procced",
    buttoneventclass:"OK",
    buttoncolor:"w3-blue",
    body:"<h1>Are you sure to approve meating with <strong>"+$(datas).attr('tagname')+"</strong>?</h1><p ><td class='badge w3-blue'><strong>Note</strong> This Appointment will be to </td><span class='badge w3-gray'>"+_timeStyl($(datas).attr('tagdate'))+"</span></p>",
    savebtn:true,
    cancelbtn:true,
    submitData: function(){
      var data  = ajaxtoserv({_token:_token,"_id":$(datas).attr("_id"),"status_id":167},"not form","appointmentStatusChange",null);
        if (data.success) {
          doctors_appoints.ajax.reload();
          return true;
          }

    }
  })
}