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
	    	//alert(fm)
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
	    	//alert(fm.html())
	    },
	    submitData: function(fm){
	    	//res = ajaxtoserv(fm,"form","updateDoctorcomplete",this);         
            fm.submit();
              //return true;
     }
  })
}
function updatePersonalProfileImage(){
	var dism = $("#DeteilView").DeteilView({
	    title:'Change Profile Image',
	    width:"25%",
	    color:"w3-white",
	    fade:"w3-animate-zoom",
	    buttontext:"Procced",
	    buttoneventclass:"OK",
	    buttoncolor:"w3-blue",
	    body:$("#holefm2").html(),
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

