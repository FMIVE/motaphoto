<?php get_header(); ?>


<?php
// Récupérer l'URL de l'image d'arrière-plan aléatoire
$background_image_url = get_random_background_image();
?>
<section class="hero" style="background-image: url('<?php echo $background_image_url; ?>');">
    <div class="heroContent">
        <h1>Photographe event</h1>
    </div>
</section>
<?php
// Fonction pour récupérer une image de fond aléatoire
function get_random_background_image()
{
    // Récupérer l'image aléatoire du type de contenu 'photos' avec la taxonomie 'format' en 'paysage'
    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 1,
        'orderby'        => 'rand',
        'tax_query' => array(
            array(
                'taxonomy' => 'format',
                'field' => 'slug',
                'terms' => 'paysage',
            ),
        ),
    );
    // Exécute la requête WP_Query avec les arguments
    $photo_query = new WP_Query($args);
    // Initialise la variable pour stocker l'URL de l'image
    $photo_url = '';
    // Vérifie s'il y a des photos dans la requête
    if ($photo_query->have_posts()) {
        // Boucle à travers les photos
        while ($photo_query->have_posts()) {
            $photo_query->the_post();
            // Récupère l'URL de l'image mise en avant
            $photo_url = get_the_post_thumbnail_url(get_the_ID(), 'full-screen');
        }
        // Réinitialise les données post
        wp_reset_postdata();
    }
    // Retourne l'URL de l'image
    return $photo_url;
}
?>
<!-- filtres -->
<div class="home__content">
    <div class="home__content__selection">
        <div class="home__content__selection__filters">
            <div class="home__filter">
                <span id="selectCategoryValue" class="home__filter__selected-option" value="">
                    Catégorie
                </span>
                <div class="no-select home__filter__content">
                    <ul id="selectByCategory" class="home__filter__content__list" role="listbox" aria-labelledby="filter-dropdown">
                        <?php
                        $filterCategories = get_terms(array(
                            'taxonomy' => 'categories_photos',
                            'hide_empty' => false,
                        ));
                        $itemCountCategories = count($filterCategories);

                        if (!empty($filterCategories)) {
                            $positionCategory = 1;
                            foreach ($filterCategories as $filterCategory) {
                                echo '<li class="home__filter__content__list__option" role="option" value="' . esc_html($filterCategory->name) . '" aria-posinset="' . $positionCategory . '" aria-setsize="' . $itemCountCategories . '"><strong>' . esc_html($filterCategory->name) . '</strong></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="home__filter">
                <span id="selectFormatValue" class="home__filter__selected-option" value="">
                    Format
                </span>
                <div class="no-select home__filter__content">
                    <ul id="selectByFormat" class="home__filter__content__list" role="listbox" aria-labelledby="filter-dropdown">
                        <?php
                        $filterFormats = get_terms(array(
                            'taxonomy' => 'format',
                            'hide_empty' => false,
                        ));
                        $itemCountFormats = count($filterFormats);

                        if (!empty($filterFormats)) {
                            $positionFormat = 1;
                            foreach ($filterFormats as $filterFormat) {
                                echo '<li class="home__filter__content__list__option" role="option" value="' . esc_html($filterFormat->name) . '" aria-posinset="' . $positionFormat . '" aria-setsize="' . $itemCountFormats . '"><strong>' . esc_html($filterFormat->name) . '</strong></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="home__content__selection__date">
            <div class="home__filter">
                <span id="selectDateOrderValue" class="home__filter__selected-option" value="ASC">Trier par</span>
                <div class="no-select home__filter__content">
                    <ul id="selectByDate" class="home__filter__content__list" role="listbox" aria-labelledby="filter-dropdown">
                        <li class="home__filter__content__list__option" role="option" value="DESC" aria-posinset="1" aria-setsize="2">
                            <strong>Des plus récentes aux plus anciennes</strong>
                        </li>
                        <li class="home__filter__content__list__option" role="option" value="ASC" aria-posinset="2" aria-setsize="2">
                            <strong>Des plus anciennes aux plus récentes</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- template catalogue photos et photo block-->
    <section class="photoApparentees">
        <div class="photoApparenteesBloc">
            <?php get_template_part('templates_part/catalogue_photos'); ?>
        </div>
    </section>

    <!-- template lightbox -->
    <?php get_template_part('templates_part/lightbox'); ?>


    <?php get_footer(); ?>