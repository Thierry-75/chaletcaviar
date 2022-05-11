<?php get_header() ?>
<div class="entete">
<h1 class="text-dark text-center">CHALETS</h1>
</div>
<hr class="mb-2" />
 <div class="row">
        <?php while (have_posts()) : the_post() ?>
            <div class="col sm-2 my-2">
                <?php get_template_part('parts/chalet') ?>
            </div>
        <?php endwhile ?>
    </div>
 <?php App\chalet_caviar_pagination() ?>

 <a href="<?= get_post_type_archive_link('post') ?>">Voir les dernières actualités</a>

<?php get_footer() ?>