<?php get_template_part('template_parts/contactModale'); ?>

<footer id="footer">
    <?php
    wp_nav_menu([
        'theme_location' => 'footer',
        'container' => false,
        'menu_class' => 'footer__nav'
    ])
    ?>
</footer>
<?php wp_footer() ?>
<!-- <script src="wp-content/themes/motaphoto/js/theme.js"></script> -->
<!-- <script src="wp-content/themes/motaphoto/js/script.js"></script> -->
</body>

</html>