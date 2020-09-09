function ajaxResponse() {
  console.log(this.responseText); // just for debugging
  let displayErrors = getId('ajaxResponse');

  if (this.responseText !== '') {
    displayErrors.classList.remove('hidden'); displayErrors.innerHTML = this.responseText;
  }
}

function ajaxQuery(form) {
  let xhr = new XMLHttpRequest();

  xhr.open('POST', 'actions/ajaxQuery.php');
  xhr.send(form);

  xhr.onload = ajaxResponse;
}

function request(queryName, formElement) {
  let form = new FormData(formElement);

  form.append('query', queryName);

  return form;
}

function submitForm() {
  
}
