<?php

// Custom Action for this theme
add_action('after_setup_theme', 'abogada_custom_action_init', 0);

function abogada_custom_action_init() {

	do_action('abogada_before_custom_action');

	do_action('abogada_custom_action');

	do_action('abogada_after_custom_action');
}