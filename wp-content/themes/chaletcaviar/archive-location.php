<?php /** Template Name: Locations */ ?>

<?php get_header() ?>

<?php
global $post;
$x = new PostEntity($post);
?>
<pre>
<?php var_dump($x); ?>
</pre>


<h1>Nos locations de chalet</h1>
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
<?php else : ?>
    <h1>Pas de chalets enregistrés</h1>
<?php endif ?>
<?php wp_reset_postdata(); ?>

<?php get_footer() ?>