<?php /** Template Name: actualités */ ?>

<?php get_header() ?>

<div class="entete">
<h3 class="text-info text-center">Actualités</h3>
</div>
<hr class="mb-2" />

<?php if (have_posts()) : ?>
    <div class="row">
        <?php while (have_posts()) : the_post() ?>
            <div class="col sm-2 my-2">
                <?php get_template_part('parts/chalet') ?>
            </div>
        <?php endwhile ?>
    </div>
    <?php App\chalet_caviar_pagination() ?>
<?php else : ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

<?php get_footer() ?>