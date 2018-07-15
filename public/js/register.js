var questions = [
  {question:"What's your full name ?",pattern: '[0-9a-zA-Z]{3,}',name:"fullname"},
  {question:"What's your phone number?",pattern: '[0-9]{9,}',name:"phone"},
  {question:"What's your email?", pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,name:"email"},
  {question:"select your counntry ?",pattern: '[0-9a-zA-Z]{3,}',name:"country",otype:"select",ovalue:{"country":"somalia"}},
  {question:"select your city ?",pattern: '[0-9a-zA-Z]{3,}',name:"city",otype:"select",ovalue:{"country":"somalia"}},
  {question:"select your gender",pattern: '[0-9a-zA-Z]{3,}',name:"gender",otype:"select", ovalue:{male:"male",Female:"female"}},
  {question:"Create your password", type: "password",pattern: '[0-9a-zA-Z]{8,}',name:"password"},
  //{question:"confirm  your password", type: "password",pattern: '[0-9a-zA-Z]{8,}',name:"cpassword"}
]
var dataArray=[];
;(function(){

  var tTime = 100  // transition transform time from #register in ms
  var wTime = 200  // transition width time from #register in ms
  var eTime = 1000 // transition width time from inputLabel in ms
 var position = 0
  putQuestion()
  progressButton.addEventListener('click', validate)
  inputField.addEventListener('keyup', function(e){
    transform(0, 0) // ie hack to redraw
    if(e.keyCode == 13) validate()
  })
  selectField.addEventListener('keyup', function(e){
    transform(0, 0) // ie hack to redraw
    if(e.keyCode == 13) validate()
  })
  function putQuestion() {
 var selectcity;
   if (questions[position].otype) {
    inputField.style.display = "none"
    selectField.style.display = "block"
    inputLabel.innerHTML = questions[position].question
    inputField.type = questions[position].type || 'text'
   
    if ( questions[position].name=="city") {
      populateStates("selectField","selectField");
    }else if ( questions[position].name=="country") {
      populateCountries("selectField")
    }if ( questions[position].name=="gender") {
      selectField.length=0;
      selectField.options[0] = new Option('Select Gender','-1');
         var option = document.createElement("option");
         var index =1;
      $.each (questions[position].ovalue,function(i,item){
       selectField.options[index] = new Option(item,item);
       index++;
      })
     }
    selectField.focus()
    showCurrent()
   }else{
    inputField.style.display = "block"
    selectField.style.display = "none"
    inputLabel.innerHTML = questions[position].question
    inputField.value = ''
    inputField.type = questions[position].type || 'text' 
      if (questions[position].name=="phone") {
        inputField.type = questions[position].type || 'number' 
      }
    inputField.focus()
    showCurrent()
    }
  }
  
  // when all the questions have been answered
  function done() {    
    // remove the box if there is no next question
    $(main).html("")
   console.log(dataArray)
    var h1 = document.createElement('h1')
    h1.appendChild(document.createTextNode('Welcome ' + dataArray[0].value + '! wait for minute . . .'))
    setTimeout(function() {
      main.parentElement.appendChild(h1) 
      $(main).addClass("text-center center")    
      setTimeout(function() {h1.style.opacity = 1}, 50)
      savedata(dataArray)
    }, eTime)
    
  }

  // when submitting the current question
  function validate() {

     if (questions[position].otype) {
      dataArray.push({name:questions[position].name,value:selectField.value})
      }else{
       dataArray.push({name:questions[position].name,value:inputField.value})
     }
   if (questions[position].otype) {

    // check if the pattern matches
    if (!selectField.value.match(questions[position].pattern || /.+/)) wrong()
    else ok(function() {
      
      // set the progress of the background
      progress.style.width = ++position * 100 / questions.length + 'vw'

      // if there is a new question, hide current and load next
      if (questions[position]) hideCurrent(putQuestion)
      else hideCurrent(done)
             
    })
  }
else {

    // check if the pattern matches
    if (!inputField.value.match(questions[position].pattern || /.+/))  wrong()
    
    else ok(function() {
      
      // set the progress of the background
      progress.style.width = ++position * 100 / questions.length + 'vw'

      // if there is a new question, hide current and load next
      if (questions[position]) hideCurrent(putQuestion)
      else hideCurrent(done)
             
    })


  }
 

  }

  // helper
  // --------------

  function hideCurrent(callback) {
    inputContainer.style.opacity = 0
    inputProgress.style.transition = 'none'
    inputProgress.style.width = 0
    setTimeout(callback, wTime)
  }

  function showCurrent(callback) {
    inputContainer.style.opacity = 1
    inputProgress.style.transition = ''
    inputProgress.style.width = '100%'
    setTimeout(callback, wTime)
  }

  function transform(x, y) {
    register.style.transform = 'translate(' + x + 'px ,  ' + y + 'px)'
  }

  function ok(callback) {
    register.className = ''
    setTimeout(transform, tTime * 0, 0, 10)
    setTimeout(transform, tTime * 1, 0, 0)
    setTimeout(callback,  tTime * 2)
  }

  function wrong(callback) {
    register.className = 'wrong'
    for(var i = 0; i < 6; i++) // shaking motion
      setTimeout(transform, tTime * i, (i%2*2-1)*20, 0)
    setTimeout(transform, tTime * 6, 0, 0)
    setTimeout(callback,  tTime * 7)
  }

}())
function savedata(dataArray){
  dataArray.push({name:"_token",value:_token})
  $.ajax({
    url:"/saveoutpatient",
    data:dataArray,
    datatype:"json",
    type:"POST",
    success:function(data){
      Location.href="login"
    }
  })
}