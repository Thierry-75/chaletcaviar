<?php get_header() ?>
<div class="entete">
<h3 class="text-info text-center">Mis en vente le : <?php the_time('d F Y'); ?></h3>
</div>
<hr class="mb-2" />
<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <?php the_post_thumbnail('view-product', ['class' => 'card-img-top mb-5 mb-md-0', 'alt' => 'chalet', 'style' => 'height:auto']) ?>
            </div>
            <div class="col-md-6">

                <h1 class="display-5 fw-bolder"><?php the_title() ?></h1>
                <div class="fs-5 mb-5">
                    <?php $postTags = get_the_tags(); ?>
                    <?php if ($postTags) { ?>
                        <div class="single-tags">
                            <?php foreach ($postTags as $tag) { ?>
                                <span class="badge bg-warning text-white"><?php echo $tag->name ?></span>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <p class="lead"><?php the_content() ?></p>
                <div class="d-flex">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" >
                    <button class="btn btn-success flex-shrink-0 flex-right" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Nous contacter
                    </button></a>
                </div>
            </div>
        </div>
    </div>
</section>
<h2 class="text-center text-dark"><em>Annonces identiques</em></h2>
<hr class="mb-2" />
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'vente',
    'posts_per_page' => 3,
    'orderby' => 'rand',
    'paged' => $paged,

); ?>
<?php $query = new WP_Query($args); ?>

<?php if ($query->have_posts()) : ?>
   
    <div class="row">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="col sm-4 my-4">
                <?php get_template_part('parts/vente-single') ?>
            </div>
        <?php endwhile ?>
    </div>
    <?php App\chalet_caviar_pagination() ?>
<?php else : ?>
    <h1>Pas de chalets enregistrés</h1>
<?php endif ?>
<?php wp_reset_postdata(); ?>

<?php get_footer() ?>