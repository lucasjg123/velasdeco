const preloader = document.querySelector(".preloader");
const body = document.body;

window.addEventListener("load", () => {
  preloader.classList.add("d-none");
  body.classList.remove("no-scroll");
});
