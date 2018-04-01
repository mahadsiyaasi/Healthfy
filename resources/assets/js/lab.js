function filterfn(){
		modalmakeup({
	title:"Filter lab lists",
	width:"55%",
	color:"w3-white",
	fade:"w3-animate-zoom",
	buttontext:"filter",
	buttoneventclass:"btnfilter",
	buttoncolor:"w3-blue",
	buttons: {
                saveg: function() {
                    alert("this paresed")
                    
                },
                "Cancel": function() {
                    $(this).dialog("close");
                }
            },
	body :'<form method="post" action="" id="fmfilter">'
  +'<div class="w3-row-padding">'
  +'<div class="form-group"><label for="inputName" class=" control-label">Status</label><div class=""><select type="text"  name="status_filter" class="form-control" id="inputName" placeholder="status ">'
  +'<option value="2">Awaiting payment</option><option value="3">Lab queue</option><option value="2">Awaiting result</option><option value="2">Completed</option></select></div></div>'+
  '<div class="w3-half"><div class="form-group"><label for="inputName" class=" control-label">doctor</label><div class=""><select type="text" name="doctor_filter" class="form-control" id="doctor_filter" placeholder="doctor" ></select></div></div></div>'+
'<div class="w3-half"><div class="w3-row-padding"><div class="w3-half"><div class="form-group"><label for="inputName" class=" control-label">from</label><div class=""><input type="text" name="date-from" class="form-control" id="date-filter" placeholder="date" ></div></div></div><div class="w3-half"><div class="form-group"><label for="inputName" class=" control-label">end</label><div class=""><input type="text" name="date-to" class="form-control" id="date-filter" placeholder="date" ></div></div></div>'+
  '</div></div></form>'
	});

		datereuse($("body").find("input[name=date-from]"))
		datereuse($("body").find("input[name=date-to]"))
		 $.each(eval(appoint_doctor),function(i,item){
         $('body').find("#oncreate select[name=doctor_filter]").append("<option value='"+item.id+"' tagcheckid='"+item.id+"'>"+item.name+"</option>");
        })
		 $('body').find("#oncreate").on("click",".btnfilter",function(){
        if (re_define_lab(ajaxtoserv($("body").find("#fmfilter"),null,"form","filter?_token="+_token,this).success)) {
        setTimeout(function() {
             removebesmodal();
             
         }, 1000);
        }
			
		
        })
}
function re_define_lab(data){
//  alert("w")
	var last = 0 ;
	var detail_id = 0;
	$("#lbredefine").html("")
	var header ="";
          $.each(eval(data), function(i,item){
                  if(last != item.master_id ){
                     header+= '<tr><td class="w3-light-gray active"> Lab Dr : <span class="badge blue">  '+item.doctor_name+' </span> </td>'
                        +'<td class="w3-light-gray active"> Patient : <span class="badge w3-blue">'+item.patient_name+'</span> </td>'
                       + '<td class="w3-light-gray active">Total :  <span class="badge w3-green">$ '+item.total_amount+' </span></td>'
                        +'<td class="w3-light-gray active"> Status <span class=""> '+statusController(item.status_id,item.status_name,item.detail_id,item.master_id,"test_master")+'  </span></td>'
                  +'  </tr>'
                   $("#lbredefine").append(header);
                  }
               
                last = item.master_id;
                detail_id = item.id;
                $.each(eval(data), function(it,inner){
                if(inner.test_order_id == item.master_id && detail_id != inner.id){
               	var htm   =  ' <tr><td>'+inner.testname+'</td>'
                 +' <td> '+inner.patient_name+' </td>'
                  +'<td> $'+inner.amount+' </td>'
                  +'<td>'
                   +statusController(inner.status_id,inner.status_name,inner.detail_id,inner.patient_id,"test_detail")+'</td>';
                    $("#lbredefine").append(htm);
                    detail_id = inner.id;
                }
                
                })
               
            })
          
         	return true;

}
function statusController(status_id,status_name,id,patient_id,type){
	
					if(  status_id==1)
                    rt ='<span class="badge w3-red">  </span>'
                    else if(  status_id==2)
                    return '<span class="badge w3-blue" style="display:inline-block">  '+ status_name+'</span> | <div class="dropdown" style="display:inline-block">'
  +' <a  class=" w3-small w3-btn w3-blue w3-round-large" dropdown-toggle"  data-toggle="dropdown">Action<span class="caret"></span></button>'
    +' </a>'
  +'<ul class="dropdown-menu w3-card-8 w3-padding-8">'
    +' <li class=""><a class="" onclick="paymentpopup(this)" tagid="'+id+'"  tagpatient_id="'+patient_id+'" tagtype="'+type+'"><i class="fa fa-dollar"></i> Pay</a></li>'
     +' <li class=""><a class="" onclick="cancelpayment(this)" tagid="'+id+'" tagpatient_id="'+patient_id+'" tagtype="'+type+'"><i class="fa fa-trash"></i> Cancel</a></li>'
   +' </ul>'+
'</div>'
                    else if(  status_id==3)
                    return '<span class="badge w3-yellow">  '+ status_name+'</span>'
                    else if( status_id==4)
                    return '<span class="badge w3-green">  '+ status_name+'</span>'
                    else if(  status_id==5)
                    return '<span class="badge w3-teal">  '+ status_name+'</span>'
                   

}
function cancelpayment(data){
alert($(data).attr("tagid"))
}
function paymentpopup(data){
var data  = ajaxtoserv({tagtype:$(data).attr("tagtype"),order_id:$(data).attr("tagid"),patient_id:$(data).attr("tagpatient_id")},null,"not form","getdatafrom?_token="+_token,this).success;
if (data) {
modalmakeup({
  title:"payment form",
  width:"50%",
  color:"w3-white",
  fade:"w3-animate-zoom",
  buttontext:"filter",
  buttoneventclass:"btnfilter",
  buttoncolor:"w3-blue",
  buttons: {
                saveg: function() {
                    alert("this paresed")
                    
                },
                "Cancel": function() {
                    $(this).dialog("close");
                }
            },
  body :'<form method="post" action="" id="fmfilter">'
  +'<div class="w3-row-padding">'
  +'<div class="form-group"><label for="inputName" class=" control-label">Status</label><div class=""><select type="text"  name="status_filter" class="form-control" id="inputName" placeholder="status ">'
  +'<option value="2">Awaiting payment</option><option value="3">Lab queue</option><option value="2">Awaiting result</option><option value="2">Completed</option></select></div></div>'+
  '<div class="w3-half"><div class="form-group"><label for="inputName" class=" control-label">doctor</label><div class=""><select type="text" name="doctor_filter" class="form-control" id="doctor_filter" placeholder="doctor" ></select></div></div></div>'+
'<div class="w3-half"><div class="w3-row-padding"><div class="w3-half"><div class="form-group"><label for="inputName" class=" control-label">from</label><div class=""><input type="text" name="date-from" class="form-control" id="date-filter" placeholder="date" ></div></div></div><div class="w3-half"><div class="form-group"><label for="inputName" class=" control-label">end</label><div class=""><input type="text" name="date-to" class="form-control" id="date-filter" placeholder="date" ></div></div></div>'+
  '</div></div></form>'
  });
}
}
function filterbody(id) {

  re_define_lab(ajaxtoserv({status_id:id},null,"not form","filter?_token="+_token,this).success)
}
$(document).ready(function(){
	$("body").find(".gentd").each(function(){
		//alert($(this).attr("tagid"))
	$(this).append(statusController($(this) .attr("status_id"),$(this) .attr("status_name"),$(this) .attr("tagid"),$(this) .attr("tagpaient_id"),"test_detail"));
		
	})
})