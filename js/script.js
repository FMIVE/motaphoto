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
// const span = document.getElementsByClassName("close")[0];
// // When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//     modal.style.display = "none";
// }
//--------------------------------------------------------
// Ouverture au clic du lien contact du menu, 
if(btn) {
    btn.onclick = function() {
        modal.style.display = "flex";
    }
}
// et du bouton contact.
if(btnContact) {
    btnContact.onclick = function() {
        modal.style.display = "flex";
    }
}
// ferme la modale au clic sur la page
window.onmousedown = function(event) {
    if (event.target == modal) {
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

// ______________________________________________________________
// CHARGER PLUS

jQuery(document).ready(function($) {
    var canBeLoaded = true; // cette variable est utilisée pour éviter plusieurs appels AJAX

    $('#load-more').on('click', function() {
        var button = $(this);
        var finMessage = $('#fin-message');
        var data = {
            'action': 'load_more_photos',
            'page': load_more_params.current_page
        };

        if (canBeLoaded) {
            $.ajax({
                url: load_more_params.ajaxurl,
                data: data,
                type: 'POST',
                beforeSend: function(xhr) {
                    // canBeLoaded = false; // éviter plusieurs appels AJAX
                    button.text('Chargement...'); // changer le texte du bouton pendant le chargement
                },
                success: function(data) {
                    if (data.trim() != '0') {
                        $('#photo-container').append(data); // Ajouter les nouvelles photos
                        load_more_params.current_page++;
                        canBeLoaded = true; // Permettre un nouvel appel AJAX
                        button.text('Charger plus'); // réinitialiser le texte du bouton
                    }else {
                        button.hide(); // Cacher le bouton
                        finMessage.show(); // Afficher le message
                        }
                }
                
            });
        }
    });
});
// ______________________________________________________

