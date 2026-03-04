<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php do_action( 'abogada_blog_post_entry_header_start' ); ?>
		<?php abogada_get_post_thumbnail( $post_format ); ?>
		<?php do_action( 'abogada_blog_post_entry_header_end' ); ?>
	</div>
	<div class="entry-content">
		<?php do_action( 'abogada_blog_post_entry_content_start' ); ?>



		<?php abogada_post_meta(); ?>
		<?php abogada_get_post_title(); ?>
		<div class="post-excerpt">
			<?php abogada_get_excerpt(); ?>
		</div>
		<?php do_action( 'abogada_blog_post_entry_content_end' ); ?>

		<?php echo abogada_blog_read_more_link(); ?>
	</div>
	<div class="clearfix"></div>
</article>