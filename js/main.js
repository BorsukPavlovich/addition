function ready() {
  var elem = document.getElementById('primary-menu'),
      top = document.querySelector('.footer-logo'),
      link = document.querySelector('.link'),
      toggle = document.querySelector('.toggle');

  function scroll(e) {
    if (e.target.tagName == 'A' && !e.target.hasAttribute('title')) {
      console.log(111);
      e.preventDefault();
      console.log(e.target.getAttribute('href'));
      var target = document.querySelector('' + e.target.getAttribute('href'));
      target.scrollIntoView({
        behavior: "smooth"
      })
    }
  }

  elem.onclick = function(e) {
    scroll(e);
  };

  top.onclick = function(e) {
    scroll(e);
  };

  link.onclick = function(e) {
    scroll(e);
  };

  toggle.onclick = function(e) {
    document.body.classList.toggle('open');
  }

};

document.addEventListener("DOMContentLoaded", ready);