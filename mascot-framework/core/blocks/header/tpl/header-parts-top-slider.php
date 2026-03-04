
	<?php
	/**
	* abogada_before_top_sliders_container hook.
	*
	*/
	do_action( 'abogada_before_top_sliders_container' );
	?>
	<div class="top-sliders-container">
		<?php
			/**
			* abogada_top_sliders_container_start hook.
			*
			*/
			do_action( 'abogada_top_sliders_container_start' );
		?>

		<?php
			echo abogada_get_top_main_slider();
		?>

		<?php
			/**
			* abogada_top_sliders_container_end hook.
			*
			*/
			do_action( 'abogada_top_sliders_container_end' );
		?>
	</div>
	<?php
	/**
	* abogada_after_top_sliders_container hook.
	*
	*/
	do_action( 'abogada_after_top_sliders_container' );
	?>
