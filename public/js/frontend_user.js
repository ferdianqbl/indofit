const navbar = document.querySelector('.navbar');
window.onscroll = function (event) {
  if (this.scrollY > 0) {
    navbar.classList.add("my-navbar-scroll");
  } else {
    navbar.classList.remove("my-navbar-scroll");
  }
};