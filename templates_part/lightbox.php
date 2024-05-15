<div id="myLightbox" class="lightbox">
    <div>
        <button class="lightboxClose"></button>
        <button class="lightboxPrevious">précédente</button>
        <button class="lightboxNext">suivante</button>
    </div>
    <div class="lightboxContainer">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>">
        <div class="lightboxContainerInfo">
            <p>CATÉGORIE</p>
            <p>RÉFÉRENCE PHOTO</p>
        </div>
    </div>
</div>