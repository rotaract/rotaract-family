<?php

/**
 * Override site title construction for building Rotaract/Rotary/Interact logos
 */
function generate_construct_site_title() {
  $generate_settings = wp_parse_args(
    get_option( 'generate_settings', array() ),
    generate_get_defaults()
  );

  // Get the title and tagline.
  $title = get_bloginfo( 'title' );
  $tagline = get_bloginfo( 'description' );
  $logo = get_stylesheet_directory_uri() . '/assets/img/' . get_theme_mod( 'org_type' ) . '_logo.svg';
  $logo_text_lines_count = !empty( get_theme_mod( 'logo_text_line_2' ) ) ? 2 : 1;
  $logo_text = get_theme_mod( 'logo_text_line_1' );
  if ( $logo_text_lines_count > 1 ) {
    $logo_text .= '<br>' . get_theme_mod( 'logo_text_line_2' );
  }

  // If the disable title checkbox is checked, or the title field is empty, return true.
  $disable_title = ( '1' == $generate_settings['hide_title'] || '' == $title ) ? true : false; // phpcs:ignore

  // If the disable tagline checkbox is checked, or the tagline field is empty, return true.
  $disable_tagline = ( '1' == $generate_settings['hide_tagline'] || '' == $tagline ) ? true : false;  // phpcs:ignore

  $schema_type = generate_get_schema_type();

  // Build our site title.
  $site_title = apply_filters(
    'generate_site_title_output',
    sprintf(
      '<a href="%1$s" class="main-title" rel="home">
        <img src="%2$s" title="%3$s">
        <div class="title-text lines-%4$s"%5$s>
            %3$s
        </div>
      </a>',
      esc_url( apply_filters( 'generate_site_title_href', home_url( '/' ) ) ),
      $logo,
      $logo_text,
      $logo_text_lines_count,
      'microdata' === generate_get_schema_type() ? ' itemprop="headline"' : ''
    )
  );

  // Build our tagline.
  $site_tagline = apply_filters(
    'generate_site_description_output',
    sprintf(
      '<p class="site-description"%2$s>
        %1$s
      </p>',
      html_entity_decode( get_bloginfo( 'description', 'display' ) ), // phpcs:ignore
      'microdata' === generate_get_schema_type() ? ' itemprop="description"' : ''
    )
  );

  // Site title and tagline.
  if ( false === $disable_title || false === $disable_tagline ) {
    if ( generate_needs_site_branding_container() ) {
      echo '<div class="site-branding-container">';
      generate_construct_logo();
    }

    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- outputting site title and tagline. False positive.
    echo apply_filters(
      'generate_site_branding_output',
      sprintf(
        '<div class="site-branding">
          %1$s
          %2$s
        </div>',
        ( ! $disable_title ) ? $site_title : '',
        ( ! $disable_tagline ) ? $site_tagline : ''
      )
    );

    if ( generate_needs_site_branding_container() ) {
      echo '</div>';
    }
  }
}
