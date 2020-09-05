const SIGN_TAB = getId('signTab'),
  SIGN_IN = getId('signInForm'),
  SIGN_UP = getId('signUpForm'),
  SIGN_IN_BTN = getName('sign-in'),
  SIGN_UP_BTN = getName('sign-up');

function getId(id) {
  return document.getElementById(id);
}

function getName(name) {
  return document.getElementsByName(name)[0];
}

function displayForms() {
  if (SIGN_UP.classList.contains('hidden')) {
    SIGN_UP.classList.remove('hidden');
    SIGN_IN.classList.add('hidden');
    SIGN_TAB.innerHTML = 'Show Sign In';
  } else {
    SIGN_IN.classList.remove('hidden');
    SIGN_UP.classList.add('hidden');
    SIGN_TAB.innerHTML = 'Show Sign Up';
  }
}

function validateSignIn() {
  let user = getName('username').value,
    pass = getName('password').value,
    error = false,
    errorMsg = '';

  if (user.length == 0) {
    error = true;
    errorMsg += 'username cannot be empty\n';
  }

  if (pass.length == 0) {
    error = true;
    errorMsg += 'password cannot be empty\n';
  }

  if (error === false) {
    SIGN_IN.submit();
  } else {
    alert(errorMsg);
    return false;
  }
}

SIGN_TAB.addEventListener('click', displayForms);
// SIGN_IN_BTN.addEventListener('click', validateSignIn);
