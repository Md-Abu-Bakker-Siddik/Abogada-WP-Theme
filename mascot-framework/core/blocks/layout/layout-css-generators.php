<?php

if (!function_exists('abogada_layout_settings_boxed_layout_padding_top_bottom')) {
	/**
	 * Generate CSS codes for Boxed Layout - Padding Top & Bottom
	 */
	function abogada_layout_settings_boxed_layout_padding_top_bottom() {
		global $abogada_redux_theme_opt;
		$var_name = 'layout-settings-boxed-layout-padding-top-bottom';
		$declaration = array();
		$selector = array(
			'body.tm-boxed-layout',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $abogada_redux_theme_opt ) ) {
			return;
		}

		//if Page Layout boxed
		if( abogada_get_redux_option( 'layout-settings-page-layout' ) == 'boxed' ) {
			$padding_top = $abogada_redux_theme_opt[$var_name]['padding-top'];
			$padding_bottom = $abogada_redux_theme_opt[$var_name]['padding-bottom'];

			if( !empty( $padding_top ) && $padding_top != "" ) {
				$padding_top = abogada_remove_suffix( $padding_top, 'px');
				$declaration['padding-top'] = $padding_top . 'px';
			}
			if( !empty( $padding_bottom ) && $padding_bottom != "" ) {
				$padding_bottom = abogada_remove_suffix( $padding_bottom, 'px');
				$declaration['padding-bottom'] = $padding_bottom . 'px';
			}
		}

		abogada_dynamic_css_generator($selector, $declaration);
	}
	add_action('abogada_dynamic_css_generator_action', 'abogada_layout_settings_boxed_layout_padding_top_bottom');
}


if (!function_exists('abogada_stretched_layout_background_color')) {
	/**
	 * Generate CSS codes for Stretched Layout - Background Color
	 */
	function abogada_stretched_layout_background_color() {
		global $abogada_redux_theme_opt;
		$var_name = 'layout-settings-stretched-layout-bg-bgcolor';
		$declaration = array();
		$selector = array(
			'body.tm-stretched-layout',
		);

		//if empty then return
		if( abogada_get_redux_option( 'layout-settings-page-layout' ) != 'stretched' ) {
			return;
		}
		if( !array_key_exists( $var_name, $abogada_redux_theme_opt ) ) {
			return;
		}

		if( abogada_get_redux_option( 'layout-settings-boxed-layout-bg-type' ) == 'bg-color' ) {
			if( $abogada_redux_theme_opt[$var_name] != "" ) {
				$declaration['background-color'] = $abogada_redux_theme_opt[$var_name];
			}
			abogada_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('abogada_dynamic_css_generator_action', 'abogada_stretched_layout_background_color');
}


if (!function_exists('abogada_boxed_layout_background_color')) {
	/**
	 * Generate CSS codes for Boxed Layout - Background Color
	 */
	function abogada_boxed_layout_background_color() {
		global $abogada_redux_theme_opt;
		$var_name = 'layout-settings-boxed-layout-bg-type-bgcolor';
		$declaration = array();
		$selector = array(
			'body.tm-boxed-layout',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $abogada_redux_theme_opt ) ) {
			return;
		}

		if( abogada_get_redux_option( 'layout-settings-boxed-layout-bg-type' ) == 'bg-color' ) {
			if( $abogada_redux_theme_opt[$var_name] != "" ) {
				$declaration['background-color'] = $abogada_redux_theme_opt[$var_name];
			}
			abogada_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('abogada_dynamic_css_generator_action', 'abogada_boxed_layout_background_color');
}




if (!function_exists('abogada_boxed_layout_background_pattern')) {
	/**
	 * Generate CSS codes for Boxed Layout - Background Pattern
	 */
	function abogada_boxed_layout_background_pattern() {
		global $abogada_redux_theme_opt;
		$var_name = 'layout-settings-boxed-layout-bg-type-pattern';
		$declaration = array();
		$selector = array(
			'body.tm-boxed-layout',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $abogada_redux_theme_opt ) ) {
			return;
		}

		if( abogada_get_redux_option( 'layout-settings-boxed-layout-bg-type' ) == 'bg-patter' ) {
			if( $abogada_redux_theme_opt[$var_name] != "" ) {
				$declaration['background-image'] = 'url('.$abogada_redux_theme_opt[$var_name].')';
			}
			abogada_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('abogada_dynamic_css_generator_action', 'abogada_boxed_layout_background_pattern');
}


if (!function_exists('abogada_boxed_layout_bg')) {
	/**
	 * Generate CSS codes for Widget Footer Background
	 */
	function abogada_boxed_layout_bg() {
		global $abogada_redux_theme_opt;
		$var_name = 'layout-settings-boxed-layout-bg-type-bgimg';
		$declaration = array();
		$selector = array(
			'body.tm-boxed-layout',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $abogada_redux_theme_opt ) ) {
			return;
		}

		if( abogada_get_redux_option( 'layout-settings-boxed-layout-bg-type' ) == 'bg-image' ) {
			$declaration = abogada_redux_option_field_background( $var_name );
			abogada_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('abogada_dynamic_css_generator_action', 'abogada_boxed_layout_bg');
}





if (!function_exists('abogada_dark_layout_background_color')) {
	/**
	 * Generate CSS codes for dark Layout - Background Color
	 */
	function abogada_dark_layout_background_color() {
		global $abogada_redux_theme_opt;
		$var_name = 'general-settings-dark-mode-custom-bgcolor';
		$declaration = array();
		$selector = array(
			'[data-tm-layout="dark"]'
		);

		//if empty then return
		if( abogada_get_redux_option( 'general-settings-enable-dark-mode' ) != '1' ) {
			return;
		}

		if( $abogada_redux_theme_opt[$var_name] != "" ) {
			$declaration['--body-bg'] = $abogada_redux_theme_opt[$var_name] . '!important';
			abogada_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('abogada_dynamic_css_generator_action', 'abogada_dark_layout_background_color');
}