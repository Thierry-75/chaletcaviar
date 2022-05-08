<?php get_header() ?>
<form class="form-inline">
  <input type="search" name="s" class="form-control mb-2 mr-sm-2" value="<?php get_search_query() ?>" placeholder="Votre recherche">
</form>

<h1 class="mb-4">Résultat de votre recherche : <span class="text-danger"><?= get_search_query() ?></span> </h1>

<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$custom_args = array(
  'post_type' => 'chalet',
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