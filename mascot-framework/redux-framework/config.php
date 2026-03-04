<?php
	/**
	 * ReduxFramework Sample Config File
	 * For full documentation, please visit: http://docs.reduxframework.com/
	 */

	if ( ! class_exists( 'Redux' ) ) {
		return;
	}

	// This is your option name where all the Redux data is stored.
	$opt_name = "abogada_redux_theme_opt";

	// This line is only for altering the demo. Can be easily removed.
	$opt_name = apply_filters( 'abogada_redux_theme_opt/opt_name', $opt_name );

	$home_url = home_url();

	//custom action hook for this template:
	add_action('redux/options/abogada_redux_theme_opt/saved', 'abogada_generate_css_for_custom_theme_color_from_scss');
	add_action('redux/options/abogada_redux_theme_opt/saved', 'abogada_generate_dynamic_css');
	add_action('redux/options/abogada_redux_theme_opt/reset', 'abogada_generate_css_for_custom_theme_color_from_scss');
	add_action('redux/options/abogada_redux_theme_opt/reset', 'abogada_generate_dynamic_css');
	add_action('redux/options/abogada_redux_theme_opt/section/reset', 'abogada_generate_css_for_custom_theme_color_from_scss');
	add_action('redux/options/abogada_redux_theme_opt/section/reset', 'abogada_generate_dynamic_css');

	//required files
	require_once( 'filter-social-links.php' );
	/*
	 *
	 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
	 *
	 */

	// Background Patterns Reader
	$sample_patterns_path = ABOGADA_ADMIN_ASSETS_DIR . '/images/pattern/';
	$sample_patterns_url  = ABOGADA_ADMIN_ASSETS_URI . '/images/pattern/';
	$sample_patterns      = array();

	if ( is_dir( $sample_patterns_path ) ) {

		if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
			$sample_patterns = array();

			while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

				if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
					$name              = explode( '.', $sample_patterns_file );
					$name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
					$sample_patterns[ $sample_patterns_url . $sample_patterns_file ] = array(
						'alt' => $name,
						'img' => $sample_patterns_url . $sample_patterns_file
					);
				}
			}
		}
	}


	/*
	 *
	 * ---> START SECTIONS
	 *
	 */

	/*

		As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


	 */


	// -> START General Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'General', 'abogada' ),
		'id'     => 'general-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-admin-home',
		'fields' => array(
			array(
				'id'       => 'general-settings-favicon',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Favicon', 'abogada' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'abogada' ),
				'subtitle' => esc_html__( 'Upload a 32px x 32px png/gif image that will represent your website favicon.', 'abogada' ),
				'default'  => array( 'url' => ABOGADA_ASSETS_URI . '/images/logo/favicon.png' ),
			),
			array(
				'id'       => 'general-settings-apple-touch-144',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Apple Touch 144x144 Icon', 'abogada' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'abogada' ),
				'subtitle' => esc_html__( 'Upload a 144px x 144px png image that will be your website bookmark on retina iOS devices.', 'abogada' ),
				'default'  => array( 'url' => ABOGADA_ASSETS_URI . '/images/logo/apple-touch-icon-144x144.png' ),
			),
			array(
				'id'       => 'general-settings-apple-touch-114',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Apple Touch 114x114 Icon', 'abogada' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'abogada' ),
				'subtitle' => esc_html__( 'Upload a 114px x 114px png image that will be your website bookmark on retina iOS devices.', 'abogada' ),
				'default'  => array( 'url' => ABOGADA_ASSETS_URI . '/images/logo/apple-touch-icon-114x114.png' ),
			),
			array(
				'id'       => 'general-settings-apple-touch-72',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Apple Touch 72x72 Icon', 'abogada' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'abogada' ),
				'subtitle' => esc_html__( 'Upload a 72px x 72px Png image that will be your website bookmark on non-retina iOS devices.', 'abogada' ),
				'default'  => array( 'url' => ABOGADA_ASSETS_URI . '/images/logo/apple-touch-icon-72x72.png' ),
			),
			array(
				'id'       => 'general-settings-apple-touch-32',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Apple Touch 32x32 Icon', 'abogada' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'abogada' ),
				'subtitle' => esc_html__( 'Upload a 32px x 32px png image that will be your website bookmark on non-retina iOS devices.', 'abogada' ),
				'default'  => array( 'url' => ABOGADA_ASSETS_URI . '/images/logo/apple-touch-icon.png' ),
			),
			array(
				'id'       => 'general-settings-enable-responsive',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Responsive', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disable the responsive behaviour of the theme', 'abogada' ),
				'default'  => true,
			),
			array(
				'id'       => 'general-settings-enable-backtotop',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Back To Top', 'abogada' ),
				'subtitle' => esc_html__( 'Enable Back to Top button that appears in the bottom right corner of the screen.', 'abogada' ),
				'default'  => true,
			),


			array(
				'id'       => 'general-settings-enable-gsap-animation-by-default',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable GSap Animation', 'abogada' ),
				'default'  => false,
			),


			array(
				'id'       => 'general-settings-smooth-scroll',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Smooth Page Scrolling (Lenis Scroll)', 'abogada' ),
				'subtitle' => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices).', 'abogada' ),
				'default'  => false,
			),

			array(
				'id'       => 'general-settings-enable-element-animation-effect',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Animation Effect on Different Elements', 'abogada' ),
				'subtitle' => esc_html__( 'Enabling this option will enable animation effect.', 'abogada' ),
				'default'  => true,
			),
		)
	) );

	$my_wp_get_theme = wp_get_theme();
	// -> START Logo Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Logo', 'abogada' ),
		'id'     => 'logo-settings',
		'desc'   => sprintf( esc_html__( 'If you want to upload SVG logo then please install this %1$ssvg plugin%2$s', 'abogada' ), '<a target="_blank" href="' . esc_url( 'https://wordpress.org/plugins/svg-support/' ) . '">', '</a>' ),
		'icon'   => 'dashicons-before dashicons-palmtree',
		'fields' => array(
			array(
				'id'       => 'logo-settings-site-brand',
				'type'     => 'text',
				'title'    => esc_html__( 'Site Brand', 'abogada' ),
				'subtitle' => esc_html__( 'Enter the text that will be appeared as logo', 'abogada' ),
				'desc'     => '',
				'default'  => $my_wp_get_theme->get( 'Name' ),
			),

			array(
				'id'       => 'logo-settings-want-to-use-logo',
				'type'     => 'switch',
				'title'    => esc_html__( 'Use logo in replace of "Site Brand" Text?', 'abogada' ),
				'subtitle' => esc_html__( 'If you want to use logo then please enable it.', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),

			array(
				'id'       => 'logo-settings-switchable-logo',
				'type'     => 'switch',
				'title'    => esc_html__( 'Switchable logo(Light+Dark)?', 'abogada' ),
				'subtitle' => esc_html__( 'If you want to use switchable logo then please enable it.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array( 'logo-settings-want-to-use-logo', '=', '1' ),
			),

			array(
				'id'       => 'logo-settings-logo-default',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Logo (Default)', 'abogada' ),
				'subtitle' => esc_html__( 'Upload/choose your custom logo image', 'abogada' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => ABOGADA_ASSETS_URI . '/images/logo/logo-wide.png' ),
				'required' => array( 'logo-settings-switchable-logo', '=', '0' ),
			),

			array(
				'id'       => 'logo-settings-logo-default-dark-bg',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Logo (White) For Dark Background', 'abogada' ),
				'subtitle' => esc_html__( 'Upload/choose your custom logo image', 'abogada' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => ABOGADA_ASSETS_URI . '/images/logo/logo-wide-white.png' ),
				'required' => array( 'logo-settings-switchable-logo', '=', '0' ),
			),

			array(
				'id'       => 'logo-settings-logo-primary',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Logo (Default)', 'abogada' ),
				'subtitle' => esc_html__( 'Upload a logo for the default mode.', 'abogada' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => ABOGADA_ASSETS_URI . '/images/logo/logo-wide-white.png' ),
				'required' => array( 'logo-settings-switchable-logo', '=', '1' ),
			),

			array(
				'id'       => 'logo-settings-logo-on-sticky',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Logo (Sticky Mode)', 'abogada' ),
				'subtitle' => esc_html__( 'Upload a logo for the sticky mode.', 'abogada' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => ABOGADA_ASSETS_URI . '/images/logo/logo-wide.png' ),
				'required' => array( 'logo-settings-switchable-logo', '=', '1' ),
			),

			array(
				'id'       => 'logo-settings-logo-mobile-version',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Logo for Mobile Version', 'abogada' ),
				'subtitle' => esc_html__( 'Upload/choose your custom logo image', 'abogada' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => ABOGADA_ASSETS_URI . '/images/logo/logo-wide-white.png' ),
			),

			array(
				'id'            => 'logo-settings-logo-margin-around',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,
				'right'         => true,
				'bottom'        => true,
				'left'          => true,
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin(px) Around Logo', 'abogada' ),
			),

			array(
				'id'            => 'logo-settings-logo-sticky-margin-around',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,
				'right'         => true,
				'bottom'        => true,
				'left'          => true,
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin(px) Around Logo in Sticky Mode', 'abogada' ),
			),

			array(
				'id'       => 'logo-settings-admin-login-logo',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'WordPress Admin Login Logo', 'abogada' ),
				'subtitle' => esc_html__( 'Change the default wordpress login logo. Dimensions should be 250x50 px', 'abogada' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => ABOGADA_ASSETS_URI . '/images/logo/logo-wide.png' ),
			),

		)
	) );


	// -> START Theme Color Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Theme Color Settings', 'abogada' ),
		'id'     => 'theme-color-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-art',
		'fields' => array(
			array(
				'id'       => 'theme-color-settings-theme-color-type',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Website Primary Theme Color', 'abogada' ),
				'subtitle' => esc_html__( 'Select website primary theme color', 'abogada' ),
				'options' => array(
					'predefined' => esc_html__( 'Predefined Theme Colors', 'abogada' ),
					'custom'     => esc_html__( 'Custom Theme Color', 'abogada' )
				),
				'default' => 'predefined',
			),
			array(
				'id'       => 'theme-color-settings-primary-theme-color',
				'type'     => 'select',
				'title'    => esc_html__( 'Predefined Theme Colors', 'abogada' ),
				'subtitle' => esc_html__( 'Choose one from these predefined theme colors', 'abogada' ),
				'desc'     => '',
				'options'	=> abogada_metabox_get_list_of_predefined_theme_color_css_files(),
				'default'  => 'theme-skin-color-set1.css',
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'predefined' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-color1',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom Primary Theme Color', 'abogada' ),
				'subtitle' => esc_html__( 'Pick a custom primary color for the theme.', 'abogada' ),
				'default'  => '#1296CC',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-color2',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom Secondary Theme Color', 'abogada' ),
				'subtitle' => esc_html__( 'Pick a custom secondary color for the theme.', 'abogada' ),
				'default'  => '#dd9933',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-color3',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom 3rd Theme Color', 'abogada' ),
				'subtitle' => esc_html__( 'Pick a custom 3rd color for the theme.', 'abogada' ),
				'default'  => '#dd9933',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-color4',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom 4th Theme Color', 'abogada' ),
				'subtitle' => esc_html__( 'Pick a custom 4th color for the theme.', 'abogada' ),
				'default'  => '#dd9933',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-text-color1',
				'type'     => 'color',
				'title'    => esc_html__( 'Text Color 1 (for Custom Primary Theme Color)', 'abogada' ),
				'subtitle' => esc_html__( 'Text color when we will use theme color in the background. Generally text color is white or black according to the theme color', 'abogada' ),
				'default'  => '#fff',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-text-color2',
				'type'     => 'color',
				'title'    => esc_html__( 'Text Color 2 (for Custom Secondary Theme Color)', 'abogada' ),
				'subtitle' => esc_html__( 'Text color when we will use theme color in the background. Generally text color is white or black according to the theme color', 'abogada' ),
				'default'  => '#fff',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-text-color3',
				'type'     => 'color',
				'title'    => esc_html__( 'Text Color 3 (for Custom 3rd Theme Color)', 'abogada' ),
				'subtitle' => esc_html__( 'Text color when we will use theme color in the background. Generally text color is white or black according to the theme color', 'abogada' ),
				'default'  => '#fff',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-text-color4',
				'type'     => 'color',
				'title'    => esc_html__( 'Text Color 4 (for BG 4th Theme Color)', 'abogada' ),
				'subtitle' => esc_html__( 'Text color when we will use theme color in the background. Generally text color is white or black according to the theme color', 'abogada' ),
				'default'  => '#fff',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-color-filename',
				'type'     => 'text',
				'title'    => esc_html__( 'File Name to Save This Color Set (Optional)', 'abogada' ),
				'subtitle' => esc_html__( 'If you want to save this color set as a css file then give a name of the file. File name must starts with "theme-color-". Same name will override exising one. Leave empty for not to save it as a css file.', 'abogada' ),
				'desc'     => '',
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),



			//Site Category CSS files
			array(
				'id'       	=> 'theme-color-settings-theme-color-custom-site-cssfile-info-field',
				'type'      => 'info',
				'title'     => esc_html__( 'Attach Premade CSS File to get extra styling throughout the site.', 'abogada' ),
				'notice'    => false,
			),
			array(
				'id'       => 'theme-color-settings-premade-sitewise-css-file',
				'type'     => 'select',
				'title'    => esc_html__( 'Attach Premade CSS File into the header', 'abogada' ),
				'subtitle' => esc_html__( 'These files are located in assets/css/sites folder of this theme.', 'abogada' ),
				'options'	=> abogada_metabox_get_list_of_premade_sitewise_css_files(),
			),
		)
	) );


	// -> START Dark Mode Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Dark Mode', 'abogada' ),
		'id'     => 'darkmode-settings',
		'icon'   => 'dashicons-before dashicons-visibility',
		'fields' => array(
			array(
				'id'       => 'general-settings-enable-dark-mode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Dark Mode', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disable the Dark Mode of the theme', 'abogada' ),
				'default'  => false,
			),
			array(
				'id'       => 'general-settings-dark-mode-custom-bgcolor',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom Dark Background Color', 'abogada' ),
				'subtitle' => esc_html__( 'Pick a custom background color for Dark Mode throughout the site.', 'abogada' ),
				'transparent' => true,
				'required' => array( 'general-settings-enable-dark-mode', '=', 'false' ),
			),
		)
	) );



	// -> START Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Typography', 'abogada' ),
		'id'     => 'typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
	) );

	// -> START Body Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Predefined Typography', 'abogada' ),
		'id'     => 'primary-predefined-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'typography-settings-predefined-typography',
				'type'     => 'select',
				'title'    => esc_html__( 'Predefined Typography', 'abogada' ),
				'subtitle' => esc_html__( 'Choose one from these Predefined Typography', 'abogada' ),
				'desc'     => '',
				'options'	=> abogada_metabox_get_list_of_predefined_typography_files(),
			),
		)
	) );

	// -> START Body Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Body Typography', 'abogada' ),
		'id'     => 'primary-body-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
		'subsection' => true,
		'fields' => array(
			array(
				'id'            => 'typography-primary-body',
				'type'          => 'typography',
				'title'         => esc_html__( 'Primary Body Typography', 'abogada' ),
				'subtitle'      => esc_html__( 'Specify the body font properties.', 'abogada' ),
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'            => 'typography-primary-body-link-color',
				'type'          => 'color',
				'title'         => esc_html__( 'Primary Link Color', 'abogada' ),
				'subtitle'      => esc_html__( 'Specify link color throughout the body.', 'abogada' ),
				'transparent'   => false,
			),
		)

	) );

	// -> START Body Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Section Title Typography', 'abogada' ),
		'id'     => 'section-title-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
		'subsection' => true,
		'fields' => array(
			array(
				'id'            => 'typography-section-title',
				'type'          => 'typography',
				'title'         => esc_html__( 'Section Title Typography', 'abogada' ),
				'subtitle'      => esc_html__( 'Specify the Section Title font properties.', 'abogada' ),
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'            => 'typography-section-subtitle',
				'type'          => 'typography',
				'title'         => esc_html__( 'Section Sub-Title Typography', 'abogada' ),
				'subtitle'      => esc_html__( 'Specify the Section Sub-Title font properties.', 'abogada' ),
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
		)

	) );

	// -> START Headings Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Headings Typography', 'abogada' ),
		'id'     => 'headings-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
		'subsection' => true,
		'fields' => array(
			//section H1 Starts
			array(
				'id'       => 'typography-h1-h6-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Common Heading H1 to h6', 'abogada' ),
				'subtitle' => esc_html__( 'Define styles for heading H1, H2, H3, H4, H5, H6.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h1-h6',
				'type'          => 'typography',
				'title'         => esc_html__( 'Common Heading(H1 to h6) Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),



			//section H1 Starts
			array(
				'id'       => 'typography-h1-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H1', 'abogada' ),
				'subtitle' => esc_html__( 'Define styles for heading H1.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h1',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H1 Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h1-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h1-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section H2 Starts
			array(
				'id'       => 'typography-h2-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H2', 'abogada' ),
				'subtitle' => esc_html__( 'Define styles for heading H2.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h2',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H2 Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h2-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h2-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section H3 Starts
			array(
				'id'       => 'typography-h3-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H3', 'abogada' ),
				'subtitle' => esc_html__( 'Define styles for heading H3.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h3',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H3 Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h3-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h3-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section H4 Starts
			array(
				'id'       => 'typography-h4-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H4', 'abogada' ),
				'subtitle' => esc_html__( 'Define styles for heading H4.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h4',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H4 Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h4-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h4-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section H5 Starts
			array(
				'id'       => 'typography-h5-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H5', 'abogada' ),
				'subtitle' => esc_html__( 'Define styles for heading H5.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h5',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H5 Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h5-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h5-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section H6 Starts
			array(
				'id'       => 'typography-h6-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H6', 'abogada' ),
				'subtitle' => esc_html__( 'Define styles for heading H6.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h6',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H6 Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h6-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h6-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),



		)
	) );

	// -> START Button Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Button Typography', 'abogada' ),
		'id'     => 'primary-button-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
		'subsection' => true,
		'fields' => array(
			array(
				'id'            => 'button-typography-btn-default',
				'type'          => 'typography',
				'title'         => esc_html__( 'Typography - Button Default', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'button-typography-btn-default-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,     // Disable the top
				'right'         => true,     // Disable the right
				'bottom'        => true,     // Disable the bottom
				'left'          => true,     // Disable the left
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Padding - Button Default', 'abogada' ),
			),
			array(
				'id'            => 'button-typography-btn-lg',
				'type'          => 'typography',
				'title'         => esc_html__( 'Typography - Button Large', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'button-typography-btn-lg-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,     // Disable the top
				'right'         => true,     // Disable the right
				'bottom'        => true,     // Disable the bottom
				'left'          => true,     // Disable the left
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Padding - Button Large', 'abogada' ),
			),
			array(
				'id'            => 'button-typography-btn-sm',
				'type'          => 'typography',
				'title'         => esc_html__( 'Typography - Button Small', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'button-typography-btn-sm-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,     // Disable the top
				'right'         => true,     // Disable the right
				'bottom'        => true,     // Disable the bottom
				'left'          => true,     // Disable the left
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Padding - Button Small', 'abogada' ),
			),
			array(
				'id'            => 'button-typography-btn-xs',
				'type'          => 'typography',
				'title'         => esc_html__( 'Typography - Button Extra Small', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'button-typography-btn-xs-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,     // Disable the top
				'right'         => true,     // Disable the right
				'bottom'        => true,     // Disable the bottom
				'left'          => true,     // Disable the left
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Padding - Button Extra Small', 'abogada' ),
			),
		)

	) );

	// -> START Link Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Post/Page Content Link Typography', 'abogada' ),
		'id'     => 'content-link-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
		'subsection' => true,
		'fields' => array(
			array(
				'id'            => 'link-typography-link',
				'type'          => 'typography',
				'title'         => esc_html__( 'Link Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'	   => 'link-typography-link-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Link Hover Color', 'abogada' ),
				'transparent' => false,
			),
		)
	) );


	// -> START Layout Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Layout Settings', 'abogada' ),
		'id'     => 'layout-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-table',
		'fields' => array(
			array(
				'id'        => 'layout-settings-page-layout',
				'type'      => 'button_set',
				'compiler'  => true,
				'title'     => esc_html__( 'Page Layout', 'abogada' ),
				'subtitle'  => esc_html__( 'Select primary page layout of your theme', 'abogada' ),
				'options'   => array(
					'boxed'        => esc_html__( 'Boxed', 'abogada' ),
					'stretched'    => esc_html__( 'Stretched', 'abogada' )
				),
				'default'   => 'stretched',
			),

			array(
				'id'       => 'layout-settings-content-width',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Content Width', 'abogada' ),
				'subtitle' => esc_html__( 'Select content width. You can use any width by using custom CSS', 'abogada' ),
				'options' => array(
					'container-970px'     => esc_html__( '970px', 'abogada' ),
					'container-default'   => esc_html__( '1170px (Bootstrap Default)', 'abogada' ),
					'container-elementor-default'    => esc_html__( 'Elementor Default', 'abogada' ),
					'container-1230px'    => esc_html__( '1230px', 'abogada' ),
					'container-1300px'    => esc_html__( '1300px', 'abogada' ),
					'container-1340px'    => esc_html__( '1340px', 'abogada' ),
					'container-1440px'    => esc_html__( '1440px', 'abogada' ),
					'container-1500px'    => esc_html__( '1500px', 'abogada' ),
					'container-1600px'    => esc_html__( '1600px', 'abogada' ),
					'container-100pr'     => esc_html__( 'Fullwidth 100%', 'abogada' )
				),
				'default' => 'container-1230px',
			),
			array(
				'id'       => 'layout-settings-stretched-layout-bg-bgcolor',
				'type'     => 'color',
				'title'    => esc_html__( 'Background Solid Color(Stretched Mode)', 'abogada' ),
				'subtitle' => esc_html__( 'Pick a custom color for background.', 'abogada' ),
				'transparent' => false,
				'required' => array( 'layout-settings-page-layout', '=', 'stretched' ),
			),


			//section H3 Starts
			array(
				'id'       => 'layout-settings-boxed-layout-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Boxed Layout Settings', 'abogada' ),
				'subtitle' => esc_html__( 'Define styles for Boxed Layout.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
				'required' => array( 'layout-settings-page-layout', '=', 'boxed' ),
			),
			array(
				'id'             => 'layout-settings-boxed-layout-padding-top-bottom',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'all'            => false,
				// Have one field that applies to all
				'top'            => true,     // Disable the top
				'right'          => false,     // Disable the right
				'bottom'         => true,     // Disable the bottom
				'left'           => false,     // Disable the left
				'units'          => 'px',
				'units_extended' => 'true',
				'display_units'  => true,   // Set to false to hide the units if the units are specified
				'title'          => esc_html__( 'Padding Top & Bottom(px)', 'abogada' ),
				'subtitle'       => esc_html__( 'Top and bottom padding in px for boxed layout.', 'abogada' ),
				'desc'           => esc_html__( 'Controls the top and bottom padding of the boxed layout. Ex: 40px, 40px. Please put only integer value. Because the unit \'px\' will be automatically added to the end of the value.', 'abogada' ),
				'default'            => array(
					'padding-top'     => '40',
					'padding-bottom'  => '40',
					'units'          => 'px',
				)
			),
			array(
				'id'       => 'layout-settings-boxed-layout-container-shadow',
				'type'     => 'switch',
				'title'    => esc_html__( 'Container Shadow?', 'abogada' ),
				'subtitle' => esc_html__( 'Add shadow around the container.', 'abogada' ),
				'default'  => 0,
				'on'       => 'On',
				'off'      => 'Off',
			),
			array(
				'id'       => 'layout-settings-boxed-layout-bg-type',
				'type'     => 'radio',
				'title'    => esc_html__( 'Background Type', 'abogada' ),
				'subtitle' => esc_html__( 'You can use patterns, image or solid color as a background.', 'abogada' ),
				'options'	=> array(
					'bg-color'     => esc_html__( 'Solid Color', 'abogada' ),
					'bg-patter'    => esc_html__( 'Patterns from Theme Library', 'abogada' ),
					'bg-image'     => esc_html__( 'Upload Own Image', 'abogada' ),
				),
				'default'  => 'bg-color',
			),
			array(
				'id'       => 'layout-settings-boxed-layout-bg-type-bgcolor',
				'type'     => 'color',
				'title'    => esc_html__( 'Background Solid Color', 'abogada' ),
				'subtitle' => esc_html__( 'Pick a custom color for background (default: #444).', 'abogada' ),
				'default'  => '#444',
				'transparent' => true,
				'required' => array( 'layout-settings-boxed-layout-bg-type', '=', 'bg-color' ),
			),
			array(
				'id'       => 'layout-settings-boxed-layout-bg-type-pattern',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Choose Patterns from Theme Library', 'abogada' ),
				'subtitle' => esc_html__( 'Select a patterns by clicking on it.', 'abogada' ),
				'desc'     => '',
				'options'	=> $sample_patterns,
				'default'  => key($sample_patterns),
				'required' => array( 'layout-settings-boxed-layout-bg-type', '=', 'bg-patter' ),
			),
			array(
				'id'       => 'layout-settings-boxed-layout-bg-type-bgimg',
				'type'     => 'background',
				'title'    => esc_html__( 'Background Image', 'abogada' ),
				'subtitle' => esc_html__( 'Body background image.', 'abogada' ),
				'background-color' => false,
				'required' => array( 'layout-settings-boxed-layout-bg-type', '=', 'bg-image' ),
			),
			array(
				'id'       => 'layout-settings-boxed-layout-ends',
				'type'     => 'section',
				'indent'   => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );



	// -> START Header
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header', 'abogada' ),
		'id'     => 'header',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-up-alt',
	) );


	// -> START Header Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header', 'abogada' ),
		'id'     => 'header-layout',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-up-alt',
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'header-settings-choose-header-visibility',
				'type'     => 'switch',
				'title'    => esc_html__( 'Header Visibility', 'abogada' ),
				'subtitle' => esc_html__( 'Show or hide header globally', 'abogada' ),
				'default'  => 1,
				'on'       => 'Show',
				'off'      => 'Hide',
			),



			array(
				'id'        => 'header-settings-choose-header-top-cpt-elementor-info',
				'type'      => 'info',
				'title'     => esc_html__( 'Elementor Headers', 'abogada' ),
				'notice'    => false,
			),
			array(
				'id'       => 'header-settings-choose-header-top-cpt-elementor',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Header (Built with Elementor)', 'abogada' ),
				'subtitle' => sprintf(esc_html__('You can create your own Header from %s', 'abogada'), '<a href="'.admin_url('edit.php?post_type=header-top').'" target="_blank">Dashboard > Parts - Header Top</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'header-top' ),
					'posts_per_page' => -1,
				),
			),
			array(
				'id'       => 'header-settings-choose-header-top-cpt-elementor-transparent',
				'type'     => 'select',
				'title'    => esc_html__( 'Header - Floating/Transparent (Built with Elementor)', 'abogada' ),
				'subtitle' => sprintf(esc_html__('You can create your own Header from %s', 'abogada'), '<a href="'.admin_url('edit.php?post_type=header-top').'" target="_blank">Dashboard > Parts - Header Top</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'header-top' ),
					'posts_per_page' => -1,
				),
			),
			array(
				'id'       => 'header-settings-choose-header-top-cpt-elementor-sticky',
				'type'     => 'select',
				'title'    => esc_html__( 'Header - Sticky (Built with Elementor)', 'abogada' ),
				'subtitle' => sprintf(esc_html__('It will be shown when you scroll down. You can create your own Header from %s', 'abogada'), '<a href="'.admin_url('edit.php?post_type=header-top').'" target="_blank">Dashboard > Parts - Header Top</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'header-top' ),
					'posts_per_page' => -1,
				),
			),
			array(
				'id'       => 'header-settings-choose-header-top-cpt-elementor-mobile',
				'type'     => 'select',
				'title'    => esc_html__( 'Header - Mobile/Tab (Built with Elementor)', 'abogada' ),
				'subtitle' => sprintf(esc_html__('It will be visible on Tab & Mobile devices only. You can create your own Header from %s', 'abogada'), '<a href="'.admin_url('edit.php?post_type=header-top').'" target="_blank">Dashboard > Parts - Header Top</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'header-top' ),
					'posts_per_page' => -1,
				),
			),
		)
	) );

	// -> START Header Navigation Row
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header Mobile', 'abogada' ),
		'id'     => 'header-mobile-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-up-alt',
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'header-mobile-settings-mobile-nav-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'abogada' ),
			),
			array(
				'id'       => 'header-mobile-settings-hamburger-line-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Hamburger Line Color', 'abogada' ),
			),
			array(
				'id'       => 'header-mobile-settings-revealed-canvas-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Revealed Mobile Canvas Background Color', 'abogada' ),
			),
			array(
				'id'       => 'header-mobile-settings-item-indicator-arrow-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Item Indicator Arrow BG Color', 'abogada' ),
			),
			array(
				'id'       => 'header-mobile-settings-item-indicator-arrow-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Item Indicator Arrow Color', 'abogada' ),
			),
			array(
				'id'            => 'logo-settings-maximum-logo-width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Logo Width(px) in Mobile Memu', 'abogada' ),
				'subtitle'      => esc_html__( 'Enter logo width in px.', 'abogada' ),
				'desc'          => '',
				'min'           => 20,
				'step'          => 1,
				'max'           => 500,
				'default'       => 120,
				'display_value' => 'text',
				'required' => array( 'logo-settings-want-to-use-logo', '=', '1' ),
			),
		)
	) );



	// -> START Header Navigation Row
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header Sticky', 'abogada' ),
		'id'     => 'header-sticky-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-up-alt',
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'header-sticky-enable-on-scroll',
				'type'     => 'switch',
				'title'    => esc_html__( 'Header Fixed/Sticky on Scroll?', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'header-sticky-always-visible-on-scroll',
				'type'     => 'switch',
				'title'    => esc_html__( 'Header Always Visible on Scroll?', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array( 'header-sticky-enable-on-scroll', '=', '1' ),
			),


			array(
				'id'        => 'header-sticky-settings-mobile',
				'type'      => 'info',
				'title'     => esc_html__( 'Header Fixed/Sticky For Mobile', 'abogada' ),
				'notice'    => false,
			),
			array(
				'id'       => 'header-sticky-mobile-enable-on-scroll',
				'type'     => 'switch',
				'title'    => esc_html__( 'Header Fixed/Sticky on Scroll?', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'header-sticky-mobile-always-visible-on-scroll-mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Header Always Visible on Scroll?', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array( 'header-sticky-mobile-enable-on-scroll', '=', '1' ),
			),
			array(
				'id'            => 'logo-settings-maximum-logo-width-in-sticky-mode',
				'type'          => 'slider',
				'title'         => esc_html__( 'Maximum Logo Width(px) in Sticky Mode', 'abogada' ),
				'subtitle'      => esc_html__( 'Enter maximum logo width in px in sticky header mode.', 'abogada' ),
				'desc'          => '',
				'min'           => 20,
				'step'          => 1,
				'max'           => 250,
				'display_value' => 'text',
				'required' => array( 'logo-settings-want-to-use-logo', '=', '1' ),
			),
		)
	) );

	// -> START Header Navigation Row
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Default Header Navigation Row', 'abogada' ),
		'id'     => 'header-navigation-layout',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-up-alt',
		'subsection' => true,
		'fields' => array(

			//Header Visibility Important
			array(
				'id'        => 'header-settings-header-navigation-info-field-important',
				'type'      => 'info',
				'title'     => esc_html__( 'Important!', 'abogada' ),
				'subtitle'  => sprintf( esc_html__( 'As you have chosen %1$sHeader Visibility%2$s to %1$sHide%2$s so there\'s nothing to show here!', 'abogada' ), '<strong>', '</strong>'),
				'notice'    => false,
				'required' => array( 'header-settings-choose-header-visibility', '!=', '1' ),
			),




			array(
				'id'       => 'header-settings-navigation-show-header-nav-row',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Default Header Navigation Row', 'abogada' ),
				'subtitle' => esc_html__( 'Enabling/Disabling this option will show/hide Whole Header Navigation Row section.', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),































































			array(
				'id'       => 'header-settings-header-layout-type-container',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Header Nav Row Container', 'abogada' ),
				'subtitle' => esc_html__( 'Put Header nav content boxed or stretched fullwidth.', 'abogada' ),
				'options'	=> array(
					'container' => esc_html__( 'Container', 'abogada' ),
					'container-fluid' => esc_html__( 'Container Fluid', 'abogada' )
				),
				'default' => 'container',
			),


			array(
				'id'       => 'header-settings-header-layout-floating-bg-shadow',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Header Background Shadow (Header Floating)', 'abogada' ),
				'options'	=> array(
					'header-bg-no-shadow'		=> esc_html__( 'No Shadow', 'abogada' ),
					'header-bg-dark-shadow'		=> esc_html__( 'Dark Background Shadow', 'abogada' ),
					'header-bg-light-shadow'	=> esc_html__( 'Light Background Shadow', 'abogada' ),
				),
				'default' => 'header-bg-no-shadow',
				'required' => array(
					array( 'header-settings-choose-header-layout-type', 'contains', 'header-floating' )
				)
			),


			array(
				'id'       => 'header-settings-header-layout-floating-text-color',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Text Color (Header Floating)', 'abogada' ),
				'options'	=> array(
					'header-floating-bg-dark-text-white'	=> esc_html__( 'White Text', 'abogada' ),
					'header-floating-bg-white-text-dark'		=> esc_html__( 'Dark Text', 'abogada' ),
				),
				'default' => 'header-floating-bg-dark-text-white',
				'required' => array(
					array( 'header-settings-choose-header-layout-type', 'contains', 'header-floating' )
				)
			),

			array(
				'id'       => 'header-settings-header-layout-floating-bg-color-sticky',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Background Color (on Header Floating + Sticky)', 'abogada' ),
				'options'	=> array(
					'header-floating-sticky-bg-white'	=> esc_html__( 'White BG', 'abogada' ),
					'header-floating-sticky-bg-dark'		=> esc_html__( 'Dark BG', 'abogada' ),
				),
				'default' => 'header-floating-sticky-bg-dark',
				'required' => array(
					array( 'header-settings-choose-header-layout-type', 'contains', 'header-floating' )
				)
			),

			array(
				'id'       => 'header-settings-choose-header-layout-type',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Choose Header Layout Type', 'abogada' ),
				'subtitle' => esc_html__( 'Select the type of header you would like to use', 'abogada' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'header-default' => array(
						'alt' => 'Header Default',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/header-layout/header-default.jpg'
					),

					'header-mobile-nav' => array(
						'alt' => 'Mobile Nav',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/header-layout/header-mobile-nav.jpg'
					),
				),
				'default'  => 'header-default',
			),
































			array(
				'id'       => 'header-settings-navigation-bgcolor-use-themecolor',
				'type'     => 'select',
				'title'    => esc_html__( 'Use Theme Color in Background?', 'abogada' ),
				'subtitle' => esc_html__( 'Use theme color or custom bg color in Header Navigation Row', 'abogada' ),
				'desc'     => '',
				'options'  => mascot_core_abogada_theme_color_list(),
				'default'  => '',
			),
			array(
				'id'       => 'header-settings-navigation-custom-bgcolor',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom Background Color', 'abogada' ),
				'subtitle' => esc_html__( 'Pick a custom background color for Header Navigation Row.', 'abogada' ),
				'transparent' => true,
				'required' => array( 'header-settings-navigation-bgcolor-use-themecolor', '=', '' ),
			),



			array(
				'id'        => 'header-settings-navigation-custom-navigation-link-field',
				'type'      => 'info',
				'title'     => esc_html__( 'Cart/Search/Side Push Icons', 'abogada' ),
				'notice'    => false,
			),
			array(
				'id'       => 'header-settings-navigation-custom-navigation-link-n-icon-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Navigation Link and Cart/Search/Side Push Icon Color', 'abogada' ),
				'subtitle' => esc_html__( 'Pick a custom color for link and icons on Header Navigation Row.', 'abogada' ),
				'transparent' => true,
			),
			array(
				'id'       => 'header-settings-navigation-show-menu-cart-icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Cart Icon', 'abogada' ),
				'subtitle' => esc_html__( 'Add Cart Icon on the right hand side of the menu. WooCommerce plugin needs to be installed.', 'abogada' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
			),
			array(
				'id'       => 'header-settings-navigation-show-menu-cart-icon-in-mobile-device',
				'type'     => 'switch',
				'title'    => esc_html__( '|---Show Cart Icon in Mobile Device', 'abogada' ),
				'subtitle' => esc_html__( 'Show/Hide icon in Mobile View', 'abogada' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
				'required' => array( 'header-settings-navigation-show-menu-cart-icon', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-menu-cart-icon-code',
				'type'     => 'text',
				'title'    => esc_html__( 'Cart Icon', 'abogada' ),
				'subtitle' => sprintf( esc_html__( 'You can change the search icon from here. See full list of icons from %1$shere%2$s', 'abogada' ), '<a target="_blank" href="' . esc_url( 'http://docs.kodesolution.info/icons/' ) . '">', '</a>' ),
				'desc'     => '',
				'default'  => 'lnr lnr-icon-cart1',
				'required' => array( 'header-settings-navigation-show-menu-cart-icon', '=', '1' ),
			),


			array(
				'id'       => 'header-settings-navigation-show-menu-search-icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Search Icon', 'abogada' ),
				'subtitle' => esc_html__( 'Add Search Icon on the right hand side of the menu.', 'abogada' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
			),
			array(
				'id'       => 'header-settings-navigation-show-menu-search-icon-in-mobile-device',
				'type'     => 'switch',
				'title'    => esc_html__( '|---Show Search Icon in Mobile Device', 'abogada' ),
				'subtitle' => esc_html__( 'Show/Hide icon in Mobile View', 'abogada' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
				'required' => array( 'header-settings-navigation-show-menu-search-icon', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-menu-search-icon-code',
				'type'     => 'text',
				'title'    => esc_html__( 'Search Icon', 'abogada' ),
				'subtitle' => sprintf( esc_html__( 'You can change the search icon from here. See full list of icons from %1$shere%2$s', 'abogada' ), '<a target="_blank" href="' . esc_url( 'http://docs.kodesolution.info/icons/' ) . '">', '</a>' ),
				'desc'     => '',
				'default'  => 'fa fa-search',
				'required' => array( 'header-settings-navigation-show-menu-search-icon', '=', '1' ),
			),


			array(
				'id'       => 'header-settings-navigation-show-side-push-panel',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Side Push Panel', 'abogada' ),
				'subtitle' => esc_html__( 'Add Side Push Icon on the right hand side of the menu to Enable/Disable Side Push Panel section. You can easily add your widgets to this section from Appearance > Widgets (Side Push Panel Sidebar)', 'abogada' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
			),
			array(
				'id'       => 'header-settings-navigation-show-side-push-panel-in-mobile-device',
				'type'     => 'switch',
				'title'    => esc_html__( '|---Show Side Push Panel Icon in Mobile Device', 'abogada' ),
				'subtitle' => esc_html__( 'Show/Hide icon in Mobile View', 'abogada' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
				'required' => array( 'header-settings-navigation-show-side-push-panel', '=', '1' ),
			),


			//Header Nav - Custom Button
			array(
				'id'        => 'header-settings-navigation-custom-button-info-field',
				'type'      => 'info',
				'title'     => esc_html__( 'Custom Button', 'abogada' ),
				'subtitle'  => esc_html__( 'Add Custom Button on the right hand side of the Header Navigation Row', 'abogada' ),
				'notice'    => false,
			),
			array(
				'id'       => 'header-settings-navigation-show-custom-button',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Custom Button', 'abogada' ),
				'subtitle' => esc_html__( 'Add Custom Button on the right hand side of the Header Navigation Row.', 'abogada' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
			),
			array(
				'id'       => 'header-settings-navigation-show-custom-button-reflect-other-pages',
				'type'     => 'switch',
				'title'    => esc_html__( 'Reflect This Settings in Other Pages too?', 'abogada' ),
				'subtitle' => esc_html__( 'If you enable it then this button will be shown on other header styles chose from Page Settings.', 'abogada' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-info',
				'type'     => 'sortable',
				'title'    => esc_html__( 'Custom Button Info', 'abogada' ),
				'subtitle' => esc_html__( 'Enter your custom button info.', 'abogada' ),
				'desc'     => esc_html__( 'Show a custom button in the Header Navigation Row.', 'abogada' ),
				'label'    => true,
				'options'	=> array(
					'title'  => '',
					'link'   => '',
				),
				'default' => array(
					'title'  => esc_html__( 'Custom Button', 'abogada' ),
					'link'   => '#',
				),
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-design-style',
				'type'     => 'select',
				'title'    => esc_html__( 'Button Design Style', 'abogada' ),
				'desc'     => '',
				'options'	=> array_flip( mascot_core_abogada_get_btn_design_style() ),
				'default'  => 'btn-gray',
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-size',
				'type'     => 'select',
				'title'    => esc_html__( 'Button Size', 'abogada' ),
				'desc'     => '',
				'options'	=> array_flip( mascot_core_abogada_get_button_size() ),
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-flat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Button Flat', 'abogada' ),
				'default'  => 0,
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-outlined',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Button Outlined', 'abogada' ),
				'default'  => 0,
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-round',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Button Round', 'abogada' ),
				'default'  => 0,
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-link-open-in-window',
				'type'     => 'select',
				'title'    => esc_html__( 'Open Link in', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> array(
					'_blank' => esc_html__( 'New Tab', 'abogada' ),
					'_self'  => esc_html__( 'Same Tab', 'abogada' ),
				),
				'default'  => '_blank',
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-show-in-mobile-device',
				'type'     => 'switch',
				'title'    => esc_html__( '|---Show Button in Mobile Device', 'abogada' ),
				'subtitle' => esc_html__( 'Show/Hide icon in Mobile View', 'abogada' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),


			array(
				'id'        => 'header-settings-navigation-color-scheme-info-field',
				'type'      => 'info',
				'title'     => esc_html__( 'Navigation Color Scheme', 'abogada' ),
				'notice'    => false,
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-color-scheme',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Color Scheme', 'abogada' ),
				'subtitle' => esc_html__( 'Select the color scheme of main menu', 'abogada' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'default' => array(
						'alt' => esc_html__( 'Default', 'abogada' ),
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/default.jpg '
					),
					'blue' => array(
						'alt' => esc_html__( 'Blue', 'abogada' ),
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/blue.jpg '
					),
					'green' => array(
						'alt' => esc_html__( 'Green', 'abogada' ),
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/green.jpg '
					),
					'orange' => array(
						'alt' => esc_html__( 'Orange', 'abogada' ),
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/orange.jpg '
					),
					'pink' => array(
						'alt' => esc_html__( 'Pink', 'abogada' ),
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/pink.jpg '
					),
					'purple' => array(
						'alt' => esc_html__( 'Purple', 'abogada' ),
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/purple.jpg '
					),
					'red' => array(
						'alt' => esc_html__( 'Red', 'abogada' ),
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/red.jpg '
					),
					'yellow' => array(
						'alt' => esc_html__( 'Yellow', 'abogada' ),
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/yellow.jpg '
					)
				),
				'default'  => 'default',
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),

			array(
				'id'       => 'header-settings-navigation-primary-effect',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Primary Effect', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> array(
					'fade'  => esc_html__( 'Fade', 'abogada' ),
					'slide' => esc_html__( 'Slide', 'abogada' )
				),
				'default'  => 'slide',
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-css3-animation',
				'type'     => 'button_set',
				'title'    => esc_html__( 'CSS3 Animation', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> array(
					'none'      => esc_html__( 'None', 'abogada' ),
					'zoom-in'   => esc_html__( 'Zoom In', 'abogada' ),
					'zoom-out'  => esc_html__( 'Zoom Out', 'abogada' ),
					'drop-up'   => esc_html__( 'Drop Up', 'abogada' ),
					'drop-left' => esc_html__( 'Drop Left', 'abogada' ),
					'swing'     => esc_html__( 'Swing', 'abogada' ),
					'flip'      => esc_html__( 'Flip', 'abogada' ),
					'roll-in'   => esc_html__( 'Roll In', 'abogada' ),
					'stretch'   => esc_html__( 'Stretch', 'abogada' ),
				),
				'default'  => 'none',
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),


			array(
				'id'       => 'header-settings-navigation-skin',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Navigation Skin', 'abogada' ),
				'subtitle' => esc_html__( 'Select the skin of main menu you would like to use', 'abogada' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'default' => array(
						'alt' => 'default',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/default.jpg'
					),
					'bottom-trace' => array(
						'alt' => 'bottom-trace',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/bottom-trace.jpg'
					),
					'rounded-boxed' => array(
						'alt' => 'rounded-boxed',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/rounded-boxed.jpg'
					),
					'boxed' => array(
						'alt' => 'boxed',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/boxed.jpg'
					),
					'border-boxed' => array(
						'alt' => 'border-boxed',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/border-boxed.jpg'
					),
					'top-bottom-boxed-border' => array(
						'alt' => 'top-bottom-boxed-border',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/top-bottom-boxed-border.jpg'
					),
					'border-left' => array(
						'alt' => 'border-left',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/border-left.jpg'
					),
					'border-top' => array(
						'alt' => 'border-top',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/border-top.jpg'
					),
					'border-bottom' => array(
						'alt' => 'border-bottom',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/border-bottom.jpg'
					),
					'border-top-bottom' => array(
						'alt' => 'border-top-bottom',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/border-top-bottom.jpg'
					),
				),
				'default'  => 'default',
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),


		)
	) );


	// -> START Header Navigation Skin Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header Nav Typography', 'abogada' ),
		'id'     => 'header-header-navigation-skin-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-up-alt',
		'subsection' => true,
		'fields' => array(


			//Header Nav - Navigation Skin
			array(
				'id'        => 'header-settings-navigation-skin-info-field',
				'type'      => 'info',
				'title'     => esc_html__( 'Navigation Skin', 'abogada' ),
				'subtitle'  => esc_html__( 'Select the skin of main menu you would like to use', 'abogada' ),
				'notice'    => false,
				'required'  => array(
					array( 'header-settings-show-header-top', '=', '1' )
				)
			),
			array(
				'id'            => 'header-settings-navigation-item-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Main Nav Items Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'header-settings-navigation-item-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Main Nav Items Hover/Active Color', 'abogada' ),
				'subtitle' => '',
				'transparent' => false,
			),
			array(
				'id'            => 'header-settings-navigation-item-dropdown-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Main Nav Dropdown Items Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'header-settings-navigation-item-dropdown-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Dropdown Items Hover/Active Color', 'abogada' ),
				'subtitle' => '',
				'transparent' => false,
			),


			array(
				'id'            => 'header-settings-navigation-skin-dropdown-menu-width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Dropdown Menu Width(px)', 'abogada' ),
				'subtitle'      => esc_html__( 'Enter width of dropdown menu in px.', 'abogada' ),
				'desc'          => '',
				'default'       => 260,
				'min'           => 150,
				'step'          => 1,
				'max'           => 400,
				'display_value' => 'text',
			),



			array(
				'id'            => 'header-settings-navigation-item-megamenu-dropdown-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Main Nav Megamenu Items Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'header-settings-navigation-item-megamenu-dropdown-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Megamenu Items Hover/Active Color', 'abogada' ),
				'subtitle' => '',
				'transparent' => false,
			),
			array(
				'id'            => 'header-settings-navigation-item-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,
				'right'         => true,
				'bottom'        => true,
				'left'          => true,
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Main Nav Items Padding(px) Around it', 'abogada' ),
			),
		)
	) );





	// -> START Header Menu Megamenu
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Megamenu', 'abogada' ),
		'id'     => 'header-menu-megamenu',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-menu',
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'header-menu-megamenu-enable-megamenu',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Mega Menu', 'abogada' ),
				'subtitle' => sprintf( esc_html__( 'Turn on to enable mega menu. After enabling mega menu, you will get a lot of options for mega menu at %1$sAppearance > Menus%2$s', 'abogada' ), '<strong>', '</strong>'),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),
		)
	) );




	// -> START Page Title Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Page Title', 'abogada' ),
		'id'     => 'page-title-settings',
		'desc'   => esc_html__( 'Enable/Disable Page Title Area for posts and pages.', 'abogada' ),
		'icon'   => 'dashicons-before dashicons-archive',
		'fields' => array(
			array(
				'id'       => 'page-title-settings-enable-page-title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Page Title', 'abogada' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'page-title-settings-choose-page-title-cpt-widget-area',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Page Title (Built with Elementor)', 'abogada' ),
				'subtitle' => sprintf(esc_html__('It will be shown at the top of the page under header. You can create your own one from %s', 'abogada'), '<a href="'.admin_url('edit.php?post_type=page-title').'" target="_blank">Dashboard > Parts - Page Title</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'page-title' ),
					'posts_per_page' => -1,
				),
				'required' => array( 'page-title-settings-enable-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-enable-default-page-title-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Or Enable Default Page Title', 'abogada' ),
				'indent'   => true,
				'required' => array( 'page-title-settings-enable-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-enable-default-page-title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Default Page Title', 'abogada' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array( 'page-title-settings-enable-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-title-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Choose Page Title Layout', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'standard' => array(
						'alt' => 'standard',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/footer/f11.jpg'
					),
					'split' => array(
						'alt' => 'split',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/footer/f7.jpg'
					),
				),
				'default'  => 'standard',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-container',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Title Area Container', 'abogada' ),
				'subtitle' => esc_html__( 'Put Page Title content into boxed or stretched fullwidth.', 'abogada' ),
				'options'	=> array(
					'container' => esc_html__( 'Container', 'abogada' ),
					'container-fluid' => esc_html__( 'Container Fluid', 'abogada' )
				),
				'default' => 'container',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-enable-custom-padding-top-bottom',
				'type'     => 'switch',
				'title'    => esc_html__( 'Add Custom Padding Top & Bottom into Page Title Area', 'abogada' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'             => 'page-title-settings-container-padding-top-bottom',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'all'            => false,
				// Have one field that applies to all
				'top'            => true,     // Disable the top
				'right'          => false,     // Disable the right
				'bottom'         => true,     // Disable the bottom
				'left'           => false,     // Disable the left
				'units'          => 'px',
				'units_extended' => 'true',
				'display_units'  => true,   // Set to false to hide the units if the units are specified
				'title'          => esc_html__( 'Padding Top & Bottom(px)', 'abogada' ),
				'subtitle'       => esc_html__( 'Top and bottom padding in px of page title container.', 'abogada' ),
				'desc'           => esc_html__( 'Controls the top and bottom padding of page title. Ex: 80px, 80px. Please put only integer value. Because the unit \'px\' will be automatically added to the end of the value.', 'abogada' ),
				'default'            => array(
					'padding-top'     => '80',
					'padding-bottom'  => '80',
					'units'          => 'px',
				),
				'required' => array( 'page-title-settings-enable-custom-padding-top-bottom', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-show-title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Title', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disable title on Page Title Area. It is possible to disable them individually using page meta settings.', 'abogada' ),
				'default'  => true,
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-show-subtitle',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Subtitle', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disable Sub title on Page Title Area. It is possible to disable them individually using page meta settings.', 'abogada' ),
				'default'  => true,
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-show-breadcrumbs',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Breadcrumbs', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disable breadcrumbs on Page Title. It is possible to disable them individually using page meta settings.', 'abogada' ),
				'default'  => true,
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-height',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Area Height', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'select2' => array( array( 'minimumResultsForSearch' => 'Infinity' ) ),
				'options'	=> array(
					'padding-default'       => esc_html__( 'Default', 'abogada' ),
					'padding-extra-small'   => esc_html__( 'Extra Small', 'abogada' ),
					'padding-small'         => esc_html__( 'Small', 'abogada' ),
					'padding-medium'        => esc_html__( 'Medium', 'abogada' ),
					'padding-large'         => esc_html__( 'Large', 'abogada' ),
					'padding-extra-large'   => esc_html__( 'Extra Large', 'abogada' ),
				),
				'default'  => 'padding-medium',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-text-color',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Default Text Color', 'abogada' ),
				'desc'     => '',
				'subtitle' => esc_html__( 'Select default text color. Inverted will turn font color to black. Inverted is suitable for white background.', 'abogada' ),
				'options'	=> array(
					'text-default'   => esc_html__( 'Default (Text White)', 'abogada' ),
					'text-inverted'  => esc_html__( 'Inverted (Text Black)', 'abogada' )
				),
				'default' => 'text-default',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-text-align',
				'type'     => 'select',
				'title'    => esc_html__( 'Text Alignment', 'abogada' ),
				'subtitle' => esc_html__( 'Text Alignment of Page Title', 'abogada' ),
				'desc'     => '',
				'options'	=> abogada_redux_text_alignment_list(),
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-top-border-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Title Area Top Border Color', 'abogada' ),
				'subtitle' => '',
				'transparent' => false,
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-bottom-border-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Title Area Bottom Border Color', 'abogada' ),
				'subtitle' => '',
				'transparent' => false,
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),


			//Page Title background
			array(
				'id'       => 'page-title-settings-bg-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Page Title Background', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg',
				'type'     => 'background',
				'title'    => esc_html__( 'Page Title Background', 'abogada' ),
				'subtitle' => esc_html__( 'Choose background image or color.', 'abogada' ),
				'default'  => array(
					'background-repeat'     => 'no-repeat',
					'background-size'       => 'cover',
					'background-attachment' => '',
					'background-position'   => 'center center',
				),
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-layer-overlay-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Add Page Title Background Overlay', 'abogada' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-layer-overlay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Background Overlay Opacity', 'abogada' ),
				'subtitle'      => esc_html__( 'Overlay on background image on Page Title.', 'abogada' ),
				'desc'          => '',
				'default'       => 8,
				'min'           => 1,
				'step'          => 1,
				'max'           => 9,
				'display_value' => 'text',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-layer-overlay-status', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-layer-overlay-color',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Background Overlay Color', 'abogada' ),
				'subtitle' => esc_html__( 'Select Dark or White Overlay on background image.', 'abogada' ),
				'options'	=> array(
					''          	=> esc_html__( 'None', 'abogada' ),
					'dark'          => esc_html__( 'Dark', 'abogada' ),
					'white'         => esc_html__( 'White', 'abogada' ),
					'theme-colored1' => esc_html__( 'Primary Theme Color1', 'abogada' ),
					'theme-colored2' => esc_html__( 'Primary Theme Color2', 'abogada' ),
					'theme-colored3' => esc_html__( 'Primary Theme Color3', 'abogada' ),
					'theme-colored4' => esc_html__( 'Primary Theme Color4', 'abogada' )
				),
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-layer-overlay-status', '=', '1' )
				)
			),

			//background video
			array(
				'id'       => 'page-title-settings-bg-video-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Add Background Video', 'abogada' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-type',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Video Type', 'abogada' ),
				'subtitle' => '',
				'options' => array(
					'youtube' => esc_html__( 'Youtube', 'abogada' ),
					'self-hosted' => esc_html__( 'Self Hosted Video', 'abogada' )
				),
				'default' => 'youtube',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-youtube-id',
				'type'     => 'text',
				'title'    => esc_html__( 'Youtube Video ID', 'abogada' ),
				'subtitle'    => esc_html__( 'Only put video ID not the whole URL.', 'abogada' ),
				'desc'     => '',
				'placeholder'    => esc_html__( 'Example: E5ln4uR4TwQ', 'abogada' ),
				'default' => '',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' ),
					array( 'page-title-settings-bg-video-type', '=', 'youtube' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-self-hosted-video-poster',
				'type'     => 'media',
				'title'    => esc_html__( 'Video Poster', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'url'      => true,
				'readonly' => false,
				'mode'     => false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'  => '',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' ),
					array( 'page-title-settings-bg-video-type', '=', 'self-hosted' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-self-hosted-mp4-video-url',
				'type'     => 'media',
				'title'    => esc_html__( 'MP4 Video URL', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'url'      => true,
				'readonly' => false,
				'mode'     => 'mp4', // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'  => '',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' ),
					array( 'page-title-settings-bg-video-type', '=', 'self-hosted' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-self-hosted-webm-video-url',
				'type'     => 'media',
				'title'    => esc_html__( 'WEBM Video URL', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'url'      => true,
				'readonly' => false,
				'mode'     => 'webm', // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'  => '',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' ),
					array( 'page-title-settings-bg-video-type', '=', 'self-hosted' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-self-hosted-ogv-video-url',
				'type'     => 'media',
				'title'    => esc_html__( 'OGV Video URL', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'url'      => true,
				'readonly' => false,
				'mode'     => 'false', // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'  => '',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' ),
					array( 'page-title-settings-bg-video-type', '=', 'self-hosted' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-section-ends',
				'type'     => 'section',
				'title'    => '',
				'subtitle' => '',
				'indent'   => false, // Indent all options below until the next 'section' option is set.
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
				)
			),



			//animation
			array(
				'id'       => 'page-title-settings-title-animation-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Animation Effect', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-title-animation-effect',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Animation Effect', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_abogada_animate_css_animation_list(),
				'default'  => '',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-title-animation-duration',
				'type'     => 'text',
				'title'    => esc_html__( 'Title Animation Duration', 'abogada' ),
				'subtitle' => '',
				'desc'     => esc_html__( 'Change the animation duration. Example: 1500ms or 1.5s or 0.5s etc. Default 0.5s.', 'abogada' ),
				'placeholder' => esc_html__( '1.5s', 'abogada' ),
				'default'  => '',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-subtitle-animation-effect',
				'type'     => 'select',
				'title'    => esc_html__( 'Sub Title Animation Effect', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_abogada_animate_css_animation_list(),
				'default'  => '',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-subtitle-animation-duration',
				'type'     => 'text',
				'title'    => esc_html__( 'Sub Title Animation Duration', 'abogada' ),
				'subtitle' => '',
				'desc'     => esc_html__( 'Change the animation duration. Example: 1500ms or 1.5s or 0.5s etc. Default 0.5s.', 'abogada' ),
				'placeholder' => esc_html__( '1.5s', 'abogada' ),
				'default'  => '',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-title-animation-ends',
				'type'     => 'section',
				'indent'   => false, // Indent all options below until the next 'section' option is set.
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),



			//section Typography Starts
			array(
				'id'       => 'page-title-settings-title-typography-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Typography', 'abogada' ),
				'subtitle' => esc_html__( 'Define text and styles for Title.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-title-tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Tag', 'abogada' ),
				'subtitle' => esc_html__( 'Choose title element tag', 'abogada' ),
				'desc'     => '',
				'options'	=> mascot_core_abogada_heading_tag_list_all(),
				'default'  => 'h1',
			),
			array(
				'id'            => 'page-title-settings-title-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Title Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'page-title-settings-title-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Title Margin Top & Bottom', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'       => 'page-title-settings-subtitle-tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Subtitle Tag', 'abogada' ),
				'subtitle' => esc_html__( 'Choose subtitle element tag', 'abogada' ),
				'desc'     => '',
				'options'	=> mascot_core_abogada_heading_tag_list_all(),
				'default'  => 'h6',
			),
			array(
				'id'            => 'page-title-settings-subtitle-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Sub Title Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'page-title-settings-subtitle-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Sub Title Margin Top & Bottom', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'            => 'page-title-settings-breadcrumbs-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Breadcrumbs Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'page-title-settings-breadcrumbs-last-child-text-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Breadcrumbs Last Child Text Color', 'abogada' ),
				'subtitle' => '',
				'transparent' => false,
			),
			array(
				'id'       => 'page-title-settings-breadcrumbs-seperator-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Breadcrumbs Seperator Color', 'abogada' ),
				'subtitle' => '',
				'transparent' => false,
			),
			array(
				'id'       => 'page-title-settings-breadcrumbs-link-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Breadcrumbs Link Hover/Active Color', 'abogada' ),
				'subtitle' => '',
				'transparent' => false,
			),
			array(
				'id'       => 'page-title-settings-title-typography-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );



	// -> START Footer
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Footer', 'abogada' ),
		'id'     => 'footer',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-down-alt',
	) );

	// -> START Footer Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Footer Settings', 'abogada' ),
		'id'     => 'footer-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-down-alt2',
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'footer-settings-footer-visibility',
				'type'     => 'switch',
				'title'    => esc_html__( 'Footer Visibility', 'abogada' ),
				'subtitle' => esc_html__( 'Show or hide footer globally', 'abogada' ),
				'default'  => 1,
				'on'       => 'Show',
				'off'      => 'Hide',
			),
			array(
				'id'       => 'footer-settings-enable-default-footer',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Default Footer Widgets(Not Elementor)', 'abogada' ),
				'subtitle' => sprintf(esc_html__('You can customize footer widgets from here %s', 'abogada'), '<a href="'.admin_url('widgets.php').'" target="_blank">Appearance > Widgets</a>'),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'footer-settings-choose-footer-widget-area',
				'type'     => 'select',
				'title'    => esc_html__( 'Or Choose Custom Made Footer (Built with Elementor)', 'abogada' ),
				'subtitle' => sprintf(esc_html__('You can create your own footer from %s', 'abogada'), '<a href="'.admin_url('edit.php?post_type=footer').'" target="_blank">Dashboard > Parts - Footer</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'footer' ),
					'posts_per_page' => -1,
				),
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),
			array(
				'id'       => 'footer-settings-footer-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Footer Background Color', 'abogada' ),
				'subtitle' => esc_html__( 'Controls the background color of Footer.', 'abogada' ),
				'transparent' => false,
			),





			array(
				'id'        => 'footer-settings-footer-top-typography',
				'type'      => 'info',
				'title'     => esc_html__( 'Typography', 'abogada' ),
				'notice'    => false,
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),
			array(
				'id'            => 'footer-settings-footer-top-widget-title-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Widget Title Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),


			array(
				'id'       => 'footer-settings-footer-widget-title-show-line-bottom',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Show Line Bottom Under Widget Title', 'abogada' ),
				'subtitle' => esc_html__( 'If you enable it then a thin line will be visible below the widget title.', 'abogada' ),
				'desc'     => '',
				'default'  => '1',
			),
			array(
				'id'       => 'footer-settings-footer-widget-title-line-bottom-theme-colored',
				'type'     => 'select',
				'title'    => esc_html__( 'Make Line Bottom Theme Colored?', 'abogada' ),
				'subtitle' => esc_html__( 'To make the Line Bottom theme colored, please check it.', 'abogada' ),
				'desc'     => '',
				'options'  => mascot_core_abogada_theme_color_list(),
				'default'  => '1',
				'required' => array( 'footer-settings-footer-widget-title-show-line-bottom', '=', '1' ),
			),
			array(
				'id'       => 'footer-settings-footer-widget-title-line-bottom-custom-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom Line Bottom Color', 'abogada' ),
				'subtitle' => '',
				'transparent' => false,
				'required' => array( 'footer-settings-footer-widget-title-line-bottom-theme-colored', '=', '' ),
			),


			array(
				'id'            => 'footer-settings-footer-top-widget-text-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Widget Text Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),
			array(
				'id'            => 'footer-settings-footer-top-widget-link-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Widget Link Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),
			array(
				'id'       => 'footer-settings-footer-top-widget-link-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Widget Link Hover/Active Color', 'abogada' ),
				'subtitle' => '',
				'transparent' => false,
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),

		)
	) );




	// -> START Blog Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Blog', 'abogada' ),
		'id'     => 'blog-settings-parent',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-media-document',
	) );



	// -> START Blog Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Blog Archive Page', 'abogada' ),
		'id'     => 'blog-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'blog-settings-archive-page-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Default Blog Post Layout for Archive Pages', 'abogada' ),
				'subtitle' => esc_html__( 'Choose a default layout for archive pages', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'standard-1-col' => 'Standard 1 Column Default',
					'standard-1-col-classic' => 'Standard 1 Column Classic',
					'standard-2-col' => 'Standard 2 Columns',
					'standard-3-col' => 'Standard 3 Columns',
					'standard-4-col' => 'Standard 4 Columns',
					'masonry-2-col'  => 'Masonry 2 Columns',
					'masonry-3-col'  => 'Masonry 3 Columns',
					'masonry-4-col'  => 'Masonry 4 Columns',
				),
				'default'  => 'masonry-2-col',
			),
			array(
				'id'       => 'blog-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Layout', 'abogada' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for pages', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'abogada' ),
					'both-sidebar-25-50-25' => esc_html__( 'Sidebar Both Side (1/4 + 2/4 + 1/4)', 'abogada' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'abogada' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'abogada' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'abogada' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'abogada' ),
				),
				'default'  => 'sidebar-right-33',
			),


			array(
				'id'       => 'blog-settings-sidebar-layout-sidebar-default',
				'type'     => 'select',
				'title'    => esc_html__( 'Blog Default Sidebar', 'abogada' ),
				'subtitle' => esc_html__( 'Choose default sidebar that will be displayed on blog archive pages.', 'abogada' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'default-sidebar',
				'required' => array( 'blog-settings-sidebar-layout', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'blog-settings-sidebar-layout-sidebar-two',
				'type'     => 'select',
				'title'    => esc_html__( 'Blog Sidebar 2', 'abogada' ),
				'subtitle' => esc_html__( 'Choose sidebar 2 that will be displayed on blog archive pages. Sidebar 2 will only be used if "Sidebar Both Side" is selected.', 'abogada' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'blog-secondary-sidebar',
				'required' => array( 'blog-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'blog-settings-sidebar-layout-sidebar-two-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Blog Sidebar 2 - Position', 'abogada' ),
				'subtitle' => esc_html__( 'Controls the position of sidebar 2. In that case, default sidebar will be shown on opposite side.', 'abogada' ),
				'options'	=> array(
					'left'      => esc_html__( 'Left', 'abogada' ),
					'right'     => esc_html__( 'Right', 'abogada' )
				),
				'default'  => 'right',
				'required' => array( 'blog-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),


			array(
				'id'       => 'blog-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fullwidth?', 'abogada' ),
				'subtitle' => esc_html__( 'Make the page fullwidth or not.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'            => 'blog-settings-excerpt-length',
				'type'          => 'slider',
				'title'         => esc_html__( 'Excerpt Length', 'abogada' ),
				'subtitle'      => esc_html__( 'Number of words to display in excerpt.', 'abogada' ),
				'desc'          => '',
				'default'       => 22,
				'min'           => 0,
				'step'          => 1,
				'max'           => 500,
				'display_value' => 'text',
			),
			array(
				'id'       => 'blog-settings-show-post-featured-image',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Featured Image', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Featured Image in blog page.', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'blog-settings-post-featured-image-size',
				'type'     => 'select',
				'title'    => esc_html__( 'Featured Image Size', 'abogada' ),
				'subtitle' => esc_html__( 'Featured image size in blog page.', 'abogada' ),
				'desc'     => '',
				'data'     => 'image_sizes',
				'default'  => 'abogada_featured_image',
				'required' => array( 'blog-settings-show-post-featured-image', '=', '1' ),
			),
			array(
				'id'       => 'blog-settings-post-meta',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Post Meta', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide each Post Meta on your page.', 'abogada' ),
				'desc' => '',
				//Must provide key => value pairs for multi checkbox options
				'options'	=> array(
					'show-post-by-author'       => esc_html__( 'Show By Author', 'abogada' ),
					'show-post-date'            => esc_html__( 'Show Date', 'abogada' ),
					'show-post-date-split'      => esc_html__( 'Show Date Split', 'abogada' ),
					'show-post-category'        => esc_html__( 'Show Category', 'abogada' ),
					'show-post-comments-count'  => esc_html__( 'Show Comments Count', 'abogada' ),
					'show-post-tag'             => esc_html__( 'Show Tag', 'abogada' ),
					'show-post-like-button'     => esc_html__( 'Show Like Button', 'abogada' ),
				),
				//See how std has changed? you also don't need to specify opts that are 0.
				'default'  => array(
					'show-post-by-author' => '1',
					'show-post-date' => '1',
					'show-post-date-split' => '0',
					'show-post-category' => '1',
					'show-post-comments-count' => '0',
					'show-post-tag' => '0',
					'show-post-like-button' => '0'
				)
			),
			array(
				'id'       => 'blog-settings-show-pagination',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Pagination', 'abogada' ),
				'subtitle' => esc_html__( 'Enabling this option will show comments on your page.', 'abogada' ),
				'default'  => true,
			),
		)
	) );



	// -> START Single Post Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Single Post', 'abogada' ),
		'id'     => 'blog-single-post-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'blog-single-post-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fullwidth?', 'abogada' ),
				'subtitle' => esc_html__( 'Make the page fullwidth or not.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'blog-single-post-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Layout', 'abogada' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for pages', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'abogada' ),
					'both-sidebar-25-50-25' => esc_html__( 'Sidebar Both Side (1/4 + 2/4 + 1/4)', 'abogada' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'abogada' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'abogada' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'abogada' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'abogada' ),
				),
				'default'  => 'sidebar-right-33',
			),



			array(
				'id'       => 'blog-single-post-settings-sidebar-layout-sidebar-default',
				'type'     => 'select',
				'title'    => esc_html__( 'Default Sidebar', 'abogada' ),
				'subtitle' => esc_html__( 'Choose default sidebar that will be displayed on blog single pages.', 'abogada' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'default-sidebar',
				'required' => array( 'blog-single-post-settings-sidebar-layout', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'blog-single-post-settings-sidebar-layout-sidebar-two',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar 2', 'abogada' ),
				'subtitle' => esc_html__( 'Choose sidebar 2 that will be displayed on blog single pages. Sidebar 2 will only be used if "Sidebar Both Side" is selected.', 'abogada' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'blog-secondary-sidebar',
				'required' => array( 'blog-single-post-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'blog-single-post-settings-sidebar-layout-sidebar-two-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Sidebar 2 - Position', 'abogada' ),
				'subtitle' => esc_html__( 'Controls the position of sidebar 2. In that case, default sidebar will be shown on opposite side.', 'abogada' ),
				'options'	=> array(
					'left'      => esc_html__( 'Left', 'abogada' ),
					'right'     => esc_html__( 'Right', 'abogada' )
				),
				'default'  => 'right',
				'required' => array( 'blog-single-post-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),



			array(
				'id'       => 'blog-single-post-settings-show-post-featured-image',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Featured Image', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Featured Image in blog page.', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'            => 'blog-single-post-settings-featured-image-height',
				'type'          => 'slider',
				'title'         => esc_html__( 'Featured Image Height(px)', 'abogada' ),
				'subtitle'      => esc_html__( 'Set height for featured image displayed on your blog single page.', 'abogada' ),
				'desc'          => '',
				'default'       => 600,
				'min'           => 0,
				'step'          => 1,
				'max'           => 1200,
				'display_value' => 'text',
			),
			array(
				'id'       => 'blog-single-post-settings-enable-drop-caps',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Drop Caps', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling Drop Caps for the first letter of post content.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'blog-single-post-settings-post-meta',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Post Meta', 'abogada' ),
				'subtitle'     => esc_html__( 'Enable/Disabling this option will show/hide each Post Meta on your page.', 'abogada' ),
				'desc' => '',
				//Must provide key => value pairs for multi checkbox options
				'options'	=> array(
					'show-post-by-author'       => esc_html__( 'Show By Author', 'abogada' ),
					'show-post-date'            => esc_html__( 'Show Date', 'abogada' ),
					'show-post-date-split'      => esc_html__( 'Show Date Split', 'abogada' ),
					'show-post-category'        => esc_html__( 'Show Category', 'abogada' ),
					'show-post-comments-count'  => esc_html__( 'Show Comments Count', 'abogada' ),
					'show-post-like-button'     => esc_html__( 'Show Like Button', 'abogada' ),
				),
				//See how std has changed? you also don't need to specify opts that are 0.
				'default'  => array(
					'show-post-by-author' => '1',
					'show-post-date' => '1',
					'show-post-date-split' => '0',
					'show-post-category' => '1',
					'show-post-comments-count' => '1',
					'show-post-like-button' => '0'
				)
			),
			array(
				'id'       => 'blog-single-post-settings-show-tags',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Tags', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide tags on your page.', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'blog-single-post-settings-show-share',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Social Share', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide share options on your page.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),


			//section Next/Previous Navigation Link Starts
			array(
				'id'       => 'blog-single-post-settings-show-next-pre-post-link-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Next/Previous Navigation Link', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'blog-single-post-settings-show-next-pre-post-link',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Next/Previous Single Post Navigation Link', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide link for Next & Previous Posts.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'blog-single-post-settings-show-next-pre-post-link-within-same-cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Navigation Link Within Same Category', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide link to the next/previous post within the same category as the current post.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array( 'blog-single-post-settings-show-next-pre-post-link', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-show-next-pre-post-link-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section Author Info Box
			array(
				'id'       => 'blog-single-post-settings-author-info-box-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Author Info Box', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'blog-single-post-settings-author-info-box',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Author Info Box', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Author Info Box on your page.', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'blog-single-post-settings-author-info-box-show-social-icons',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Social Icons', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array( 'blog-single-post-settings-author-info-box', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-author-info-box-show-author-email',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Author Email', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array( 'blog-single-post-settings-author-info-box', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-author-info-box-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),




			//section Related Posts Starts
			array(
				'id'       => 'blog-single-post-settings-related-posts-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Related Posts', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Related Posts List/Carousel on your page.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'blog-single-post-settings-show-related-posts',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Related Posts', 'abogada' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'blog-single-post-settings-show-related-posts-carousel',
				'type'     => 'switch',
				'title'    => esc_html__( 'Carousel?', 'abogada' ),
				'subtitle' => esc_html__( 'Make it carousel or grid', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array( 'blog-single-post-settings-show-related-posts', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-show-related-posts-count',
				'type'     => 'text',
				'title'    => esc_html__( 'Number of Posts', 'abogada' ),
				'subtitle' => '',
				'desc'     => esc_html__( 'Enter number of posts to display. Default 3', 'abogada' ),
				'default'  => '3',
				'required' => array( 'blog-single-post-settings-show-related-posts', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-related-posts-show-excerpt',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Excerpt', 'abogada' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array( 'blog-single-post-settings-show-related-posts', '=', '1' ),
			),
			array(
				'id'            => 'blog-single-post-settings-show-related-posts-excerpt-length',
				'type'          => 'slider',
				'title'         => esc_html__( 'Excerpt Length', 'abogada' ),
				'subtitle'      => esc_html__( 'Number of words to display in excerpt.', 'abogada' ),
				'desc'          => '',
				'default'       => 20,
				'min'           => 0,
				'step'          => 1,
				'max'           => 200,
				'display_value' => 'text',
				'required' => array( 'blog-single-post-settings-show-related-posts-excerpt', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-related-posts-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),



			//section Show Comments Starts
			array(
				'id'       => 'blog-single-post-settings-comments-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Comments', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Comments on your page.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'blog-single-post-settings-show-comments',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Comments', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'blog-single-post-settings-comments-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),

		)
	) );



	// -> START Single Post Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Other Settings', 'abogada' ),
		'id'     => 'blog-other-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'blog-other-settings-show-blog-title-description',
				'type'     => 'switch',
				'title'    => esc_html__( 'Custom Blog Title & Description', 'abogada' ),
				'subtitle' => esc_html__( 'Add title and description in title section of blog page', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'blog-other-settings-blog-title-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Blog Title Text', 'abogada' ),
				'desc'     => '',
				'default'  => esc_html__( 'News', 'abogada' ),
				'required' => array( 'blog-other-settings-show-blog-title-description', '=', '1' ),
			),
			array(
				'id'       => 'blog-other-settings-blog-description-text',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Blog Description Text', 'abogada' ),
				'desc'     => '',
				'default'  => '',
				'required' => array( 'blog-other-settings-show-blog-title-description', '=', '1' ),
			)
		)
	) );




	// -> START Shop Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Woocommerce Shop', 'abogada' ),
		'id'     => 'shop-settings-parent',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-cart',
	) );



	// -> START Shop Archive Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Shop Archive/Category Layout', 'abogada' ),
		'id'     => 'shop-archive-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'shop-archive-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Page Fullwidth?', 'abogada' ),
				'subtitle' => esc_html__( 'Make the shop page fullwidth or not.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'shop-archive-settings-sidebar-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Sidebar Position', 'abogada' ),
				'subtitle' => esc_html__( 'Controls the position of shop sidebar.', 'abogada' ),
				'options'	=> array(
					'left'          => esc_html__( 'Left', 'abogada' ),
					'right'         => esc_html__( 'Right', 'abogada' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'abogada' )
				),
				'default'  => 'no-sidebar',
			),
			array(
				'id'       => 'shop-archive-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Layout', 'abogada' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for shop page', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'3'      => esc_html__( 'Sidebar 1/4', 'abogada' ),
					'4'      => esc_html__( 'Sidebar 1/3', 'abogada' ),
				),
				'default'  => '4',
				'required' => array( 'shop-archive-settings-sidebar-position', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'shop-archive-settings-sidebar-choose',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Sidebar', 'abogada' ),
				'subtitle' => esc_html__( 'Choose sidebar that will be displayed on shop page.', 'abogada' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'shop_sidebar',
				'required' => array( 'shop-archive-settings-sidebar-position', '!=', 'no-sidebar' ),
			),




			array(
				'id'       => 'shop-layout-settings-select-shop-catalog-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Shop Catalog Layout', 'abogada' ),
				'subtitle' => esc_html__( 'Select the type of layout you would like to display.', 'abogada' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'default' => array(
						'alt' => 'Default',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/shop/type/default.png'
					),
					'classic' => array(
						'alt' => 'Classic',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/shop/type/classic.png'
					),
				),
				'default'  => 'default'
			),

			array(
				'id'       => 'shop-layout-settings-select-shop-layout-mode',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Shop Layout Mode (FitRows Or Masonry)', 'abogada' ),
				'subtitle' => esc_html__( 'You can position items with different layout modes. Select a layout mode you would like to use.', 'abogada' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'fitrows' => array(
						'alt' => 'Fit Rows',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/shop/layout-mode/fitrows.png'
					),
					'masonry' => array(
						'alt' => 'Masonry',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/shop/layout-mode/masonry.png'
					),
				),
				'default'  => 'fitrows'
			),


			array(
				'id'       => 'shop-archive-settings-products-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Products Per Row', 'abogada' ),
				'subtitle'    => esc_html__( 'Select your default column structure for your shop items.', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'  => '4',
			),
			array(
				'id'            => 'shop-archive-settings-products-per-page',
				'type'          => 'slider',
				'title'         => esc_html__( 'Number of Products Per Page', 'abogada' ),
				'subtitle'      => esc_html__( 'Controls the number of items to display on shop archive pages. Set to -1 to display all. Set to 0 to use the number of posts from Settings > Reading.', 'abogada' ),
				'desc'          => '',
				'default'       => 8,
				'min'           => -1,
				'step'          => 1,
				'max'           => 100,
				'display_value' => 'text',
			),
			array(
				'id'            => 'shop-archive-settings-products-per-page-dropdown-options',
				'type'          => 'text',
				'title'         => esc_html__( 'WooCommerce Products Per Page Dropdown', 'abogada' ),
				'subtitle'      => esc_html__( 'List of options products per page to show into the select dropdown menu.', 'abogada' ),
				'desc'         => esc_html__( 'Seperated by spaces', 'abogada' ),
				'default'       => '8 16 32 64',
			),
			array(
				'id'            => 'shop-archive-settings-gutter-size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Shop Column Spacing (Gutter Size) px', 'abogada' ),
				'subtitle'      => esc_html__( 'Controls column spacing or gutter size between items on shop archive pages.', 'abogada' ),
				'desc'          => '',
				'default'       => 20,
				'min'           => 0,
				'step'          => 1,
				'max'           => 250,
				'display_value' => 'text',
			),
			array(
				'id'       => 'shop-archive-settings-products-thumb-type',
				'type'     => 'select',
				'title'    => esc_html__( 'Product Thumbnail Type', 'abogada' ),
				'subtitle'    => esc_html__( 'Select your preferred style for your WooCommmerce product thumbnail.', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'image-featured'  => 'Featured Image',
					'image-swap'  => 'Image Swap',
					'image-gallery'  => 'Gallery Images',
				),
				'default'  => 'image-swap',
			),
		)
	) );



	// -> START Shop Single Product Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Shop Single Product', 'abogada' ),
		'id'     => 'shop-single-product-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'shop-single-product-settings-enable-page-title',
				'type'     => 'select',
				'title'    => esc_html__( 'Enable Shop Single Page Title', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'default'     => esc_html__( 'Default', 'abogada' ),
					'yes'     => esc_html__( 'Yes', 'abogada' ),
					'no'    => esc_html__( 'No', 'abogada' ),
				),
				'default'  => 'default',
			),
			array(
				'id'       => 'shop-single-product-settings-custom-page-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Custom Shop Single Page Title', 'abogada' ),
				'subtitle' => esc_html__( 'Enter the text that will be appeared as page title of product details page', 'abogada' ),
				'desc'     => '',
				'default'  => esc_html__( 'Shop', 'abogada' ),
			),
			array(
				'id'       => 'shop-single-product-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Page Fullwidth?', 'abogada' ),
				'subtitle' => esc_html__( 'Make the single product page fullwidth or not.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'shop-single-product-settings-sidebar-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Sidebar Position', 'abogada' ),
				'subtitle' => esc_html__( 'Controls the sidebar position of shop single product page.', 'abogada' ),
				'options'	=> array(
					'left'          => esc_html__( 'Left', 'abogada' ),
					'right'         => esc_html__( 'Right', 'abogada' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'abogada' )
				),
				'default'  => 'no-sidebar',
			),
			array(
				'id'       => 'shop-single-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Layout', 'abogada' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for shop page', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'3'      => esc_html__( 'Sidebar 1/4', 'abogada' ),
					'4'      => esc_html__( 'Sidebar 1/3', 'abogada' ),
				),
				'default'  => '4',
				'required' => array( 'shop-single-product-settings-sidebar-position', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'shop-single-product-settings-sidebar-choose',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Sidebar', 'abogada' ),
				'subtitle' => esc_html__( 'Choose sidebar that will be displayed on shop page.', 'abogada' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'shop_sidebar',
				'required' => array( 'shop-single-product-settings-sidebar-position', '!=', 'no-sidebar' ),
			),



			array(
				'id'       => 'shop-single-product-settings-select-single-catalog-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Product Details Layout', 'abogada' ),
				'subtitle' => esc_html__( 'Select the type of layout you would like to display.', 'abogada' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'image-with-thumb' => array(
						'alt' => 'image-with-thumb',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/shop/single-layout/image-with-thumb.png'
					),
					'plain-image' => array(
						'alt' => 'plain-image',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/shop/single-layout/plain-image.png'
					),
					'sticky-side-text' => array(
						'alt' => 'sticky-side-text',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/shop/single-layout/sticky-side-text.png'
					),
				),
				'default'  => 'image-with-thumb'
			),



			array(
				'id'       => 'shop-single-product-settings-product-images-column-width',
				'type'     => 'select',
				'title'    => esc_html__( 'Product Images Column Width', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'4'     => esc_html__( 'Small - 4/12', 'abogada' ),
					'5'     => esc_html__( 'Medium - 5/12', 'abogada' ),
					'6'     => esc_html__( 'Large - 6/12', 'abogada' ),
					'8'     => esc_html__( 'Extra Large - 8/12', 'abogada' ),
				),
				'default'  => '6',
			),
			array(
				'id'       => 'shop-single-product-settings-product-images-align',
				'type'     => 'select',
				'title'    => esc_html__( 'Product Images Alignment', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'left'     => esc_html__( 'Left', 'abogada' ),
					'right'    => esc_html__( 'Right', 'abogada' ),
				),
				'default'  => 'left',
			),

			array(
				'id'       => 'shop-single-product-settings-enable-gallery-slider',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Image Gallery Slider Feature', 'abogada' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array( 'shop-single-product-settings-select-single-catalog-layout', '=', 'image-with-thumb' ),
			),
			array(
				'id'       => 'shop-single-product-settings-enable-gallery-lightbox',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Image Gallery Lightbox Feature', 'abogada' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'shop-single-product-settings-enable-gallery-zoom',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Image Gallery Zoom Feature', 'abogada' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),



			array(
				'id'       => 'shop-single-product-settings-show-product-title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Product Title', 'abogada' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'shop-single-product-settings-title-tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Single Product Title Tag', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_abogada_heading_tag_list_all(),
				'default'  => 'h3',
			),
			array(
				'id'       => 'shop-single-product-settings-enable-product-meta',
				'type'     => 'switch',
				'title'    => esc_html__( 'Product Meta', 'abogada' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'shop-single-product-settings-enable-sharing',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Sharing', 'abogada' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),


			//section Related Posts Starts
			array(
				'id'       => 'shop-single-product-settings-related-products-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Related Products', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Related Products List/Carousel on your page.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'shop-single-product-settings-related-products-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Related Products Columns', 'abogada' ),
				'subtitle' => esc_html__( 'Set number of columns for related and upsells products only', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'  => '4',
			),
			array(
				'id'            => 'shop-single-product-settings-related-products-count',
				'type'          => 'text',
				'title'         => esc_html__( 'Related Products Count', 'abogada' ),
				'subtitle'      => esc_html__( 'Number of related products shown on single product page. Enter "0" to disable.', 'abogada' ),
				'default'       => '4',
			),

			array(
				'id'       => 'shop-single-product-settings-related-products-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );



	// -> START WooCommerce Styling Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'WooCommerce Styling', 'abogada' ),
		'id'     => 'woocommerce-styling-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'woocommerce-styling-product-price-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Product Price Color', 'abogada' ),
				'subtitle' => esc_html__( 'Select your custom color for product price.', 'abogada' ),
				'transparent' => false,
			),
			array(
				'id'       => 'woocommerce-styling-product-on-sale-tag-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'On Sale Tag Background Color', 'abogada' ),
				'subtitle' => esc_html__( 'Select your custom background color for on-sale tag.', 'abogada' ),
				'transparent' => true,
			),
			array(
				'id'       => 'shop-single-product-settings-enable-floating-woocart-sidebar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Floating Cart Sidebar', 'abogada' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
		)
	) );



	// -> START Side Push Panel Sidebar
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Side Push Panel Sidebar', 'abogada' ),
		'id'     => 'header-side-push-panel-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-menu-alt2',
		'fields' => array(


			array(
				'id'       => 'header-settings-choose-side-push-panel-cpt-widget-area',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Pre Made Side Push Panel Area (Built with Elementor)', 'abogada' ),
				'subtitle' => sprintf(esc_html__('You can create your own one from %s', 'abogada'), '<a href="'.admin_url('edit.php?post_type=side-push-panel').'" target="_blank">Dashboard > Parts - Side Push Panel</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'side-push-panel' ),
					'posts_per_page' => -1,
				),
			),

			array(
				'id'       		=> 'header-settings-navigation-side-push-panel-width',
				'type'          => 'slider',
				'title'    		=> esc_html__( 'Side Push Panel Width', 'abogada' ),
				'subtitle' 		=> esc_html__( 'Default: 380px', 'abogada' ),
				'desc'          => '',
				'default'       => 380,
				'min'           => 100,
				'step'          => 1,
				'max'           => 1000,
				'display_value' => 'text',
			),
			array(
				'id'       => 'header-settings-navigation-side-push-panel-bgimg',
				'type'     => 'background',
				'title'    => esc_html__( 'Background of Side Push Panel', 'abogada' ),
				'default'  => array(
					'background-repeat'     => 'no-repeat',
					'background-size'       => 'cover',
					'background-attachment' => '',
					'background-position'   => 'left bottom',
					'background-image'      => '',
				),
			),

			array(
				'id'       => 'header-settings-navigation-side-push-panel-center-content',
				'type'     => 'switch',
				'title'    => esc_html__( 'Center Content', 'abogada' ),
				'subtitle' => esc_html__( 'Center the content of Side Push Panel area.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),

			array(
				'id'       => 'header-settings-navigation-side-push-panel-widget-title-show-line-bottom',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Show Line Bottom Under Widget Title', 'abogada' ),
				'subtitle' => esc_html__( 'If you enable it then a thin line will be visible below the widget title.', 'abogada' ),
				'desc'     => '',
				'default'  => '0',
			),
			array(
				'id'       => 'header-settings-navigation-side-push-panel-widget-title-line-bottom-theme-colored',
				'type'     => 'select',
				'title'    => esc_html__( 'Make Line Bottom Theme Colored?', 'abogada' ),
				'subtitle' => esc_html__( 'To make the Line Bottom theme colored, please check it.', 'abogada' ),
				'desc'     => '',
				'options'  => mascot_core_abogada_theme_color_list(),
				'default'  => '1',
				'required' => array( 'header-settings-navigation-side-push-panel-widget-title-show-line-bottom', '=', '1' ),
			),


			array(
				'id'       => 'header-settings-navigation-side-push-panel-layer-overlay-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Background Overlay', 'abogada' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'header-settings-navigation-side-push-panel-layer-overlay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Background Overlay Opacity', 'abogada' ),
				'subtitle'      => esc_html__( 'Overlay on background image.', 'abogada' ),
				'desc'          => '',
				'default'       => 8,
				'min'           => 1,
				'step'          => 1,
				'max'           => 9,
				'display_value' => 'text',
				'required' => array(
					array( 'header-settings-navigation-side-push-panel-layer-overlay-status', '=', '1' )
				)
			),
			array(
				'id'       => 'header-settings-navigation-side-push-panel-layer-overlay-color',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Background Overlay Color', 'abogada' ),
				'subtitle' => esc_html__( 'Select Dark or White Overlay on background image.', 'abogada' ),
				'options'	=> array(
					''          	=> esc_html__( 'None', 'abogada' ),
					'dark'          => esc_html__( 'Dark', 'abogada' ),
					'white'         => esc_html__( 'White', 'abogada' ),
					'theme-colored1' => esc_html__( 'Primary Theme Color1', 'abogada' ),
					'theme-colored2' => esc_html__( 'Primary Theme Color2', 'abogada' ),
					'theme-colored3' => esc_html__( 'Primary Theme Color3', 'abogada' ),
					'theme-colored4' => esc_html__( 'Primary Theme Color4', 'abogada' )
				),
				'default' => 'white',
			),



		)
	) );



	// -> START Page Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Page', 'abogada' ),
		'id'     => 'page-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-media-default',
		'fields' => array(
			array(
				'id'       => 'page-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Page Sidebar Layout', 'abogada' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for pages', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'abogada' ),
					'both-sidebar-25-50-25' => esc_html__( 'Sidebar Both Side (1/4 + 2/4 + 1/4)', 'abogada' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'abogada' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'abogada' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'abogada' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'abogada' ),

				),
				'default'  => 'no-sidebar',
			),
			array(
				'id'       => 'page-settings-sidebar-layout-sidebar-default',
				'type'     => 'select',
				'title'    => esc_html__( 'Page Default Sidebar', 'abogada' ),
				'subtitle' => esc_html__( 'Choose default sidebar that will be displayed on pages.', 'abogada' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar',
				'required' => array( 'page-settings-sidebar-layout', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'page-settings-sidebar-layout-sidebar-two',
				'type'     => 'select',
				'title'    => esc_html__( 'Page Sidebar 2', 'abogada' ),
				'subtitle' => esc_html__( 'Choose sidebar 2 that will be displayed on pages. Sidebar 2 will only be used if "Sidebar Both Side" is selected.', 'abogada' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar-two',
				'required' => array( 'page-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'page-settings-sidebar-layout-sidebar-two-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Page Sidebar 2 - Position', 'abogada' ),
				'subtitle' => esc_html__( 'Controls the position of sidebar 2. In that case, default sidebar will be shown on opposite side.', 'abogada' ),
				'options'	=> array(
					'left'      => esc_html__( 'Left', 'abogada' ),
					'right'     => esc_html__( 'Right', 'abogada' )
				),
				'default'  => 'right',
				'required' => array( 'page-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'page-settings-show-comments',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Page Comments', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disable comments on all pages except the post pages. It is possible to disable them individually using page meta settings.', 'abogada' ),
				'default'  => true,
			),
			array(
				'id'       => 'page-settings-show-share',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Social Share', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide share options on your page.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
		)
	) );



	// -> START Preloader Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Preloader', 'abogada' ),
		'id'     => 'preloader-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-clock',
		'fields' => array(
			array(
				'id'       => 'general-settings-enable-page-preloader-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Page Preloader Settings', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disable Page Preloader.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'general-settings-enable-page-preloader',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Page Preloader', 'abogada' ),
				'subtitle' => esc_html__( 'Enabling this option will show page preloader.', 'abogada' ),
				'default'  => false,
			),
			array(
				'id'        => 'general-settings-page-preloading-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Preloading Text', 'abogada' ),
				'subtitle' => esc_html__( 'Enter the text that will be appeared as Preloader Text.', 'abogada' ),
				'desc'     => '',
				'default'    => esc_html__( 'Loading', 'abogada' ),
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'            => 'general-settings-page-preloading-text-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Preloading Text Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'       => 'general-settings-page-preloading-text-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Preloading Text Color', 'abogada' ),
				'transparent' => false,
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'        => 'general-settings-page-preloader-type',
				'type'      => 'button_set',
				'compiler'  => true,
				'title'     => esc_html__( 'Page Preloader Image Type', 'abogada' ),
				'subtitle'  => esc_html__( 'Select preloader type', 'abogada' ),
				'options'   => array(
					'upload-preloader'    => esc_html__( 'Upload Gif', 'abogada' ),
					'css-preloader'    => esc_html__( 'CSS Preloader', 'abogada' ),
					'gif-preloader'    => esc_html__( 'Predefined Gif Preloader', 'abogada' ),
				),
				'default'   => 'css-preloader',
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'       => 'general-settings-page-preloading-image',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Upload Gif Preloading Image', 'abogada' ),
				'subtitle' => esc_html__( 'Upload/choose preloader image', 'abogada' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => ABOGADA_ASSETS_URI . '/images/logo/logo-wide.png' ),
				'required' => array( 'general-settings-page-preloader-type', '=', 'upload-preloader' ),
			),
			array(
				'id'            => 'general-settings-page-preloading-image-width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Maximum Image Width(px)', 'abogada' ),
				'subtitle'      => esc_html__( 'Enter maximum image width in px.', 'abogada' ),
				'desc'          => '',
				'default'       => 100,
				'min'           => 20,
				'step'          => 1,
				'max'           => 200,
				'display_value' => 'text',
				'required' => array( 'general-settings-page-preloader-type', '=', 'upload-preloader' ),
			),
			array(
				'id'        => 'general-settings-page-preloading-image-animate',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Animate Preloading Image', 'abogada' ),
				'desc'     => '',
				'default'  => '1',
				'required' => array( 'general-settings-page-preloader-type', '=', 'upload-preloader' ),
			),
			array(
				'id'        => 'general-settings-page-preloader-type-css',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose CSS Preloader', 'abogada' ),
				'subtitle' => esc_html__( 'Choose Predefined CSS Preloader.', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'preloader-bubblingG'           => esc_html__( 'Bubbling', 'abogada' ),
					'preloader-circle-loading-wrapper' => esc_html__( 'Circle Loading', 'abogada' ),
					'preloader-coffee'              => esc_html__( 'Coffee', 'abogada' ),
					'preloader-battery'             => esc_html__( 'Battery', 'abogada' ),
					'preloader-dot-circle-rotator'  => esc_html__( 'Dot Circle Rotator', 'abogada' ),
					'preloader-dot-loading'         => esc_html__( 'Dot Loading', 'abogada' ),
					'preloader-double-torus'        => esc_html__( 'Double Torus', 'abogada' ),
					'preloader-equalizer'           => esc_html__( 'Equalizer', 'abogada' ),
					'preloader-floating-circles'    => esc_html__( 'Floating Circles', 'abogada' ),
					'preloader-fountainTextG'       => esc_html__( 'Fountain Text', 'abogada' ),
					'preloader-jackhammer'          => esc_html__( 'Jackhammer', 'abogada' ),
					'preloader-loading-wrapper'     => esc_html__( 'Loading', 'abogada' ),
					'preloader-orbit-loading'       => esc_html__( 'Orbit Loading', 'abogada' ),
					'preloader-speeding-wheel'      => esc_html__( 'Speeding Wheel', 'abogada' ),
					'preloader-square-swapping'     => esc_html__( 'Square Swapping', 'abogada' ),
					'preloader-tube-tunnel'         => esc_html__( 'Tube Tunnel', 'abogada' ),
					'preloader-whirlpool'           => esc_html__( 'Whirlpool', 'abogada' ),
				),
				'default'  => 'preloader-dot-loading',
				'required' => array( 'general-settings-page-preloader-type', '=', 'css-preloader' ),
			),
			array(
				'id'        => 'general-settings-page-preloader-type-gif',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Gif Icon Preloader', 'abogada' ),
				'subtitle' => esc_html__( 'Choose Predefined Gif Icon Preloader.', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					ABOGADA_ADMIN_ASSETS_URI . '/images/preloaders/1.gif'  =>  'preloader-1',
					ABOGADA_ADMIN_ASSETS_URI . '/images/preloaders/2.gif'  =>  'preloader-2',
					ABOGADA_ADMIN_ASSETS_URI . '/images/preloaders/3.gif'  =>  'preloader-3',
					ABOGADA_ADMIN_ASSETS_URI . '/images/preloaders/4.gif'  =>  'preloader-4',
					ABOGADA_ADMIN_ASSETS_URI . '/images/preloaders/5.gif'  =>  'preloader-5',
					ABOGADA_ADMIN_ASSETS_URI . '/images/preloaders/6.gif'  =>  'preloader-6',
					ABOGADA_ADMIN_ASSETS_URI . '/images/preloaders/7.gif'  =>  'preloader-7',
					ABOGADA_ADMIN_ASSETS_URI . '/images/preloaders/8.gif'  =>  'preloader-8',
					ABOGADA_ADMIN_ASSETS_URI . '/images/preloaders/9.gif'  =>  'preloader-9',
					ABOGADA_ADMIN_ASSETS_URI . '/images/preloaders/10.gif' =>  'preloader-10',
				),
				'default'  => ABOGADA_ADMIN_ASSETS_URI . '/images/preloaders/1.gif',
				'required' => array( 'general-settings-page-preloader-type', '=', 'gif-preloader' ),
			),
			array(
				'id'       => 'general-settings-page-preloader-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Preloader Whole Background Color', 'abogada' ),
				'transparent' => false,
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'        => 'general-settings-page-preloader-show-disable-button',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Show Disable Preloader Button', 'abogada' ),
				'subtitle'    => esc_html__( 'Show Disable Preloader Button at the corner of the screen.', 'abogada' ),
				'desc'     => '',
				'default'  => '1',
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'        => 'general-settings-page-preloader-show-disable-button-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Disable Preloader Button Text', 'abogada' ),
				'subtitle' => esc_html__( 'Enter the text that will be appeared into the Disable Preloader Button.', 'abogada' ),
				'desc'     => '',
				'default'    => esc_html__( 'Disable Preloader', 'abogada' ),
				'required' => array( 'general-settings-page-preloader-show-disable-button', '=', '1' ),
			),
			array(
				'id'       => 'general-settings-enable-page-preloader-ends',
				'type'     => 'section',
				'indent'   => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );



	// -> START Portfolio Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Portfolio', 'abogada' ),
		'id'     => 'portfolio-settings-parent',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-format-gallery',
	) );



	// -> START Portfolio Layout Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Portfolio Archive Layout', 'abogada' ),
		'id'     => 'portfolio-layout-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'portfolio-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Portfolio Sidebar Layout', 'abogada' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for portfolio pages', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'abogada' ),
					'both-sidebar-25-50-25' => esc_html__( 'Sidebar Both Side (1/4 + 2/4 + 1/4)', 'abogada' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'abogada' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'abogada' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'abogada' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'abogada' ),

				),
				'default'  => 'no-sidebar',
			),
			array(
				'id'       => 'portfolio-settings-sidebar-layout-sidebar-default',
				'type'     => 'select',
				'title'    => esc_html__( 'Portfolio Default Sidebar', 'abogada' ),
				'subtitle' => esc_html__( 'Choose default sidebar that will be displayed on portfolio pages.', 'abogada' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar',
				'required' => array( 'portfolio-settings-sidebar-layout', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'portfolio-settings-sidebar-layout-sidebar-two',
				'type'     => 'select',
				'title'    => esc_html__( 'Portfolio Sidebar 2', 'abogada' ),
				'subtitle' => esc_html__( 'Choose sidebar 2 that will be displayed on portfolio pages. Sidebar 2 will only be used if "Sidebar Both Side" is selected.', 'abogada' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar-two',
				'required' => array( 'portfolio-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'portfolio-settings-sidebar-layout-sidebar-two-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Portfolio Sidebar 2 - Position', 'abogada' ),
				'subtitle' => esc_html__( 'Controls the position of sidebar 2. In that case, default sidebar will be shown on opposite side.', 'abogada' ),
				'options'	=> array(
					'left'      => esc_html__( 'Left', 'abogada' ),
					'right'     => esc_html__( 'Right', 'abogada' )
				),
				'default'  => 'right',
				'required' => array( 'portfolio-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),




			array(
				'id'       => 'portfolio-layout-settings-select-portfolio-design-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Portfolio Design Style', 'abogada' ),
				'subtitle' => esc_html__( 'Select the type of portfolio you would like to display.', 'abogada' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'portfolio-style2-simple' => array(
						'alt' => 'Default',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/portfolio/type/default.png'
					),
				),
				'default'  => 'portfolio-style2-simple'
			),

			array(
				'id'       => 'portfolio-layout-settings-select-portfolio-layout-mode',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Portfolio Layout Mode (FitRows Or Masonry)', 'abogada' ),
				'subtitle' => esc_html__( 'You can position items with different layout modes. Select a layout mode you would like to use.', 'abogada' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'fitrows' => array(
						'alt' => 'Fit Rows',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/fitrows.png'
					),
					'masonry' => array(
						'alt' => 'Masonry',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/masonry.png'
					),
				),
				'default'  => 'masonry'
			),


			array(
				'id'       => 'portfolio-layout-settings-items-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Portfolio Items Per Row', 'abogada' ),
				'subtitle'    => esc_html__( 'Select your default column structure for your portfolio items.', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'  => '3',
			),
			array(
				'id'            => 'portfolio-layout-settings-items-per-page',
				'type'          => 'slider',
				'title'         => esc_html__( 'Number of Portfolio Items Per Page', 'abogada' ),
				'subtitle'      => esc_html__( 'Controls the number of items to display on portfolio archive pages. Set to -1 to display all. Set to 0 to use the number of posts from Settings > Reading.', 'abogada' ),
				'desc'          => '',
				'default'       => 10,
				'min'           => -1,
				'step'          => 1,
				'max'           => 40,
				'display_value' => 'text',
			),
			array(
				'id'            => 'portfolio-layout-settings-gutter-size',
				'type'     => 'select',
				'title'         => esc_html__( 'Portfolio Column Spacing (Gutter Size) px', 'abogada' ),
				'subtitle'      => esc_html__( 'Controls column spacing or gutter size between items on portfolio archive pages.', 'abogada' ),
				'desc'     => '',
				'options'	=> abogada_isotope_gutter_list_redux(),
				'default'  => 'gutter-15',
			),
			array(
				'id'       => 'portfolio-layout-settings-featured-image-size',
				'type'     => 'select',
				'title'    => esc_html__( 'Featured Image Size', 'abogada' ),
				'subtitle' => esc_html__( 'Featured image size in Portfolio Archive page.', 'abogada' ),
				'desc'     => '',
				'data'     => 'image_sizes',
				'default'  => 'abogada_square',
			),
			array(
				'id'       => 'portfolio-layout-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Page Fullwidth?', 'abogada' ),
				'subtitle' => esc_html__( 'Make the portfolio page fullwidth or not.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
		)
	) );



	// -> START Portfolio Single Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Portfolio Single', 'abogada' ),
		'id'     => 'portfolio-single-page-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'portfolio-single-page-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fullwidth?', 'abogada' ),
				'subtitle' => esc_html__( 'Make the page fullwidth or not.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Layout', 'abogada' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for portfolio details pages', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'abogada' ),
					'both-sidebar-25-50-25' => esc_html__( 'Sidebar Both Side (1/4 + 2/4 + 1/4)', 'abogada' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'abogada' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'abogada' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'abogada' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'abogada' ),
				),
				'default'  => 'no-sidebar',
			),



			array(
				'id'       => 'portfolio-single-page-settings-sidebar-layout-sidebar-default',
				'type'     => 'select',
				'title'    => esc_html__( 'Default Sidebar', 'abogada' ),
				'subtitle' => esc_html__( 'Choose default sidebar that will be displayed on portfolio single pages.', 'abogada' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar',
				'required' => array( 'portfolio-single-page-settings-sidebar-layout', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-sidebar-layout-sidebar-two',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar 2', 'abogada' ),
				'subtitle' => esc_html__( 'Choose sidebar 2 that will be displayed on portfolio single pages. Sidebar 2 will only be used if "Sidebar Both Side" is selected.', 'abogada' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar-two',
				'required' => array( 'portfolio-single-page-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-sidebar-layout-sidebar-two-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Sidebar 2 - Position', 'abogada' ),
				'subtitle' => esc_html__( 'Controls the position of sidebar 2. In that case, default sidebar will be shown on opposite side.', 'abogada' ),
				'options'	=> array(
					'left'      => esc_html__( 'Left', 'abogada' ),
					'right'     => esc_html__( 'Right', 'abogada' )
				),
				'default'  => 'right',
				'required' => array( 'portfolio-single-page-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),


			array(
				'id'       => 'portfolio-single-page-settings-select-portfolio-details-type',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Portfolio Details Type', 'abogada' ),
				'subtitle' => esc_html__( 'Select the type of portfolio details you would like to display.', 'abogada' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'small-image' => array(
						'alt' => esc_html__( 'Small Image', 'abogada' ),
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/portfolio-single/type/small-image.png'
					),
					'small-image-slider' => array(
						'alt' => esc_html__( 'Small Image Slider', 'abogada' ),
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/portfolio-single/type/small-image-slider.png'
					),
					'small-image-gallery' => array(
						'alt' => esc_html__( 'Small Image Gallery', 'abogada' ),
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/portfolio-single/type/small-image-gallery.png'
					),
					'big-image' => array(
						'alt' => esc_html__( 'Big Image', 'abogada' ),
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/portfolio-single/type/big-image.png'
					),
					'big-image-slider' => array(
						'alt' => esc_html__( 'Big Image Slider', 'abogada' ),
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/portfolio-single/type/big-image-slider.png'
					),
					'big-image-gallery' => array(
						'alt' => esc_html__( 'Big Image Gallery', 'abogada' ),
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/portfolio-single/type/big-image-gallery.png'
					),
				),
				'default'  => 'small-image'
			),


			//Small Image
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Small Image Settings', 'abogada' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'abogada' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'abogada' ),
				'options'	=> array(
					'left'   => esc_html__( 'Left Side', 'abogada' ),
					'right'  => esc_html__( 'Right Side', 'abogada' )
				),
				'default' => 'left',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-description-width',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Width', 'abogada' ),
				'subtitle' => esc_html__( 'Choose width of item description.', 'abogada' ),
				'options'	=> array(
					'6'     => esc_html__( 'Half (1/2)', 'abogada' ),
					'4'     => esc_html__( 'One Third (1/3)', 'abogada' ),
					'3'     => esc_html__( 'One Fourth (1/4)', 'abogada' )
				),
				'default' => '6',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-description-sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Description Sticky', 'abogada' ),
				'subtitle' => esc_html__( 'Make description container sticky when scrolling down the page.', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image' )
				)
			),




			//Small Image Slider
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-slider-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Small Image Slider Settings', 'abogada' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-slider' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-slider-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'abogada' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'abogada' ),
				'options'	=> array(
					'left'   => esc_html__( 'Left Side', 'abogada' ),
					'right'  => esc_html__( 'Right Side', 'abogada' )
				),
				'default' => 'left',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-slider' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-slider-description-width',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Width', 'abogada' ),
				'subtitle' => esc_html__( 'Choose width of item description.', 'abogada' ),
				'options'	=> array(
					'6'     => esc_html__( 'Half (1/2)', 'abogada' ),
					'4'     => esc_html__( 'One Third (1/3)', 'abogada' ),
					'3'     => esc_html__( 'One Fourth (1/4)', 'abogada' )
				),
				'default' => '6',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-slider' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-slider-description-sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Description Sticky', 'abogada' ),
				'subtitle' => esc_html__( 'Make description container sticky when scrolling down the page.', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-slider' )
				)
			),




			//Small Image Gallery
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-gallery-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Small Image Gallery Settings', 'abogada' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-gallery-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'abogada' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'abogada' ),
				'options'	=> array(
					'left'   => esc_html__( 'Left Side', 'abogada' ),
					'right'  => esc_html__( 'Right Side', 'abogada' )
				),
				'default' => 'left',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-gallery-description-width',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Width', 'abogada' ),
				'subtitle' => esc_html__( 'Choose width of item description.', 'abogada' ),
				'options'	=> array(
					'6'     => esc_html__( 'Half (1/2)', 'abogada' ),
					'4'     => esc_html__( 'One Third (1/3)', 'abogada' ),
					'3'     => esc_html__( 'One Fourth (1/4)', 'abogada' )
				),
				'default' => '6',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-gallery-description-sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Description Sticky', 'abogada' ),
				'subtitle' => esc_html__( 'Make description container sticky when scrolling down the page.', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' )
				)
			),
			array(
				'id'       => 'portfolio-single-page-settings-portfolio-type-small-image-gallery-layout-mode',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Gallery Layout Mode (FitRows Or Masonry)', 'abogada' ),
				'subtitle' => esc_html__( 'You can position items with different layout modes. Select a layout mode you would like to use.', 'abogada' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'fitrows' => array(
						'alt' => 'Fit Rows',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/fitrows.png'
					),
					'masonry' => array(
						'alt' => 'Masonry',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/masonry.png'
					),
				),
				'default'  => 'masonry',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-isotope-items-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Images Per Row', 'abogada' ),
				'subtitle'    => esc_html__( 'Select your default column structure for your gallery items.', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'  => '3',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' )
				)
			),




			//Big Image
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Big Image Settings', 'abogada' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'abogada' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'abogada' ),
				'options'	=> array(
					'over'   => esc_html__( 'Over the Images', 'abogada' ),
					'under'  => esc_html__( 'Under the Images', 'abogada' )
				),
				'default' => 'over',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image' )
				)
			),




			//Big Image Slider
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-slider-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Big Image Slider Settings', 'abogada' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-slider' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-slider-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'abogada' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'abogada' ),
				'options'	=> array(
					'over'   => esc_html__( 'Over the Images', 'abogada' ),
					'under'  => esc_html__( 'Under the Images', 'abogada' )
				),
				'default' => 'over',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-slider' )
				)
			),




			//Big Image Gallery
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-gallery-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Big Image Gallery Settings', 'abogada' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-gallery' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-gallery-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'abogada' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'abogada' ),
				'options'	=> array(
					'over'   => esc_html__( 'Over the Images', 'abogada' ),
					'under'  => esc_html__( 'Under the Images', 'abogada' )
				),
				'default' => 'over',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-gallery' )
				)
			),
			array(
				'id'       => 'portfolio-single-page-settings-portfolio-type-big-image-gallery-layout-mode',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Gallery Layout Mode (FitRows Or Masonry)', 'abogada' ),
				'subtitle' => esc_html__( 'You can position items with different layout modes. Select a layout mode you would like to use.', 'abogada' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'fitrows' => array(
						'alt' => 'Fit Rows',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/fitrows.png'
					),
					'masonry' => array(
						'alt' => 'Masonry',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/masonry.png'
					),
				),
				'default'  => 'masonry',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-gallery' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-isotope-items-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Images Per Row', 'abogada' ),
				'subtitle'    => esc_html__( 'Select your default column structure for your gallery items.', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'  => '3',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-gallery' )
				)
			),






			array(
				'id'        => 'portfolio-single-page-settings-other-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Other Settings', 'abogada' ),
				'notice'    => false,
			),
			array(
				'id'       => 'portfolio-single-page-settings-portfolio-meta',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Portfolio Meta', 'abogada' ),
				'subtitle'     => esc_html__( 'Enable/Disabling this option will show/hide each Portfolio Meta on your Portfolio Details Page.', 'abogada' ),
				'desc' => '',
				//Must provide key => value pairs for multi checkbox options
				'options'	=> array(
					'show-post-by-author'       => esc_html__( 'Show By Author', 'abogada' ),
					'show-post-date'            => esc_html__( 'Show Date', 'abogada' ),
					'show-post-date-split'      => esc_html__( 'Show Date Split', 'abogada' ),
					'show-post-category'        => esc_html__( 'Show Category', 'abogada' ),
					'show-post-tag'             => esc_html__( 'Show Tag', 'abogada' ),
					'show-post-checklist-custom-fields'   => esc_html__( 'Show Checklist Custom Fields', 'abogada' ),
				),
				//See how std has changed? you also don't need to specify opts that are 0.
				'default'  => array(
					'show-post-by-author' => '0',
					'show-post-date' => '1',
					'show-post-date-split' => '0',
					'show-post-category' => '1',
					'show-post-tag' => '1',
					'show-post-checklist-custom-fields' => '1',
				)
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-share',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Social Share', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide share options on your page.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),


			//section Next/Previous Navigation Link Starts
			array(
				'id'       => 'portfolio-single-page-settings-show-next-pre-post-link-section-starts',
				'type'     => 'info',
				'title'    => esc_html__( 'Next/Previous Navigation Link', 'abogada' ),
				'notice'   => false,
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-next-pre-post-link',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Next/Previous Single Post Navigation Link', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide link for Next & Previous Posts.', 'abogada' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-next-pre-post-link-within-same-cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Navigation Link Within Same Category', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide link to the next/previous post within the same category as the current post.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array( 'portfolio-single-page-settings-show-next-pre-post-link', '=', '1' ),
			),




			//section Related Posts Starts
			array(
				'id'       => 'portfolio-single-page-settings-related-posts-section-starts',
				'type'     => 'info',
				'title'    => esc_html__( 'Related Posts', 'abogada' ),
				'notice'   => false,
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-related-posts',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Related Portfolio Items', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Related Posts List/Carousel on your page.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-related-posts-carousel',
				'type'     => 'switch',
				'title'    => esc_html__( 'Carousel?', 'abogada' ),
				'subtitle' => esc_html__( 'Make it carousel or grid', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array( 'portfolio-single-page-settings-show-related-posts', '=', '1' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-related-posts-count',
				'type'     => 'text',
				'title'    => esc_html__( 'Number of Posts', 'abogada' ),
				'subtitle' => '',
				'desc'     => esc_html__( 'Enter number of posts to display. Default 3', 'abogada' ),
				'default'  => '3',
				'required' => array( 'portfolio-single-page-settings-show-related-posts', '=', '1' ),
			),
			array(
				'id'            => 'portfolio-single-page-settings-show-related-posts-excerpt-length',
				'type'          => 'slider',
				'title'         => esc_html__( 'Excerpt Length', 'abogada' ),
				'subtitle'      => esc_html__( 'Number of words to display in excerpt.', 'abogada' ),
				'desc'          => '',
				'default'       => 20,
				'min'           => 0,
				'step'          => 1,
				'max'           => 200,
				'display_value' => 'text',
				'required' => array( 'portfolio-single-page-settings-show-related-posts', '=', '1' ),
			),



			//section Related Posts Starts
			array(
				'id'       => 'portfolio-single-page-settings-comments-section-starts',
				'type'     => 'info',
				'title'    => esc_html__( 'Comments', 'abogada' ),
				'notice'   => false,
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-comments',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Comments', 'abogada' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Comments on your page.', 'abogada' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),

		)
	) );



	/* Check for Give */
	if ( class_exists( 'Give' ) ) {
	// -> START Give Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Give - Donation', 'abogada' ),
		'id'     => 'give-donation-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-heart',
		'fields' => array(
			array(
				'id'       => 'give-form-details-page-style',
				'type'     => 'select',
				'title'    => esc_html__( 'Give Form Details Page Style', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'form-style1' => esc_html__( 'Form Custom Style1', 'abogada' ),
					'form-style2' => esc_html__( 'Form Custom Style2', 'abogada' ),

				),
				'default'  => 'sideform-style1',
			),
			array(
				'id'       => 'give-donation-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Give Donation Page Sidebar Layout', 'abogada' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for Donation Page', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'abogada' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'abogada' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'abogada' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'abogada' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'abogada' ),

				),
				'default'  => 'sidebar-right-25',
			),



			array(
				'id'       => 'give-donation-settings-related-posts-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Other Settings', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'give-donation-settings-campaign-creation-date',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Donation Creation Date', 'abogada' ),
				'subtitle' => esc_html__( 'Toggle the campaign creation date on or off.', 'abogada' ),
				'default'  => 1,
			),
			array(
				'id'       => 'give-donation-settings-campaign-creator',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Campaign Creator', 'abogada' ),
				'subtitle' => esc_html__( 'Toggle the campaign donation count on or off.', 'abogada' ),
				'default'  => 1,
			),
			array(
				'id'       => 'give-donation-settings-campaign-categories',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Donation Categories', 'abogada' ),
				'subtitle' => esc_html__( 'Toggle the campaign categories on or off.', 'abogada' ),
				'default'  => 0,
			),
			array(
				'id'       => 'give-donation-settings-campaign-tags',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Donation Tags', 'abogada' ),
				'subtitle' => esc_html__( 'Toggle the campaign tags on or off.', 'abogada' ),
				'default'  => 0,
			),
			array(
				'id'       => 'give-donation-settings-campaign-progress-bar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Donation Progress Bar', 'abogada' ),
				'subtitle' => esc_html__( 'Toggle the campaign campaign progress bar on or off.', 'abogada' ),
				'default'  => 1,
			),
			array(
				'id'       => 'give-donation-settings-campaign-raised-goal',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Donation Stats', 'abogada' ),
				'subtitle' => esc_html__( 'Toggle the campaign raised goal on or off.', 'abogada' ),
				'default'  => 1,
			),
		)
	) );
	}






	// -> START Custom Post Types Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Custom Post Types', 'abogada' ),
		'id'     => 'cpt-settings-parent',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-carrot',
	) );




	// -> START Custom Post Types Portfolio Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'CPT - Portfolio', 'abogada' ),
		'id'     => 'cpt-settings-portfolio',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'cpt-settings-portfolio-enable',
				'type'     => 'switch',
				'title'    => esc_html__( 'Portfolio Post Type', 'abogada' ),
				'subtitle' => esc_html__( 'Toggle the portfolio custom post type on or off.', 'abogada' ),
				'default'  => 1,
			),
			array(
				'id'       => 'cpt-settings-portfolio-label',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Label', 'abogada' ),
				'subtitle' => esc_html__( 'Rename the Custom Post Type. ', 'abogada' ),
				'default'  => 'Portfolio',
				'required' => array( 'cpt-settings-portfolio-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-portfolio-admin-dashicon',
				'type'     => 'select',
				'title'    => esc_html__( 'Portfolio Admin Dashboard Icon', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_abogada_wp_admin_dashicons_list(),
				'default'   => 'dashicons-mascot',
				'required' => array( 'cpt-settings-portfolio-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-portfolio-slug',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Slug', 'abogada' ),
				'subtitle' => esc_html__( 'Specify a custom slug for Portfolio Post Type. ', 'abogada' ),
				'desc'     => sprintf( esc_html__( '%1$sNOTE: When you change this setting you need to flush rewrite rules.%2$s %3$s%4$sTo do so, goto Settings > Permalinks and simply click on "Save Changes" button.%2$s', 'abogada' ), '<strong>', '</strong>', '<br>', '<strong>'),
				'default'  => 'portfolio',
				'required' => array( 'cpt-settings-portfolio-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-portfolio-cat-slug',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Category Slug', 'abogada' ),
				'subtitle' => esc_html__( 'Specify a custom slug for the Category of Portfolio Post Type. ', 'abogada' ),
				'desc'     => sprintf( esc_html__( '%1$sNOTE: When you change this setting you need to flush rewrite rules.%2$s %3$s%4$sTo do so, goto Settings > Permalinks and simply click on "Save Changes" button.%2$s', 'abogada' ), '<strong>', '</strong>', '<br>', '<strong>'),
				'default'  => 'portfolio-category',
				'required' => array( 'cpt-settings-portfolio-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-portfolio-tag-slug',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Tag Slug', 'abogada' ),
				'subtitle' => esc_html__( 'Specify a custom slug for the Tag of Portfolio Post Type. ', 'abogada' ),
				'desc'     => sprintf( esc_html__( '%1$sNOTE: When you change this setting you need to flush rewrite rules.%2$s %3$s%4$sTo do so, goto Settings > Permalinks and simply click on "Save Changes" button.%2$s', 'abogada' ), '<strong>', '</strong>', '<br>', '<strong>'),
				'default'  => 'portfolio-tag',
				'required' => array( 'cpt-settings-portfolio-enable', '=', '1' ),
			),
		)
	) );


	// -> START Custom Post Types Projects Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'CPT - Projects', 'abogada' ),
		'id'     => 'cpt-settings-projects',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'cpt-settings-projects-enable',
				'type'     => 'switch',
				'title'    => esc_html__( 'Projects Post Type', 'abogada' ),
				'subtitle' => esc_html__( 'Toggle the projects custom post type on or off.', 'abogada' ),
				'default'  => 1,
			),
			array(
				'id'       => 'cpt-settings-projects-label',
				'type'     => 'text',
				'title'    => esc_html__( 'Projects Label', 'abogada' ),
				'subtitle' => esc_html__( 'Rename the Custom Post Type. ', 'abogada' ),
				'default'  => 'Projects',
				'required' => array( 'cpt-settings-projects-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-projects-admin-dashicon',
				'type'     => 'select',
				'title'    => esc_html__( 'Projects Admin Dashboard Icon', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_abogada_wp_admin_dashicons_list(),
				'default'   => 'dashicons-mascot',
				'required' => array( 'cpt-settings-projects-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-projects-slug',
				'type'     => 'text',
				'title'    => esc_html__( 'Projects Slug', 'abogada' ),
				'subtitle' => esc_html__( 'Specify a custom slug for Projects Post Type. ', 'abogada' ),
				'desc'     => sprintf( esc_html__( '%1$sNOTE: When you change this setting you need to flush rewrite rules.%2$s %3$s%4$sTo do so, goto Settings > Permalinks and simply click on "Save Changes" button.%2$s', 'abogada' ), '<strong>', '</strong>', '<br>', '<strong>'),
				'default'  => 'projects',
				'required' => array( 'cpt-settings-projects-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-projects-cat-slug',
				'type'     => 'text',
				'title'    => esc_html__( 'Projects Category Slug', 'abogada' ),
				'subtitle' => esc_html__( 'Specify a custom slug for the Category of Projects Post Type. ', 'abogada' ),
				'desc'     => sprintf( esc_html__( '%1$sNOTE: When you change this setting you need to flush rewrite rules.%2$s %3$s%4$sTo do so, goto Settings > Permalinks and simply click on "Save Changes" button.%2$s', 'abogada' ), '<strong>', '</strong>', '<br>', '<strong>'),
				'default'  => 'projects-category',
				'required' => array( 'cpt-settings-projects-enable', '=', '1' ),
			),





			array(
				'id'        => 'cpt-settings-projects-archive-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Project Archive Page Settings', 'abogada' ),
				'notice'    => false,
			),
			array(
				'id'       => 'cpt-settings-projects-archive-layout-mode',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Project Layout Mode (FitRows Or Masonry)', 'abogada' ),
				'subtitle' => esc_html__( 'You can position items with different layout modes. Select a layout mode you would like to use.', 'abogada' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'fitrows' => array(
						'alt' => 'Fit Rows',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/staff/layout-mode/fitrows.png'
					),
					'masonry' => array(
						'alt' => 'Masonry',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/staff/layout-mode/masonry.png'
					),
				),
				'default'  => 'fitrows'
			),
			array(
				'id'       => 'cpt-settings-projects-archive-items-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Projects Per Row', 'abogada' ),
				'subtitle'    => esc_html__( 'Select your default column structure for your Projects.', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'=> '3',
			),
			array(
				'id'            => 'cpt-settings-projects-archive-gutter-size',
				'type'     => 'select',
				'title'         => esc_html__( 'Column Spacing (Gutter Size) px', 'abogada' ),
				'desc'     => '',
				'options'	=> abogada_isotope_gutter_list_redux(),
				'default'  => 'gutter-15',
			),


			array(
				'id'       => 'cpt-settings-projects-archive-featured-image-size',
				'type'     => 'select',
				'title'    => esc_html__( 'Featured Image Size', 'abogada' ),
				'subtitle' => esc_html__( 'Featured image size in blog page.', 'abogada' ),
				'desc'     => '',
				'data'     => 'image_sizes',
				'default'  => 'abogada_featured_image',
			),


			array(
				'id'       => 'cpt-settings-projects-archive-title-tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Tag', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_abogada_heading_tag_list_all(),
				'default'  => 'h4',
			),
		)
	) );



	// -> START Sidebar Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Sidebar Widgets', 'abogada' ),
		'id'     => 'sidebar-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-align-left',
		'fields' => array(
			array(
				'id'       => 'sidebar-settings-sidebar-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,
				'right'         => true,
				'bottom'        => true,
				'left'          => true,
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Sidebar Padding(px)', 'abogada' ),
				'subtitle' => esc_html__( 'Controls the sidebar padding. Please put only integer value. Because the unit \'px\' will be automatically added to the end of the value.', 'abogada' ),
			),
			array(
				'id'       => 'sidebar-settings-sidebar-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Sidebar Background Color', 'abogada' ),
				'subtitle' => esc_html__( 'Controls the background color of sidebar.', 'abogada' ),
				'transparent' => false,
			),
			array(
				'id'       => 'sidebar-settings-sidebar-text-align',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Text Alignment', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'left'     => esc_html__( 'Left', 'abogada' ),
					'center'   => esc_html__( 'Center', 'abogada' ),
					'right'    => esc_html__( 'Right', 'abogada' ),
				),
				'default'  => '',
			),


			//section Related Items Starts
			array(
				'id'       => 'sidebar-settings-sidebar-title-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Sidebar Widget Title', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'sidebar-settings-sidebar-title-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,
				'right'         => true,
				'bottom'        => true,
				'left'          => true,
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Widget Title Padding(px)', 'abogada' ),
				'subtitle' => esc_html__( 'Controls the sidebar widget title padding. Please put only integer value. Because the unit \'px\' will be automatically added to the end of the value.', 'abogada' ),
			),
			array(
				'id'       => 'sidebar-settings-sidebar-title-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background Color', 'abogada' ),
				'subtitle' => esc_html__( 'Controls the background color of sidebar widget title box', 'abogada' ),
				'transparent' => false,
			),
			array(
				'id'       => 'sidebar-settings-sidebar-title-text-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Text Color', 'abogada' ),
				'subtitle' => esc_html__( 'Controls the background color of sidebar widget title box', 'abogada' ),
				'transparent' => false,
			),
			array(
				'id'            => 'sidebar-settings-sidebar-title-font-size',
				'type'          => 'text',
				'title'         => esc_html__( 'Font Size(px)', 'abogada' ),
				'subtitle'      => esc_html__( 'Please put only integer value. Because the unit \'px\' will be automatically added to the end of the value.', 'abogada' ),
				'desc'          => '',
			),


			array(
				'id'       => 'sidebar-settings-sidebar-title-show-line-bottom',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Show Line Bottom', 'abogada' ),
				'subtitle' => esc_html__( 'If you enable it then a thin line will be visible below the widget title.', 'abogada' ),
				'desc'     => '',
				'default'  => '1',
			),
			array(
				'id'       => 'sidebar-settings-sidebar-title-line-bottom-theme-colored',
				'type'     => 'select',
				'title'    => esc_html__( 'Make Line Bottom Theme Colored?', 'abogada' ),
				'subtitle' => esc_html__( 'To make the Line Bottom theme colored, please check it.', 'abogada' ),
				'desc'     => '',
				'options'  => mascot_core_abogada_theme_color_list(),
				'default'  => '1',
				'required' => array( 'sidebar-settings-sidebar-title-show-line-bottom', '=', '1' ),
			),
			array(
				'id'       => 'sidebar-settings-sidebar-title-line-bottom-custom-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom Line Bottom Color', 'abogada' ),
				'subtitle' => '',
				'transparent' => false,
				'required' => array( 'sidebar-settings-sidebar-title-line-bottom-theme-colored', '=', '' ),
			),


			array(
				'id'     => 'sidebar-settings-sidebar-title-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );



	// -> START 404 Page Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( '404 Page', 'abogada' ),
		'id'     => '404-page-settings',
		'desc'   => esc_html__( 'Title, content and background settings for 404 Error Page', 'abogada' ),
		'icon'   => 'dashicons-before dashicons-editor-help',
		'fields' => array(
			array(
				'id'       => '404-page-settings-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Choose Layout', 'abogada' ),
				'subtitle' => esc_html__( 'Choose one among different layouts.', 'abogada' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'simple' => array(
						'alt' => 'Simple',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/404/simple.jpg'
					),
					'split' => array(
						'alt' => 'Split',
						'img' => ABOGADA_ADMIN_ASSETS_URI . '/images/404/split.jpg'
					),
				),
				'default'  => 'simple',
			),
			array(
				'id'       => '404-page-settings-show-header',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Header', 'abogada' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => '404-page-settings-show-footer',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Footer', 'abogada' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),

			array(
				'id'       => '404-page-settings-text-align',
				'type'     => 'select',
				'title'    => esc_html__( 'Text Alignment', 'abogada' ),
				'subtitle' => esc_html__( 'Text Alignment of this page', 'abogada' ),
				'desc'     => '',
				'options'	=> abogada_redux_text_alignment_list(),
				'default'  => 'text-center',
			),
			array(
				'id'       => '404-page-settings-show-back-to-home-button',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Back to Home Button', 'abogada' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => '404-page-settings-back-to-home-button-label',
				'type'     => 'text',
				'title'    => esc_html__( 'Back to Home Button Label', 'abogada' ),
				'subtitle' => '',
				'desc'     => esc_html__( 'Default: "Back to Home"', 'abogada' ),
				'default'  => esc_html__( 'Back to Home', 'abogada' ),
				'required' => array(
					array( '404-page-settings-show-back-to-home-button', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-show-social-links',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Social Links', 'abogada' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),





			//section custom background
			array(
				'id'       => '404-page-settings-custom-background-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Custom Background', 'abogada' ),
				'subtitle' => esc_html__( 'Define background for 404 page.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => '404-page-settings-custom-background-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Custom Background', 'abogada' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => '404-page-settings-bg',
				'type'     => 'background',
				'title'    => esc_html__( 'Background', 'abogada' ),
				'subtitle' => esc_html__( 'Choose background image or color.', 'abogada' ),
				'required' => array(
					array( '404-page-settings-custom-background-status', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-bg-layer-overlay-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Add Background Overlay', 'abogada' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
				'required' => array(
					array( '404-page-settings-custom-background-status', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-bg-layer-overlay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Background Overlay Opacity', 'abogada' ),
				'subtitle'      => esc_html__( 'Overlay on background image on footer.', 'abogada' ),
				'desc'          => '',
				'default'       => 7,
				'min'           => 1,
				'step'          => 1,
				'max'           => 9,
				'display_value' => 'text',
				'required' => array(
					array( '404-page-settings-custom-background-status', '=', '1' ),
					array( '404-page-settings-bg-layer-overlay-status', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-bg-layer-overlay-color',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Background Overlay Color', 'abogada' ),
				'subtitle' => esc_html__( 'Select Dark or White Overlay on background image.', 'abogada' ),
				'options'	=> array(
					''          	=> esc_html__( 'None', 'abogada' ),
					'dark'          => esc_html__( 'Dark', 'abogada' ),
					'white'         => esc_html__( 'White', 'abogada' ),
					'theme-colored1' => esc_html__( 'Primary Theme Color1', 'abogada' ),
					'theme-colored2' => esc_html__( 'Primary Theme Color2', 'abogada' ),
					'theme-colored3' => esc_html__( 'Primary Theme Color3', 'abogada' ),
					'theme-colored4' => esc_html__( 'Primary Theme Color4', 'abogada' )
				),
				'default' => 'dark',
				'required' => array(
					array( '404-page-settings-custom-background-status', '=', '1' ),
					array( '404-page-settings-bg-layer-overlay-status', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-custom-background-section-ends',
				'type'     => 'section',
				'title'    => '',
				'subtitle' => '',
				'indent'   => false, // Indent all options below until the next 'section' option is set.
				'required' => array(
					array( '404-page-settings-custom-background-status', '=', '1' )
				)
			),





			//section Title Starts
			array(
				'id'       => '404-page-settings-title-typography-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Title', 'abogada' ),
				'subtitle' => esc_html__( 'Define text and styles for Title.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => '404-page-settings-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Title Text', 'abogada' ),
				'subtitle' => esc_html__( 'Set page title to show', 'abogada' ),
				'desc'     => '',
				'default'  => esc_html__( '404', 'abogada' ),
			),
			array(
				'id'       => '404-page-settings-subtitle',
				'type'     => 'text',
				'title'    => esc_html__( 'Sub Title Text', 'abogada' ),
				'subtitle' => esc_html__( 'Set page sub title to show', 'abogada' ),
				'desc'     => '',
				'default'  => esc_html__( 'Oops! Page Not Found!', 'abogada' ),
			),
			array(
				'id'            => '404-page-settings-title-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Title Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => '404-page-settings-title-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'       => '404-page-settings-title-typography-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),





			//section Content Starts
			array(
				'id'       => '404-page-settings-content-typography-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Content', 'abogada' ),
				'subtitle' => esc_html__( 'Define text and styles for Content.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => '404-page-settings-content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Content Text', 'abogada' ),
				'subtitle' => esc_html__( 'Enter the content for 404 page which will be showed below title.', 'abogada' ),
				'desc'     => '',
				'default'  => esc_html__( 'The page you are looking for does not exist. It might have been moved or deleted.', 'abogada' ),
			),
			array(
				'id'            => '404-page-settings-content-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Content Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => '404-page-settings-content-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'       => '404-page-settings-content-typography-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),




			//section Helpful Links Starts
			array(
				'id'       => '404-page-settings-helpful-links-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Helpful Links', 'abogada' ),
				'subtitle' => esc_html__( 'Define text and styles for helpful links.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => '404-page-settings-show-helpful-links',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Helpful Links', 'abogada' ),
				'subtitle' => '',
				'desc'     => sprintf( esc_html__( 'Please create a new menu from %1$sAppearance > Menus%2$s and set Theme Location %1$s"Page 404 Helpful Links"%2$s', 'abogada' ), '<strong>', '</strong>', '<br>'),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => '404-page-settings-helpful-links-heading',
				'type'     => 'text',
				'title'    => esc_html__( 'Heading Text', 'abogada' ),
				'subtitle' => esc_html__( 'Set heading text to show', 'abogada' ),
				'desc'     => '',
				'default'  => esc_html__( 'Helpful Links', 'abogada' ),
				'required' => array(
					array( '404-page-settings-show-helpful-links', '=', '1' )
				)
			),
			array(
				'id'            => '404-page-settings-helpful-links-heading-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array(
					array( '404-page-settings-show-helpful-links', '=', '1' )
				)
			),
			array(
				'id'            => '404-page-settings-helpful-links-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Links Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array(
					array( '404-page-settings-show-helpful-links', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-helpful-links-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),




			//section Search Box Starts
			array(
				'id'       => '404-page-settings-search-box-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Search Box', 'abogada' ),
				'subtitle' => esc_html__( 'Define text and styles for search box.', 'abogada' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => '404-page-settings-show-search-box',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Search Box', 'abogada' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),
			array(
				'id'       => '404-page-settings-search-box-heading',
				'type'     => 'text',
				'title'    => esc_html__( 'Heading Text', 'abogada' ),
				'subtitle' => esc_html__( 'Set heading text to show', 'abogada' ),
				'desc'     => '',
				'default'  => esc_html__( 'Search Website', 'abogada' ),
				'required' => array(
					array( '404-page-settings-show-search-box', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-search-box-paragraph',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Paragraph Text', 'abogada' ),
				'subtitle' => esc_html__( 'Set paragraph text to show', 'abogada' ),
				'desc'     => '',
				'default'  => esc_html__( 'Please use the search box to find what you are looking for. Perhaps searching can help.', 'abogada' ),
				'required' => array(
					array( '404-page-settings-show-search-box', '=', '1' )
				)
			),
			array(
				'id'            => '404-page-settings-search-box-heading-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array(
					array( '404-page-settings-show-search-box', '=', '1' )
				)
			),
			array(
				'id'            => '404-page-settings-search-box-paragraph-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Paragraph Typography', 'abogada' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array(
					array( '404-page-settings-show-search-box', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-search-box-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );


	if( mascot_core_abogada_plugin_installed() && function_exists( 'mascot_core_abogada_redux_opt_maintenance_section' ) ) {
		Redux::setSection( $opt_name, mascot_core_abogada_redux_opt_maintenance_section() );
	}


	// -> START Social Links Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Social Links', 'abogada' ),
		'id'     => 'social-links',
		'desc'   => esc_html__( 'This is your official social links. Set the order of social links to be appeared in the header/footer section.', 'abogada' ),
		'icon'   => 'dashicons-before dashicons-facebook-alt',
		'fields' => $redux_config_social_links_arraylist
	) );



	// -> START Sharing Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Sharing Settings', 'abogada' ),
		'id'     => 'sharing-settings',
		'desc'   => esc_html__( 'Enable/Disable social sharing buttons for posts, pages and portfolio single pages', 'abogada' ),
		'icon'   => 'dashicons-before dashicons-share',
		'fields' => array(
			array(
				'id'       => 'sharing-settings-enable-sharing',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Sharing', 'abogada' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'abogada' ),
				'off'      => esc_html__( 'No', 'abogada' ),
			),

			array(
				'id'       => 'sharing-settings-heading',
				'type'     => 'text',
				'title'    => esc_html__( 'Sharing Heading', 'abogada' ),
				'subtitle' => esc_html__( 'Your custom text for the social sharing heading.', 'abogada' ),
				'desc'     => '',
				'default'  => esc_html__( 'Share On:', 'abogada' ),
				'required' => array( 'sharing-settings-enable-sharing', '=', '1' ),
			),
			array(
				'id'       => 'sharing-settings-icon-type',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Sharing Icon Type', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> array(
					'text'          => 'Text',
					'icon'          => 'Flat Icon',
					'icon-brand'    => 'Icon with Brand Color',
				),
				'default'  => 'icon-brand',
				'required' => array( 'sharing-settings-enable-sharing', '=', '1' ),
			),

			//Buttons Type Icon
			array(
				'id'       => 'sharing-settings-social-links-color',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Sharing Links - Background Color', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'icon-gray'     => esc_html__( 'Gray', 'abogada' ),
					'icon-dark'     => esc_html__( 'Dark', 'abogada' ),
					'icon-white'    => esc_html__( 'White', 'abogada' ),
					''              => esc_html__( 'Default', 'abogada' ),
				),
				'default'  => 'icon-gray',
				'required' => array(
					array( 'sharing-settings-icon-type', '=', 'icon' ),
				)
			),
			array(
				'id'       => 'sharing-settings-social-links-icon-style',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Sharing Icons Style', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'icon-rounded'   => esc_html__( 'Rounded', 'abogada' ),
					'icon-default'	 => esc_html__( 'Default', 'abogada' ),
					'icon-circled'   => esc_html__( 'Circled', 'abogada' ),
				),
				'default'  => 'icon-circled',
				'required' => array( 'sharing-settings-icon-type', '!=', 'text' ),
			),
			array(
				'id'       => 'sharing-settings-social-links-icon-size',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Sharing Icons Size', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					''          => esc_html__( 'Default', 'abogada' ),
					'icon-xs'   => esc_html__( 'Extra Small', 'abogada' ),
					'icon-sm'	=> esc_html__( 'Small', 'abogada' ),
					'icon-md'   => esc_html__( 'Medium', 'abogada' ),
					'icon-lg'   => esc_html__( 'Large', 'abogada' ),
					'icon-xl'   => esc_html__( 'Extra Large', 'abogada' ),
				),
				'default'  => 'icon-md',
				'required' => array( 'sharing-settings-icon-type', '!=', 'text' ),
			),
			array(
				'id'       => 'sharing-settings-social-links-icon-animation-effect',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Icons Animation Effect', 'abogada' ),
				'desc'     => '',
				'options'	=> array(
					'styled-icons-effect-rollover'   => esc_html__( 'Roll Over', 'abogada' ),
					''                               => esc_html__( 'Default', 'abogada' ),
					'styled-icons-effect-rotate'     => esc_html__( 'Rotate', 'abogada' ),
				),
				'default'  => '',
				'required' => array( 'sharing-settings-icon-type', '!=', 'text' ),
			),
			array(
				'id'       => 'sharing-settings-social-links-icon-border-style',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Make Sharing Icon Area Bordered?', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => '0',
				'required' => array(
					array( 'sharing-settings-social-links-color', '!=', 'brand-color' ),
				)
			),
			array(
				'id'       => 'sharing-settings-social-links-theme-colored',
				'type'     => 'select',
				'title'    => esc_html__( 'Make Sharing Icons Theme Colored?', 'abogada' ),
				'subtitle' => esc_html__( 'To make the sharing icons theme colored, please check it.', 'abogada' ),
				'desc'     => '',
				'options'  => mascot_core_abogada_theme_color_list(),
				'default'  => '',
				'required' => array(
					array( 'sharing-settings-social-links-color', '!=', 'brand-color' ),
				)
			),





			array(
				'id'       => 'sharing-settings-show-social-share-on',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Show Social Share On', 'abogada' ),
				'subtitle'     => '',
				'desc' => '',
				//Must provide key => value pairs for multi checkbox options
				'options'	=> array(
					'show-on-posts'     => esc_html__( 'Posts', 'abogada' ),
					'show-on-pages'     => esc_html__( 'Pages', 'abogada' ),
					'show-on-tribe-events'     => esc_html__( 'Tribe Events', 'abogada' ),
					'show-on-portfolio' => esc_html__( 'Portfolio', 'abogada' ),
				),
				//See how std has changed? you also don't need to specify opts that are 0.
				'default'  => array(
					'show-on-posts' => '1',
					'show-on-pages' => '1',
					'show-on-tribe-events' => '1',
					'show-on-portfolio' => '1',
				),
				'required' => array( 'sharing-settings-enable-sharing', '=', '1' ),
			),
			array(
				'id'       => 'sharing-settings-networks',
				'type'     => 'sorter',
				'title'    => esc_html__( 'Seleted Social Networks', 'abogada' ),
				'desc'     => '',
				'compiler' => 'true',
				'options'	=> array(
					'Enabled' => array(
						'twitter'    => 'Twitter',
						'facebook'   => 'Facebook',
						'linkedin'   => 'Linkedin',
						'email'      => 'Email',
					),
					'Disabled'  => array(
						'tumblr'     => 'Tumblr',
						'pinterest'  => 'Pinterest',
						'vk'        => 'VK',
						'reddit'    => 'Reddit',
						'print'     => 'Print',
					),
				),
				'required' => array( 'sharing-settings-enable-sharing', '=', '1' ),
			),

			//section Social Network URLs Starts
			array(
				'id'       => 'sharing-settings-icon-tooltip-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Sharing Icon Tooltip', 'abogada' ),
				'subtitle' => '',
				'indent'   => true, // Indent all options below until the next 'section' option is set.
				'required' => array( 'sharing-settings-enable-sharing', '=', '1' ),
			),

			array(
				'id'       => 'sharing-settings-tooltip-directions',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Tooltip Text Directions', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> array(
					'top'    => 'Top',
					'right'  => 'Right',
					'bottom' => 'Bottom',
					'left'   => 'Left',
					'none'   => 'None',
				),
				'default'  => 'top',
			),
			array(
				'id'       => 'sharing-settings-tooltip-twitter',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Twitter', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Twitter', 'abogada' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-facebook',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Facebook', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Facebook', 'abogada' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-linkedin',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for LinkedIn', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on LinkedIn', 'abogada' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-tumblr',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Tumblr', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Tumblr', 'abogada' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-email',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Email', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Email', 'abogada' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-vk',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for VKontakte', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on VKontakte', 'abogada' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-pinterest',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Pinterest', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Pinterest', 'abogada' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-reddit',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Reddit', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Reddit', 'abogada' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-print',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Print', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Print This Page', 'abogada' ),
			),
			array(
				'id'       => 'sharing-settings-icon-tooltip-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),

		)
	) );



	// -> START Twitter API Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'API Settings', 'abogada' ),
		'id'     => 'theme-api-settings',
		'desc'  => esc_html__( 'Fill the following fields if you want to use these features', 'abogada' ),
		'icon'   => 'dashicons-before dashicons-admin-network',
		'fields' => array(
			array(
				'id'        => 'theme-api-settings-gmaps',
				'type'      => 'info',
				'title'     => esc_html__( 'Google Maps API Settings', 'abogada' ),
				'subtitle'  => esc_html__( 'Fill the following field if you want to use Google Maps', 'abogada' ),
				'notice'    => false,
			),
			array(
				'id'       => 'theme-api-settings-gmaps-api-key',
				'type'     => 'text',
				'title'    => esc_html__( 'Google Maps API Key', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
			),


			array(
				'id'        => 'theme-api-settings-twitter',
				'type'      => 'info',
				'title'     => esc_html__( 'Twitter API Settings', 'abogada' ),
				'subtitle'  => sprintf( esc_html__('Fill the following fields if you want to use Twitter Feed Widget. You can collect those keys by creating your own Twitter API from here %s%s', 'abogada'), '<a target="_blank" class="text-white" href="' . esc_url( 'https://dev.twitter.com/apps' ) . '">', '</a>' ),
				'notice'    => false,
			),

			array(
				'id'       => 'theme-api-settings-twitter-api-key',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter API Key', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'       => 'theme-api-settings-twitter-api-secret',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter API Secret', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
			),

			array(
				'id'       => 'theme-api-settings-twitter-api-access-token',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter Access Token', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'       => 'theme-api-settings-twitter-api-access-token-secret',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter Access Token Secret', 'abogada' ),
				'subtitle' => '',
				'desc'     => '',
			),
		)
	) );



	// -> START Custom HTML/JS Codes
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Custom HTML/JS Codes', 'abogada' ),
		'id'     => 'custom-codes',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-code',
		'fields' => array(
			array(
				'id'       => 'custom-codes-custom-html-script-header',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'Custom HTML/JS Code - in Header before &lt;/head&gt; tag', 'abogada' ),
				'subtitle' => esc_html__( 'If you have any custom HTML or JS Code you would like to add in the header before &lt;/head&gt; tag of the site then please enter it here. Only accepts javascript code wrapped with &lt;script&gt; tags and valid HTML markup.', 'abogada' ),
				'mode'     => 'javascript',
				'theme'    => 'chrome',
				'desc'     => '',
				'default'     => '',
			),
			array(
				'id'       => 'custom-codes-custom-html-script-footer',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'Custom HTML/JS Code - in Footer before &lt;/body&gt; tag', 'abogada' ),
				'subtitle' => esc_html__( 'If you have any custom HTML or JS Code you would like to add in the footer before &lt;/body&gt; tag of the site then please enter it here. Only accepts javascript code wrapped with &lt;script&gt; tags and valid HTML markup.', 'abogada' ),
				'mode'     => 'javascript',
				'theme'    => 'chrome',
				'desc'     => '',
				'default'     => '',
			)
		)
	) );


	/*
	 * <--- END SECTIONS
	 */

