<?php get_header(); ?>

<?php
// Récupérer l'URL de l'image d'arrière-plan aléatoire
$background_image_url = get_random_background_image();
?>
<section class="hero" style="background-image: url('<?php echo $background_image_url; ?>');">
    <div class="heroContent">
        <h1>Photographe event</h1>
    </div>
</section>
<?php
// Fonction pour récupérer une image de fond aléatoire
function get_random_background_image()
{
    // Récupérer l'image aléatoire du type de contenu 'photos' avec la taxonomie 'format' définie en 'paysage'
    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 1,
        'orderby'        => 'rand',
        'tax_query' => array(
            array(
                'taxonomy' => 'format',
                'field' => 'slug',
                'terms' => 'paysage',
            ),
        ),
    );
    // Exécute la requête WP_Query avec les arguments
    $photo_query = new WP_Query($args);
    // Initialise la variable pour stocker l'URL de l'image
    $photo_url = '';
    // Vérifie s'il y a des photos dans la requête
    if ($photo_query->have_posts()) {
        // Boucle à travers les photos
        while ($photo_query->have_posts()) {
            $photo_query->the_post();
            // Récupère l'URL de l'image mise en avant
            $photo_url = get_the_post_thumbnail_url(get_the_ID(['class' => 'heroImage']), 'full-screen');
        }
        // Réinitialise les données post
        wp_reset_postdata();
    }
    // Retourne l'URL de l'image
    return $photo_url;
}
?>