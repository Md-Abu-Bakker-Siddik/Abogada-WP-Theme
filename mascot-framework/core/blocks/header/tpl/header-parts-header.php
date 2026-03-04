	<!-- Header -->
	<?php
		/**
		* abogada_before_header hook.
		*
		*/
		do_action( 'abogada_before_header' );
	?>
	<header id="header" class="header <?php echo esc_attr(implode(' ', $header_classes)); ?>" <?php if( $params['header_layout_type'] == 'header-vertical-nav' ) { ?> style="<?php echo esc_attr( $vertical_nav_bgcolor ); ?> <?php echo esc_attr( $vertical_nav_bgimg ); ?>" <?php } ?>>
		<?php
			/**
			* abogada_header_start hook.
			*
			*/
			do_action( 'abogada_header_start' );
		?>
		<?php
			/**
			* abogada_header_top_area hook.
			*
			* @hooked abogada_get_header_top
			*/
			do_action( 'abogada_header_top_area' );
		?>
		<?php
			abogada_get_header_layout_type();
		?>

		<?php
			/**
			* abogada_header_end hook.
			*
			*/
			do_action( 'abogada_header_end' );
		?>
	</header>
	<?php
		/**
		* abogada_after_header hook.
		*
		*/
		do_action( 'abogada_after_header' );
	?>