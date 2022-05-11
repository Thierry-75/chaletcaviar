<div class="card mb-3" style="width: 21rem; height: 480px">
    <a href="<?php the_permalink() ?>">
        <?php the_post_thumbnail('card-header', ['class' => 'card-img-top', 'alt' => '', 'style' => 'height:auto']) ?></a>

    <div class="card-body">
        <h5 class="card-title"><?php the_title() ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Edité le: <?php the_date() ?></h6>
        <p class="card-text"><?php the_excerpt() ?></p>
        <?php $postTags = get_the_tags(); ?>
        <?php if ($postTags) { ?>
            <div class="single-tags">
                <?php foreach ($postTags as $tag) { ?>
                   <span class="badge bg-warning text-white"><?php echo $tag->name ?></span>
                <?php } ?>
            </div>
        <?php } ?>
        <hr class="mb-2" />
        <a href="<?php the_permalink() ?>" class="btn btn-success btn-sm">En savoir plus</a></p>
    </div>
</div>