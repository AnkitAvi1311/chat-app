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
  
function getId(id) {
    return document.getElementById(id);
}  

function getTarget(e) {
    if(!e) {
        e = window.event;
    }
    return e.target || e.srcElement;
} 
// function to validate email address
function validateEmail(email) {
    let reg = /^([a-zA-Z0-9\.\-_]+)\@([[a-zA-Z0-9\.\-_]+)\.([a-zA-Z]{2,4})$/;
    if(reg.test(email)){
        return true;
    }else{
        return false;
    }
}
