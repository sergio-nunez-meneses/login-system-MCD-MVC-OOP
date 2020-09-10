function ajax(form, callbackFunction) {
  let xhr = new XMLHttpRequest();

  xhr.open('POST', 'actions/ajaxQuery.php');
  xhr.send(form);
  xhr.onload = callbackFunction;
}

function query(queryName) {
  let form = new FormData();

  form.append('query', queryName);

  return form;
}
