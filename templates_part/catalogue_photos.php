<?php
// Utilisez cette partie de code pour récupérer les 12 premières photos sans filtrage
$args = array(
    'post_type' => 'photo',
    'posts_per_page' => 8,
    'paged' => 1,
);

$projects = new WP_Query($args);

if ($projects->have_posts()) : ?>
    <div class="sectionPhotoBlock">
        <?php while ($projects->have_posts()) : $projects->the_post();
            get_template_part('templates_part/photo_block');
        endwhile; ?>
    </div>

<?php endif;

wp_reset_postdata(); ?>