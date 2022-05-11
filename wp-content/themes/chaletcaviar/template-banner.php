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
                <h5><?= $genre->name ?>
            </a></h5>
        </li>
    <?php endforeach; ?>
</ul>
</div>
<hr class="mb-2" />


<?php get_footer() ?>