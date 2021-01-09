<?php

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