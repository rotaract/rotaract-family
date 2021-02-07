<?php

function generate_child_dynamic_css() {
  $settings = wp_parse_args(
    get_option( 'generate_settings', array() ),
    generate_get_defaults()
  );

  $css = new GeneratePress_CSS();

  $css->set_selector( '#social-media-head.site-header' )->add_property( 'background-color', $settings['link_color'] );
  $css->set_selector( '#masthead.site-header' )->add_property( 'border-top', 'solid 2px ' . $settings['link_color'] );
  $css->set_selector( '.main-title:hover' )->add_property( 'color', $settings['link_color'] );
  $css->set_selector( '.main-navigation .main-nav ul ul li:hover>a, .main-navigation .main-nav ul ul li:focus>a, .main-navigation .main-nav ul ul li.sfHover>a' )->add_property( 'color', $settings['link_color'] );
  $css->set_selector( 'button, html input[type=button], input[type=reset], input[type=submit], a.button, a.wp-block-button__link:not(.has-background)' )->add_property( 'background-color', $settings['link_color'] );
  $css->set_selector( '.main-navigation .main-nav ul li:hover>a, .main-navigation .main-nav ul li:focus>a, .main-navigation .main-nav ul li.sfHover>a, .main-navigation .menu-bar-item:hover>a, .main-navigation .menu-bar-item.sfHover>a' )->add_property( 'color', $settings['link_color'] );

  if ( ! generate_is_using_flexbox() && 'text' === generate_get_option( 'container_alignment' ) ) {
    $css->set_selector( '.container.grid-container' );
    $css->add_property( 'max-width', generate_get_option( 'container_width' ), false, 'px' );
  }

  return apply_filters( 'generate_base_css_output', $css->css_output() );
}

add_action( 'wp_enqueue_scripts', 'generate_enqueue_child_dynamic_css', 51 );
/**
 * Enqueue our dynamic CSS.
 */
function generate_enqueue_child_dynamic_css() {
  $css = generate_child_dynamic_css();

  wp_register_style( 'child-generated-style', false );
  wp_enqueue_style( 'child-generated-style' );
	wp_add_inline_style( 'child-generated-style', wp_strip_all_tags( $css ) );
}