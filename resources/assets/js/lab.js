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
        if (re_define_lab(ajaxtoserv($("body").find("#fmfilter"),"form","filter?_token="+_token,this).success)) {
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

          $.each(eval(data), function(i,item){
              var header ="";
                  if( item.master_id  !=  last){
                     header+= '<tr><td class="w3-light-gray active"> Lab Dr : <span class="badge blue">  '+item.doctor_name+' </span><a class="btn"><i class="fa fa-eye"></i> Detail</a> </td>'
                        +'<td class="w3-light-gray active"> Patient : <span class="badge w3-blue">'+item.patient_name+'</span> <a class="btn"><i class="fa fa-eye"></i> Detail</a></td>'
                       + '<td class="w3-light-gray active">Total :  <span class="badge w3-green">$ '+item.total_amount+' </span></td>'
                        +'<td class="w3-light-gray active"> Status <span class=""> '+statusController(item.master_status_id,item.master_status,item.master_id,item.patient_id,"test_master")+'  </span></td>'
                  +'  </tr>'
                   $("#lbredefine").append(header);
                    last = item.master_id;
                       $.each(eval(data), function(it,inner){
                  var htm = ""
                if(inner.test_order_id == item.master_id && detail_id != inner.id){
                   htm +=  ' <tr>'+
                   '<td>'+inner.testname+'</td>'+
                   '<td> <a href="/patients/'+inner.patient_id+'"> '+inner.patient_name+'</a> </td>'+
                   '<td> $'+inner.amount+' </td>'+
                   '<td class="text-center" style="align-text: center">'+
                   statusController(inner.detail_status_id,inner.detail_status,inner.id,inner.patient_id,"test_detail")+'</td>'+
                   '</tr>';

                    $("#lbredefine").append(htm);
                    
                   
                    detail_id = inner.id;
                }
                
                })
                  }

              
               
            })
          $("#tablepagecounter").text(getcountofrows("lbredefine"))
         	return true;

}

function cancelpayment(data){
alert($(data).attr("tagid"))
}


////////////////////////////////////////
function paymentpopup(datas){
var data  = ajaxtoserv({tagtype:$(datas).attr("tagtype"),order_id:$(datas).attr("tagid"),patient_id:$(datas).attr("tagpatient_id")},"not form","filter?_token="+_token,this);
var selectincde;
var total;
var order_id = $(datas).attr("tagid");
//alert($(datas).attr("tagtype"));
if ($(datas).attr("tagtype").trim()=="test_master") {
  var patient_id;

$.each(eval(data.success),function(i,item){
patient_id  =item.patient_id;
 total =  item.total_amount;

})
}else 
{
  $.each(eval(data.success),function(i,item){
  total =  item.amount;
  patient_id  =item.patient_id;
})
}
$.each(eval(data.payment),function(i,item){
  if (item.parent_id=="" || item.parent_id == null) {
     selectincde +='<optgroup class="" label="'+item.name+'">';
  }
   $.each(eval(data.payment),function(ins,itemdata){
    if (itemdata.parent_id==item.id) {
    selectincde +='<option class="w3-text-light-black" value="'+itemdata.account+'">'+itemdata.account+'</option>'
  }
   })
   selectincde +='</optgroup>'
})
var htmls = '<form method="post" class="w3-padding" id="labpayment"><div class="warner"></div><input type="hidden" value="'+patient_id+'" name="patient_id"><input type="hidden" value="'+order_id+'" name="order_id">'+
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
 if (ajaxtoserv($('body').find("#oncreate #labpayment"),"form","labpayment?_token="+_token+"&tagtype="+$(datas).attr("tagtype"),this).success){
      setTimeout(function(){ 
           location.reload();
            $("#tablepagecounter").text(getcountofrows("lbredefine"));
     },1000)
    }


})
}
}
///filter with pop up
function filterbody(id) {
  re_define_lab(ajaxtoserv({status_id:id},"not form","filter?_token="+_token,this).success)
}
$(document).ready(function(){
  //inner trs with detail
	$("body").find(".gentd").each(function(){
	$(this).append(statusController($(this) .attr("status_id"),$(this) .attr("status_name"),$(this) .attr("tagid"),$(this) .attr("tagpaient_id"),"test_detail"));
		
	})

  //header tr update with status and payment
  $("body").find(".maintrgentd").each(function(){
   $(this).append(statusController($(this) .attr("status_id"),$(this) .attr("status_name"),$(this) .attr("tagid"),$(this) .attr("tagpaient_id"),"test_master"));
    
  })
$("#labtable").on("click","th",function(){
  sortTable($(this).index(),"labtable")
})


 $('#lbredefine').pageMe({pagerSelector:'#pagetablepage',showPrevNext:true,hidePageNumbers:false,perPage:10});
    

})
function discounts(th){
      var disc = $('input[name=discount]').val();
      var total = $('input[name=total_amount]').val();
       var last  = (total*1)-(disc*1)
      $('input[name=curency]').val(last);
      
      
}
function statusController(status_id,status_name,id,patient_id,type){
  
              var color =  type =="test_master"?"w3-green":"w3-blue"
              var btncolor = type =="test_master"?"w3-light-gray":"w3-white"
              var pref = type =="test_master"?"Status":""
                if( status_id==2  && type == "test_master" ) {
                   return 'Status ' + ' <div class="dropdown " style="display:inline-block;"><button type="button" class=" btn '+btncolor+' w3-border w3-border-white " style="border:none">'+ status_name+'</button><button type="button" class="btn '+btncolor+' w3-border-white w3-border" dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>'
                      +'<ul class="dropdown-menu w3-border" style=" z-index; 11111111111">'
                        +' <li class=""><a class="" onclick="paymentpopup(this)" tagid="'+id+'"  tagpatient_id="'+patient_id+'"  tagtype="'+type+'" ><i class="fa fa-dollar"></i> Pay</a></li>'
                         +' <li class=""><a class=""  tagid="'+id+'" tagpatient_id="'+patient_id+'"  tagtype="'+type+'" data-toggle="modal" data-target="#modal-warn" forid="'+id+'" tablename="OrderMaster" onclick="docancels(this)" htmtable="pateient_editor" ><i class="fa fa-trash"></i> Cancel</a></li>'
                       +' </ul>'+
                    '</div>'
                  
                }
                    else if(  status_id==3){
                    return '<span class="badge w3-yellow">  '+ status_name+'</span>'
                    }else if( status_id==4){
                    return '<span class="badge w3-green">  '+ status_name+'</span>'
                   }else if(  status_id==5){
                    return '<span class="badge w3-teal">  '+ status_name+'</span>'
                   
                  }else if (type=="test_detail" && status_id ==2) {
                  return ' <div class="dropdown " style="display:inline-block"><button type="button" class=" '+btncolor+' btn btn-primary" style="border:none">'+ status_name+'</button><button type="button" class="btn '+btncolor+' w3-border" dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>'
                  +'<ul class="dropdown-menu w3-card-8 w3-padding-8">'
                        +' <li class=""><a class="" onclick="paymentpopup(this)" tagid="'+id+'"  tagpatient_id="'+patient_id+'"  tagtype="'+type+'" ><i class="fa fa-dollar"></i> Pay</a></li>'
                         +' <li class=""><a class=""  tagid="'+id+'" tagpatient_id="'+patient_id+'"  tagtype="'+type+'" data-toggle="modal" data-target="#modal-warn" forid="'+id+'" tablename="OrderDetail" onclick="docancels(this)" htmtable="pateient_editor" ><i class="fa fa-trash"></i> Cancel</a></li>'
                       +' </ul>'+
                    '</div>'
                  }
}

$(document).ready(function(){
  $("#tablepagecounter").text(getcountofrows("lbredefine"))
})