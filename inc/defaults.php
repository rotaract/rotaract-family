<?php

$family_colors = array(
	'rac' => '#d91b5c',   // cranberry
	'iac' => '#019fcb',   // skyblue
	'rc'  => '#0050a2'    // azure
);
$wheel_colors  = array(
	'rac' => '#d91b5c',   // cranberry
	'iac' => '#019fcb',   // skyblue
	'rc'  => '#f7a81b'    // gold
);

add_filter( 'generate_option_defaults', 'child_new_defaults' );
/**
 * Override parent defaults
 */
function child_new_defaults( $options ) {
	$options['logo_layout']      = 'club';
	$options['org_type']         = 'rac';
	$options['logo_text_line_1'] = get_bloginfo( 'title' );
	$options['background_color'] = '#f4f4f4';
	$options['link_color']       = $GLOBALS['family_colors'][ get_theme_mod( 'org_type', 'rac' ) ];

	return $options;
}

add_filter( 'generate_font_option_defaults', 'child_new_font_defaults' );
/**
 * Override parent font defaults
 */
function child_new_font_defaults( $options ) {
	$options['font_body']        = 'Open Sans';
	$options['body_font_size']   = '15';
	$options['footer_font_size'] = '13';

	return $options;
}
