
// Recupere le bouton qui ouvre la fenêtre de modale
const btnOpenLightbox = document.querySelectorAll(".picto-fullscreen");
// Recupere le bouton qui ferme la fenêtre de modale
const btnCloseLightbox = document.querySelector(".lightboxClose");

// Recupere les elements de la lightbox
const lightbox = document.getElementById('myLightbox');
const lightboxReference = document.querySelector(".lightboxContainerInfo p:first-child");
const lightboxCategorie = document.querySelector(".lightboxContainerInfo p:last-child");
const lightboxImage = document.querySelector(".lightboxContainer img");

// Variable pour stocker les images à afficher dans la lightbox
var imagesInLightbox = [];
var currentImageIndex = 0;

// Utilisation de jQuery pour s'assurer que le script ne s'exécute qu'une fois que le document est prêt
jQuery(document).ready(function ($) {
    // Sélectionnez tous les éléments .picto-fullscreen, même ceux ajoutés dynamiquement
    $(document).on('click', '.picto-fullscreen', function (event) {
        // Empêcher le comportement par défaut du lien
        event.preventDefault();
         // Mettez à jour les images à afficher dans la lightbox
         imagesInLightbox = $(".picto-fullscreen").toArray();
          // Trouvez l'index de l'image actuellement cliquée
         currentImageIndex = imagesInLightbox.indexOf(this);
            // Récupérer les attributs de données du bouton cliqué
            const reference = $(this).data('reference');
            const categorie = $(this).data('categorie');
            const imageUrl = $(this).data('image-url');
          // Met à jour les informations dans la lightbox
          $(".lightboxContainerInfo p:first-child").text(reference);
          $(".lightboxContainerInfo p:last-child").text(categorie);
          $(".lightboxContainer img").attr('src', imageUrl);
    // Ouvre la lightbox
        $("#myLightbox").css('display', 'flex');
    });
     // Ajouter un gestionnaire d'événements pour le bouton de fermeture de la lightbox
     $(".lightboxClose").on('click', function () {
        $("#myLightbox").css('display', 'none');
    });
     // Ajouter un gestionnaire d'événements pour le bouton suivant
     $(".lightboxNext").on('click', function () {
     // Passe à l'image suivante
        currentImageIndex = (currentImageIndex + 1) % imagesInLightbox.length;
        updateLightboxContent();
    });
     // Ajouter un gestionnaire d'événements pour le bouton précédent
     $(".lightboxPrevious").on('click', function () {
     // Passe à l'image précédente
        currentImageIndex = (currentImageIndex - 1 + imagesInLightbox.length) % imagesInLightbox.length;
        updateLightboxContent();
     });
       // Fonction pour mettre à jour le contenu de la lightbox en fonction de l'index actuel
    function updateLightboxContent() {
        const currentImage = imagesInLightbox[currentImageIndex];
        const reference = $(currentImage).data('reference');    
        const categorie = $(currentImage).data('categorie');
        const imageUrl = $(currentImage).data('image-url');
      // Met à jour les informations dans la lightbox
        $(".lightboxContainerInfo p:first-child").text(reference);
        $(".lightboxContainerInfo p:last-child").text(categorie);
        $(".lightboxContainer img").attr('src', imageUrl);
       }
});
console.log()

