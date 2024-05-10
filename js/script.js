/*
Theme Name: motaphoto
Author: FM
Version: 1.0
*/
// menu mobile burger//
const burger = document.querySelector(".burger");
const btnburger = document.querySelector(".burger__btn");
btnburger.addEventListener("click", function () {
 burger.classList.toggle("active");
});

//      MODALE        //
document.addEventListener('DOMContentLoaded', function () {
const modal = document.getElementById('myModal');
const btn = document.querySelector(".myBtn_modale");
const btnContact = document.querySelector(".myBtn-contact-single");

//rajout pour essai debug, croix de fermeture-------------
const span = document.getElementsByClassName("close")[0];
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
//--------------------------------------------------------
// Ouverture au clic du lien contact du menu, 
btn.onclick = function() {
    modal.style.display = "flex";
}
// et du bouton contact.
btnContact.onclick = function() {
    modal.style.display = "flex";
}
// ferme la modale au clic sur la page

// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }
window.onmousedown = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}

// champ reference de la modale
jQuery(function($){
    $(document).ready(function(){
        $("#wpforms-45-field_3").val($('#reference').text()); 
      });
    });
});
   