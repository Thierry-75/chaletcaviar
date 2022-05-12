<?php

namespace App;

use AgenceMenuPage;
use WP_Query;

require_once('options/Agence.php');
require_once('entity/PostEntity.php');

function chalet_caviar_register_assets()
{

    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootswatch@4.0.0/dist/cerulean/bootstrap.min.css',['style_chaletcaviar']);
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js', ['popper'], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js', [], false, true);
    wp_enqueue_style('style_chaletcaviar', get_template_directory_uri() . '/assets/style.css');
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}

function chalet_caviar_supports()
{
    add_theme_support('automatic-feed-links');
    add_theme_support('align-wide');
    add_theme_support('title-tag');
    add_theme_support('widgets');
    add_theme_support('custom-background');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');

    add_image_size('card-header', 350, 215, true);
    add_image_size('view-product', 400, 265, true);
    add_image_size('backoffice', 64, 64 ,false);
    /** nouveau format d'image */
}

function chalet_caviar_init()
{

    // back office
    $labels = array(
        'name'                =>  'Locations',
        'singular_name'       =>  'location',
        'menu_name'           =>  'Location',
        'all_items'           =>  'Tous les locations',
        'add_new_item'        =>  'Ajouter une location',
        'add_new'             =>  'Ajouter',
        'edit_item'           =>  'editer',
        'update_item'         =>  'Mise à jour',
        'search_items'        =>  'chercher',
        'not_found'           => 'Aucune location trouvé'
    );
    $args = array(
        'label'               => 'location',
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'has_archive'         => true,
        'show_in_rest'        => true,
        'menu_position'  => 4,
        'menu_icon' => 'dashicons-building',
        'taxonomies'          => array('category', 'post_tag'),
        'rewrite' => array('slug' => 'locations'),
    );
    register_post_type('location', $args);

        // back office
        $labels = array(
            'name'                =>  'Ventes',
            'singular_name'       =>  'vente',
            'menu_name'           =>  'Vente',
            'all_items'           =>  'Tous les ventes',
            'add_new_item'        =>  'Ajouter une vente',
            'add_new'             =>  'Ajouter',
            'edit_item'           =>  'editer la vente',
            'update_item'         =>  'Mise à jour',
            'search_items'        =>  'chercher',
            'not_found'           => 'Aucune vente'
        );
        $args = array(
            'label'               =>  'vente',
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'show_in_rest'        => true,
            'menu_position'  => 5,
            'menu_icon' => 'dashicons-store',
            'taxonomies'          => array('category', 'post_tag'),
            'rewrite' => array('slug' => 'ventes', 'with_front' => false),
        );
        register_post_type('vente', $args);

        register_taxonomy('genre', array('vente','location'), [
            'labels' => [
                'name' => 'Genre',
                'singular_name'     => 'Genre',
                'plural_name'       => 'Genres',
                'search_items'      => 'Rechercher des genres',
                'all_items'         => 'Toutes les genres',
                'edit_item'         => 'Editer le genre',
                'update_item'       => 'Mettre à jour le genre',
                'add_new_item'      => 'Ajouter un nouveau genre',
                'new_item_name'     => 'Ajouter un nouveau genre',
                'menu_name'         => 'Genre',
            ],
            'show_in_rest' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_tagcloud' => true,
           
    
        ]);

}

function chalet_caviar_pagination()
{
    $pages = paginate_links(['type' => 'array']);    
  // var_dump(get_page_link());
    if ($pages === null) {
        return;
    }
    echo '<nav aria-label="Pagination" class="my-4">';
    echo '<ul class="pagination">';

    foreach ($pages as $page) {
        $active = strpos($page, 'current') !== false;
        $class = 'page-item';
        if ($active) {
            $class .= ' active';
        }
        echo '<li class="' . $class . '">';
        echo str_replace('page-numbers', 'page-link', $page);
        echo '</li>';
    }
    echo '</ul>';
    echo '</nav>';
}

/** action */
add_action('init', 'App\chalet_caviar_init');
add_action('after_setup_theme', 'App\chalet_caviar_supports');
add_action('wp_enqueue_scripts', 'App\chalet_caviar_register_assets');

add_action('admin_enqueue_scripts', function(){
    wp_enqueue_style('admin_chaletcaviar', get_template_directory_uri() . '/assets/admin.css');
});

function chalet_caviar_separator($separator)
{
    return '|';
}

function chalet_caviar_menu_class(array $classes): array
{
    $classes[] = 'nav-item';
    return $classes;
}
function chalet_caviar_menu_link_class(array $attrs): array
{
    $attrs['class'] = 'nav-link text-warning';
    return $attrs;
}

/** filter */
add_filter('document_title_separator', 'App\chalet_caviar_separator');
add_filter('nav_menu_css_class', 'App\chalet_caviar_menu_class');
add_filter('nav_menu_link_attributes', 'App\chalet_caviar_menu_link_class');

add_filter('manage_posts_columns', function($columns){
    return [
        'cb' => $columns['cb'],
        'thumbnail' => 'backoffice',
        'title' => $columns['title'],
        
        'date' => $columns['date']
    ];
});



add_filter('manage_posts_custom_column', function($column,$postId){
    if($column === 'thumbnail')
    {
        the_post_thumbnail('thumbnail', $postId);
    }

},10,2);




/** gestion du backoffice horaires */
AgenceMenuPage::register();
