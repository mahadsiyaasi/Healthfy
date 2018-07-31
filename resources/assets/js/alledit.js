  var mtable;
  var mpayment;
  var doctortable;
  $(document).ready(function(){


  })
  function testthis(tthis){
  $(".gosave").click(function(){
  $.ajax({
  url:"cancels",
  datatype:"json",
  type:"POST",
  data:datasu,
  success:function(data){
   $(".dismism").trigger("click")
   doctortable.ajax.reload();
   if(table=="Measurement"){
    loadmeasure();
   }
   
  }
  })
  })
  }
  function directdel(tthis){
  var datasu = [];
  datasu.lenght = 0;
  datasu.push({name:"_token", value : _token});
  datasu.push({name:"table", value :$(tthis).attr("mytag")});
  datasu.push({name:"id", value :$(tthis).attr("id")});

  $(".gosave").click(function(){
  $.ajax({
  url:"cancels",
  datatype:"json",
  type:"POST",
  data:datasu,
  success:function(data){

   grouplist();
   $(".dismism").trigger("click")
  }
  })
  })
  }
  function docancels(data){
  var mybool =false;
  var ids  =  $(data).attr("forid");
  var table  =  $(data).attr("tablename");
  htmtable = $(data).attr("htmtable")
  var anoth = $(data).attr("tabletoreload");
if ($(data).attr("type")) {
   $(".gosave").click(function(){
  $.ajax({
  url:"/cancels",
  datatype:"json",
  type:"POST",
  async: false,
  data:{id:ids,_token:_token,table:table,manipulate:$(data).attr("type")},
  success:function(data){
  mybool = true;
   $(".dismism").trigger("click")
   if (htmtable) {
   window[htmtable].ajax.reload(); 
   }else if (anoth) {
    window[anoth].reload();
   }
    mybool =  true;
  }
  })
  })
}else{
  $(".gosave").click(function(){
  $.ajax({
  url:"/cancels",
  datatype:"json",
  type:"POST",
  async: false,
  data:{id:ids,_token:_token,table:table},
  success:function(data){
  mybool = true;
   $(".dismism").trigger("click")
   if (htmtable) {
   window[htmtable].ajax.reload(); 
   }else if (anoth) {
    window[anoth].reload();
   }
    mybool =  true;
  }
  })
  })
}
  return mybool;
  }
  function editgroup(data){
  var id  =  $(data).attr("id");
  var datatos  =  $(data).attr("itemname");
  //alert(datatos)
  modalmakeup({
  title:"Update Group",
  width:"50%",
  color:"w3-white",
  fade:"w3-animate-zoom",
  buttontext:"update",
  buttoneventclass:"updatebtn",
  buttoncolor:"w3-blue",
  buttons: {

  },
  body :' <div class="form-group"><label for="inputName" class=" control-label">Group name</label><div class=""><input type="text" pattern="[a-z 0-9]{3,}" name="groupname" value="'+datatos+'" class="form-control" id="inputName" placeholder="group name "></div></div>'
  });
  $("#oncreate").on("click",".updatebtn",function(e){
  var $this = $(this);
  if ($("body").find("input[name=groupname]").val() !="") {
  $this.button('loading');
  $.ajax({
  url:"savegroup",
  data:{_token:_token,gn:$("body").find("input[name=groupname]").val(),id:id},
  datatype:"json",
  success:function(data){
  $this.button('reset');
  removebesmodal()
  grouplist();
  }
  })
  }
  e.stopPropagation();
  })
  }

  function edititem(data){
  removebesmodal();
  var tr = $(data).closest('tr');
  var row = viewonedit.row(tr); 
  var remodi = '<form class="form-horizontal" id="dasd">'+$('#testform').html()+'</form>';
  modalmakeup({
  title:"Update Item",
  width:"60%",
  color:"w3-white",
  fade:"w3-animate-zoom",
  buttontext:"update",
  buttoneventclass:"updateitem",
  buttoncolor:"w3-blue",
  buttons: {
  },
  body : remodi,
  });
  $('body').find("#oncreate").find("input[name=name]").val(row.data().name)
  $('body').find("#oncreate").find("textarea[name=advice]").val(row.data().advice)
  $('body').find("#oncreate").find("input[name=amount]").val(row.data().amount)
  $('body').find("#oncreate form").append("<input type='hidden' name='id' value='"+row.data().id+"'>")
  $('body').find("#oncreate").find("textarea[name=desc]").val(row.data().description)
  findOption($('body').find("#oncreate"),'lowcheck',row.data().low)
  findOption($('body').find("#oncreate"),'report',row.data().report)
  findOption($('body').find("#oncreate"),'group',row.data().parent_name)
  $('body').find("#oncreate").on("click",".updateitem",function(e){
  var $this = $(this);
  if (ajaxtoserv($('body').find("#dasd"),"form","savetestorder?_token="+_token,this).success){
  setTimeout(function() {
  $('body').find("#oncreate").find("#dasd").trigger("reset")
  removebesmodal();
  viewonedit.ajax.reload()
  $this.button('reset');
  }, 1000);

  }
  })
  }
  function removebesmodal(){
  $('body').find("#oncreate").modal('hide');
  $('body').find("#oncreate").on('hidden.bs.modal', function () {
  $(this).data('bs.modal', null);
  });
  }
  function findOption(element,selectname,row){
  $(element).find("select[name="+selectname+"]").find("option").each(function(){
  if ($(this).val()==row) {
  $(this).prop("selected",true);
  }


  })
  }
  function editappoint(row){
  var tr = $(row).closest('tr');
  var row = appoin_table.row(tr); 
  var data = row.data();
  modalmakeup({
  title:data.patient_name+"`s new appointment",
  width:"60%",
  color:"w3-white",
  fade:"w3-animate-zoom",
  buttontext:"update",
  buttoneventclass:"updateapp",
  buttoncolor:"w3-blue",
  buttons: {
  saveg: function() {
      alert("this paresed")
      
  },
  "Cancel": function() {
      $(this).dialog("close");
  }
  },
  body :'<form method="post" action="" id="apdateap"><div class="warner"></div><div class="form-group"><label for="inputName" class=" control-label">Disease</label><div class=""><select type="text" name="disease" class="form-control" id="inputName" placeholder="Unit eg : mg "></select></div></div>'
  +'<div class="w3-row-padding">'
  +'<div class="w3-half"><div class="form-group"><label for="inputName" class=" control-label">doctor</label><div class=""><input type="text" name="doctor" class="form-control" id="inputName" placeholder="doctor" required readonly="true"></div></div>'
  +'<div class="form-group"><label for="inputName" class=" control-label">start date</label><div class=""><input type="text" name="start_date" value="'+data.start_date+'" class="form-control" id="inputName" placeholder="date from" required ></div></div>'
  +'<div class="form-group"><label for="inputName" class=" control-label">start time</label><div class=""><input type="text" name="start_time" value="'+data.start_time+'" class="form-control" id="inputName" placeholder="time from" required ></div></div></div>'
  +'<div class="w3-half"><div class="form-group"><label for="inputName" class=" control-label">amount</label><div class=""><input type="number" name="amount" class="form-control" id="inputName" value="'+data.amount+'" placeholder="amount" required readonly="true"></div></div>'
  +'<div class="form-group"><label for="inputName" class=" control-label">end date</label><div class=""><input type="text" value="'+data.end_date+'" name="end_date" class="form-control" id="inputName" value="'+data.end_date+'" placeholder="end date"></div></div>'
  +'<div class="form-group"><label for="inputName" class=" control-label">end time</label><div class=""><input type="text" name="end_time" value="'+data.end_time+'" class="form-control" id="inputName" placeholder="end time" required></div></div></div><div><div class="form-group"><label for="inputName" class=" control-label">description</label><div class=""><textarea type="text"  name="description" class="form-control" id="inputName" placeholder="reasone about this appointment"  required>'+data.note+'</textarea></div></div>'
  +'</div></div><div></form>'
  });
  timereuse($("body").find("input[name=end_time]"))
  timereuse($("body").find("input[name=start_time]"))
  datereuse($("body").find("input[name=start_date]"))
  datereuse($("body").find("input[name=end_date]"))
  loadappoint('/loadappoint');
  $("body").on("click",".updateapp",function(){
  if(ajaxtoserv($("body").find("#apdateap"),"form",$("input[name=patient_id]").val()+"/newappoint?_token="+_token+"&patient_id="+$("input[name=patient_id]").val()+"&id="+data.id+"&doctor_id="+$("body").find("#apdateap input[name=doctor]").attr('doctortag'),this).success){
  setTimeout(function() {
  appoin_table.ajax.reload();
  removebesmodal();
  }, 1000);

  }
  });

  }