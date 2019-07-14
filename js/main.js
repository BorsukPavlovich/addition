function ready() {
  var elem = document.getElementById('primary-menu');

  elem.onclick = function(e) {
    e.preventDefault();
    if (e.target.tagName == 'A') {
      var target = document.querySelector('' + e.target.getAttribute('href'));
      target.scrollIntoView({
        behavior: "smooth"
      })
    }
  };

};

document.addEventListener("DOMContentLoaded", ready);