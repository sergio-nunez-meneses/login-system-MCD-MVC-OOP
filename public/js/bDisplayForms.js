const SIGN_TAB = getId('signTab'),
  SIGN_IN = getId('sign_in_form'),
  SIGN_UP = getId('sign_up_form'),
  SIGN_IN_BTN = getName('sign-in'),
  SIGN_UP_BTN = getName('sign-up');

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

SIGN_TAB.addEventListener('click', displayForms);
