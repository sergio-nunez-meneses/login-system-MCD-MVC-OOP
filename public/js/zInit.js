ajax(query('init'), signInResponse);

setTimeout(() => {
  let script = document.createElement('script');
  script.src = '/public/js/bDisplayForms.js';
  document.body.appendChild(script);
}, 5000);
