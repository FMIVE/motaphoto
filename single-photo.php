<?php get_header(); ?>


<div class="pagePhoto blocPage">
    <section class="blocPhoto">
        <div class="blocPhotoDescription">
            <h1><?php the_title(); ?></h1>
            <p><span id="reference"><?php echo get_field('reference'); ?></span></p>
            <p>CATÉGORIE : <?php echo strip_tags(get_the_term_list($post->ID, 'categories_photos')); ?></p>
            <p>FORMAT : <?php echo strip_tags(get_the_term_list($post->ID, 'format')); ?></p>
            <p><?php echo get_field('type'); ?></p>
            <p>ANNÉE : <?php echo get_the_date('Y'); ?></p>
        </div>
        <div class="blocPhotoImage>
        <?php
        $photoId = get_field('photo');
        echo wp_get_attachment_image($photoId, 'medium_large');
        ?>
        <img class=" photoImage" src=" <?php the_post_thumbnail_url(); ?>">
        </div>
    </section>
    <div class="articleBandeau">
        <div class="articleBandeauContact">
            <p>Cette photo vous intéresse ?
            <p>
                <button class="myBtn-contact-single" type="button">Contact</button>
        </div>
        <div class="articleBandeauNav">
            <div class="articleBandeauNavThumbnailContainer">
                <img class="photo-actuelle" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>" alt="photo mignature">
                <img class="photo-suivante" src="<?php echo get_the_post_thumbnail_url(get_next_post(), 'thumbnail'); ?>" alt="photo mignature">
                <img class="photo-precedente" src="<?php echo get_the_post_thumbnail_url(get_previous_post(), 'thumbnail'); ?>" alt="photo mignature">
            </div>
            <div class="articleBandeauNavArrow">
                <?php previous_post_link('%link', '<img class="custom-previous-link" src="' . get_template_directory_uri() . '/assets/images/arrow-left.png" >'); ?>
                <?php next_post_link('%link', '<img class="custom-next-link" src="' . get_template_directory_uri() . '/assets/images/arrow-right.png">'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>