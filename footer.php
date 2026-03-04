<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the .main-content div and #wrapper
 *
 */
?>


	<?php abogada_get_footer_top_callout(); ?>


	<?php
		/**
		 * abogada_main_content_end hook.
		 *
		 */
		do_action( 'abogada_main_content_end' );
	?>
	</div>
	<!-- main-content end -->
	<?php
		/**
		 * abogada_after_main_content hook.
		 *
		 */
		do_action( 'abogada_after_main_content' );
	?>


	<?php if( apply_filters('abogada_filter_show_footer', true) ): ?>
	<?php abogada_get_footer_parts(); ?>
	<?php endif; ?>

	<?php
		/**
		 * abogada_wrapper_end hook.
		 *
		 */
		do_action( 'abogada_wrapper_end' );
	?>
</div>
<!-- wrapper end -->
<?php
	/**
	 * abogada_body_tag_end hook.
	 *
	 */
	do_action( 'abogada_body_tag_end' );
?>
<?php
	/**
	 * nav_search_icon_popup_html hook.
	 *
	 */
	do_action( 'abogada_nav_search_icon_popup_html');
	abogada_floating_cart_sidebar();
?>
<?php wp_footer(); ?>
</body>
</html>
