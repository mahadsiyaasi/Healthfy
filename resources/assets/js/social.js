$(document).ready(function(){
  //AccountKit_OnInteractive();
  })
  AccountKit_OnInteractive = function(){
    AccountKit.init(
      {
        appId:"971019509631086", 
        state:_token, //'67281349073c3e2126a204217a6b25a1', 
        version:"v1.1",
       }
    );
  };
function loginCallback(response) {
  console.log(response);

  if (response.status === "PARTIALLY_AUTHENTICATED") {
    document.getElementById('code').value = response.code;
    document.getElementById('_token').value = response.state;
    document.getElementById('form').submit();
  }

  else if (response.status === "NOT_AUTHENTICATED") {
      // handle authentication failure
      alert('You are not Authenticated');
  }
  else if (response.status === "BAD_PARAMS") {
    // handle bad parameters
    alert('wrong inputs');
  }
}

function smsLogin() {
  var countryCode = document.getElementById('country').value;
  var phoneNumber = document.getElementById('phone').value;
  AccountKit.login(
    'PHONE',
    {countryCode: countryCode, phoneNumber: phoneNumber},
    loginCallback
  );
}
// email form submission handler
function emailLogin() {
  var emailAddress = document.getElementById("email").value;
  AccountKit.login('EMAIL', {emailAddress: emailAddress}, loginCallback);
}