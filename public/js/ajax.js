const RECOVER_BTN = document.getElementsByName('recover-btn')[0],
  RESPONSE_CONTAINER = document.getElementById('responseContainer');

// callback function displays ajax response
function ajaxResponse() {
  console.log(this.responseText); // just for debugging

  RESPONSE_CONTAINER.innerHTML = '<div class="alert alert-info alert-dismissible fade show my-3"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><p id="responseParagraph" class="font-italic lead"></p></div>';
  document.getElementById('responseParagraph').innerHTML = this.responseText;
}

function ajaxRequest(e) {
  e.preventDefault();

  // create an XHR object to interact with server
  let xhr = new XMLHttpRequest();
    inputValue = document.getElementsByName('user-mail')[0].value;

  // initializes a newly-created request
  xhr.open('POST', 'action/ajaxRequest.php');
  // encode request in key-value tuples (separated by "&", with a "=" between the key and the value)
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  // sends the request to the server
  xhr.send('user-mail=' + inputValue);

  // done and successful response (readyState = 4 && status = 200)
  xhr.onload = ajaxResponse; // callback function
}

// trigger ajaxRequest function
RECOVER_BTN.addEventListener('click', (e) => {
  ajaxRequest(e);
});
