var datadtab;
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
      var largearry =ajaxtoserv($("body").find("#fmfilter"),"form","filter?_token="+_token,this).success;
        
          datadtab.SearchApi(largearry)
          setTimeout(function() {
             removebesmodal();
             
         }, 1000);
       
			
		
        })
}


function proccedtoSpicement(datas){
  var dism = $("body").DeteilView({
     title:' Lab spicement',
    width:"50%",
    color:"w3-white",
    fade:"w3-animate-zoom",
    buttontext:"Procced",
    buttoneventclass:"OK",
    buttoncolor:"w3-blue",
    body:"<h1>Are sure lab spicement was done success fully ?</h1><p class='badge w3-green'><td>it will be procced to Result entry</td></p>",
    savebtn:true,
    cancelbtn:true,
    submitData: function(){
      var data  = ajaxtoserv({_token:_token,tagtype:$(datas).attr("tagtype"),order_id:$(datas).attr("tagid"),patient_id:$(datas).attr("tagpatient_id")},"not form","spicement",null);
        if (data) {
          datadtab.reload();
          return true;
          }

    }
  })

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
          removebesmodal()
           datadtab.reload();
            //$("#tablepagecounter").text(getcountofrows("lbredefine"));
     },1000)
    }


})
}
}
///filter with pop up
function filterbody(id) {
 datadtab.SearchApi((ajaxtoserv({status_id:id},"not form","filter?_token="+_token,this).success))
}

function discounts(th){
      var disc = $('input[name=discount]').val();
      var total = $('input[name=total_amount]').val();
       var last  = (total*1)-(disc*1)
      $('input[name=curency]').val(last);
      
      
}
function statusController(status_id,status_name,id,patient_id,type,test_id){
  
              var color =  type =="test_master"?"w3-green":"w3-blue"
              var btncolor = type =="test_master"?"w3-light-gray":"w3-white"
              var pref = type =="test_master"?"":""
                if( status_id==2) {
                  if ( status_id==2  && type == "test_master" ) {
                  return ' <div class="dropdown " style="display:inline-block;"><button type="button" onclick="paymentpopup(this)" tagid="'+id+'"  tagpatient_id="'+patient_id+'"  tagtype="'+type+'"  class=" btn '+btncolor+' w3-border w3-border-white " style="border:none">Make Payment</button><button type="button" class="btn '+btncolor+' w3-border-white w3-border" dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>'
                      +'<ul class="dropdown-menu w3-border" style=" z-index; 11111111111">'
                        +' <li class=""><a class="" onclick="paymentpopup(this)" tagid="'+id+'"  tagpatient_id="'+patient_id+'"  tagtype="'+type+'" ><i class="fa fa-dollar"></i> Pay</a></li>'
                         +' <li class=""><a class=""  tagid="'+id+'" tagpatient_id="'+patient_id+'"  tagtype="'+type+'" data-toggle="modal" data-target="#modal-warn" forid="'+id+'" tablename="OrderMaster" onclick="if(docancels(this)){datadtab.reload()}"  ><i class="fa fa-trash"></i> Cancel</a></li>'
                       +' </ul>'+
                    '</div>'
                  }else{
                      return ' <div class="dropdown " style="display:inline-block"><button type="button" class=" '+btncolor+' btn btn-primary" style="border:none"><span class="badge w3-blue">'+ status_name+'</span></button><button type="button"  style="border:none" class="btn '+btncolor+'" dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>'
                               +'<ul class="dropdown-menu w3-card-8 w3-padding-8">'
                               //+' <li class=""><a class="" onclick="paymentpopup(this)" tagid="'+id+'"  tagpatient_id="'+patient_id+'"  tagtype="'+type+'" ><i class="fa fa-dollar"></i> Pay</a></li>'
                                +' <li class=""><a class=""  tagid="'+id+'" tagpatient_id="'+patient_id+'"  tagtype="'+type+'" data-toggle="modal" data-target="#modal-warn" forid="'+id+'" tablename="OrderDetail" onclick="if(docancels(this)){datadtab.reload()}"  ><i class="fa fa-trash"></i> Cancel</a></li>'
                                +' </ul></div>'
                  }}else if(  status_id==3){
                     if ( status_id==3  && type == "test_master" ) {
                   return ' <div class="dropdown " style="display:inline-block;"><button type="button" class=" btn '+btncolor+' w3-border w3-border-white " style="border:none">'+ status_name+'</button><button type="button" class="btn '+btncolor+' w3-border-white w3-border" dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>'
                      +'<ul class="dropdown-menu w3-border" style=" z-index; 11111111111">'
                        +' <li class=""><a class="" onclick="proccedtoSpicement(this)" tagid="'+id+'"  tagpatient_id="'+patient_id+'"  tagtype="'+type+'" ><i class="fa fa-check"></i> Done</a></li>'
                         +' <li class=""><a class=""  tagid="'+id+'" tagpatient_id="'+patient_id+'"  tagtype="'+type+'" data-toggle="modal" data-target="#modal-warn" forid="'+id+'" tablename="OrderMaster" onclick="if(docancels(this)){datadtab.reload()}"  ><i class="fa fa-trash"></i> Cancel</a></li>'
                       +' </ul>'+
                    '</div>'
                  }else{
                     return ' <div class="dropdown " style="display:inline-block"><button type="button" class=" '+btncolor+' btn btn-primary" style="border:none"><span class="badge w3-blue">'+ status_name+'</span></button><button type="button"  style="border:none" class="btn '+btncolor+'" dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>'
                                         +'<ul class="dropdown-menu w3-card-8 w3-padding-8">'
                                         //+' <li class=""><a class="" onclick="paymentpopup(this)" tagid="'+id+'"  tagpatient_id="'+patient_id+'"  tagtype="'+type+'" ><i class="fa fa-dollar"></i> Pay</a></li>'
                                          +' <li class=""><a class=""  tagid="'+id+'" tagpatient_id="'+patient_id+'"  tagtype="'+type+'" data-toggle="modal" data-target="#modal-warn" forid="'+id+'" tablename="OrderDetail" onclick="if(docancels(this)){datadtab.reload()}"  ><i class="fa fa-trash"></i> Cancel</a></li>'
                                          +' </ul></div>'
                  }
                    }else if(status_id==4){
                      if ( status_id==4  && type == "test_master" ) {
                          return ' <div class="dropdown " style="display:inline-block"><button type="button" class=" '+btncolor+' btn btn-primary" style="border:none">Waiting Result</button><button type="button" class="btn '+btncolor+' w3-border" dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>'
                                  +'<ul class="dropdown-menu w3-card-8 w3-padding-8">'
                                  +' <li class=""><a class="" href="/lab/editor?type=OrderMaster&_id='+id+'&patient_id='+patient_id+'&status_id='+status_id+'&test_id='+test_id+'" tagid="'+id+'"  tagpatient_id="'+patient_id+'"  tagtype="'+type+'" ><i class="fa fa-flask" aria-hidden="true"></i>Result Entry</a></li>'
                                  +' <li class=""><a class=""  tagid="'+id+'" tagpatient_id="'+patient_id+'"  tagtype="'+type+'" data-toggle="modal" data-target="#modal-warn" forid="'+id+'" tablename="OrderDetail" onclick="if(docancels(this)){datadtab.reload();alert()}"  ><i class="fa fa-trash"></i> Cancel</a></li>'
                                  +' </ul></div>'
                            }else{
                                 return ' <div class="dropdown " style="display:inline-block"><button type="button" class=" '+btncolor+' btn btn-primary" style="border:none"><span class="badge w3-blue">'+ status_name+'</span></button><button type="button"  style="border:none" class="btn '+btncolor+'" dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>'
                                         +'<ul class="dropdown-menu w3-card-8 w3-padding-8">'
                                         //+' <li class=""><a class="" onclick="paymentpopup(this)" tagid="'+id+'"  tagpatient_id="'+patient_id+'"  tagtype="'+type+'" ><i class="fa fa-dollar"></i> Pay</a></li>'
                                          +' <li class=""><a class=""  tagid="'+id+'" tagpatient_id="'+patient_id+'"  tagtype="'+type+'" data-toggle="modal" data-target="#modal-warn" forid="'+id+'" tablename="OrderDetail" onclick="if(docancels(this)){datadtab.reload()}"  ><i class="fa fa-trash"></i> Cancel</a></li>'
                                          +' </ul></div>'
                            }
                   }else if(status_id==5){
                    if ( status_id==5  && type == "test_master" ) {
                          return ' <div class="dropdown " style="display:inline-block"><button type="button" class=" '+btncolor+' btn btn-primary" style="border:none"><span class="badge w3-teal"> Completed</span></button><button type="button" class="btn '+btncolor+' w3-border" dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>'
                                  +'<ul class="dropdown-menu w3-card-8 w3-padding-8">'
                                  +' <li class=""><a class="" href="/lab/editor?type=SeeResult&_id='+id+'&patient_id='+patient_id+'&status_id='+status_id+'&test_id='+test_id+'" tagid="'+id+'"  tagpatient_id="'+patient_id+'"  tagtype="'+type+'" ><i class="fa fa-eye" aria-hidden="true"></i>See result</a></li>'
                                  +' <li class=""><a class="" target="_blank" href="/print?type=OrderMaster&_id='+id+'&patient_id='+patient_id+'&status_id='+status_id+'&test_id='+test_id+'&action=print"   ><i class="fa fa-print"></i> Print</a></li>'
                                   +' <li class=""><a class=""  href="/print?type=OrderMaster&_id='+id+'&patient_id='+patient_id+'&status_id='+status_id+'&test_id='+test_id+'&action=download"   ><i class="fa  fa-download" aria-hidden="true"></i> Download</a></li>'
                                  +' </ul></div>'
                            }else{
                                  return '<span class="badge w3-teal">  '+ status_name+'</span>'
                            }
                   
                   
                  }
}

$(document).ready(function(){

   datadtab = $("#testtab").dtab({
              table:"#testtab",
              ajax: {
                type   : "POST",
                url    : 'filter',
                data:{_token:_token},
              },
                paging: true,
                sort: true,
                info:true,
                search: true,
                //tabledata: {textFontClass:'w3-text-gray'},
                pagelenght:[10,20,100,350],
                colums:[
                  
                  {'title': "Tests",   name:"testname"},
                  {'title': "patient", name:"patient_name",   visible:false},
                  {'title': "Doctor",  name:"doctor_name",    visible:false},
                  {'title': "Amount",  name:"amount",          money:'$'},                  
                  {'title': "Date",    name:"date"},
                  {'title': "Status",  name:"detail_status",  status:false, classColor:'w3-green', align:"center",visible:true},
                  {'title': "Doctor # id",    name:"doctor_id", visible:false},
                  {'title': "Action",   name:"master_id", visible:false},
                  {'title': "Action",   name:"id", visible:false},
                  {'title': "Action",   name:"master_status", visible:false},
                  {'title': "Action",   name:"total_amount", visible:false},
                  {'title': "Action",   name:"detail_status_id", visible:false},
                  {'title': "Action",   name:"master_status_id", visible:false},
                  {'title': "Action",   name:"patient_id", visible:false},
                  {'title': "test_id",   name:"test_id", visible:false},
                 ],
                 align:'left',
                 columndefs:[                   
                   
                      {
                        "render": function (data) {                                          
                            
                          return '<a  href="'+data.doctor_id+'"> '+data.doctor_name+'</a>';
                         },
                        "targets": 2
                      },
                      {
                        "render": function (data) {                                          
                            
                          return statusController(data.detail_status_id,data.detail_status,data.id,data.patient_id,"test_detail",data.test_id);
                         },
                        "targets": 5
                      },
                      
                  ],
                  "order": {'sort':7 , 'sorttype':'asc'},
                  "drawCallback": function ( settings ) {
                    //console.log(settings)
                  var tx = ''; 
                  var last=""; 
                 $(this.table).find('tbody tr').each(function() {
                  var $this = $(this);
                   var emptyraw;//='<tr class=""><td  class="" style="height:10px" colspan="2"> </td></tr>';
                 var data =  tabletojson(settings,$this)
                  header= '<tr><tgroup><td class="w3-light-gray active"> Lab Dr : <span class="badge blue">  '+data.doctor_name+' </span><a class="btn"><i class="fa fa-eye"></i> Detail</a> </th>'
                        +'<th class="w3-light-gray active"> Patient : <span class="badge w3-blue">'+data.patient_name+'</span> <a class="btn"><i class="fa fa-eye"></i> Detail</a></th>'
                       + '<th class="w3-light-gray active">Total :  <span class="badge w3-green">$ '+data.total_amount+' </span></th>'
                        +'<th class="w3-light-gray active"> <span class=""> '+statusController(data.master_status_id,data.master_status,data.master_id,data.patient_id,"test_master",data.test_id)+'  </span></th>'
                  +'  </tgroup></tr>'
                  $(this).children().each(function(i){
                      if ($(this).index()==settings.order.sort && last != $(this).text()) {
                          //$(this).parent("tbody").prepend()
                          $this.before(header);
                          last = $(this).text();
                      }
                     
                      ///tabletojson(opts,$this)
                      
                  })
                 })
                  
           
        }

    })
})

saveresult =  function(th){
          var main_array_holder =  [];
          main_array_holder.length = 0
             
   var tbl2 = $("#resultentrytable tbody tr").each(function(e) {        
      x = $(this).children();
      x.find("input,select").each(function(i) {
      
        if ($(this).val() !="")  {
         main_array_holder.push({name:$(this).attr('name'), value:$(this).val()});
       }
      });

      
   })
   main_array_holder.push({name:'_token', value:_token})
   main_array_holder.push({name:'note', value:$("textarea[name=noteResult]").val()})
   
   var largearry = ajaxtoserv(main_array_holder,"not form","saveresult",th).success;
   if (largearry) {
    location.href="/lab"
   }
        
}