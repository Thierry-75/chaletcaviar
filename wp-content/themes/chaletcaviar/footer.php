<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
<div class="alert alert-warning text-center" role="alert">
    HORAIRES DE L'AGENCE
</div>
<div class="alert alert-dark" role="alert">
    <?= get_option('agence_horaire') ?>
</div>
    <?php wp_nav_menu([
        'theme_location' => 'footer',
        'container' => false,
        'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0'
    ])  ?>
</footer>

<p class="float-end float-right"><a href="#">Haut</a></p>
<p>&copy; 2017–2022 Company, Inc. &middot; <a href="https://thomaspark.co" title="Thomas Park">based on bootwatch cerulean</a> &middot; <a href="https://thomaspark.co">Code released under the MIT License.</a></p>
</div>
<?php wp_footer() ?>
</body>

</html>

Made by Thomas Park.

Code released under the MIT License.