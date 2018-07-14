var questions = [
  {question:"What's your full name ?",pattern: '[a-z A-Z]{3,}',name:"fullname"},
  {question:"What's your phone number?",pattern: '[0-9]{9,}',name:"phone"},
  {question:"What's your email?", pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,name:"email"},
  {question:"select your counntry",pattern: '[a-z A-Z]{3,}',name:"country",otype:"select",ovalue:{"country":"somalia"}},
  {question:"select your city",pattern: '[a-z A-Z]{3,}',name:"city",otype:"select",ovalue:{"country":"somalia"}},
  {question:"select your gender",pattern: '[a-z A-Z]{3,}',name:"gender",otype:"select", ovalue:{"country":"somalia"}},
  {question:"Create your password", type: "password",pattern: '[0-9 a-z A-Z]{8,}',name:"password"}
]
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
  function putQuestion() {
    inputLabel.innerHTML = questions[position].question
    inputField.value = ''
    inputField.type = questions[position].type || 'text'  
   if (questions[position].otype) {
   var myDiv = document.getElementById("inputContainer");
        var selectList = document.createElement("select");
        selectList.id = "inputField";
        selectList.width = "200px"
        selectList.border = "none"
        $(selectList).css("border","none");
        inputLabel.innerHTML = ""
        selectList.className = "custom-select form-control form-group select";
        myDiv.appendChild(selectList);
        var option = document.createElement("option");
        option.text = questions[position].question;
        option.value = questions[position].ovalue.country;
        option.text = questions[position].ovalue.country;
        selectList.appendChild(option);

   selectList.focus()
    showCurrent()
   }else{

   inputField.focus()
    showCurrent()
    }
  }
  
  // when all the questions have been answered
  function done() {
    
    // remove the box if there is no next question
    register.className = 'close'
    
    // add the h1 at the end with the welcome text
    var h1 = document.createElement('h1')
    h1.appendChild(document.createTextNode('Welcome ' + questions[0].value + '!'))
    $.each(questions,function(i,value){
     alert(value.value)
    })
    setTimeout(function() {
      register.parentElement.appendChild(h1)     
      setTimeout(function() {h1.style.opacity = 1}, 50)
    }, eTime)
    
  }

  // when submitting the current question
  function validate() {

    // set the value of the field into the array
    questions[position].value = inputField.value

    // check if the pattern matches
    if (!inputField.value.match(questions[position].pattern || /.+/)) wrong()
    else ok(function() {
      
      // set the progress of the background
      progress.style.width = ++position * 100 / questions.length + 'vw'

      // if there is a new question, hide current and load next
      if (questions[position]) hideCurrent(putQuestion)
      else hideCurrent(done)
             
    })

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