<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- //récupère la feuille de style avec stylsheet, bonne pratique// -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- //récupère le titre du site du dashboard WP avec bloginfo, bonne pratique// -->
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <header id="header">
        <nav class="navbar">
            <img class="navbar__logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/LogoNathalieMota.png" alt="logo">

            <?php
            wp_nav_menu([
                'theme_location' => 'header',
                'menu_class' => 'navbar__nav',
                'container' => false,
            ])
            ?>
        </nav>
        <div class="burger">
            <button id="btn__burger" class="burger__btn" aria-label="Menu portable">
                <span class="line line_1"></span>
                <span class="line line_2"></span>
                <span class="line line_3"></span>
            </button>
            <?php wp_nav_menu([
                'theme_location' => 'header',
                'container' => false,
                'menu_class' => 'burger__menu'
            ]);
            ?>
        </div>
    </header>