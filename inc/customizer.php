<?php

/**
 * Rotaract Family customizer controls.
 */
function rotaract_family_controls( $wp_customize ) {
	/* SECTION Rotaract Family */
	$wp_customize->add_section(
		'logo',
		array(
			'title'       => __( 'Logo', 'rotaract-family' ),
			'priority'    => 21,
			'description' => __( 'Customize the logo.', 'rotaract-family' ),
		)
	);
	$wp_customize->add_setting(
		'org_type',
		array(
			'type'    => 'theme_mod',
			'default' => 'rac',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'org_type',
			array(
				'label'       => __( 'Organization', 'rotaract-family' ),
				'description' => __( 'This also sets the site\'s primary color. To take this into effect the site has to be <a href="javascript:location.reload();">reloaded</a> after publishment.', 'rotaract-family' ),
				'section'     => 'logo',
				'settings'    => 'org_type',
				'type'        => 'radio',
				'choices'     => array(
					'rac' => 'Rotaract',
					'iac' => 'Interact',
					'rc'  => 'Rotary',
				),
			)
		)
	);
	$wp_customize->add_setting(
		'logo_layout',
		array(
			'type'    => 'theme_mod',
			'default' => 'club',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'logo_layout',
			array(
				'label'       => __( 'Logo Layout', 'rotaract-family' ),
				'description' => __( 'Set the logo layout.', 'rotaract-family' ),
				'section'     => 'logo',
				'settings'    => 'logo_layout',
				'type'        => 'radio',
				'choices'     => array(
					'club'    => 'Club',
					'partner' => 'Partner',
				),
			)
		)
	);
	$wp_customize->add_setting(
		'logo_text_line_1',
		array(
			'type'    => 'theme_mod',
			'default' => get_bloginfo( 'title' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'logo_text_line_1',
			array(
				'label'       => __( 'Primary Text', 'rotaract-family' ),
				'section'     => 'logo',
				'settings'    => 'logo_text_line_1',
				'type'        => 'text',
				'input_attrs' => array(
					'min' => 3,
					'max' => 50,
				),
			)
		)
	);
	$wp_customize->add_setting(
		'logo_text_line_2',
		array(
			'type'    => 'theme_mod',
			'default' => '',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'logo_text_line_2',
			array(
				'label'       => __( 'Secondary Text', 'rotaract-family' ),
				'section'     => 'logo',
				'settings'    => 'logo_text_line_2',
				'type'        => 'text',
				'input_attrs' => array(
					'min' => 0,
					'max' => 50,
				),
			)
		)
	);

	/* SECTION Footer Options */
	$wp_customize->add_section(
		'footer-options',
		array(
			'title'       => __( 'Footer', 'rotaract-family' ),
			'priority'    => 30,
			'description' => '<p>' . __( 'Change the footer\'s content.', 'rotaract-family' ) . '</p>
		                  <p><span class="customize-control-title">' . __( 'Privacy Policy', 'rotaract-family' ) . '</span>' . __( 'Initially the privacy policy of Rotaract Germany is linked. Albeit, it is highly recommended creating your own privacy policy site. Visit <a href="/wp-admin/options-privacy.php" class="external-link" target="_blank">this site</a> to do so.', 'rotaract-family' ) . '</p>',
		)
	);
	$wp_customize->add_setting(
		'copyright',
		array(
			'type'    => 'theme_mod',
			'default' => get_bloginfo( 'name' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'copyright',
			array(
				'label'    => 'Copyright',
				'section'  => 'footer-options',
				'settings' => 'copyright',
				'type'     => 'text',
			)
		)
	);
	$wp_customize->add_setting(
		'contact_page',
		array(
			'type' => 'theme_mod',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'contact_page',
			array(
				'label'          => __( 'Contact Page', 'rotaract-family' ),
				'description'    => __( 'Which page contains the contact form.', 'rotaract-family' ),
				'section'        => 'footer-options',
				'settings'       => 'contact_page',
				'type'           => 'dropdown-pages',
				'allow_addition' => true,
			)
		)
	);
	$wp_customize->add_setting(
		'impress_page',
		array(
			'type' => 'theme_mod',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'impress_page',
			array(
				'label'          => __( 'Imprint Page', 'rotaract-family' ),
				'description'    => sprintf( __( 'Which page contains the imprint. Default: "%s"', 'rotaract-family' ) . __( '/imprint', 'rotaract-family' ) ),
				'section'        => 'footer-options',
				'settings'       => 'impress_page',
				'type'           => 'dropdown-pages',
				'allow_addition' => true,
			)
		)
	);

	/* SECTION Social Media */
	$wp_customize->add_section(
		'social-media',
		array(
			'title'       => 'Social Media',
			'priority'    => 25,
			'description' => __( 'Link your Social Media accounts.', 'rotaract-family' ),
		)
	);
	$wp_customize->add_setting(
		'facebook',
		array(
			'type' => 'theme_mod',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'facebook',
			array(
				'label'       => 'Facebook',
				'section'     => 'social-media',
				'settings'    => 'facebook',
				'type'        => 'url',
				'input_attrs' => array(
					'placeholder' => 'https://www.facebook.com/MyRotaractClub',
					'pattern'     => 'https:\/\/(www\.)?facebook\.com\/.*',
				),
			)
		)
	);
	$wp_customize->add_setting(
		'instagram',
		array(
			'type' => 'theme_mod',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'instagram',
			array(
				'label'       => 'Instagram',
				'section'     => 'social-media',
				'settings'    => 'instagram',
				'type'        => 'url',
				'input_attrs' => array(
					'placeholder' => 'https://www.instagram.com/my-rotaract-club',
					'pattern'     => 'https:\/\/(www\.)?instagram\.com\/.*',
				),
			)
		)
	);
	$wp_customize->add_setting(
		'twitter',
		array(
			'type' => 'theme_mod',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'twitter',
			array(
				'label'       => 'Twitter',
				'section'     => 'social-media',
				'settings'    => 'twitter',
				'type'        => 'url',
				'input_attrs' => array(
					'placeholder' => 'https://twitter.com/my-rotaract-club',
					'pattern'     => 'https:\/\/(www\.)?twitter\.com\/.*',
				),
			)
		)
	);
	$wp_customize->add_setting(
		'youtube',
		array(
			'type' => 'theme_mod',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'youtube',
			array(
				'label'       => 'YouTube',
				'section'     => 'social-media',
				'settings'    => 'youtube',
				'type'        => 'url',
				'input_attrs' => array(
					'placeholder' => 'https://www.youtube.com/c/my-rotaract-club',
					'pattern'     => 'https:\/\/(www\.)?youtube\.com\/.*',
				),
			)
		)
	);
	$wp_customize->add_setting(
		'linkedin',
		array(
			'type' => 'theme_mod',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'linkedin',
			array(
				'label'       => 'LinkedIn',
				'section'     => 'social-media',
				'settings'    => 'linkedin',
				'type'        => 'url',
				'input_attrs' => array(
					'placeholder' => 'https://www.linkedin.com/company/my-rotaract-club',
					'pattern'     => 'https:\/\/(www\.)?linkedin\.com\/.*',
				),
			)
		)
	);
	$wp_customize->add_setting(
		'xing',
		array(
			'type' => 'theme_mod',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'xing',
			array(
				'label'       => 'Xing',
				'section'     => 'social-media',
				'settings'    => 'xing',
				'type'        => 'url',
				'input_attrs' => array(
					'placeholder' => 'https://www.xing.com/communities/groups/my-rotaract-club',
					'pattern'     => 'https:\/\/(www\.)?xing\.com\/.*',
				),
			)
		)
	);
	$wp_customize->add_setting(
		'github',
		array(
			'type' => 'theme_mod',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'github',
			array(
				'label'       => 'Github',
				'section'     => 'social-media',
				'settings'    => 'github',
				'type'        => 'url',
				'input_attrs' => array(
					'placeholder' => 'https://github.com/rotaract',
					'pattern'     => 'https:\/\/(www\.)?github\.com\/.*',
				),
			)
		)
	);
	$wp_customize->add_setting(
		'email',
		array(
			'type' => 'theme_mod',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'email',
			array(
				'label'    => 'E-Mail',
				'section'  => 'social-media',
				'settings' => 'email',
				'type'     => 'email',
			)
		)
	);

	/* SECTION Own Javascript */
	$wp_customize->add_section(
		'own-javascript',
		array(
			'title'       => __( 'Additional JavaScript', 'rotaract-family' ),
			'priority'    => 201,
			'description' => __( 'Add your custom JavaScript code. It will be inserted at the end of the HTML\'s &lt;body&gt;. The &lt;script&gt; tags has to be included here. <strong>CAUTION: Use at your own risk! Please adjust your privacy policy accordingly if you include external scripts here.</strong>', 'rotaract-family' ),
		)
	);
	$wp_customize->add_setting(
		'custom_page_js',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Code_Editor_Control(
			$wp_customize,
			'custom_page_js',
			array(
				'section'   => 'own-javascript',
				'settings'  => 'custom_page_js',
				'code_type' => 'text/html',
			)
		)
	);
	$wp_customize->add_setting(
		'header_color',
		array(
			'default'           => $GLOBALS['family_colors'][ get_theme_mod( 'org_type', 'rac' ) ],
			'sanitize_callback' => 'generate_sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_color',
			array(
				'label'    => __( 'Header', 'rotaract-family' ),
				'priority' => 5,
				'section'  => 'body_section',
				'settings' => 'header_color',
			)
		)
	);
	$wp_customize->add_setting(
		'footer_color',
		array(
			'default'           => '#687d90',
			'sanitize_callback' => 'generate_sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_color',
			array(
				'label'    => __( 'Footer', 'rotaract-family' ),
				'priority' => 6,
				'section'  => 'body_section',
				'settings' => 'footer_color',
			)
		)
	);
}
add_action( 'customize_register', 'rotaract_family_controls', 11 );

/**
 * Returns array of social media icon links.
 *
 * @return array of social media icons
 */
function list_social_items() {
	return array(
		'facebook'  => get_theme_mod( 'facebook', '' ),
		'instagram' => get_theme_mod( 'instagram', '' ),
		'twitter'   => get_theme_mod( 'twitter', '' ),
		'youtube'   => get_theme_mod( 'youtube', '' ),
		'linkedin'  => get_theme_mod( 'linkedin', '' ),
		'xing'      => get_theme_mod( 'xing', '' ),
		'github'    => get_theme_mod( 'github', '' ),
		'email'     => get_theme_mod( 'email', '' ),
	);
}

/**
 * Print custom JavaScript.
 */
if ( ! empty( get_theme_mod( 'custom_page_js' ) ) ) {
	add_action( 'wp_footer', 'custom_page_js', 999 );
	/**
	 * Include custom JS on website.
	 */
	function custom_page_js() {
		echo get_theme_mod( 'custom_page_js' );
	}
}
