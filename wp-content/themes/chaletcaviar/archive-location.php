<?php /** Template Name: Locations */ ?>

<?php get_header() ?>

<div class="entete">
<h1 class="text-dark text-center">Chalets en location</h1>
</div>
<hr class="mb-2" />

<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'location',
    'posts_per_page' => 6,
    'orderby' => 'rand',
    'paged' => $paged,

); ?>
<?php $query = new WP_Query($args); ?>

<?php if ($query->have_posts()) : ?>
    <div class="row">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="col sm-4 my-4">
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