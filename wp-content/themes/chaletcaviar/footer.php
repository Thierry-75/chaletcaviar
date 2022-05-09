</div>
<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <?php wp_nav_menu([
            'theme_location' => 'footer',
            'container' => false,
            'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0'
        ])  ?>
    </footer>
    <div class="alert alert-warning text-center" role="alert">
  HORAIRES DE L'AGENCE
</div>
    <div class="alert alert-dark" role="alert">
    <?= get_option('agence_horaire') ?>
</div>
 

</div>


<?php wp_footer() ?>
</body>

</html>