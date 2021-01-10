<?php

$family_colors = array(
  'rac'   => '#d91b5c',   // cranberry
  'iac'   => '#019fcb',   // skyblue
  'rc'    => '#0050a2'    // azure
);

add_filter( 'generate_option_defaults', 'child_new_defaults' );
/**
 * Override parent defaults
 */
function child_new_defaults( $options ) {
  $options['background_color'] = '#f4f4f4';
  $options['link_color'] = $GLOBALS[ 'family_colors' ][ get_theme_mod( 'org_type' ) ];

  return $options;
}

add_filter( 'generate_font_option_defaults', 'child_new_font_defaults' );
/**
 * Override parent font defaults
 */
function child_new_font_defaults( $options ) {
  $options['font_body'] = 'Open Sans';
  $options['body_font_size'] = '15';
  $options['footer_font_size'] = '13';

  return $options;
}