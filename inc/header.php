<?php
$theme_dir = get_stylesheet_directory();
require $theme_dir . '/inc/logo.php';

add_action( 'generate_before_header', 'generate_social_menu', 4 );
function generate_social_menu() {
	$items = array_filter( listSocialItems(), function ( $e ) {
		return ! empty( $e );
	} );

	if ( empty( $items ) ) {
		return;
	}
	?>
	<div id="social-media-head" <?php generate_do_element_classes( 'header' ); ?>>
		<div <?php generate_do_element_classes( 'inside_header' ); ?>>
			<div class="social-media-menu">
				<?php
				foreach ( $items as $type => $link ) {
					echo sprintf(
						'<a href="%2$s" title="%1$s" target="_blank" rel="noreferrer" class="social-media-link" alt="1$s Logo"><img src="%3$s" /></a>',
						ucfirst( $type ),
						'email' === $type ? 'mailto:' . antispambot( is_email( $link ) ) : $link,
						get_stylesheet_directory_uri() . '/assets/img/socialmedia/' . $type . '.svg'
					);
				}
				?>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Override site title construction for building Rotaract/Rotary/Interact logos
 */
function generate_construct_site_title() {
	$text_colors       = array(
		'rac' => '#d41367',   // cranberry
		'iac' => '#019fcb',   // skyblue
		'rc'  => '#17458f'    // royal blue
	);
	$generate_settings = wp_parse_args(
		get_option( 'generate_settings', array() ),
		generate_get_defaults()
	);

	// Get the title and tagline.
	$title                 = get_bloginfo( 'title' );
	$tagline               = get_bloginfo( 'description' );
	$logo_text_lines_count = ! empty( get_theme_mod( 'logo_text_line_2' ) ) ? 2 : 1;

	// If the disable title checkbox is checked, or the title field is empty, return true.
	$disable_title = ( '1' == $generate_settings['hide_title'] || '' == $title ) ? true : false; // phpcs:ignore

	// If the disable tagline checkbox is checked, or the tagline field is empty, return true.
	$disable_tagline = ( '1' == $generate_settings['hide_tagline'] || '' == $tagline ) ? true : false;  // phpcs:ignore

	// Build our site title.
	$site_title = apply_filters(
		'generate_site_title_output',
		sprintf(
			'<a href="%1$s" class="main-title %6$s" rel="home">
			%2$s
			<div class="title-text lines-%5$s" style="color: %7$s !important;">
				<div class="line-primary">%3$s</div>
				<div class="line-secondary">%4$s</div>
			</div>
			</a>',
			esc_url( apply_filters( 'generate_site_title_href', home_url( '/' ) ) ),
			generate_organization_logo(),
			get_theme_mod( 'logo_text_line_1', get_bloginfo( 'title' ) ),
			get_theme_mod( 'logo_text_line_2' ),
			$logo_text_lines_count,
			get_theme_mod( 'logo_layout', 'club' ),
			$text_colors[ get_theme_mod( 'org_type', 'rac' ) ]
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

/**
 * Prevent building the header widget.
 */
function generate_construct_header_widget() {
	return;
}

/**
 * Create website icons by default if no icon is set in customizer.
 */
if ( ! get_option( 'site_icon', false ) ) {
	add_action( 'wp_head', 'generate_add_icons' );

	function generate_add_icons() {
		printf(
			'<link rel="icon" href="%1$s/assets/icons/%2$s/favicon.svg">
			<link rel="alternate icon" href="%1$s/assets/icons/%2$s/favicon.ico">
			<link rel="apple-touch-icon" href="%1$s/assets/icons/%2$s/apple-touch-icon.png">
			<link rel="manifest" href="%1$s/assets/icons/%2$s/site.webmanifest">
			<link rel="mask-icon" href="%1$s/assets/icons/safari-pinned-tab.svg" color="%3$s">
			<meta name="msapplication-config" content="%1$s/assets/icons/%2$s/browserconfig.xml">',
			get_stylesheet_directory_uri(),
			get_theme_mod( 'org_type', 'rac' ),
			$GLOBALS['wheel_colors'][ get_theme_mod( 'org_type', 'rac' ) ]
		);
	}
}

/**
 * Add theme color meta attribute for android browsers and Windows tiles.
 */
add_action( 'wp_head', 'generate_add_theme_color' );

function generate_add_theme_color() {
	printf(
		'<meta name="theme-color" content="%1$s">
		<meta name="msapplication-TileColor" content="%1$s">',
		get_theme_mod( 'header_color', 'var(--rotaract)' )
	);
}
