function signOutResponse() {
  let response = JSON.parse(this.responseText);
  console.log(response); // just for debugging

  if (typeof response.html !== 'undefined' && response.html !== '') {
    getId('navbarNav').innerHTML = '';
    getId('mainContainer').innerHTML = response.html;
  }
}
