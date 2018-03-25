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
  width:"60%",
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
    var index =0;
    $('body').find('.finlist li').each(function(){
      var $this = $(this).find("i");
      if ($this.hasClass("fa-check")) {
        ///alert($(this).attr('tagid'))
        htm += '<tr style="100%; position:relative" class="w3-border w3-border-blue"><td  class="w3-text-blue w3-large" style="10%">'+$(this).attr("tagname")+'</td><td class="w3-padding" style="40%">   <input type="number" placeholder="frequency" style="width:30%; display:inline-block" class="form-control" name="frequency" required> <select class="form-control" style="width:68%; display:inline-block" name="frequencyl" required></select></td><td style="10%" style="15%"><input type="number" placeholder="days" style="width:95%; display:inline-block" class="form-control" name="frequency" required></td>'+
        '<td style="width: 100px"><label for="'+$(this).attr("tagname")+index+1+'" class="w3-tiny"><input name="session" type="radio"  id="'+$(this).attr("tagname")+index+1+'" class="check radio w3-checkbox checkbox" After food> After Food</label> <br> <label for="'+$(this).attr("tagname")+index+1.2+'" class="w3-tiny"> <input name="session" type="radio" class="check radio w3-checkbox checkbox" value="Before Food" id="'+$(this).attr("tagname")+index+1.2+'" >Before Food </label></td></tr>';
      }
    })
    alert(htm);
    $('#listtable tbody').append(htm);
    removebesmodal()
    e.preventDefault();
  })
}