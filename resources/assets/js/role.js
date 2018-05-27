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