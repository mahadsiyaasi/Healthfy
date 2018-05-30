$(document).ready(function() {
$("#roletree").fancytree({ 
       checkbox: true,
      selectMode: 3,
      icon: function(event, data){
      if(data.node.isFolder() ) {  
      	var classe = data.node.extraClasses;
      	var child = data.node.children;
      	$.each(data.node.children,function(i){
      		child[i].icon = "fa fa-folder mafont" 
      	})
      	data.node.extraClasses = null;  	
     	return classe+" mafont" ;
    
	}
    },
   });
  getroleview();
})
saveRole = function(th){
	formdata = [];
	formdata.length=0;
	var form = '#role_form';
commonvalidator(form); 
if($(form).valid()){
	
var allKeys = $.map($('#roletree').fancytree('getRootNode').getChildren(), function (node) {
        return node;
    });
$.each(allKeys, function (event, data) {	
$.each(data.children, function (event, data2) {
if (data2.selected) {
	formdata.push({name:"child_id[]", value:data2.key});
}
});
});
$(form).find("input").each(function(){
	formdata.push({name:$(this).attr("name"), value:$(this).val()})
})
formdata.push({name:"_token", value:_token})
if(ajaxtoserv(formdata,"not form","saverole",th).success){
	location.href="/role"
}
}
}
var Roletable;
function getroleview(){
  Roletable = $("#role_table").dtab({
              table:"#role_table",
              ajax: {
                type   : "POST",
                url    : 'getroleview',
                data:{_token:_token},
              },
                paging: true,
                sort: true,
                info:true,
                search: true,
                //tabledata: {textFontClass:'w3-text-gray'},
                pagelenght:[10,20,100,350],
                colums:[
                  
                  {'title': "id",   name:"id"},
                  {'title': "Name", name:"name",visible:false},
                  {'title': "Description",  name:"description"},
                  {'title': "Permission Count",  name:"count", status:true}
                 ],
                 align:'left',
                 columndefs:[           
                   
                       {
                        "render": function (data) {                                          
                            
                          return '<a href="/role?id='+data.id+'&type=update">'+data.name+'</a>';
                         },
                        "targets": 0
                      },
                      
                  ],
                  "order": {'sort':0 , 'sorttype':'asc'},
                 /* "drawCallback": function ( settings ) {
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
                  
           
        }*/

    })
}

