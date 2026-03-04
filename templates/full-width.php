<?php
/**
 * Template Name: Full Width
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

abogada_get_title_area_parts();

abogada_get_page( 'container-fluid pt-0 pb-0', 'no-sidebar' );

get_footer();
