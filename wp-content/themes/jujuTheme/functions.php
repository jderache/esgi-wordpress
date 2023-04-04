<?php

require get_template_directory() . '/inc/theme-functions.php';
add_action('wp_enqueue_scripts', 'esgi_enqueue_scripts', 20);
function esgi_enqueue_scripts(): void
{
    wp_enqueue_script('esgijs', get_stylesheet_directory_uri() . '/assets/js/app.js', [], '1.0', true); // true = in footer (default is false = in header)
    wp_enqueue_style('esgicss', get_stylesheet_directory_uri() . '/assets/css/app.css', '', '1.0', 'all'); // all = media (default is all)  
}
// Ajoute la prise en charge des images mises en avant
add_theme_support('post-thumbnails');
// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');

// Ajouter menu
register_nav_menus(array(
    'main' => 'Menu Principal',
    'footer' => 'Bas de page',
));
