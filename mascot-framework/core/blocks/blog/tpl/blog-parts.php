<?php
	/**
	* abogada_before_blog_section hook.
	*
	*/
	do_action( 'abogada_before_blog_section' );
?>
<section>
	<div class="<?php echo esc_attr( $container_type ); ?>">
		<?php
			/**
			* abogada_blog_container_start hook.
			*
			*/
			do_action( 'abogada_blog_container_start' );
		?>

		<div class="blog-posts">
			<?php
				abogada_get_blog_sidebar_layout();
			?>
		</div>

	<?php
		/**
		* abogada_blog_container_end hook.
		*
		*/
		do_action( 'abogada_blog_container_end' );
	?>
	</div>
</section>
<?php
	/**
	* abogada_after_blog_section hook.
	*
	*/
	do_action( 'abogada_after_blog_section' );
?>
