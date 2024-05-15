
<?php

function motaphoto_register_assets()
{
    // Déclarer jQuery
    wp_enqueue_script('jquery');


    wp_enqueue_script('motaphoto', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
    wp_enqueue_script('lightbox', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), '1.0', true);
    // wp_enqueue_script('pagination', get_template_directory_uri() . '/js/pagination.js', array('jquery'), '1.0', true);
    // wp_enqueue_script('filtres', get_template_directory_uri() . '/js/filtres.js', array('jquery'), '1.0', true);
    wp_enqueue_style('motaphoto', get_template_directory_uri() . '/style.css', array(), '1.0');
}

add_action('wp_enqueue_scripts', 'motaphoto_register_assets');


// pour faire apparaitre l'onglet menu dans Apparence
function motaphoto_supports()
{
    add_theme_support('title-tag');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
}
add_action('after_setup_theme', 'motaphoto_supports');

// AJAX
//CHARGER PLUS
// Ajout du script load-more-photos.js pour la pagination et pour les filtres avec wp_localize_script pour passer des paramètres AJAX
function enqueue_load_more_photos_script()
{
    // Enregistrer les scripts
    wp_enqueue_script('pagination', get_stylesheet_directory_uri() . '/js/pagination.js', array('jquery'), null, true);
    wp_enqueue_script('filtres', get_stylesheet_directory_uri() . '/js/filtres.js', array('jquery'), null, true);
    // Paramètres communs à passer aux scripts
    $ajax_params = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'ajax_nonce' => wp_create_nonce('load_more_photos_nonce')
    );
    // Localiser les scripts
    wp_localize_script('pagination', 'ajax_filtres', $ajax_params);
    wp_localize_script('filtres', 'ajax_filtres', $ajax_params);
}
add_action('wp_enqueue_scripts', 'enqueue_load_more_photos_script');

// Fonction pour charger plus de photos via AJAX
function load_more_photos()
{
    check_ajax_referer('load_more_photos_nonce', 'nonce'); // Vérifier le nonce
    $offset = isset($_POST['offset']) ? absint($_POST['offset']) : 0;
    $categorie = isset($_POST['categories_photos']) ? sanitize_text_field($_POST['categories_photos']) : '';
    $format = isset($_POST['format']) ? sanitize_text_field($_POST['format']) : '';
    $order = isset($_POST['order']) ? $_POST['order'] : 'DESC';
    error_log('Order parameter received: ' . $order);  // Log this to check what's received
    $args = [
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'offset' => $offset,
        'orderby' => 'date',
        'order' => $order,
        'tax_query' => []
    ];
    // Autres conditions de taxonomie si nécessaire
    if (!empty($categorie) || !empty($format)) {
        $args['tax_query']['relation'] = 'AND';
        if (!empty($categorie)) {
            $args['tax_query'][] = array(
                'taxonomy' => 'categories_photos',
                'field' => 'slug',
                'terms' => $categorie
            );
        }
        if (!empty($format)) {
            $args['tax_query'][] = [
                'taxonomy' => 'format',
                'field' => 'slug',
                'terms' => $format
            ];
        }
    }
    // Exécute la requête WP_Query avec les arguments
    $query = new WP_Query($args);
    $output = '';
    // Vérifie s'il y a des photos dans la requête
    if ($query->have_posts()) {
        // Boucle à travers les photos
        while ($query->have_posts()) {
            $query->the_post();
            ob_start();
            // Inclut la partie du modèle pour afficher un bloc de photo
            get_template_part('templates-part/photo_block', get_post_format());
            $output .= ob_get_clean();
        }
        // Détermine si d'autres photos sont disponibles
        $has_more_photos = $query->found_posts > $offset + $query->post_count;
        // Réinitialise les données post
        wp_reset_postdata();
        wp_send_json_success($output);
    } else {
        wp_send_json_error('No posts found');
    }
    wp_die(); // Arrête l'exécution pour retourner une réponse propre
}
add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');











?>