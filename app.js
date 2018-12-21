//This is the "Offline copy of pages" service worker

//Add this below content to your HTML page, or add the js file to your page at the very top to register service worker
if (navigator.serviceWorker.controller) {
    console.log('[PWA Builder] active service worker found, no need to register')
  } else {
    //Register the ServiceWorker
    navigator.serviceWorker.register('pwabuilder-sw.js', {
      scope: './'
    }).then(function(reg) {
      console.log('Service worker has been registered for scope:'+ reg.scope);
    });
  }
  
function getId(id) {    // returning element by id
    return document.getElementById(id);
}  

function getTarget(e) { // function to return the event target
    if(!e) {
        e = window.event;
    }
    return e.target || e.srcElement;
} 
// function to validate email address on the client side
function validateEmail(email) {
    let reg = /^([a-zA-Z0-9\.\-_]+)\@([[a-zA-Z0-9\.\-_]+)\.([a-zA-Z]{2,4})$/;
    if(reg.test(email)){
        return true;
    }else{
        return false;
    }
}

// AJAX request for sending email to reset the password
function sendForgetEmail() {
    let xhr = new XMLHttpRequest() || new ActiveXObject("Microsoft.XMLHTTP");
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText);
        }
    }
    xhr.open("POST", "models/sendForgetEmail.php", true);
    xhr.send(null);
}

window.addEventListener('resize', function(e) {
    e.preventDefault();
});