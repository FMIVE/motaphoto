<div class="blocImage">
    <div class="blocPicto">
        <div class="blocImageEye">
            <a href="<?php the_permalink(); ?>"><img class="pictoEye" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_eye.svg" alt="picto oeil"></a>
        </div>
        <div class="blocImageFullscreen">
            <a class="picto-fullscreen" href="#" data-reference="<?php echo get_post_meta(get_the_ID(), 'reference', true); ?>" data-categorie="
            <?php
            $categories = get_the_terms(get_the_ID(), 'categories_photos');
            if ($categories && !is_wp_error($categories)) {
                echo esc_attr(implode(', ', wp_list_pluck($categories, 'name')));
            } ?>" data-image-url="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_fullscreen.svg" alt="picto plein ecran"></a>
        </div>
        <div class="blocImageInfo">
            <p><?php echo get_post_meta(get_the_ID(), 'reference', true); ?></p>
            <p><?php $categories = get_the_terms(get_the_ID(), 'categories_photos');
                if ($categories && !is_wp_error($categories)) {
                    echo implode(', ', wp_list_pluck($categories, 'name'));
                } ?>
            </p>
        </div>
    </div>
    <?php the_post_thumbnail('large', ['class' => 'blocImageThumbnail']); ?>

</div>