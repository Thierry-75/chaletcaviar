<?php

/**
 * Template Name: Page avec bannière
 * Template Post Type: page, post
 */
?>
<?php get_header() ?>
<div class="entete">
  <?php $genres = get_terms(['taxonomy' => 'genre', 'title_li' => '']); ?>
  <ul class="nav nav-pills">
    <?php foreach ($genres as $genre) : ?>
      <li class="nav-item ">
        <a href="<?= get_term_link($genre) ?>" class="nav-link <?php is_tax('genre', $genre->term_id) ? 'active' : '' ?>">
          <h6><?= $genre->name ?>
        </a></h6>
      </li>
    <?php endforeach; ?>
  </ul>
</div>

<main>
  <div class="container py-4">
    <div class=jumbotron>
      <div class=container>
        <div class=fond>
          <h1 class="text-white text-center">Notre agence à votre écoute</h1>
        </div>
      </div>
    </div>
</main>


<?php get_footer() ?>