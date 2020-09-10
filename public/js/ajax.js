function ajax(form, callBackFunction) {
  let xhr = new XMLHttpRequest();

  xhr.open('POST', 'actions/ajaxQuery.php');
  xhr.send(form);
  xhr.onload = callBackFunction;
}

function query(queryName, formElement) {
  console.log(queryName, formElement);
  let form = new FormData(formElement);

  form.append('query', queryName);

  return form;
}
