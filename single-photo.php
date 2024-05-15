<?php get_header(); ?>


<div class="pagePhoto blocPage">
    <div class="blocContenu">
        <div class="bloc1">
            <h1><?php the_title(); ?></h1>
            <p><span id="reference"><?php echo get_field('reference'); ?></span></p>
            <p>CATÉGORIE : <?php echo strip_tags(get_the_term_list($post->ID, 'categories_photos')); ?></p>
            <p>FORMAT : <?php echo strip_tags(get_the_term_list($post->ID, 'format')); ?></p>
            <p><?php echo get_field('type'); ?></p>
            <p>ANNÉE : <?php echo get_the_date('Y'); ?></p>
        </div>
        <div class="bloc2">
            <img class=" photoImage" src=" <?php the_post_thumbnail_url('full_screen'); ?>">
        </div>
    </div>

    <div class="bandeauMiniSlider">
        <div class="bandeauContact">
            <p>Cette photo vous intéresse ?
            </p>
            <button class="myBtn-contact-single" type="button">Contact</button>
        </div>
        <div class="bandeauSlider">
            <div class="bandeauContainer">
                <img class="photo-actuelle" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>" alt="photo mignature">
            </div>
            <div class="bandeauArrow">
                <?php previous_post_link('%link', '<img class="custom-previous-link" src="' . get_template_directory_uri() . '/assets/images/arrow-left.png" >'); ?>
                <?php next_post_link('%link', '<img class="custom-next-link" src="' . get_template_directory_uri() . '/assets/images/arrow-right.png">'); ?>
            </div>
        </div>
    </div>
</div>

<section class="photoApparentees">
    <p class="photoApparenteesTitre">Vous aimerez aussi</p>
    <div class="photoApparenteesBloc">
        <div class="sectionPhotoBlock">
            <?php
            // 0. Recupère dynamiquement la catégorie de l'article en cours
            $categories = array_map(function ($term) {
                return $term->term_id;
            }, get_the_terms(get_post(), 'categories_photos'));

            // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
            $args = array(
                'post__not_in' => [get_the_ID()],
                'post_type' => 'photo',
                'posts_per_page' => 2,
                'paged' => 1,
                'orderby' => 'rand',
                'tax_query' => [
                    [
                        'taxonomy' => 'categories_photos',
                        'terms' => $categories,
                    ]
                ]
            );

            // 2. On exécute la WP Query
            $my_query = new WP_Query($args);

            // 3. On lance la boucle !
            if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>

                    <?php get_template_part('templates_part/photo_block'); ?>

            <?php endwhile;
            endif;

            // 4. On réinitialise à la requête principale (important)
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php get_template_part('templates_part/lightbox'); ?>

<?php get_footer(); ?>