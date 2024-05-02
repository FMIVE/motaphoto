<?php

function motaphoto_register_assets()
{

    // Déclarer jQuery
    wp_enqueue_script('jquery');

    // Déclarer le JS
    wp_enqueue_script('motaphoto', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);


    // wp_enqueue_script('lightbox', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), '1.0', true);

    // Déclarer le fichier style.css à la racine du thème
    wp_enqueue_style('motaphoto', get_template_directory_uri() . '/style.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'motaphoto_register_assets');


function motaphoto_supports()
{
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
}
add_action('after_setup_theme', 'motaphoto_supports');
