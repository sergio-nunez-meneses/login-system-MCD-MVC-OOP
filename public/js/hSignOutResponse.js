function signOutResponse() {
  if (this.responseText.charAt(0) !== '{') {
    console.log("Syntax error! I couldn't tell what it is though");
    return false;
  }

  let response = JSON.parse(this.responseText);
  console.log(response); // just for debugging

  if (typeof response.error !== 'undefined' && response.error !== '') {
    errorDisplay(response.error, true);
  } else {
    errorDisplay(false);
  }

  if (typeof response.html !== 'undefined' && response.html !== '') {
    getId('navbarNav').innerHTML = '';
    getId('mainContainer').innerHTML = response.html;
  }
}
