<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="quote-content">
		<?php do_action( 'abogada_blog_post_entry_header_start' ); ?>
		<?php abogada_get_post_thumbnail( $post_format ); ?>
		<?php do_action( 'abogada_blog_post_entry_header_end' ); ?>
	</div>
</article>