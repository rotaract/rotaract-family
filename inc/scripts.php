<?php

/**
 * Register Javascript
 */
function enqueue_child_scripts() {
    if ( get_theme_mod( 'snowflakes', true ) ) {
        wp_enqueue_script( 'snowflakes', get_stylesheet_directory_uri() . '/assets/js/snowflakes.min.js', array(), '6.0.0', true );
    }
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/script.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'enqueue_child_scripts', 60 );
