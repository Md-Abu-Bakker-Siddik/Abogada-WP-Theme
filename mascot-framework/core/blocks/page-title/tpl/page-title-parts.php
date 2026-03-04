<?php
	/**
	* abogada_before_page_title hook.
	*
	*/
	do_action( 'abogada_before_page_title' );
?>
<!-- Section: page-title -->
<section class="page-title tm-page-title <?php echo esc_attr( $title_area_classes );?>"<?php if( $title_area_add_bg_video_status && $title_area_bg_video_type == 'self-hosted' ) { ?> data-vide-bg="
<?php if( $title_area_bg_video_self_hosted_video_mp4_url['url'] != '' ) { echo esc_attr( 'mp4: ' . $title_area_bg_video_self_hosted_video_mp4_url['url'] ); }?>
<?php if( $title_area_bg_video_self_hosted_video_webm_url['url'] != '' ) { echo esc_attr( ', webm: ' . $title_area_bg_video_self_hosted_video_webm_url['url'] ); }?>
<?php if( $title_area_bg_video_self_hosted_video_ogv_url['url'] != '' ) { echo esc_attr( ', ogv: ' . $title_area_bg_video_self_hosted_video_ogv_url['url'] ); }?>
<?php if( $title_area_bg_video_self_hosted_video_poster['url'] != '' ) { echo esc_attr( ', poster: ' . $title_area_bg_video_self_hosted_video_poster['url'] ); }?>" data-vide-options="loop: true, muted: false, position: 0% 0%"<?php } ?> style="<?php echo esc_attr( $title_area_bgcolor ); ?> <?php echo esc_attr( $title_area_bgimg ); ?>" >
	<?php
		if( $title_area_add_bg_video_status && $title_area_bg_video_type == 'youtube' ) :
			abogada_get_title_area_bg_video_youtube();
		endif;
	?>
	<div class="<?php echo esc_attr( $title_area_container_class ); ?> <?php echo esc_attr( $title_area_container_height ); ?>">
		<?php
			/**
			* abogada_page_title_start hook.
			*
			*/
			do_action( 'abogada_page_title_start' );
		?>
		<?php
			abogada_get_title_area_layout();
		?>
		<?php
			/**
			* abogada_page_title_end hook.
			*
			*/
			do_action( 'abogada_page_title_end' );
		?>
	</div>
</section>
<?php
	/**
	* abogada_after_page_title hook.
	*
	*/
	do_action( 'abogada_after_page_title' );
?>