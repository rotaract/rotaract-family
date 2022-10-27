<?php

$family_colors = array(
	'rac' => '#d41367',   // cranberry
	'iac' => '#019fcb',   // skyblue
	'rc'  => '#0050a2'    // azure
);
$wheel_colors  = array(
	'rac' => '#d41367',   // cranberry
	'iac' => '#019fcb',   // skyblue
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
	$options['background_color']        = '#f4f4f4';
	$options['link_color']              = 'var(--rotaract)';
	$options['social_media_head_color'] = 'var(--rotaract)';
	$options['global_colors']           = array_merge(
		$options['global_colors'],
		array(
			array(
				'name' => 'Cranberry',
				'slug' => 'rotaract',
				'color' => '#d41367',
			),
			array(
				'name' => 'Azure',
				'slug' => 'azure',
				'color' => '#0050a2',
			),
			array(
				'name' => 'Royal Blue',
				'slug' => 'royal-blue',
				'color' => '#0c3c7c',
			),
			array(
				'name' => 'Sky Blue',
				'slug' => 'sky-blue',
				'color' => '#019fcb',
			),
			array(
				'name' => 'Gold',
				'slug' => 'gold',
				'color' => '#f7a81b',
			),
			array(
				'name' => 'Violet',
				'slug' => 'violet',
				'color' => '#872175',
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
				'color' => '#c9dee9',
			),
			array(
				'name' => 'Slate',
				'slug' => 'slate',
				'color' => '#687d90',
			),
			array(
				'name' => 'Mist',
				'slug' => 'mist',
				'color' => '#9ea6b4',
			),
		)
	);

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
