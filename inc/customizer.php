<?php

/**
 * Rotaract Family customizer controls
 */
add_action( 'customize_register', 'rotaract_family_controls', 11 );
function rotaract_family_controls($wp_customize) {

	// SECTION Rotaract Family
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

	// SECTION Social Media
	$wp_customize->add_section('social-media', array(
		'title'       => 'Social Media Links',
		'priority'    => 2,
		'description' => 'Füge die URL für jedes soziale Profil hinzu.'
	) );
	$wp_customize->add_setting('facebook');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'facebook', array(
			'label'             => 'Facebook',
			'section'           => 'social-media',
			'settings'          => 'facebook',
      'type'              => 'url'
		) )
	);
	$wp_customize->add_setting('instagram');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'instagram', array(
			'label'             => 'Instagram',
			'section'           => 'social-media',
			'settings'          => 'instagram',
      'type'              => 'url'
		) )
	);
	$wp_customize->add_setting('twitter');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'twitter', array(
			'label'             => 'Twitter',
			'section'           => 'social-media',
			'settings'          => 'twitter',
      'type'              => 'url'
		) )
	);
	$wp_customize->add_setting('youtube');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'youtube', array(
			'label'             => 'Youtube',
			'section'           => 'social-media',
			'settings'          => 'youtube',
      'type'              => 'url'
		) )
	);
	$wp_customize->add_setting('linkedin');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'linkedin', array(
			'label'             => 'LinkedIn',
			'section'           => 'social-media',
			'settings'          => 'linkedin',
      'type'              => 'url'
		) )
	);
	$wp_customize->add_setting('xing');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'xing', array(
			'label'             => 'Xing',
			'section'           => 'social-media',
			'settings'          => 'xing',
      'type'              => 'url'
		) )
	);
	$wp_customize->add_setting('github');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'github', array(
			'label'             => 'Github',
			'section'           => 'social-media',
			'settings'          => 'github',
      'type'              => 'url'
		) )
	);
	$wp_customize->add_setting('email');
	$wp_customize->add_control(
		new WP_Customize_Control($wp_customize, 'email', array(
			'label'             => 'E-Mail',
			'section'           => 'social-media',
			'settings'          => 'email',
      'type'              => 'email'
		) )
	);
}

function listSocialItems() {
	return array(
		'facebook'		=> get_theme_mod( 'facebook', '' ),
		'instagram'		=> get_theme_mod( 'instagram', '' ),
		'twitter'			=> get_theme_mod( 'twitter', '' ),
		'youtube'			=> get_theme_mod( 'youtube', '' ),
		'linkedin'		=> get_theme_mod( 'linkedin', '' ),
		'xing'				=> get_theme_mod( 'xing', '' ),
		'github'			=> get_theme_mod( 'github', '' ),
		'email'				=> get_theme_mod( 'email', '' )
	);
}

/**
 * print custom css
 */
if( ! empty( get_theme_mod( 'custom_page_css' ) ) ) {
  add_action( 'wp_head', 'custom_page_css' );
  function custom_page_css() {
    echo '<style type="text/css" id="custom-theme-css">' . get_theme_mod( 'custom_page_css' ) . '</style>';
  }
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
