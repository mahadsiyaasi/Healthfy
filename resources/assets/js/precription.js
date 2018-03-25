$(document).ready(function(){
$('body .finlist').on('click', 'li', function(){
  alert("mahadssss")
  $(this).find('i').toggleClass("fa fa-check")
  $(this).toggleClass("w3-border-left w3-border-blue  ")

 
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
  modalmakeup({
  title:$("input[name=patient_name]").val()+"`s new appointment",
  width:"60%",
  color:"w3-white",
  fade:"w3-animate-zoom",
  buttontext:"save",
  buttoneventclass:"saveappoint",
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
}