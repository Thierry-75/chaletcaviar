<?php get_header() ?>
<form class="form-inline">
  <input type="search" name="s" class="form-control mb-2 mr-sm-2" value="<?php get_search_query() ?>" placeholder="Votre recherche">
</form>

<h1 class="mb-4">Résultat de votre recherche : <span class="text-danger"><?= get_search_query() ?></span> </h1>

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
   <h1>Aucun contenu ne correspond à votre recherche</h1>
<?php endif; ?>

<?php get_footer() ?>

