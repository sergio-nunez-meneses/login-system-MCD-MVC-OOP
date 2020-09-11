function errorDisplay(response = null, show) {
  if (show == true) {
    getId('displayErrors').classList.remove('hidden');
    getId('displayErrors').innerHTML = response;
  } else {
    getId('displayErrors').classList.add('hidden');
    getId('displayErrors').innerHTML = '';
  }
}
