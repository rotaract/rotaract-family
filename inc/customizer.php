<?php

/**
 * Rotaract Family customizer controls
 */
add_action( 'customize_register', 'rotaract_family_controls', 11 );
function rotaract_family_controls($wp_customize) {

	// SECTION Rotaract Family
	$wp_customize->add_section('logo', array(
		'title'       => 'Logo',
		'priority'    => 21,
		'description' => 'Passe das Logo an.'
	) );
	$wp_customize->add_setting('org_type', array(
		'default' => 'rac'
	) );
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'org_type', array(
			'label'          => 'Organisation',
			'description'    => 'Diese Einstellung setzt auch die Default-Farbe der Seite.',
			'section'        => 'logo',
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
			'section'           => 'logo',
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
			'section'           => 'logo',
			'settings'          => 'logo_text_line_2',
      'type'              => 'text'
		) )
	);

	// SECTION Footer Options
	$wp_customize->add_section('footer-options', array(
		'title'       => 'Fußzeile',
		'priority'    => 30,
		'description' => '<p>Inhalte der Fußzeile anpassen</p>
							<p><span class="customize-control-title">Datenschutz</span>Standardmäßig verlinkt mit der Datenschutz-Seite von Rotaract Deutschland. Es empfiehlt sich aber, eine eigene Datenschutzseite anzulegen. Das kannst du <a href="/wp-admin/options-privacy.php" class="external-link" target="_blank">hier</a> tun. Eine Vorlage für deine Datenschutzerklärung findest du im Wiki von Rotaract Deutschland.</p>'
	) );
	$wp_customize->add_setting('copyright', array(
		'default' => get_bloginfo( 'name' )
	) );
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'copyright', array(
			'label'          => 'Copyright',
			'section'        => 'footer-options',
			'settings'       => 'copyright',
      'type'           => 'text'
		) )
	);
	$wp_customize->add_setting('contact_page');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'contact_page', array(
			'label'          => 'Seite für das Kontaktformular',
			'description'    => 'Gib hier an, auf welcher Seite dein Kontaktformular zu finden ist.',
			'section'        => 'footer-options',
			'settings'       => 'contact_page',
			'type'           => 'dropdown-pages',
			'allow_addition' => true
		) )
	);
	$wp_customize->add_setting('impress_page');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'impress_page', array(
			'label'          => 'Seite für das Impressum',
			'description'    => 'Gib hier an, auf welcher Seite dein Impressum zu finden ist. Standard: "/impressum". Eine Vorlage für ein Impressum findest du im Wiki.',
			'section'        => 'footer-options',
			'settings'       => 'impress_page',
			'type'           => 'dropdown-pages',
			'allow_addition' => true
		) )
	);

	// SECTION Social Media
	$wp_customize->add_section('social-media', array(
		'title'         => 'Social Media Links',
		'priority'      => 25,
		'description'   => 'Füge die URL für jedes soziale Profil hinzu.'
	) );
	$wp_customize->add_setting('facebook');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'facebook', array(
			'label'       => 'Facebook',
			'section'     => 'social-media',
			'settings'    => 'facebook',
      'type'        => 'url'
		) )
	);
	$wp_customize->add_setting('instagram');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'instagram', array(
			'label'       => 'Instagram',
			'section'     => 'social-media',
			'settings'    => 'instagram',
      'type'        => 'url'
		) )
	);
	$wp_customize->add_setting('twitter');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'twitter', array(
			'label'       => 'Twitter',
			'section'     => 'social-media',
			'settings'    => 'twitter',
      'type'        => 'url'
		) )
	);
	$wp_customize->add_setting('youtube');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'youtube', array(
			'label'       => 'Youtube',
			'section'     => 'social-media',
			'settings'    => 'youtube',
      'type'        => 'url'
		) )
	);
	$wp_customize->add_setting('linkedin');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'linkedin', array(
			'label'       => 'LinkedIn',
			'section'     => 'social-media',
			'settings'    => 'linkedin',
      'type'        => 'url'
		) )
	);
	$wp_customize->add_setting('xing');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'xing', array(
			'label'       => 'Xing',
			'section'     => 'social-media',
			'settings'    => 'xing',
      'type'        => 'url'
		) )
	);
	$wp_customize->add_setting('github');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'github', array(
			'label'       => 'Github',
			'section'     => 'social-media',
			'settings'    => 'github',
      'type'        => 'url'
		) )
	);
	$wp_customize->add_setting('email');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'email', array(
			'label'       => 'E-Mail',
			'section'     => 'social-media',
			'settings'    => 'email',
      'type'        => 'email'
		) )
	);

	// SECTION Own Javascript
	$wp_customize->add_section('own-javascript', array(
    'title'         => 'Zusätzliches JS',
    'priority'      => 201,
    'description'   => 'Trage hier eigenen Javascript-Code ein. Dieser wird am Ende des &lt;body&gt;-Tag eingefügt. Vergiss nicht, &lt;script&gt;-Tags zu setzen. <strong>Benutzung auf eigene Gefahr! Pass bitte deine Datenschutzerklärung entsprechend an, falls du hier externe Scripte einbindest.</strong>'
	) );
	$wp_customize->add_setting('custom_page_js', array(
		'default' => ''
	) );
	$wp_customize->add_control(
		new WP_Customize_Code_Editor_Control($wp_customize, 'custom_page_js', array(
			'section'     => 'own-javascript',
			'settings'    => 'custom_page_js',
			'code_type'   => 'text/html'
		) )
	);
}

function listSocialItems() {
	return array(
		'facebook'		=> get_theme_mod( 'facebook', '' ),
		'instagram'		=> get_theme_mod( 'instagram', '' ),
		'twitter'		  => get_theme_mod( 'twitter', '' ),
		'youtube'		  => get_theme_mod( 'youtube', '' ),
		'linkedin'		=> get_theme_mod( 'linkedin', '' ),
		'xing'			  => get_theme_mod( 'xing', '' ),
		'github'		  => get_theme_mod( 'github', '' ),
		'email'			  => get_theme_mod( 'email', '' )
	);
}

/**
 * print custom javascript
 */
if( ! empty( get_theme_mod( 'custom_page_js' ) ) ) {
  add_action( 'wp_footer', 'custom_page_js', 999 );
  function custom_page_js() {
    echo get_theme_mod( 'custom_page_js' );
  }
}
