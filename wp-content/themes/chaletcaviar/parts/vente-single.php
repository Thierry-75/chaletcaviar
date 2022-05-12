<!-- Related items section-->

<div class="container">
    <div class="card mb-3" style="width: 18rem; height: 480px">
        <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('card-header', ['class' => 'card-img-top', 'alt' => '',]) ?></a>

        <div class="card-body">
            <h5 class="card-title text-warning"><?php the_title() ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Annonce du: <?php the_date() ?></h6>
            <p class="card-text"><?php the_excerpt() ?></p>
        <h6><span class="text-warning"><?= the_category() ?></span></h6> 
                
      
            <hr class="mb-2" />
            <a href="<?php the_permalink() ?>" class="btn btn-success btn-sm">En savoir plus</a></p>
        </div>
    </div>
</div>