<?php 
 
	// Field groups on Offsite Products
	register_field_group(array (
		'id' => '50ca13fd17677',
		'title' => 'Offsite Products',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_50c3bd6f7cfc4',
				'label' => 'Artist Name',
				'name' => 'artist_name',
				'type' => 'text',
				'instructions' => '',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => '0',
			),
			1 => 
			array (
				'key' => 'field_50c3bd6f7f8ac',
				'label' => 'Artist URL',
				'name' => 'artist_url',
				'type' => 'text',
				'instructions' => 'Enter the entire url, including "http://"',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'order_no' => '1',
			),
			2 => 
			array (
				'key' => 'field_50c3bd9965f6c',
				'label' => 'Product URL',
				'name' => 'product_url',
				'type' => 'text',
				'instructions' => 'Enter the entire url, including "http://"',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'order_no' => '2',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'offsite_product',
					'order_no' => '0',
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => 
			array (
				0 => 'the_content',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'discussion',
				4 => 'comments',
				5 => 'revisions',
				6 => 'slug',
				7 => 'author',
				8 => 'format',
			),
		),
		'menu_order' => 0,
	));
 
	// Field groups on Slide post type
	register_field_group(array (
		'id' => '507ef43c5fb19',
		'title' => 'Slides',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_507dfe64a3359',
				'label' => 'Post to feature',
				'name' => 'featured_post',
				'type' => 'relationship',
				'instructions' => 'Optionally choose a post to feature in this slide. You can leave the slide title, content, link, and featured image blank to use the selected post\'s title, content, link, and image. If you enter a value for any of those fields, they will override the selected post\'s value when the slide is displayed in the carousel.',
				'required' => '0',
				'post_type' => 
				array (
					0 => 'post',
					1 => 'event',
					2 => 'cause',
				),
				'taxonomy' => 
				array (
					0 => 'all',
				),
				'max' => '1',
				'order_no' => '0',
			),
			1 => 
			array (
				'key' => 'field_507e0220d8eed',
				'label' => 'Link',
				'name' => 'link',
				'type' => 'text',
				'instructions' => 'Optionally enter a URL that the title of this slide will be linked to.
	
	If left blank, and a featured post is selected for this slide, the title will be linked to the post. If no post is selected, then the title will not be linked.',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'order_no' => '1',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slide',
					'order_no' => '0',
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => '50fb9867719cd',
		'title' => 'Featured Video',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_13',
				'label' => 'Video URL',
				'name' => 'featured_video',
				'type' => 'text',
				'order_no' => 0,
				'instructions' => 'URL to any Vimeo video.',
				'required' => 0,
				'conditional_logic' => 
				array (
					'status' => 0,
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
				),
				1 => 
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slide',
					'order_no' => '0',
				),
			),
			'allorany' => 'any',
		),
		'options' => 
		array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '510b72ad66461',
		'title' => 'EK Author Details',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_15',
				'label' => 'Location',
				'name' => 'location',
				'type' => 'text',
				'order_no' => 0,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 
				array (
					'status' => 0,
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			1 => 
			array (
				'key' => 'field_16',
				'label' => 'Pinterest',
				'name' => 'pinterest',
				'type' => 'text',
				'order_no' => 1,
				'instructions' => 'Full link to your Pinterest profile',
				'required' => 0,
				'conditional_logic' => 
				array (
					'status' => 0,
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'none',
			),
			2 => 
			array (
				'key' => 'field_17',
				'label' => 'Facebook',
				'name' => 'facebook',
				'type' => 'text',
				'order_no' => 2,
				'instructions' => 'Full link to your Facebook profile',
				'required' => 0,
				'conditional_logic' => 
				array (
					'status' => 0,
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'none',
			),
			3 => 
			array (
				'key' => 'field_18',
				'label' => 'Twitter',
				'name' => 'twitter',
				'type' => 'text',
				'order_no' => 3,
				'instructions' => 'Full link to your Twitter profile',
				'required' => 0,
				'conditional_logic' => 
				array (
					'status' => 0,
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'none',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'ef_user',
					'operator' => '==',
					'value' => 'administrator',
					'order_no' => 0,
				),
				1 => 
				array (
					'param' => 'ef_user',
					'operator' => '==',
					'value' => 'editor',
					'order_no' => 1,
				),
				2 => 
				array (
					'param' => 'ef_user',
					'operator' => '==',
					'value' => 'author',
					'order_no' => 2,
				),
			),
			'allorany' => 'any',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
