<?php get_header(); ?>

<div id="photo-container" class="sectionPhotoBlock">
    <?php
    $query = new WP_Query(array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'paged' => 1,

    ));

    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
            get_template_part('templates_part/photo_block');
        endwhile;
    endif;
    wp_reset_postdata();
    ?>
</div>

<button id="load-more">Charger plus</button>
<h2 id="fin-message" style="display: none;">Toutes les photos sont affichées</h2>
<script type="text/javascript">
    var load_more_params = {
        ajaxurl: "<?php echo admin_url('admin-ajax.php'); ?>",
        current_page: 1
    };
</script>

<?php get_footer(); ?>