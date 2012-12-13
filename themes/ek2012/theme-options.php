<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
$carousel_settings = array(
	array(
            'id'          => 'type',
            'label'       => 'Carousel Type',
            'desc'        => '<p>Select the type of carousel. There are two types:</p>
<p><strong>Slide Collection</strong><br />
This type will allow you to create custom content to show in the carousel, or you can mix custom content with posts. You would need to set up the slides first by creating them under Slides &gt; Add New, and adding them to a Collection. Once you\'ve created a Slide Collection, it\'ll be available to select below.
</p>
<p><strong>Recent Posts</strong><br />
This is the quickest way to set up a carousel that shows a stream of recent posts. You can limit the stream to a certain post type, category, or tag.',
            'std'         => '',
            'type'        => 'select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => 'carousel-type',
            'choices'     => array( 
              array(
                'value'       => 'slide_collection',
                'label'       => 'Slide Collection',
                'src'         => ''
              ),
              array(
                'value'       => 'recent_posts',
                'label'       => 'Recent Posts',
                'src'         => ''
              )
            ),
          ),
          array(
            'id'          => 'slide_collection',
            'label'       => 'Slide Collection',
            'desc'        => 'Select which slide collection to show in this carousel slot.',
            'std'         => '',
            'type'        => 'taxonomy-select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => 'slide_collections',
            'class'       => 'slide-collection'
          ),
          array(
            'id'          => 'max_num',
            'label'       => 'Max # of items',
            'desc'        => 'Enter the maximum number of items to show in this carousel (defaults to 5). If a slide collection has more items than the limit, then the full collectionw won\'t be shown.',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
          array(
            'id'          => 'post_type',
            'label'       => 'Post Type',
            'desc'        => 'Select the post type that you\'d like to show in this carousel.',
            'std'         => '',
            'type'        => 'select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => 'carousel-post-type',
            'choices'     => array( 
              array(
                'value'       => 'post',
                'label'       => 'Blog Post',
                'src'         => ''
              ),
              array(
                'value'       => 'event',
                'label'       => 'Event',
                'src'         => ''
              )
            ),
          ),
          array(
            'id'          => 'category',
            'label'       => 'Category',
            'desc'        => 'Optionally select a category to limit the posts that show up in the carousel.',
            'std'         => '',
            'type'        => 'category-select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => 'carousel-category'
          ),

          array(
            'id'          => 'tag',
            'label'       => 'Tag',
            'desc'        => 'Optionally enter a tag to limit the posts that show up in the carousel.',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => 'carousel-tag'
          )

);

$carousel_sections = array(
	'film_cat' 					=> 'Film Category',
	'galleries_cat' 			=> 'Galleries Category',
	'illustration_art_cat' 		=> 'Illustration & Art Category',
	'new_media_cat' 			=> 'New Media Category',
	'photography_cat' 			=> 'Photography Category',
	'the_interviews_cat'		=> 'The Interviews Category',
	'the_mausoleum_cat' 		=> 'The Mausoleum Category',
	'offsite_products'			=> 'Offsite Products',
);

/**
* Custom settings array that will eventually be 
* passes to the OptionTree Settings API Class.
*/
$custom_settings = array( 
	'contextual_help' => array(
	  'sidebar'       => ''
	),
	'sections'        => array( 
		array(
			'id' => 'home_page',
			'title' => 'Home Page'
		),
	),
	'settings'        => array(
		array(
        'id'          => 'home_carousels',
        'label'       => 'Carousels',
        'desc'        => 'Configure up to 3 carousels. Only the first 3 carousels added here will show up on the page.',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'home_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => $carousel_settings,
      )	),
);

foreach ($carousel_sections as $id => $title)
{
	$custom_settings['sections'][] = array(
		'id' => $id,
		'title' => $title,
	);
	
	foreach ($carousel_settings as $setting) {
		$setting['id'] = $id.'_carousel_'.$setting['id'];
		$setting['section'] = $id;
		$custom_settings['settings'][] = $setting;
	}
}

// Additional settings

$custom_settings['settings'][] = array(
	'id'          => 'offsite_products_header',
	'section'	  => 'offsite_products',
	'label'       => 'Header',
	'desc'        => '',
	'std'         => 'Featured Posters',
	'type'        => 'text',
	'rows'        => '',
	'post_type'   => '',
	'taxonomy'    => '',
	'class'       => ''
);

$custom_settings['settings'][] = array(
	'id'          => 'offsite_products_subhdr',
	'section'	  => 'offsite_products',
	'label'       => 'Subheader',
	'desc'        => '',
	'std'         => 'Select an artist below to view more works on Thumbtack Press.',
	'type'        => 'text',
	'rows'        => '',
	'post_type'   => '',
	'taxonomy'    => '',
	'class'       => ''
);

$custom_settings['settings'][] = array(
	'id'          => 'offsite_products_button_text',
	'section'	  => 'offsite_products',
	'label'       => 'Promo Button Text',
	'desc'        => '',
	'std'         => 'Shop All Posters',
	'type'        => 'text',
	'rows'        => '',
	'post_type'   => '',
	'taxonomy'    => '',
	'class'       => ''
);

$custom_settings['settings'][] = array(
	'id'          => 'offsite_products_credits_text',
	'section'	  => 'offsite_products',
	'label'       => 'Credits Text',
	'desc'        => '',
	'std'         => 'The exclusive EK gallery provided by our partners at Thumbtack Press.',
	'type'        => 'text',
	'rows'        => '',
	'post_type'   => '',
	'taxonomy'    => '',
	'class'       => ''
);

$custom_settings['settings'][] = array(
	'id'          => 'offsite_products_hide_promo_credits',
	'section'	  => 'offsite_products',
	'label'       => 'Hide Button & Text from Carousel?',
	'desc'        => '',
	'type'        => 'checkbox',
	'choices'     => array(
		array( 
			'value' => 'yes',
			'label' => 'Yes' 
		)
	)
);


/* print_r($custom_settings); */
   
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}


