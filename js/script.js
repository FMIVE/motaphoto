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

// MODALE

var modal = document.getElementById('myModal');
var btn = document.querySelector(".myBtn_modale");
var btnContact = document.querySelector(".myBtn-contact-single");
// ouverture au clic du lien contact du menu, 
btn.onclick = function() {
    modal.style.display = "flex";
}
// et du bouton contact.
btnContact.onclick = function() {
    modal.style.display = "flex";
}
// ferme la modale au clic
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
// champ reference
jQuery(function($){
    $(document).ready(function(){
        $("#wpforms-45-field_3").val($('#reference').text()); 
      });
    });
    console.log()