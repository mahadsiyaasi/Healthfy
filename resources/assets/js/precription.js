var checkarray  = [];
var index =0;
//jQuery.inArray($(this).attr("tagid"),checkarray)==-1
$(document).ready(function(){
$('body').on('click', '.finlist li', function(){
  $(this).find('i').toggleClass("fa fa-check")
  $(this).toggleClass("w3-border-left w3-border-blue w3-light-grey")

 
})
})
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}
function popuplist(){
  removebesmodal()
  modalmakeup({
  title:"Choose Medication",
  width:"30%",
  color:"w3-white",
  fade:"w3-animate-zoom",
  buttontext:"save",
  buttoneventclass:"appentbody",
  buttoncolor:"w3-blue",
  buttons: {
  saveg: function() {
    alert("this paresed")                   
    },
    "Cancel": function() {
      $(this).dialog("close");
      }
      },
  body :'<div class="finlist">'+$(".re-useload").html()+'</div>'
  });
  $("#oncreate").on("click",".appentbody",function(e){
    var htm="";
    
    $('body').find('.finlist li').each(function(){
      var header_id  = $(this).attr("tagid");
      var $this = $(this).find("i");
      if ($this.hasClass("fa-check") && avoidduplicatesubmit($(this).attr("tagid")) ) {
      //checkarray.push($(this).attr("tagid"))
        htm += '<tr main_precripe_tag="'+$(this).attr("tagid")+'" style="100%; position:relative" class="lit-group li w3-li w3-border-top">'+
        '<td  style="width:180px"  class="w3-text-blue w3-large"><h3>'+$(this).attr("tagname")+'</h3><a class="w3-text-black">'+$(this).attr("dn")+'</a></td>'+
        '<td class="w3-padding" style="width:120px">   <input type="number" placeholder="frequency" style="display:inline-block" class="form-control" name="dosage[]" required><span>'+$(this).attr("dn")+'</span></td>'+
        ' <td style="width:180px;position:relative"><select class="form-control" style="display:inline-block" name="frequency[]" required></select><br></td>'+
        '<td style="width:90px"><input type="number" placeholder="days" style="width:95%; display:inline-block" class="form-control" name="days[]" required><br><span>days</span></td>'+
        '<td style="position:relative;width: 200px"><div class="form-check w3-padding"><label for="'+$(this).attr("tagname")+index+1+'" class="form-check-label" style="display:inline-block"><input name="session['+index+']" type="radio"  id="'+$(this).attr("tagname")+index+1+'" class="check form-check-input radio w3-checkbox checkbox" value="After Food" style="display:inline-block"> After Food</label>  | '+
        ' <label for="'+$(this).attr("tagname")+index+1.2+'" class="form-check-label" style="display:inline-block"> <input name="session['+index+']" type="radio" class=" form-check-input check radio w3-checkbox checkbox" value=" Before Food " id="'+$(this).attr("tagname")+index+1.2+'" style="display:inline-block"> Before Food </label><br><a>Add instruction</a>'+
        '<a class="pull-right w3-hover-text-red" style="position:relative; right:-10px; top:-10px; cursor:pointer" onclick="removemain(this)"><i class="fa fa-close"></i></a></td></tr>'
      index++;
      }else  if ($this.hasClass("fa-check")==false && avoidduplicatesubmit($(this).attr("tagid"))===false) {
        $('body #listtable tbody tr').each(function(){
          var $tho = $(this);
        var maithis = $(this).attr("main_precripe_tag");
          if (header_id == maithis) {
            $tho.remove()
          }


      })
      }
    })
    $('#listtable tbody').append(htm);
    removebesmodal()
    e.preventDefault();
  })
}
function removemain(th){
  $(th).parents("tr:first").remove();
}
function avoidduplicate() {
 $('body #listtable tbody tr').each(function(){
  var maithis = $(this).attr("main_precripe_tag");
  ///alert(maithis)
  $('body').find('.finlist li').each(function(){
      var $this = $(this).find("i");
      if ($(this).attr("tagid")==maithis) {
            $this.addClass("fa fa-check")
      }
    })
 })
}
function avoidduplicatesubmit(id) {
  checkarray.length =0;
 $('body #listtable tbody tr').each(function(){
  var maithis = $(this).attr("main_precripe_tag");
      checkarray.push(maithis)
 })
 //var checkarray  = [];
if (jQuery.inArray(id,checkarray)==-1){
  return true;
}else{
  return false;
}
}
function saveprescription(){
var dataarray = [];
dataarray.length = 0;
if ($('body #listtable tbody').find('tr').length>0) {
$('body #listtable tbody tr').each(function(){
  dataarray.push({name: 'medication_id[]', value: $(this).attr("main_precripe_tag")});
})
$('body #listtable tbody tr'). find('input[type=number],select').each(function(){
  dataarray.push({name: $(this).attr('name'), value: $(this).val()});
})
$('body #listtable tbody tr'). find('input[type=radio]').each(function(){
  if ($(this).is(':checked')) {
  dataarray.push({name: $(this).attr('name'), value: $(this).val()});
}
})
  ajaxtoserv(dataarray,null,"not form","saveprescription?_token="+_token,this);
}else{
 screenmodal({'message':"Sorry you did not selected anything please select one or more medication at the add button <i class='fa fa-warning'></i>"})
}
}
