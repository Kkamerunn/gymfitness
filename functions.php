<?php

// Includes
require get_template_directory() . '/includes/widgets.php';

function gymfitness_setup() {
    // Featured image
    add_theme_support( 'post-thumbnails' );

    // Title
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'gymfitness_setup' );

function gymfitness_menus() {
    register_nav_menus(array(
        'main-menu' => __('Main menu', 'gymfitness')
    ));
}

add_action( 'init', 'gymfitness_menus' );

function gymfitness_scripts_styles() {

    // Use normalize (as it is a reset it must be loaded before styles sheets )
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

    wp_enqueue_style('slicknavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.0');
    
    // Fonts
    wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@400;700;900&family=Staatliches&display=swap', array(), '1.0.0');

    // It looks for the main stylesheet
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'googleFont'), '1.0.0');

    // Scripts
   /*  wp_enqueue_script('slicknavJS', get_template_directoy_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('scripts', get_template_directoy_uri() . '/js/scripts.js', array('jquery', 'slicknavJS'), '1.0.0', true); */
}

add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles');

// Define widgets zone
function gymfitness_widgets() {
    register_sidebar(array(
        'name' => 'Sidebar 1',
        'id' => 'sidebar_1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-primary">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => 'Sidebar 2',
        'id' => 'sidebar_2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-primary">',
        'after_title' => '</h3>'
    ));
}

add_action('widgets_init', 'gymfitness_widgets');