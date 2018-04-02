function filterfn(){
		modalmakeup({
	title:"Filter lab lists",
	width:"55%",
	color:"w3-white",
	fade:"w3-animate-zoom",
	buttontext:"Save",
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
                        +'<td class="w3-light-gray active"> Status <span class=""> '+statusController(item.status_id,item.status_name,item.master_id,item.patient_id,"test_master")+'  </span></td>'
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
                   +statusController(inner.status_id,inner.status_name,inner.id,inner.patient_id,"test_detail")+'</td>';
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
  +' <a  class=" w3-medium w3-border w3-border-gray w3-btn w3-text-blue w3-round-large" style="background:inherit" dropdown-toggle"  data-toggle="dropdown">Action<span class="caret"></span></button>'
    +' </a>'
  +'<ul class="dropdown-menu w3-card-8 w3-padding-8">'
    +' <li class=""><a class="" onclick="paymentpopup(this)" tagid="'+id+'"  tagpatient_id="'+patient_id+'"  tagtype="'+type+'" ><i class="fa fa-dollar"></i> Pay</a></li>'
     +' <li class=""><a class="" onclick="cancelpayment(this)" tagid="'+id+'" tagpatient_id="'+patient_id+'"  tagtype="'+type+'"  ><i class="fa fa-trash"></i> Cancel</a></li>'
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


////////////////////////////////////////
function paymentpopup(datas){
var data  = ajaxtoserv({tagtype:$(datas).attr("tagtype"),order_id:$(datas).attr("tagid"),patient_id:$(datas).attr("tagpatient_id")},null,"not form","filter?_token="+_token,this);
var   selectincde;
var total;
//alert($(datas).attr("tagtype"));
if ($(datas).attr("tagtype").trim()=="test_master") {
  var parent_id;

$.each(eval(data.success),function(i,item){
parent_id  =item.patient_id;
 total =  item.total_amount;

})
}else 
{
  $.each(eval(data.success),function(i,item){
  total =  item.amount;
  parent_id  =item.patient_id;
})
}
$.each(eval(data.payment),function(i,item){
  if (item.parent_id=="" || item.parent_id == null) {
     selectincde +='<optgroup label="'+item.name+'">';
  }
   $.each(eval(data.payment),function(ins,itemdata){
    if (itemdata.parent_id==item.id) {
    selectincde +='<option value="'+itemdata.id+'">'+itemdata.account+'</option>'
  }
   })
   selectincde +='</optgroup>'
})
var htmls = '<form method="post" class="w3-padding" id="labpayment">'+
'<div class="w3-row-padding"><div class="w3-third"><label>Total Amount</label><input type="text"  name="total_amount" value="'+total+'"  readonly="readonly" class="w3-input " style="background: inherit;border: none;"></div><div class="w3-third"><label>Discount</label><input type="number"  onchange="discounts()" name="discount" value="0" placeholder="discount" class="w3-input"></div><div class="w3-third"><label>Balance</label><input type="text"  name="curency" placeholder="Amount" value="'+total+'" readonly="readonly" class="w3-input" style="background: inherit;border: none;"></div></div>'+
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
 if (ajaxtoserv($('body').find("#oncreate #labpayment"),null,"form","savepaymental?patient_id="+parent_id+"&order_id="+$(datas).attr("tagid"),$(this)).success){


       setTimeout(function(){ 
           
             location.reload();
            
          },1000)
    }


})
}
}
function filterbody(id) {

  re_define_lab(ajaxtoserv({status_id:id},null,"not form","filter?_token="+_token,this).success)
}
$(document).ready(function(){
	$("body").find(".gentd").each(function(){
	////alert($(this) .attr("tagpaient_id"))
	$(this).append(statusController($(this) .attr("status_id"),$(this) .attr("status_name"),$(this) .attr("tagid"),$(this) .attr("tagpaient_id"),"test_detail"));
		
	})
})
function discounts(th){
      var disc = $('input[name=discount]').val();
      var total = $('input[name=total_amount]').val();
       var last  = (total*1)-(disc*1)
      $('input[name=curency]').val(last);
      
      
}