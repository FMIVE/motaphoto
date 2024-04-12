// menu mobile burger//
const burger = document.querySelector(".burger");
const btn = document.querySelector(".burger__btn");
btn.addEventListener("click", function () {
  console.log("coucou");
  burger.classList.toggle("active");
});