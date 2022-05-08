<div class="card" style="width: 22rem; height: 520px">
    <a href="<?php the_permalink() ?>">
        <?php the_post_thumbnail('card-header', ['class' => 'card-img-top', 'alt' => '', 'style' => 'height:auto']) ?></a>

    <div class="card-body">
        <h4 class="card-title"><?php the_title() ?></h4>
        <h6 class="card-subtitle mb-2 text-muted"><?php the_category() ?></h6>
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
        <a href="<?php the_permalink() ?>" class="btn btn-primary float-left">Voir plus</a></p>
    </div>
</div>