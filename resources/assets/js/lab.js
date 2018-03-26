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
	var last = 0 ;
	var detail_id = 0;
	$("#lbredefine").html("")
		var header = '<thead>'            
              +'<tr>'
              +'<th>Doctor</th>'
              +'<th>patient</th>'
              +'<th>Amount</th>'
              +'<th>Action & Status </th>'
              +'</tr>'
            +'</thead>'
            + ' <tbody>';

            $.each(eval(data), function(i,item){
                  if(last != item.master_id){
                     header+= '<tr><td class="w3-light-gray active"> Lab Dr : <span class="badge blue">  '+item.doctor_name+' </span> </td>'
                        +'<td class="w3-light-gray active"> Patient : <span class="badge w3-blue">'+item.patient_name+'</span> </td>'
                       + '<td class="w3-light-gray active">Total :  <span class="badge w3-green">$ '+item.total_amount+' </span></td>'
                        +'<td class="w3-light-gray active"> Status <span class=""> '+statusController(item.status_id,item.status_name,item.detail_id,item.master_id)+'  </span></td>'
                  +'  </tr>'
                   $("#lbredefine").append(header);
                  }
               
                last = item.master_id;
                detail_id = item.id;
                $.each(eval(data), function(it,inner){
                if(inner.test_order_id == item.master_id && detail_id== inner.id){
               	var htm   =  ' <tr><td>'+inner.testname+'</td>'
                 +' <td> '+inner.patient_name+' </td>'
                  +'<td> $'+inner.amount+' </td>'
                  +'<td>'
                   +statusController(inner.status_id,inner.status_name,inner.detail_id,inner.patient_id)+'</td>';
                    $("#lbredefine").append(htm);
                }
                
                })
               
            })
          $("#lbredefine").append("</tbody");
         	return true;

}
function statusController(status_id,status_name,id,patient_id){
					if(  status_id==1)
                    rt ='<span class="badge w3-red">  </span>'
                    else if(  status_id==2)
                    return '<span class="badge w3-blue">  '+ status_name+'</span> | <a  class=" w3-small w3-btn w3-blue w3-round-large" onclick="paymentpopup(this)" tag_id="'+id+'" tagpatient_id="'+patient_id+'"><i class="fa fa-dollar"> Pay</i></a> |  <a  class=" w3-small w3-btn w3-red w3-round-large" onclick="cancelpayment(this)" tagid="'+id+'" tagpatient_id="'+patient_id+'" ><i class="fa fa-trash"> Cancel</i></a>'
                    else if(  status_id==3)
                    return '<span class="badge w3-yellow">  '+ status_name+'</span>'
                    else if( status_id==4)
                    return '<span class="badge w3-green">  '+ status_name+'</span>'
                    else if(  status_id==5)
                    return '<span class="badge w3-teal">  '+ status_name+'</span>'
                   

}
function cancelpayment(data){
alert($(data).attr("tag_id"))
}
function paymentpopup(data){
alert($(data).attr("tag_id"))
}