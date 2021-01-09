<?php
/**
 * Rotaract Family theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

$family_colors = array(
  'rac'   => '#d91b5c',   // cranberry
  'iac'   => '#019fcb',   // skyblue
  'rc'    => '#0050a2'    // azure
);

if ( ! function_exists( 'child_new_defaults' ) ) {
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
}

/**
 * Rotaract Family customizer controls
 */
add_action( 'customize_register', 'rotaract_family_controls', 11 );
function rotaract_family_controls($wp_customize) {
	$wp_customize->add_section('rotaract-family', array(
		'title'       => 'Rotaract Family',
		'priority'    => 1,
		'description' => 'Theme-Einstellungen für Rotaract'
	) );
	$wp_customize->add_setting('org_type', array(
		'default' => 'rac'
	) );
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'org_type', array(
			'label'          => 'Organisation',
			'section'        => 'rotaract-family',
			'settings'       => 'org_type',
			'type'           => 'radio',
			'choices'        => array(
        'rac'   => 'Rotaract',
        'iac'   => 'Interact',
        'rc'    => 'Rotary'
      )
		) )
	);
	$wp_customize->add_setting('logo_text_line_1', array(
		'default' => get_bloginfo( 'title' )
	) );
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'logo_text_line_1', array(
			'label'             => 'Logo Zeile 1',
			'section'           => 'rotaract-family',
			'settings'          => 'logo_text_line_1',
      'type'              => 'text'
		) )
	);
	$wp_customize->add_setting('logo_text_line_2', array(
		'default' => ''
	) );
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'logo_text_line_2', array(
			'label'             => 'Logo Zeile 2',
			'section'           => 'rotaract-family',
			'settings'          => 'logo_text_line_2',
      'type'              => 'text'
		) )
	);
	$wp_customize->add_setting('contact_page');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'contact_page', array(
			'label'          => 'Seite für das Kontaktformular',
			'description'    => 'Gib hier an, auf welcher Seite dein Kontaktformular zu finden ist. Standard: "/kontakt".',
			'section'        => 'rotaract-family',
			'settings'       => 'contact_page',
			'type'           => 'dropdown-pages'
		) )
	);
	$wp_customize->add_setting('impress_page');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'impress_page', array(
			'label'          => 'Seite für das Impressum',
			'description'    => 'Gib hier an, auf welcher Seite dein Impressum zu finden ist. Standard: "/impressum". Eine Vorlage für ein Impressum findest du im Wiki.',
			'section'        => 'rotaract-family',
			'settings'       => 'impress_page',
			'type'           => 'dropdown-pages'
		) )
	);
	$wp_customize->add_setting('own_privacy_page', array(
		'default' => false
	) );
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'own_privacy_page', array(
			'label'          => 'Eigene Datenschutz-Seite?',
			'description'    => 'Standardmäßig verlinkt mit der Datenschutz-Seite von Rotaract Deutschland. Falls du weiter unten zusätzliche Scripte benutzt, musst du ggf. eine eigene Datenschutzerklärung schreiben und in Einstellungen / Datenschutz auswählen.',
			'section'        => 'rotaract-family',
			'settings'       => 'own_privacy_page',
			'type'           => 'checkbox'
		) )
	);
	$wp_customize->add_setting('custom_page_css', array(
		'default' => ''
	) );
	$wp_customize->add_control(
		new WP_Customize_Code_Editor_Control($wp_customize, 'custom_page_css', array(
			'label'           => 'Eigenes CSS',
			'description'     => 'Trage hier eigenes CSS ein, um deine Seite optisch anzupassen.',
			'section'         => 'rotaract-family',
			'settings'        => 'custom_page_css',
			'code_type'       => 'text/css'
		) )
	);
	$wp_customize->add_setting('custom_page_js', array(
		'default' => ''
	) );
	$wp_customize->add_control(
		new WP_Customize_Code_Editor_Control($wp_customize, 'custom_page_js', array(
			'label'           => 'Eigenes Javascript',
			'description'     => 'Trage hier eigenen Javascript-Code ein. Dieser wird am Ende des &lt;body&gt; Tag eingefügt. Vergiss nicht, &lt;script&gt; Tags zu setzen. <strong>Benutzung auf eigene Gefahr! Pass bitte deine Datenschutzerklärung entsprechend an, falls du hier externe Scripte einbindest.</strong>',
			'section'         => 'rotaract-family',
			'settings'        => 'custom_page_js',
			'code_type'       => 'text/html'
		) )
	);
}

function custom_login_logo() {
    echo '<style type="text/css">
		.login h1 a {
			background-image:url(/wp-content/login-logo.png) !important;
			background-size: contain;
			width: unset;
		}
	</style>';
}
add_action('login_head', 'custom_login_logo');

function custom_page_css() {
	echo '<style type="text/css" id="custom-theme-css">' . get_theme_mod( 'custom_page_css', '' ) . '</style>';
}
add_action( 'wp_head', 'custom_page_css' );

function custom_page_js() {
	echo get_theme_mod( 'custom_page_js', '' );
}
add_action( 'wp_footer', 'custom_page_js', 999 );


/**
 * remove IP address on comments
 */
function wpb_remove_commentsip( $comment_author_ip ) {
	return '';
}
add_filter( 'pre_comment_user_ip', 'wpb_remove_commentsip' );


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
  $logo = get_stylesheet_directory_uri() . '/' . get_theme_mod( 'org_type' ) . '_logo.svg';
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





function generate_child_dynamic_css() {
  $settings = wp_parse_args(
    get_option( 'generate_settings', array() ),
    generate_get_defaults()
  );

  $css = new GeneratePress_CSS();

  $css->set_selector( '.site-header' )->add_property( 'border-top', 'solid 2px ' . $settings['link_color'] );
  $css->set_selector( '.main-title:hover' )->add_property( 'color', $settings['link_color'] );

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

add_action( 'generate_credits', 'generate_add_footer_info' );
/**
 * Add the copyright to the footer
 *
 * @since 0.1
 */
function generate_add_footer_info() {
  $copyright = sprintf(
    '<div>
    <a href="%3$s" title="Kontakt">Kontakt</a> |
    <a href="%4$s" title="Datenschutz">Datenschutz</a> |
    <a href="%5$s" title="Impressum">Impressum</a>
    </div>
    <div class="copyright">&copy; %1$s %2$s</div>',
    date( 'Y' ), // phpcs:ignore
    get_bloginfo( 'name' ),
    get_theme_mod('contact_page') ? get_permalink(get_theme_mod('contact_page')) : '/kontakt',
    get_theme_mod('own_privacy_page') ? get_privacy_policy_url() : 'https://rotaract.de/datenschutz',
    get_theme_mod('impress_page') ? get_permalink(get_theme_mod('impress_page')) : '/impressum'
  );

  echo apply_filters( 'generate_copyright', $copyright ); // phpcs:ignore
}