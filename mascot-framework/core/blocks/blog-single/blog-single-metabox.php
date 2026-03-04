<?php
add_action( 'rwmb_meta_boxes', 'abogada_blog_single_register_user_meta_boxes' );
function abogada_blog_single_register_user_meta_boxes( $meta_boxes ) {
	$meta_boxes[] = array(
		'title' => esc_html__( 'Contact Info', 'abogada' ),
		'type'  => 'user', // Specifically for user
		'fields' => array(
			array(
				'name' => esc_html__( 'Mobile phone', 'abogada' ),
				'id'   => 'abogada_' . 'mobile',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Work phone', 'abogada' ),
				'id'   => 'abogada_' . 'work',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Address', 'abogada' ),
				'id'   => 'abogada_' . 'address',
				'type' => 'textarea',
			),
		),
	);
	$meta_boxes[] = array(
		'title' => esc_html__( 'Social Networks', 'abogada' ),
		'type'  => 'user', // Specifically for user
		'fields' => array(
			array(
				'name' => esc_html__( 'Facebook', 'abogada' ),
				'id'   => 'abogada_' . 'facebook',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Twitter', 'abogada' ),
				'id'   => 'abogada_' . 'twitter',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Linkedin', 'abogada' ),
				'id'   => 'abogada_' . 'linkedin',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Youtube', 'abogada' ),
				'id'   => 'abogada_' . 'youtube',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Google Plus', 'abogada' ),
				'id'   => 'abogada_' . 'googleplus',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Instagram', 'abogada' ),
				'id'   => 'abogada_' . 'instagram',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Pinterest', 'abogada' ),
				'id'   => 'abogada_' . 'pinterest',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Tumblr', 'abogada' ),
				'id'   => 'abogada_' . 'tumblr',
				'type' => 'text',
			),
		),
	);
	return $meta_boxes;
}

add_action( 'rwmb_meta_boxes', 'abogada_blog_single_register_meta_boxes' );
function abogada_blog_single_register_meta_boxes( $meta_boxes ) {
	// Meta Box Settings for this Page
	$meta_boxes[] = array(
		'title'		=> esc_html__( 'Blog Settings', 'abogada' ),
		'post_types' => 'post',
		'priority'   => 'high',

		// List of tabs, in one of the following formats:
		// 1) key => label
		// 2) key => array( 'label' => Tab label, 'icon' => Tab icon )
		'tabs'		=> array(
			'featured_image_size' => array(
				'label' => esc_html__( 'Featured Image Size', 'abogada' ),
				'icon'  => 'dashicons-screenoptions', // Dashicon
			),
		),

		// Tab style: 'default', 'box' or 'left'. Optional
		'tab_style' => 'left',

		// Show meta box wrapper around tabs? true (default) or false. Optional
		'tab_wrapper' => true,

		'fields'	=> array(
			array(
				'id'     => 'abogada_' . 'portfolio_mb_featured_image_size_settings',
				// Group field
				'type'   => 'group',
				// Clone whole group?
				'clone'  => false,
				// Drag and drop clones to reorder them?
				'sort_clone' => false,
				// tab
				'tab'  => 'featured_image_size',
				// Sub-fields
				'fields' => array(
					//featured_image_size tab starts
					array(
						'type' => 'heading',
						'name' => esc_html__( 'Featured Image Size', 'abogada' ),
						'desc' => esc_html__( 'Changes of the following settings will be effective only for this page.', 'abogada' ),
						'tab'  => 'featured_image_size',
					),
					array(
						'name'		=> esc_html__( 'Featured Image Size in Masonry Tiles Mode', 'abogada' ),
						'id'		=> 'masonry_tiles_featured_image_size',
						'type'		=> 'select',
						'options'   => mascot_core_abogada_masonry_image_sizes(),
						'tab'		=> 'featured_image_size',
					),
					//featured_image_size tab ends
				),
			),
		),
	);

	return $meta_boxes;
}