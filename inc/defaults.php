<?php

$family_colors = array(
  'rac'   => '#d91b5c',   // cranberry
  'iac'   => '#019fcb',   // skyblue
  'rc'    => '#0050a2'    // azure
);

add_filter( 'generate_option_defaults', 'child_new_defaults' );
/**
 * Set child theme's default options
 */
function child_new_defaults() {
  return array(
    'background_color' => '#f4f4f4',
    'link_color' => $GLOBALS[ 'family_colors' ][ get_theme_mod( 'org_type' ) ],
    // unchanged defaults from parent theme
    'hide_title' => '',
    'hide_tagline' => true,
    'logo' => '',
    'inline_logo_site_branding' => false,
    'retina_logo' => '',
    'logo_width' => '',
    'top_bar_width' => 'full',
    'top_bar_inner_width' => 'contained',
    'top_bar_alignment' => 'right',
    'container_width' => '1200',
    'container_alignment' => 'text',
    'header_layout_setting' => 'fluid-header',
    'header_inner_width' => 'contained',
    'nav_alignment_setting' => is_rtl() ? 'right' : 'left',
    'header_alignment_setting' => is_rtl() ? 'right' : 'left',
    'nav_layout_setting' => 'fluid-nav',
    'nav_inner_width' => 'contained',
    'nav_position_setting' => 'nav-float-right',
    'nav_drop_point' => '',
    'nav_dropdown_type' => 'hover',
    'nav_dropdown_direction' => is_rtl() ? 'left' : 'right',
    'nav_search' => 'disable',
    'content_layout_setting' => 'separate-containers',
    'layout_setting' => 'right-sidebar',
    'blog_layout_setting' => 'right-sidebar',
    'single_layout_setting' => 'right-sidebar',
    'post_content' => 'excerpt',
    'footer_layout_setting' => 'fluid-footer',
    'footer_inner_width' => 'contained',
    'footer_widget_setting' => '3',
    'footer_bar_alignment' => 'right',
    'back_to_top' => '',
    'text_color' => '#222222',
    'link_color_hover' => '#000000',
    'link_color_visited' => '',
    'font_awesome_essentials' => true,
    'icons' => 'svg',
    'combine_css' => true,
    'dynamic_css_cache' => true,
    'structure' => 'flexbox',
  );
}