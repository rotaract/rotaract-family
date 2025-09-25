<?php

$family_colors = array(
	'rac' => '#d41367',   // cranberry
	'iac' => '#00a2e0',   // skyblue
	'rc'  => '#0067c8'    // azure
);
$wheel_colors  = array(
	'rac' => '#d41367',   // cranberry
	'iac' => '#00a2e0',   // skyblue
	'rc'  => '#f7a81b'    // gold
);

add_filter( 'generate_option_defaults', 'child_new_defaults' );
/**
 * Override parent defaults
 */
function child_new_defaults( $options ) {
	$options['logo_layout']             = 'club';
	$options['org_type']                = 'rac';
	$options['logo_text_line_1']        = get_bloginfo( 'title' );
	$options['background_color']        = 'var(--base-2)';
	$options['link_color']              = 'var(--rotaract)';
	$options['social_media_head_color'] = 'var(--rotaract)';
	$options['global_colors']           = array(
		array(
			'name' => __( 'Contrast', 'generatepress' ),
			'slug' => 'contrast',
			'color' => '#212529',
		),
		array(
			'name' => sprintf( __( 'Contrast %s', 'generatepress' ), '2' ),
			'slug' => 'contrast-2',
			'color' => '#54565a',
		),
		array(
			'name' => sprintf( __( 'Contrast %s', 'generatepress' ), '3' ),
			'slug' => 'contrast-3',
			'color' => '#9ba4b4',
		),
		array(
			'name' => __( 'Base', 'generatepress' ),
			'slug' => 'base',
			'color' => '#f4f4f4',
		),
		array(
			'name' => sprintf( __( 'Base %s', 'generatepress' ), '2' ),
			'slug' => 'base-2',
			'color' => '#fafafa',
		),
		array(
			'name' => sprintf( __( 'Base %s', 'generatepress' ), '3' ),
			'slug' => 'base-3',
			'color' => '#ffffff',
		),
		array(
			'name' => sprintf( __( 'Accent', 'generatepress' ), '3' ),
			'slug' => 'accent',
			'color' => '#d41367',
		),
		array(
			'name' => 'Cranberry',
			'slug' => 'rotaract',
			'color' => '#d41367',
		),
		array(
			'name' => 'Azure',
			'slug' => 'azure',
			'color' => '#0067c8',
		),
		array(
			'name' => 'Royal Blue',
			'slug' => 'royal-blue',
			'color' => '#17458f',
		),
		array(
			'name' => 'Sky Blue',
			'slug' => 'sky-blue',
			'color' => '#00a2e0',
		),
		array(
			'name' => 'Gold',
			'slug' => 'gold',
			'color' => '#f7a81b',
		),
		array(
			'name' => 'Cardinal',
			'slug' => 'cardinal',
			'color' => '#e02927',
		),
		array(
			'name' => 'Turquoise',
			'slug' => 'turquoise',
			'color' => '#00adbb',
		),
		array(
			'name' => 'Violet',
			'slug' => 'violet',
			'color' => '#901f93',
		),
		array(
			'name' => 'Grass',
			'slug' => 'grass',
			'color' => '#009739',
		),
		array(
			'name' => 'Orange',
			'slug' => 'orange',
			'color' => '#ff7600',
		),
		array(
			'name' => 'Lavender',
			'slug' => 'lavender',
			'color' => '#c6bcd0',
		),
		array(
			'name' => 'Powder Blue',
			'slug' => 'powder-blue',
			'color' => '#b9d9eb',
		),
		array(
			'name' => 'Slate',
			'slug' => 'slate',
			'color' => '#657f99',
		),
		array(
			'name' => 'Charcoal',
			'slug' => 'charcoal',
			'color' => '#54565a',
		),
		array(
			'name' => 'Mist',
			'slug' => 'mist',
			'color' => '#9ba4b4',
		),
	);

	return $options;
}

add_filter( 'generate_color_option_defaults', 'child_new_color_defaults' );
/**
 * Override parent color defaults
 */
function child_new_color_defaults( $options ) {
	$options['footer_background_color'] = 'var(--slate)';

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
