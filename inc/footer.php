<?php

add_action( 'generate_credits', 'generate_add_footer_info' );
/**
 * Add the copyright to the footer
 *
 * @since 0.1
 */
function generate_add_footer_info() {
	$copyright = sprintf(
		'<div class="copyright">&copy; %1$s %2$s</div>',
		date( 'Y' ), // phpcs:ignore
		trim( get_theme_mod( 'copyright' ) ) ?: get_bloginfo( 'title' )
	);
	$contact = get_theme_mod( 'contact_page' ) ? sprintf(
		'<a href="%1$s" title="Kontakt">Kontakt</a> | ',
		get_permalink( get_theme_mod( 'contact_page' ) )
	) : '';
	$legals = sprintf(
		'<a href="%1$s" title="Datenschutz">Datenschutz</a> | <a href="%2$s" title="Impressum">Impressum</a>',
		get_privacy_policy_url() ?: 'https://rotaract.de/datenschutz',
		get_theme_mod( 'impress_page' ) ? get_permalink( get_theme_mod( 'impress_page' ) ) : '/impressum'
	);
	$text = $copyright . '<div>' . $contact . $legals . '</div>';

	echo apply_filters( 'generate_copyright', $text ); // phpcs:ignore
}
