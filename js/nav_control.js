function openNav() {
  var body = document.querySelector("body.home.blog.gruenenkirchen");
  var sidebar = document.querySelector("#mainSidebar");
  sidebar.style.width = "100%";

  let he = sidebar.offsetHeight + "px";
  body.style.height = he;
  body.style.overflow = "hidden";
  //disableScroll();
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  var body = document.querySelector("body.home.blog.gruenenkirchen");
  var sidebar = document.querySelector("#mainSidebar");
  sidebar.style.width = "0";
  body.style.height = "auto";
  body.style.overflow = "visible";
  //enableScroll();
} 


var keys = {37: 1, 38: 1, 39: 1, 40: 1};

function preventDefault(e) {
  e.preventDefault();
}

function preventDefaultForScrollKeys(e) {
  if (keys[e.keyCode]) {
    preventDefault(e);
    return false;
  }
}

// modern Chrome requires { passive: false } when adding event
var supportsPassive = false;
try {
  window.addEventListener("test", null, Object.defineProperty({}, 'passive', {
    get: function () { supportsPassive = true; } 
  }));
} catch(e) {}

var wheelOpt = supportsPassive ? { passive: false } : false;
var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';

// call this to Disable
function disableScroll() {
  window.addEventListener('DOMMouseScroll', preventDefault, false); // older FF
  window.addEventListener(wheelEvent, preventDefault, wheelOpt); // modern desktop
  window.addEventListener('touchmove', preventDefault, wheelOpt); // mobile
  window.addEventListener('keydown', preventDefaultForScrollKeys, false);
}

// call this to Enable
function enableScroll() {
  window.removeEventListener('DOMMouseScroll', preventDefault, false);
  window.removeEventListener(wheelEvent, preventDefault, wheelOpt); 
  window.removeEventListener('touchmove', preventDefault, wheelOpt);
  window.removeEventListener('keydown', preventDefaultForScrollKeys, false);
}