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
        'id'          => 'home_page',
        'title'       => 'Home Page'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'home_carousels',
        'label'       => 'Carousels',
        'desc'        => 'Configure up to 3 carousels. Only the first 3 carousels added here will show up on the home page.',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'home_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => array( 
          array(
            'id'          => 'type',
            'label'       => 'Type',
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
            'desc'        => 'Enter the maximum number of items to show in this carousel.',
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
            'desc'        => 'Optionally select a tag to limit the posts that show up in the carousel.',
            'std'         => '',
            'type'        => 'tag-select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => 'carousel-tag'
          )
        )
      )
    )
  );
   
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}