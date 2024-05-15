<?php

// Utilisez cette partie de code pour récupérer les 8 premières photos.
$args = array(
    'post_type' => 'photo',
    'posts_per_page' => 8,
    'paged' => 1,
);

$projects = new WP_Query($args);

if ($projects->have_posts()) : ?>
    <div id="sectionPhotoBlock" class="sectionPhotoBlock">
        <?php while ($projects->have_posts()) : $projects->the_post();
            get_template_part('templates_part/photo_block');
        endwhile; ?>
    </div>
    <div class="ajaxBtn">
        <div class="ajaxBtn__container">
            <button id="ajax_call" type="button" class="ajaxBtn__container--btn">
                <?php _e('Charger plus', 'cookinfamily'); ?>
            </button>
            <!-- <button id="ajax_call" class="js-load-comments" data-postid="<?php echo get_the_ID(); ?>" data-nonce="<?php echo wp_create_nonce('motaphoto_load_photo'); ?>" data-action="motaphoto_load_photo" data-ajaxurl="<?php echo admin_url('admin-ajax.php'); ?>">charger</button>
        </div> -->
        </div>
    <?php endif;

wp_reset_postdata(); ?>