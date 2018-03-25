function rangemodal(th){
	var group_id = $(th).attr("grouptag"); 
	modalmakeup({
	title:"Create Reference & Unit",
	width:"50%",
	color:"w3-white",
	fade:"w3-animate-zoom",
	buttontext:"save",
	buttoneventclass:"saverange",
	buttoncolor:"w3-blue",
	buttons: {
                saveg: function() {
                    alert("this paresed")
                    
                },
                "Cancel": function() {
                    $(this).dialog("close");
                }
            },
	body :'<form method="post" action="" id="rangeform"><div class="form-group"><label for="inputName" class=" control-label">Unit</label><div class=""><input type="text" pattern="[0-9]{1,}" name="unit" class="form-control" id="inputName" placeholder="Unit eg : mg "></div></div></div> <div class="w3-row-padding"><div class="w3-half"> <div class="form-group"><label for="inputName" class=" control-label">Min-range</label><div class=""><input type="number" pattern="[0-9]{1,}" name="min" class="form-control" id="inputName" placeholder="Min range "></div></div></div><div class="w3-half"><div class="form-group"><label for="inputName" class=" control-label">Max-range</label><div class=""><input type="number" pattern="[0-9]{1,}" name="max" class="form-control" id="inputName" placeholder="max"></div></div></div></div><div></form>'
	});

	$("#oncreate").on("click",".saverange",function(e){
 	 var $this = $(this);

  	if (($("body").find("input[name=min]").val() !="" && $("body").find("input[name=max]").val() !="") || $("body").find("input[name=unit]").val() !="") {
 	 	$this.button('loading');
 	 	$.ajax({
 	 		url:"saverange",
 	 		data:{_token:_token,min:$("body").find("input[name=min]").val(),max:$("body").find("input[name=max]").val(),group_id:group_id,unit:$("body").find("input[name=unit]").val()},
 	 		datatype:"json",
 	 		success:function(data){
 	 			$this.button('reset');
 	 			$("body").find("#oncreate").modal("hide");
 	 			$("body").find('#oncreate').on('hidden',function(e){
				    $(this).remove();
				});
 	 			loadunitrange();
 	 			}
 	 	})
 	 }
 	 e.stopPropagation();
 })
}