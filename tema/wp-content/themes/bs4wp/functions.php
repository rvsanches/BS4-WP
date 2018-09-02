<?php

// Chamar a tag Title
function bs4wp_title_tag() {
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'bs4wp_title_tag');

// Previnir o erro na tag Title em versões antigas
if (!function_exists('_wp_render_title_tag')) {
    function bs4wp_render_title() {
        ?>
        <title><?php wp_title('|', true, 'right'); ?></title>
        <?php
    }
    add_action('wp_head', 'bs4wp_render_title');
}

// Registra o Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// Registrar os menus
register_nav_menus( array(
    'principal' => __('Menu principal', 'bs4wp')
));

// Definir as miniaturas dos posts
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1280, 720, true );

// Definir o tamanho o resumo
add_filter( 'excerpt_length', function($length) {
    return 50;
} );

// Definir o estilo da paginação
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn btn-outline-my-color-5"';
}

// Criar a barra lateral
register_sidebar(
    array(
        'name' => 'Barra lateral',
        'id' => 'sidebar',
        'before_widget' => '<div class="card mb-4">',
        'after_widget' => '</div></div>',
        'before_title' => '<h5 class="card-header">',
        'after_title' => '</h5><div class="card-body">',
));

?>