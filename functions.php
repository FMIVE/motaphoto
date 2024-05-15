
<?php

function motaphoto_register_assets()
{
    // Déclarer jQuery
    wp_enqueue_script('jquery');


    wp_enqueue_script('motaphoto', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
    wp_enqueue_script('lightbox', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), '1.0', true);
    wp_enqueue_style('motaphoto', get_template_directory_uri() . '/style.css', array(), '1.0');
}

add_action('wp_enqueue_scripts', 'motaphoto_register_assets');


// functions charger plus________________________________

add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');

function load_more_photos()
{
    $paged = $_POST['page'] + 1; // La page suivante
    $query = new WP_Query(array(
        'post_type' => 'photo',
        'posts_per_page' => 8, // Nombre de photos à charger par clic
        'paged' => $paged,
    ));

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('templates_part/photo_block');
        }
    } else {
        echo '0'; // Indique qu'il n'y a plus de photos à charger
    }
    wp_reset_postdata();
    die();
}
// Fin fonction charger plus__________________________


?>