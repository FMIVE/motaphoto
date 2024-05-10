<!-- Theme Name: motaphoto -->

<?php

function motaphoto_register_assets()
{
    // Déclarer jQuery
    wp_enqueue_script('jquery');

    // Déclarer le JS
    wp_enqueue_script('motaphoto', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);

    // Déclarer le fichier style.css à la racine du thème
    wp_enqueue_style('motaphoto', get_template_directory_uri() . '/style.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'motaphoto_register_assets');


// pour faire apparaitre l'onglet menu dans Apparence
function montheme_setup()
{
    add_theme_support('menus');
}

function montheme_support()
{
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'montheme_support');
