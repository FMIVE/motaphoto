<?php get_template_part('templates_part/contactModale'); ?>

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

<script src="wp-content/themes/motaphoto/js/script.js"></script>
</body>

</html>