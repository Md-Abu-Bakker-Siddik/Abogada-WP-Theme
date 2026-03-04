<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */
$header_return_true_false = ( abogada_get_redux_option( '404-page-settings-show-header', true ) == true ) ? 'abogada_return_true' : 'abogada_return_false';
add_filter( 'abogada_filter_show_header', $header_return_true_false );

$footer_return_true_false = ( abogada_get_redux_option( '404-page-settings-show-footer', true ) == true ) ? 'abogada_return_true' : 'abogada_return_false';
add_filter( 'abogada_filter_show_footer', $footer_return_true_false );

get_header();

abogada_get_title_area_parts();

abogada_get_404_parts();

get_footer();
