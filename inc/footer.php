<?php
/**
 * Functions concerning page footer.
 *
 * @package rotary-family
 */

/**
 * Add the copyright to the footer
 */
function generate_add_footer_info() {
	$copyright = sprintf(
		'<div class="copyright">&copy; %1$s %2$s</div>',
		wp_date( 'Y' ),
		trim( get_theme_mod( 'copyright' ) ) ?: get_bloginfo( 'title' )
	);

	$contact = get_theme_mod( 'contact_page' ) ? sprintf(
		'<a href="%1$s" title="' . __( 'Contact', 'rotaract-family' ) . '">' . __( 'Contact', 'rotaract-family' ) . '</a> | ',
		get_permalink( get_theme_mod( 'contact_page' ) )
	) : '';

	$legals = sprintf(
		'<a href="%1$s" title="' . __( 'Privacy Policy', 'rotaract-family' ) . '">' . __( 'Privacy Policy', 'rotaract-family' ) . '</a> | <a href="%2$s" title="' . __( 'Imprint', 'rotaract-family' ) . '">' . __( 'Imprint', 'rotaract-family' ) . '</a>',
		get_privacy_policy_url() ?: 'https://rotaract.de/datenschutz',
		get_theme_mod( 'impress_page' ) ? get_permalink( get_theme_mod( 'impress_page' ) ) : __( '/imprint', 'rotaract-family' )
	);

	$text = $copyright . '<div>' . $contact . $legals . '</div>';

	echo apply_filters( 'generate_copyright', $text ); // phpcs:ignore
}
add_action( 'generate_credits', 'generate_add_footer_info' );
