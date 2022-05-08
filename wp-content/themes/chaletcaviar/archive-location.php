<?php /** Template Name: Locations */ ?>

<?php get_header() ?>

<h1>Location de chalets</h1>
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$custom_args = array(
    'post_type' => 'location',
    'posts_per_page' => 3,
    'orderby' => 'rand',
    'paged' => $paged
); ?>
<?php $custom_query = new WP_Query($custom_args); ?>
<?php if ($custom_query->have_posts()) : ?>
    <div class="row">
        <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
            <div class="col sm-2 my-2">
                <?php get_template_part('parts/chalet') ?>
            </div>
        <?php endwhile ?>
    </div>
    <?php App\chalet_caviar_pagination() ?>
<?php else : ?>
    <h1>Pas de chalets enregistrés</h1>
<?php endif ?>
<?php wp_reset_postdata(); ?>

<?php get_footer() ?>