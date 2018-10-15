$(document).ready(function(){
	//-------
})
//pop add new clinic 
function addNewClinic(){
	var dism = $("#DeteilView").DeteilView({
	    title:'Clinic & Timing',
	    width:"80%",
	    color:"w3-white",
	    fade:"w3-animate-zoom",
	    buttontext:"Procced",
	    buttoneventclass:"OK",
	    buttoncolor:"w3-blue",
	    body:$("#clinicfm").clone(),
	    backdrop:false,
	    savebtn:true,
	    cancelbtn:true,
	    loading:true,
	    bodyJsParser:function(fm){
	       	timereuse(fm.find("input[name=1_start_time]"))
	    	timereuse(fm.find("input[name=2_start_time]"))
	    	timereuse(fm.find("input[name=1_end_time]"))
	   		timereuse(fm.find("input[name=2_end_time]"))
	   		fm.find("input[name=1_start_time]").attr("disabled")
	    },
	    submitData: function(fm){
       var data  = ajaxtoserv(fm,"form","/clinicsaving",null);
        if (data.success) {
         return true;
          }

    }
  })
}
function updatePersonal(){
	var dism = $("#DeteilView").DeteilView({
	    title:'Update Personal Detail',
	    width:"80%",
	    color:"w3-white",
	    fade:"w3-animate-zoom",
	    buttontext:"Procced",
	    buttoneventclass:"OK",
	    buttoncolor:"w3-blue",
	    body:$("#holefm1").html(),
	    backdrop:false,
	    savebtn:true,
	    cancelbtn:true,
	    loading:true,
	    bodyJsParser:function(fm){	    
	    fm.find("#countryhidden").attr("id","countryhidden+1");
	    fm.find("#cityupdate").attr("id","cityupdate+1");
	    populateCountries("countryhidden+1", "cityupdate+1");
	     $("#countryhidden+1").find("option").each(function(){
                    if (this.value==jsUserDetail().country) {
                    $(this).attr("selected",true)
                     $(this).parent().trigger('change');
                  }
                 })
          $("#cityupdate+1").find("option").each(function(){
                  if (this.value==jsUserDetail().city) {
                    $(this).attr("selected",true)
                     $(this).parent().trigger('change');
                  }
                 })
               
	    },
	    submitData: function(fm){
	    	//res = ajaxtoserv(fm,"form","updateDoctorcomplete",this);         
            fm.submit();
              //return true;
     }
  })
}
function updatePersonalProfileImage(){
	//alert(imageUser().pic)
	var imagesrccode ='<div id="holefm2"><form method="POST"  class="autovaliddate validate"  id="formUpdateDoctora" style="background: inherit; display: block;" enctype="multipart/form-data" action="/savelastupdate" ><div class="warner"></div> <div class=""><div class="form-group"> <div class="text-center"><div class=""><div class=""> <div class="w3-display-container w3-hover-opacity"><img src="'+imageUser().pic+'" onerror="try{imgError(this,'+imageUser().gender+');}catch(err){ console.log(err)};" alt="..." id="doctorimage" class="user-image img image w3-border w3-hover-opacity" style="width:100%" onclick="filechoser()"><div class="w3-display-middle w3-display-hover"> <button   type="button" onclick="filechoser()" class="w3-button w3-red">Change picture</button>'
                    +'</div></div><input type="file" onchange="return placeholderImg()"  name="image" id="imagedoctor" style="display: none;" class="user-image img image image-cirle w3-border">'
                  +'</div></div></div></div> </div><input type="hidden" name="_token" id="csrf-token" value="'+_token+'">'
   				+'</form></div>'
	var dism = $("#DeteilView").DeteilView({
	    title:'Change Profile Image',
	    width:"25%",
	    color:"w3-white",
	    fade:"w3-animate-zoom",
	    buttontext:"Procced",
	    buttoneventclass:"OK",
	    buttoncolor:"w3-blue",
	    body:imagesrccode,
	    backdrop:false,
	    savebtn:true,
	    cancelbtn:true,
	    loading:true,
	    bodyJsParser:function(fm){	    
	    	//alert(fm.html())
	    },
	    submitData: function(fm){
	     //res = ajaxtoserv(fm,"form","updateDoctorcomplete",this);         
            fm.submit();
              //return true;
     }
  })
}
filechoser =function(){
	$("#imagedoctor").trigger("click");
}
placeholderImg = function(){
	return fileValidationView("imagedoctor","doctorimage");
}