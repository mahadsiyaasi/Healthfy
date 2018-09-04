var doctors_table;
$(document).ready(function(){
	datereuse("#birthdates");
	$("#doctorbtn").click(function(){
  commonvalidator("#doctorfm")
  if ($("#doctorfm").valid()) {
   if (ajaxtoserv("#doctorfm","form","savedoctor",this).success){
    setTimeout(function(){ 
     location.href="doctors"
    },1000)
}
  }
})

	doctors_table = $('#doctors_table').dtab({
   table:"#doctors_table",
              ajax: {
                type   : "POST",
                url    : 'loaddoctors',
                data:{_token:_token},
              },

                paging: true,
                sort: true,
                info:true,
                search: true,
                //tabledata: {textFontClass:'w3-text-gray'},
                pagelenght:[10,20,100,350],         //"sAjaxSource":'?_token='+$('meta[name="csrf-token"]').attr('content'),
           
          colums:[
          	//{ title:"Action", data: 'action ', name: 'action' },
            {title:"#ID", name: 'id',visible:false },
            { title:"Name",name: 'name' },
            {title:"Tell",name: 'tell' },
            {title:"E-mail",name: 'email' },
            { title:"Nationality", name: 'nationality' },
            { title:"Address", name: 'address' },
            {title:"Speciality", name: 'specialization' },
            {title:"#ID", name: 'user_id',visible:false },
            
        ],
        columndefs: [
          {
            "render": function (row) { 
                    return "<a href='doctors/" + row.id+"'>"+row.name+"</a>";
                },
                "targets": 1
            },
             {
            'render': function (row) {               
                var returner =  "<a style='cursor:pointer' onclick='addAuth(this)' _id='"+row.id+"'> <i class='fa fa-plus' > Add Outh</a>";
                 return row.user_id=='null'?returner:row.email;             
            },
                "targets": 3
            },

        ],
         order: {'sort':1 , 'sorttype':'asc'},
        });  
	   commonvalidator($("#formUpdateDoctora"));
      $("#formfieldsubmit").click(function(){
          commonvalidator($("#formUpdateDoctora"));
          if ($("#formUpdateDoctora").valid()) {
            //var res = ajaxtoserv("#formUpdateDoctora","form","updateDoctorcomplete",this);
         
              formUpdateDoctora.submit();
               
          }
        });
      })