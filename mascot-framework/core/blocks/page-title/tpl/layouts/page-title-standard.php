<div class="row">
  <div class="col-md-12 sm-text-center title-content">
	<?php do_action( 'abogada_page_title_content_start' ); ?>
	<?php if( $title_area_show_title ) { abogada_get_title_area_title(); } ?>
	<?php if( $title_area_show_breadcrumb ) { abogada_display_breadcrumbs(); } ?>
	<?php if( $title_area_show_subtitle ) { abogada_get_title_area_subtitle(); } ?>
	<?php do_action( 'abogada_page_title_content_end' ); ?>
  </div>
</div>