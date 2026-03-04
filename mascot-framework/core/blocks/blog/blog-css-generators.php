<?php

if (!function_exists('abogada_sidebar_widget_title_line_bottom_color')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Custom Line Bottom Color
	 */
	function abogada_sidebar_widget_title_line_bottom_color() {
		global $abogada_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-line-bottom-custom-color';
		//If Make Line Bottom Theme Colored?
		if( $abogada_redux_theme_opt['sidebar-settings-sidebar-title-line-bottom-theme-colored'] != '' ) {
			return;
		}

		$declaration = array();
		$selector = array(
			'.widget .widget-title.widget-title-line-bottom:after'
		);

		$declaration['background-color'] = $abogada_redux_theme_opt[$var_name];
		abogada_dynamic_css_generator($selector, $declaration);
	}
	add_action('abogada_dynamic_css_generator_action', 'abogada_sidebar_widget_title_line_bottom_color');
}