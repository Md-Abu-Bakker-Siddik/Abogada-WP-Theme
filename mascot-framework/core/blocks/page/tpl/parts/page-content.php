<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<div class="page-content">
			<?php
				abogada_get_blog_single_post_thumbnail();
			?>
			<?php
				/**
				* abogada_before_page_content hook.
				*
				*/
				do_action( 'abogada_before_page_content' );
			?>
			<?php
				the_content();
			?>
			<?php
				/**
				* abogada_after_page_content hook.
				*
				*/
				do_action( 'abogada_after_page_content' );
			?>

			<?php abogada_get_post_wp_link_pages(); ?>

			<?php
				if( abogada_get_redux_option( 'page-settings-show-share' ) ) {
					abogada_get_social_share_links();
				}
			?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php
	if( $page_show_comments ) {
		abogada_show_comments();
	}
?>
