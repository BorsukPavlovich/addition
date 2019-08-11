function ready() {
  var elem = document.getElementById('primary-menu'),
      top = document.querySelector('.footer-logo'),
      link = document.querySelector('.link'),
      toggle = document.querySelector('.toggle');

  function scroll(e) {
    if (e.target.tagName == 'A' && !e.target.hasAttribute('title') && ~e.target.href.indexOf('#')) {
      console.log(111);
      e.preventDefault();
      console.log(e.target.getAttribute('href'));
      var target = document.querySelector('' + e.target.getAttribute('href'));
      target.scrollIntoView({
        behavior: "smooth"
      })
    }
  }

  if (elem) {
    elem.onclick = function(e) {
      scroll(e);
    };
  }

  if (top) {
    top.onclick = function(e) {
      scroll(e);
    };
  }

  if (link) {
    link.onclick = function(e) {
      scroll(e);
    };
  }

  toggle.onclick = function(e) {
    document.body.classList.toggle('open');
  }

};

document.addEventListener("DOMContentLoaded", ready);