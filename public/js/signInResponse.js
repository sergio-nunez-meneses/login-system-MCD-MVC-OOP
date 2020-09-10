function signInResponse() {
  if (this.responseText !== 'undefined' || this.responseText !== '') {
    console.log(this.responseText); // just for debugging
    if (this.responseText !== '') {
      getId('ajaxResponse').classList.remove('hidden'); getId('ajaxResponse').innerHTML = this.responseText;
      // getId('mainContainer').innerHTML = this.responseText;
    }
  }
}
