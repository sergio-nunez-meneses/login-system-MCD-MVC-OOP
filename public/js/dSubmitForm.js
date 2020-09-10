function submitForm(form, callbackFunction) {
  window.event.preventDefault();

  let request = query(form.id);

  for (let i = 0; i < form.length; i++) {
    let input = form[i];

    request.append(input.name, input.value)
  }
  console.log(request);
  ajax(request, callbackFunction);
}
