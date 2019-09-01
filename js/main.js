function ready() {
  console.log(document.location);
  var elem = document.getElementById('primary-menu'),
      top = document.querySelector('.footer-logo'),
      link = document.querySelector('.link'),
      toggle = document.querySelector('.toggle');

  function scroll(e) {
    console.log(document.location);
    var target;
    if (e.target.tagName == 'A' && !e.target.hasAttribute('title') && ~e.target.href.indexOf('#') && (document.location.pathname == '/')) {
      e.preventDefault();

      target = document.querySelector('' + e.target.getAttribute('href'));
      target.scrollIntoView({
        behavior: "smooth"
      })
    } else if (e.target.tagName == 'A' && !e.target.hasAttribute('title') && ~e.target.href.indexOf('#') && (document.location.pathname != '/')) {
      e.preventDefault();
      document.location.replace('/' + e.target.getAttribute('href'));
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