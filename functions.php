<?php
/**
 * Rotaract Family theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

/**
 * Disable attention-seeking advertising banner for the premium version of GeneratePress.
 * GeneratePress is the parent theme of this theme.
 */
define( 'GP_PREMIUM_VERSION', false );

function generate_fonts_customize_register() {
	return;
}

/**
 * Get all necessary theme files
 */
$theme_dir = get_stylesheet_directory();

require $theme_dir . '/inc/defaults.php';
require $theme_dir . '/inc/customizer.php';
require $theme_dir . '/inc/styles.php';
require $theme_dir . '/inc/header.php';
require $theme_dir . '/inc/footer.php';
require $theme_dir . '/inc/misc.php';

wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/script.js' );
