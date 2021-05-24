<?php

/**
 * set logo for backend login
 */
function custom_login_logo() {
	echo sprintf(
		'<style type="text/css">
		.login h1 a {
			background-image: url(%1$s) !important;
			background-size: contain;
			width: unset;
		}
		</style>',
		get_stylesheet_directory_uri() . '/assets/img/hosting_logo.svg'
	);
}

add_action( 'login_head', 'custom_login_logo' );

/**
 * remove IP address on comments
 */
function wpb_remove_commentsip( $comment_author_ip ) {
	return '';
}

add_filter( 'pre_comment_user_ip', 'wpb_remove_commentsip' );
