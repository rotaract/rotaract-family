<?php

/**
 * Register Javascript
 */
function enqueue_child_scripts() {
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/script.js', array(), '1.1.0', true );

    wp_add_inline_script(
        'script',
        'linkConfirmationEnabled = ' . var_export(get_theme_mod( 'link_confirmation', true ), true) . ';',
        'before'
    )
}

function enqueue_snow_effect() {
    if ( ! get_theme_mod( 'enable_snow_effect', false ) ) {
        return;
    }

	wp_enqueue_script(
		'snowflakes',
		get_stylesheet_directory_uri() . '/assets/js/snowflakes.min.js',
		array(),
		'6.0.0',
		true
	);

	wp_add_inline_script(
		'snowflakes-lib',
		<<<'JS'
		if ( !window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
		  new Snowflakes();
		}
		JS
	);
}

add_action( 'wp_enqueue_scripts', 'enqueue_snow_effect' );
add_action( 'wp_enqueue_scripts', 'enqueue_child_scripts', 60 );
