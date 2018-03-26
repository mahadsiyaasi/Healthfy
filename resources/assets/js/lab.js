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
	body :'<form method="post" action="" id="fmfilter"><div class="warner"></div>'
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
        if (ajaxtoserv($("body").find("#fmfilter"),null,"form","filter?_token="+_token,this).success) {
        setTimeout(function() {
             removebesmodal();
             re_define_lab();
         }, 1000);
        }
			
		
        })
}
function re_define_lab(data){
	var last = 0 ;
	var detail_id = 0;
		var htm = '<thead>'            
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
                     htm+= '<tr><td class="w3-light-gray active"> Lab Dr : <span class="badge blue">  '+item.doctor_name+' </span> </td>'
                        +'<td class="w3-light-gray active"> Patient : <span class="badge w3-blue">'+item.patient_name+'</span> </td>'
                       + '<td class="w3-light-gray active">Total :  <span class="badge w3-green">$ '+item.amount+' </span></td>'
                        +'<td class="w3-light-gray active"> Status <span class="badge w3-blue"> '+item.status_name+'  </span></td>'
                  +'  </tr>'
                  }
                last = item.master_id;
                detail_id = item.id;
                $.each(eval(data), function(it,inner){
                if(inner.test_order_id == item.master_id && $detail_id== inner.id){
               	htm  + ' <tr>'
                 
                  +'<td>'+inner.testname+'</td>'
                 +' <td> '+inner.patient_name+' </td>'
                  +'<td> '+inner.amount+' </td>'
                  +'<td>'
                   +' <span class="badge w3-red">'+inner.status_name+' </span>'
        

                +'  </td>'
                 
                +'</tr>'

                }
                
                })
            })
            	htm  + ' </tbody>';
             $("#lbredefine").html(htm);
            

}