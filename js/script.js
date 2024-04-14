/*
Theme Name: motaphoto
Author: FM
Version: 1.0
*/
// menu mobile burger//
const burger = document.querySelector(".burger");
const btnburger = document.querySelector(".burger__btn");
btnburger.addEventListener("click", function () {
  console.log("coucou");
  burger.classList.toggle("active");
});

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.querySelector(".myBtn_modale");

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "flex";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
